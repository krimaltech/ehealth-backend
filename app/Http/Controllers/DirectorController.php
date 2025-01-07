<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Director;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DirectorController extends Controller
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
        $director = Director::orderBy('created_at', 'desc')->with('member.user')->get();
        return view('admin.director.index', compact('director'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.director.create');
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
            'director_type' => 'required',
        ]);
        if ($request->users_id != NULL) {
            $director = new Director();
            $director->slug =  'director-' . '-' . $this->random;
            $member = Member::where('gd_id', $request->users_id)->first();
            $director->user_id = $member->id;
            if (Helper::role_count($member->member_id) == 2) {
                $user_role = RoleUser::where('user_id',$member->member_id)->with('roles')->first();
                return redirect()->back()->withErrors([$user_role->roles->role_type . ' Role Already Assigned']);
            }
            $director->discount_per = 30;
            $director->director_type = $request->director_type;
            $director->share_amt = $request->share_amt;
            $director->message = $request->message;
            if (env('STORAGE_TYPE') == 'native') {
                if ($request->hasFile('share_docs')) {
                    $images = storeImageLaravel($request, 'share_docs', 'share_docs_path');
                    $director->share_docs = $images[0];
                    $director->share_docs_path = $images[1];
                }

                if ($request->hasFile('letter')) {
                    $images1 = storeImageLaravel($request, 'letter', 'letter_path');
                    $director->letter = $images1[0];
                    $director->letter_path = $images1[1];
                }

                if ($request->hasFile('director_image')) {
                    $images2 = storeImageLaravel($request, 'director_image', 'director_image_path');
                    $director->director_image = $images2[0];
                    $director->director_image_path = $images2[1];
                }
            } else {
                if ($request->hasFile('share_docs')) {
                    $images = storeImageStorage($request, 'share_docs', 'share_docs_path');
                    $director->share_docs = $images[0];
                    $director->share_docs_path = $images[1];
                }

                if ($request->hasFile('letter')) {
                    $images1 = storeImageStorage($request, 'letter', 'letter_path');
                    $director->letter = $images1[0];
                    $director->letter_path = $images1[1];
                }

                if ($request->hasFile('director_image')) {
                    $images2 = storeImageStorage($request, 'director_image', 'director_image_path');
                    $director->director_image = $images2[0];
                    $director->director_image_path = $images2[1];
                }
            }

            $saved = $director->save();
            if ($saved) {
                $user_role = new RoleUser();
                $user_role->user_id =$member->member_id;
                $user_role->role_id = 11;
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
                return redirect()->route('director.index')->with('success', 'director Added Successfully');
            }
        }
        if ($saved) {
            return redirect()->route('director.index')->with('success', 'Director Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function show(Director $director, $id)
    {
        $director = Director::findOrFail($id);
        return view('admin.director.show', compact('director'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function edit(Director $director, $id)
    {
        $director = Director::with('member.user')->findOrFail($id);
        return view('admin.director.edit', compact('director'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'required',
            'director_type' => 'required',
        ]);

        $director = Director::findOrFail($id);
        $director->director_type = $request->director_type;
        $director->share_amt = $request->share_amt;
        $director->message = $request->message;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('share_docs')) {
                $destination = 'public/images/' . $director->share_docs;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'share_docs', 'share_docs_path');
                $director->share_docs = $images[0];
                $director->share_docs_path = $images[1];
            }

            if ($request->hasFile('letter')) {
                $destination1 = 'public/images/' . $director->letter;
                if (Storage::exists($destination1)) {
                    Storage::delete($destination1);
                };
                $images1 = storeImageLaravel($request, 'letter', 'letter_path');
                $director->letter = $images1[0];
                $director->letter_path = $images1[1];
            }

            if ($request->hasFile('director_image')) {
                $destination2 = 'public/images/' . $director->director_image;
                if (Storage::exists($destination2)) {
                    Storage::delete($destination2);
                };
                $images2 = storeImageLaravel($request, 'director_image', 'director_image_path');
                $director->director_image = $images2[0];
                $director->director_image_path = $images2[1];
            }
        } else {
            if ($request->hasFile('share_docs')) {
                $destination = 'images/' . $director->share_docs;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'share_docs', 'share_docs_path');
                $director->share_docs = $images[0];
                $director->share_docs_path = $images[1];
            }

            if ($request->hasFile('letter')) {
                $destination2 = 'images/' . $director->share_docs;
                Storage::disk('minio')->delete($destination2);
                $images1 = storeImageStorage($request, 'letter', 'letter_path');
                $director->letter = $images1[0];
                $director->letter_path = $images1[1];
            }

            if ($request->hasFile('director_image')) {
                $destination3 = 'images/' . $director->share_docs;
                Storage::disk('minio')->delete($destination3);
                $images2 = storeImageStorage($request, 'director_image', 'director_image_path');
                $director->director_image = $images2[0];
                $director->director_image_path = $images2[1];
            }
        }
        $saved = $director->update();
        if ($saved) {
            return redirect()->route('director.index')->with('success', 'Director Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function destroy(Director $director)
    {
        //
    }

    public function user_details(Request $request)
    {
        $member = Member::with('user')->where('gd_id', $request->gd_id)->first();
        if ($member) {
            return response()->json($member);
        } else {
            return response()->json(['error' => 'User Not Found']);
        }
    }
}
