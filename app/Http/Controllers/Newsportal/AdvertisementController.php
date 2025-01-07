<?php

namespace App\Http\Controllers\Newsportal;

use App\Http\Controllers\Controller;
use App\Models\Newsmodel\Advertisement;
use App\Models\Newsmodel\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helper\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdvertisementController extends Controller
{
    private $path = 'public/images/';

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456hdgafshgdfahaiudvfgybsauydgafueGFHFVDAHSFH"), 0, 5);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("16"))) {
            $advertisements = Advertisement::orderBy('id', 'desc')->get();
            return view('admin.advertisement.index', compact('advertisements'));
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
        if (Gate::any(checkPermission("16"))) {
            $positions = Position::orderBy('id', 'desc')->get(['id', 'title']);
            return view('admin.advertisement.create', compact('positions'));
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
            'title_en' => 'required',
            'position_id' => 'required',
        ]);
        $advertisement = new Advertisement;
        $advertisement->user_id = Auth::user()->id;
        foreach (Helper::languageAll() as $language) {
            $advertisement->{"title_" . $language->code} = $request->{"title_" . $language->code};
        }
        $advertisement->slug = $request->slug;
        $advertisement->status = $request->status ? 1 : 0;
        $advertisement->position_id = $request->position_id;
        if ($request->image) {
            $imageName = $this->random . '_' . $request->file('image')->getClientOriginalName();
            $uploadFile = $request->file('image')->storeAs($this->path, $imageName);
            $advertisement->image = $imageName;
        }

        $advertisement->save();
        return redirect()->route('advertisement.index')->with('success', 'Advertisement added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        return redirect()->route('advertisement.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        if (Gate::any(checkPermission("16"))) {
            $positions = Position::get(['id', 'title']);
            return view('admin.advertisement.create', compact('advertisement', 'positions'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        $request->validate([
            'title_en' => 'required',
            'position_id' => 'required',
        ]);

        foreach (Helper::languageAll() as $language) {
            $advertisement->{"title_" . $language->code} = $request->{"title_" . $language->code};
        }
        $advertisement->slug = $request->slug;
        $advertisement->position_id = $request->position_id;
        $advertisement->status = $request->status ? 1 : 0;

        if ($request->image) {
            $oldImage = $this->path . $advertisement->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
            $imageName = $this->random . '_' . $request->image->getClientOriginalName();
            $uploadFile = $request->file('image')->storeAs($this->path, $imageName);
            $advertisement->image = $imageName;
        }

        $advertisement->update();
        return redirect()->route('advertisement.index')->with('success', 'Advertisement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        if (Gate::any(checkPermission("16"))) {
            $oldImage = $this->path . $advertisement->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
            $advertisement->delete();
            return redirect()->route('advertisement.index')->with('success', 'Advertisement deleted successfully');
        } else {
            return view('viewnotfound');
        }
    }
}