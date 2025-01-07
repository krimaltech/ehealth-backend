<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Investor;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvestorController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investor = Investor::orderBy('created_at', 'desc')->with('member.user')->get();
        return view('admin.investor.index', compact('investor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.investor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gender' => 'required',
            'address' => 'required',
            'investor_type' => 'required',
        ]);
        if ($request->users_id != NULL) {
            $investor = new Investor();
            $investor->slug =  'investor-' . '-' . $this->random;
            $member = Member::where('gd_id', $request->users_id)->first();
            $investor->user_id = $member->id;
            if (Helper::role_count($member->member_id) == 2) {
                $user_role = RoleUser::where('user_id',$member->member_id)->with('roles')->first();
                return redirect()->back()->withErrors([$user_role->roles->role_type . ' Role Already Assigned']);
            }
            $investor->discount_per = 10;
            $investor->investor_type = $request->investor_type;
            $investor->share_amt = $request->share_amt;
            if (env('STORAGE_TYPE') == 'native') {
                if ($request->hasFile('share_docs')) {
                    $image = storeImageLaravel($request, 'share_docs', 'share_docs_path');
                    $investor->share_docs = $image[0];
                    $investor->share_docs_path = $image[1];
                }

                if ($request->hasFile('letter')) {
                    $image1 = storeImageLaravel($request, 'letter', 'letter_path');
                    $investor->letter = $image1[0];
                    $investor->letter_path = $image1[1];
                }

                if ($request->hasFile('investor_image')) {
                    $image2 = storeImageLaravel($request, 'investor_image', 'investor_image_path');
                    $investor->investor_image = $image2[0];
                    $investor->investor_image_path = $image2[1];
                }
            } else {
                if ($request->hasFile('share_docs')) {
                    $image = storeImageStorage($request, 'share_docs', 'share_docs_path');
                    $investor->share_docs = $image[0];
                    $investor->share_docs_path = $image[1];
                }

                if ($request->hasFile('letter')) {
                    $image1 = storeImageStorage($request, 'letter', 'letter_path');
                    $investor->letter = $image1[0];
                    $investor->letter_path = $image1[1];
                }

                if ($request->hasFile('investor_image')) {
                    $image2 = storeImageStorage($request, 'investor_image', 'investor_image_path');
                    $investor->investor_image = $image2[0];
                    $investor->investor_image_path = $image2[1];
                }
            }
            $saved = $investor->save();
            if ($saved) {
                $user_role = new RoleUser();
                $user_role->user_id =$member->member_id;
                $user_role->role_id = 10;
                $user_role->save();
                $role_first = RoleUser::where('user_id', $member->member_id)->first();
                $role_second = RoleUser::where('user_id', $member->member_id)->skip(1)->first();
                $temp = 0;
                $temp = $role_first->role_id;
                $role_first->role_id = $role_second->role_id;
                $role_second->role_id = $temp;
                $role_first->save();
                $role_second->save();
            }
            if ($saved) {
                return redirect()->route('investor.index')->with('success', 'Investor Added Successfully');
            }
        }
        if ($saved) {
            return redirect()->route('investor.index')->with('success', 'Investor Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function show(Investor $investor, $id)
    {
        $investor = Investor::with('member.user')->findOrFail($id);
        return view('admin.investor.show', compact('investor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function edit(Investor $investor, $id)
    {
        $investor = Investor::with('member.user')->findOrFail($id);
        return view('admin.investor.edit', compact('investor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'gender' => 'required',
            'address' => 'required',
            'investor_type' => 'required',
        ]);

        $investor = Investor::findOrFail($id);
        $investor->investor_type = $request->investor_type;
        $investor->share_amt = $request->share_amt;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('share_docs')) {
                $destination = 'public/images/' . $investor->share_docs;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $image = storeImageLaravel($request, 'share_docs', 'share_docs_path');
                $investor->share_docs = $image[0];
                $investor->share_docs_path = $image[1];
            }

            if ($request->hasFile('letter')) {
                $destination1 = 'public/images/' . $investor->letter;
                if (Storage::exists($destination1)) {
                    Storage::delete($destination1);
                };
                $image1 = storeImageLaravel($request, 'letter', 'letter_path');
                $investor->letter = $image1[0];
                $investor->letter_path = $image1[1];
            }

            if ($request->hasFile('investor_image')) {
                $destination2 = 'public/images/' . $investor->investor_image;
                if (Storage::exists($destination2)) {
                    Storage::delete($destination2);
                };
                $image2 = storeImageLaravel($request, 'investor_image', 'investor_image_path');
                $investor->investor_image = $image2[0];
                $investor->investor_image_path = $image2[1];
            }
        } else {
            if ($request->hasFile('share_docs')) {
                $destination = 'images/' . $investor->share_docs;
                Storage::disk('minio')->delete($destination);
                $image = storeImageStorage($request, 'share_docs', 'share_docs_path');
                $investor->share_docs = $image[0];
                $investor->share_docs_path = $image[1];
            }

            if ($request->hasFile('letter')) {
                $destination1 = 'images/' . $investor->letter;
                Storage::disk('minio')->delete($destination1);
                $image1 = storeImageStorage($request, 'letter', 'letter_path');
                $investor->letter = $image1[0];
                $investor->letter_path = $image1[1];
            }

            if ($request->hasFile('investor_image')) {
                $destination2 = 'images/' . $investor->investor_image;
                Storage::disk('minio')->delete($destination2);
                $image2 = storeImageStorage($request, 'investor_image', 'investor_image_path');
                $investor->investor_image = $image2[0];
                $investor->investor_image_path = $image2[1];
            }
        }

        $saved = $investor->save();
        if ($saved) {
            return redirect()->route('investor.index')->with('success', 'Investor Added Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investor $investor)
    {
        //
    }

    public function user_details(Request $request)
    {
        $member = Member::with('user')->where('gd_id', $request->gd_id)->first();
        return response()->json($member);
    }
}
