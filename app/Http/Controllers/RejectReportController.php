<?php

namespace App\Http\Controllers;

use App\Models\LabProfile;
use App\Models\LabTest;
use App\Models\PathologyReport;
use App\Models\RejectReport;
use App\Models\SkipTest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class RejectReportController extends Controller
{
    public function index()
    {
        if (Gate::allows('Lab Technician')) {
            $rejectReport = RejectReport::with(['report.screeningdate.userpackage.familyname'])->whereHas('report', function ($query) {
                $query->where('status', 'Report Rejected');
            })->latest()->get()->groupBy('report_id');
            //return $rejectReport;
            return view('admin.rejectReport.index', compact('rejectReport'));
        } else {
            return view('viewnotfound');
        }
    }

    public function show($id)
    {
        if (Gate::allows('Lab Technician')) {
            $profiles = [];
            $tests = [];
            $rejectReport = RejectReport::with('report')->find($id);
            $labtests = PathologyReport::where('report_id', $rejectReport->report_id)->with(['labtest.labprofile'])->get()->groupBy(['labtest.profile_id']);
            foreach ($labtests as $profile => $test) {
                if ($profile != null) {
                    $labprofile = LabProfile::find($profile);
                    array_push($profiles, $labprofile);
                } else {
                    foreach ($test as $item) {
                        $labtest = LabTest::find($item->labtest->id);
                        $exists = collect($tests)->contains('id', $labtest->id);
                        if (!$exists) {
                            $tests[] = $labtest;
                        }
                    }
                }
            }
            $skipProfiles = SkipTest::where('report_id', $rejectReport->report_id)->where('upload_status', 0)->where('labprofile_id', '!=', null)->with(['profile', 'test'])->get();
            $skipTests = SkipTest::where('report_id', $rejectReport->report_id)->where('upload_status', 0)->where('labtest_id', '!=', null)->with(['profile', 'test'])->get();
            return view('admin.rejectReport.show', compact('rejectReport', 'profiles', 'tests', 'skipProfiles', 'skipTests'));
        } else {
            return view('viewnotfound');
        }
    }
    public function edit($id, $rejectId,  $type)
    {
        if (Gate::allows('Lab Technician')) {
            $rejectReport = RejectReport::find($rejectId);
            if ($type == 'profile') {
                $profile = LabProfile::with('labtest')->find($id);
                $testIds =  $profile->labtest->pluck('id');
                $tests = PathologyReport::where('report_id', $rejectReport->report_id)->whereIn('test_id', $testIds)->with('labtest')->get();
                return view('admin.rejectReport.edit', compact('tests', 'profile', 'type', 'rejectReport'));
            } elseif ($type == 'test') {
                $test = LabTest::find($id);
                $tests = PathologyReport::where('report_id', $rejectReport->report_id)->where('test_id', $id)->with(['labtest', 'labvalue'])->get();
                //return $tests;
                return view('admin.rejectReport.edit', compact('tests', 'type', 'rejectReport', 'test'));
            } else {
                return view('viewnotfound');
            }
        } else {
            return view('viewnotfound');
        }
    }

    public function update(Request $request, $rejectId)
    {
        //return $request;
        foreach ($request->value as $id => $value) {
            $report = PathologyReport::with('labtest')->find($id);
            if ($report->labtest->test_result_type == 'Range') {
                $report->value = $value;
            } else if ($report->labtest->test_result_type == 'Value') {
                $report->result = $value;
            } else if ($report->labtest->test_result_type == 'Value and Image') {
                if ($report->report == null) {
                    $report->result = $value;
                } else {
                    $destination = 'public/images/' . $report->report;
                    if (Storage::exists($destination)) {
                        Storage::delete($destination);
                    };
                    $fileNameExt = $value->getClientOriginalName();
                    $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
                    $fileExt = $value->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
                    $value->storeAs('public/images', $fileNameToStore);
                    $pathToStore =  asset('storage/images/' . $fileNameToStore);
                    $report->report_path = $pathToStore;
                    $report->report = $fileNameToStore;
                }
            } else if ($report->labtest->test_result_type == 'Image') {
                $destination = 'public/images/' . $report->report;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $fileNameExt = $value->getClientOriginalName();
                $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
                $fileExt = $value->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
                $value->storeAs('public/images', $fileNameToStore);
                $pathToStore =  asset('storage/images/' . $fileNameToStore);
                $report->report_path = $pathToStore;
                $report->report = $fileNameToStore;
            }
            $report->save();
        }
        return redirect()->route('rejectReport.show', $rejectId)->with('success', 'Report Updated Successfully');
    }

    public function create($id, $rejectId, $type)
    {
        if (Gate::allows('Lab Technician')) {
            $skip = SkipTest::with(['profile.labtest', 'test.labvalue', 'report.members.user'])->find($id);
            if ($skip && $skip->report->members->dob && $skip->report->members->gender) {
                $age = Carbon::now()->format('Y') - substr($skip->report->members->dob, 0, 4);
                $gender = $skip->report->members->gender;
            } else {
                $age = '';
                $gender = '';
            }
            return view('admin.rejectReport.create', compact('skip', 'rejectId', 'age', 'gender', 'type'));
        } else {
            return view('viewnotfound');
        }
    }

    public function store(Request $request, $id)
    {
        //return $request;
        $skip = SkipTest::find($id);
        if (Gate::allows('Lab Technician')) {
            if ($request->type == 'test') {
                if ($request->test_result_type == 'Range') {
                    $report = new PathologyReport();
                    $report->report_id = $skip->report_id;
                    $report->test_id = $request->test_id;
                    $report->min_range = $request->min_range;
                    $report->max_range = $request->max_range;
                    $report->amber_min_range = $request->amber_min_range;
                    $report->amber_max_range = $request->amber_max_range;
                    $report->red_min_range = $request->red_min_range;
                    $report->red_max_range = $request->red_max_range;
                    $report->value = $request->value;
                    $report->save();
                } else if ($request->test_result_type == 'Value') {
                    foreach ($request->labvalue_id as $testId => $value) {
                        $report = new PathologyReport();
                        $report->report_id = $skip->report_id;
                        $report->test_id = $request->test_id;
                        $report->labvalue_id = $value;
                        if (array_key_exists($testId, $request->result)) {
                            $report->result = $request->result[$testId];
                        }
                        $report->save();
                    }
                } else if ($request->test_result_type == 'Value and Image') {
                    foreach ($request->labvalue_id as $testId => $value) {
                        $report = new PathologyReport();
                        $report->report_id = $skip->report_id;
                        $report->test_id = $request->test_id;
                        $report->labvalue_id = $value;
                        if (array_key_exists($testId, $request->result)) {
                            $report->result = $request->result[$testId];
                        }
                        $report->save();
                    }
                    if ($request->hasFile('report')) {
                        $report = new PathologyReport();
                        $report->report_id = $skip->report_id;
                        $report->test_id = $request->test_id;
                        if (env('STORAGE_TYPE') == 'native') {
                            if ($request->hasFile('report')) {
                                $images = storeImageLaravel($request, 'report', 'report_path');
                                $report->report = $images[0];
                                $report->report_path = $images[1];
                            }
                        } else {
                            if ($request->hasFile('report')) {
                                $images = storeImageStorage($request, 'report', 'report_path');
                                $report->report = $images[0];
                                $report->report_path = $images[1];
                            }
                        }
                        $report->save();
                    }
                } else {
                    if ($request->hasFile('report')) {
                        $report = new PathologyReport();
                        $report->report_id = $skip->report_id;
                        $report->test_id = $request->test_id;
                        if (env('STORAGE_TYPE') == 'native') {
                            if ($request->hasFile('report')) {
                                $images = storeImageLaravel($request, 'report', 'report_path');
                                $report->report = $images[0];
                                $report->report_path = $images[1];
                            }
                        } else {
                            if ($request->hasFile('report')) {
                                $images = storeImageStorage($request, 'report', 'report_path');
                                $report->report = $images[0];
                                $report->report_path = $images[1];
                            }
                        }
                    }
                    $report->save();
                }
            }
            if ($request->type == 'profile') {
                foreach ($request->test_id as $key => $t) {
                    if ($request->test_result_type[$key] == 'Range') {
                        $report = new PathologyReport();
                        $report->report_id = $skip->report_id;
                        $report->test_id = $t;
                        $report->min_range = $request->min_range[$key];
                        $report->max_range = $request->max_range[$key];
                        $report->amber_min_range = $request->amber_min_range[$key];
                        $report->amber_max_range = $request->amber_max_range[$key];
                        $report->red_min_range = $request->red_min_range[$key];
                        $report->red_max_range = $request->red_max_range[$key];
                        $report->value = $request->value[$key];
                        $report->save();
                    }
                }
            }

            $skip->upload_status = 1;
            $skip->update();
            return redirect()->route('rejectReport.show', $request->reject)->with('success', 'Report Updated Successfully');
        } else {
            return view('viewnotfound');
        }
    }
}
