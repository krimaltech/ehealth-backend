<?php

namespace App\Http\Controllers\Newsportal;

use App\Http\Controllers\Controller;
use App\Helper\Helper;
use App\Models\Newsmodel\Gallery;
use App\Models\Newsmodel\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Str;

class MenuController extends Controller
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
            $menus = Menu::where('menu_id', null)->with('children')->orderBy('position', 'asc')->get();
            return view('admin.menu.index', compact('menus'));
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
            $menus = Menu::where('menu_id', null)->orderBy('id', 'desc')->get(['id', 'title_en']);
            return view('admin.menu.create', compact('menus'));
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
        ]);
        $slug = Str::slug($request->title_en, '-');
        $slug = $slug . '_' . $this->random;

        $menu = new Menu;
        $menu->user_id = Auth::user()->id;
        $menu->menu_id = $request->menu_id;
        foreach (Helper::languageAll() as $language) {
            $menu->{"title_" . $language->code} = $request->{"title_" . $language->code};
            $menu->{"description_" . $language->code} = $request->{"description_" . $language->code};
        }
        $menu->slug = $slug;
        $menu->code = date('YmdHis') . rand(999, 000);
        $menu->status = $request->status ? 1 : 0;
        $menu->position = Menu::where('menu_id', $request->menu_id)->count();
        if ($request->hasFile('image')) {
            $destination = 'public/images/' . $menu->image;
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            $request->file('image')->storeAs('public/images', $fileNameToStore);
            $pathToStore =  asset('storage/images/' . $fileNameToStore);
            $menu->image_path = $pathToStore;
            $menu->image = $fileNameToStore;
        }

        $menu->save();

        if ($request->hasfile('gallery')) {
            foreach ($request->file('gallery') as $photo) {
                $imageName = $this->random . '_' . $photo->getClientOriginalName();
                $uploadFile = $photo->storeAs($this->path, $imageName);
                $gallery = new Gallery;
                $gallery->user_id = Auth::user()->id;
                foreach (Helper::languageAll() as $language) {
                    $gallery->{"title_" . $language->code} = $request->{"title_" . $language->code};
                }
                $gallery->image = $imageName;
                $gallery->code = $menu->code;
                $gallery->status = 1;
                $gallery->save();
            }
        }

        return redirect()->route('menu.index')->with('success', 'Menu added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        if (Gate::any(checkPermission("16"))) {
            $menus = Menu::where('menu_id', null)->where('id', '!=', $menu->id)->orderBy('id', 'desc')->get(['id', 'title_en']);
            return view('admin.menu.create', compact('menus', 'menu'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {

        $request->validate([
            'title_en' => 'required',
        ]);

        $menu->menu_id = $request->menu_id;
        foreach (Helper::languageAll() as $language) {
            $menu->{"title_" . $language->code} = $request->{"title_" . $language->code};
            $menu->{"description_" . $language->code} = $request->{"description_" . $language->code};
        }
        $menu->status = $request->status ? 1 : 0;
        if ($request->image) {
            $oldImage = $this->path . $menu->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
            $imageName = $this->random . '_' . $request->file('image')->getClientOriginalName();
            $uploadFile = $request->file('image')->storeAs($this->path, $imageName);
            $menu->image = $imageName;
        }

        $menu->update();

        if ($request->hasfile('gallery')) {
            foreach ($request->file('gallery') as $photo) {
                $imageName = $this->random . '_' . $photo->getClientOriginalName();
                $uploadFile = $photo->storeAs($this->path, $imageName);
                $gallery = new Gallery;
                $gallery->user_id = Auth::user()->id;
                foreach (Helper::languageAll() as $language) {
                    $gallery->{"title_" . $language->code} = $request->{"title_" . $language->code};
                }
                $gallery->image = $imageName;
                $gallery->code = $menu->code;
                $gallery->status = 1;
                $gallery->save();
            }
        }

        return redirect()->route('menu.index')->with('success', 'Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $oldImage = $this->path . $menu->image;
        if (Storage::exists($oldImage)) {
            Storage::delete($oldImage);
        }

        foreach ($menu->children as $child) {
            $oldImage = $this->path . $child->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
            $child->delete();
        }
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu deleted successfully');
    }

    public function submenu(Menu $menu)
    {
        if (Gate::any(checkPermission("16"))) {
            $submenus = Menu::where('menu_id', $menu->id)->orderBy('position', 'asc')->get(['id', 'title_en', 'image', 'status', 'position']);
            return view('admin.menu.submenu', compact('submenus', 'menu'));
        } else {
            return view('viewnotfound');
        }
    }

    public function submenudelete(Menu $menu)
    {
        if (Gate::any(checkPermission("16"))) {
            $oldImage = $this->path . $menu->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
    
            $menu->delete();
    
            return redirect()->route('menu.index')->with('success', 'Menu deleted successfully');
        } else {
            return view('viewnotfound');
        }
    }

    public function reorder(Request $request)
    {
        if (Gate::any(checkPermission("16"))) {
            foreach ($request->id as $index => $id) {
                $data = Menu::where('id', $id)->first();
                $data->position = $request->position[$index];
                $data->update();
            }
            return redirect()->route('menu.index')->with('success', 'Menu recorder successfully');
        } else {
            return view('viewnotfound');
        }
    }
}