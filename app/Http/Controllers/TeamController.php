<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
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
        if (Gate::any(['Superadmin', 'Admin'])) {
            $team = Team::orderBy('created_at', 'desc')->get();
            return view('admin.team.index', compact('team'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $category = TeamCategory::all();
            return view('admin.team.create', compact('category'));
        } else {
            return view('viewnotfound');
        }
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
            'category' => 'required',
            'member_id' => 'required',
            'position' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required|size:10',
            'address' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'status' => 'required'
        ]);
        $team = new Team();
        $team->category_id = $request->category;
        $team->member_id = $request->member_id;
        $team->position = $request->position;
        $team->name = $request->name;
        $team->email = $request->email;
        $team->phone_no = $request->phone_no;
        $team->address = $request->address;
        $team->is_user = $request->is_user;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $team->image = $images[0];
                $team->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $team->image = $images[0];
                $team->image_path = $images[1];
            }
        }
        $name = str_replace(' ', '-', $request->name);
        $slug = str_replace('/', '-', $name);
        $member = str_replace(' ', '-', $request->member_id);
        $id = str_replace('/', '-', $member);
        $team->slug = $slug . '-' . $id . '-' . $this->random;
        $team->status = $request->status;
        $saved = $team->save();
        if ($saved) {
            return redirect()->route('team.index')->with('success', 'Team Member Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $team = Team::where('slug', $slug)->first();
            return view('admin.team.show', compact('team'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $team = Team::where('slug', $slug)->first();
            $category = TeamCategory::all();
            return view('admin.team.edit', compact('team', 'category'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'category' => 'required',
            'member_id' => 'required',
            'position' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required|size:10',
            'address' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'status' => 'required'
        ]);
        $team =  Team::where('slug', $slug)->first();
        $team->category_id = $request->category;
        $team->member_id = $request->member_id;
        $team->position = $request->position;
        $team->name = $request->name;
        $team->email = $request->email;
        $team->phone_no = $request->phone_no;
        $team->address = $request->address;
        $team->is_user = $request->is_user;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $team->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $team->image = $images[0];
                $team->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $team->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $team->image = $images[0];
                $team->image_path = $images[1];
            }
        }
        $name = str_replace(' ', '-', $request->name);
        $slug = str_replace('/', '-', $name);
        $member = str_replace(' ', '-', $request->member_id);
        $id = str_replace('/', '-', $member);
        $team->slug = $slug . '-' . $id . '-' . $this->random;
        $team->status = $request->status;
        $saved = $team->save();
        if ($saved) {
            return redirect()->route('team.index')->with('success', 'Team Member Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $team = Team::where('slug', $slug)->first();
        $deleted = $team->delete();
        if ($deleted) {
            return redirect()->route('team.index')->with('success', 'Team Member Deleted Successfully');
        }
    }

    public function updateStatus($id)
    {
        $team = Team::find($id);
        $status = !$team->status;
        $team->status = !$team->status;
        $team->update();
        return response()->json(['success' => 'Status Updated Successfully.', 'status' => $status, 'id' => $id]);
    }
}
