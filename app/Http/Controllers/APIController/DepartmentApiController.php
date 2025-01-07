<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentApiController extends Controller
{
    public function index(Request $request)
    {

        $test = $request->get('symptoms');
        if ($test) {
            $symptom = Department::whereIn('symptoms', $test)->get();
        } else {
            $symptom = Department::get();
        }

        return $symptom;
    }

    public function departmentBySymptoms(Request $request)
    {
        $departments = Department::all();
        $filterD = [];
        // return $departments;
        // return $request;
        if ($request->symptoms != null) {
            //return json_decode($request->symptoms[0]);

            $s = json_decode($request->symptoms[0]);

            for ($i = 0; $i < count(json_decode($request->symptoms[0])); $i++) {
                // echo $s[$i] . " ";

                foreach ($departments as $key) {
                    // return $key->symptoms;
                    if (in_array($s[$i], $key->symptoms)) {
                        // return $key->department;
                        array_push($filterD, $key);
                        // return "its in array";
                    } else {
                        // echo 'not inserted' . " ";
                    }
                }
            }
            $filterD = array_values(array_unique($filterD));
            return $filterD;
        }
    }

    // public function abcdepartmentBySymptoms(Request $request)
    // {
    //     $departments = Department::all();
    //     $filterD = [];
    //     // return $departments;
    //     // return $request;
    //     if ($request->symptoms != null) {
    //         //return json_decode($request->symptoms[0]);

    //         $s = json_decode($request->symptoms[0]);

    //         for ($i = 0; $i < count(json_decode($request->symptoms[0])); $i++) {
    //             // echo $s[$i] . " ";

    //             foreach ($departments as $key) {
    //                 // return $key->symptoms;
    //                 if (in_array($s[$i], $key->symptoms)) {
    //                     // return $key->department;
    //                     array_push($filterD, $key->department);
    //                     // return "its in array";
    //                 } else {
    //                     echo 'not inserted' . " ";
    //                 }
    //             }
    //         }
    //         return $filterD;
    //     }
    // }
}