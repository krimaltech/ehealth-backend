<?php

namespace App\Http\Controllers\Newsportal;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Newsmodel\News;
use App\Models\Newsmodel\Advertisement;
use App\Models\Newsmodel\Member;
use App\Models\Newsmodel\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Newsmodel\Gallery;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    private $path = 'public/images/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $data = collect([
    //         'gallery' => Gallery::count(),
    //         'member' => Member::count(),
    //         'advertisement' => Advertisement::count(),
    //         'news' => News::count()
    //     ]);
    //     $mostviews = News::orderBy('views', 'desc')->with('menu')->limit(5)->get(['id', 'title_en', 'menu_id', 'views', 'created_at']);
    //     return view('admin.index', compact('data', 'mostviews'));
    // }

    public function gallerydelete(Request $request)
    {
        $gallery = Gallery::findOrFail($request->id);
        $oldImage = $this->path . $gallery->image;
        if (Storage::exists($oldImage)) {
            Storage::delete($oldImage);
        }

        $gallery->delete();

        return response([$gallery->id]);
    }


    public function dataget()
    {
        $total = Visitor::select('country', 'ip')->distinct()->get();
        $country = Visitor::select('country')->distinct()->get();
        //   return   $total->where('country','Nepal')->count();
        foreach ($country as $index => $cont) {
            $country[$index]->total = $total->where('country', $cont->country)->count();
        }
        echo json_encode($country);
        exit;
    }

    public function visitors()
    {
        $visitors = Visitor::distinct('ip')->get(['ip', 'country', 'slug']);
        return view('admin.visitor', compact('visitors'));
    }

    public function profilechange()
    {
        $user = Auth::user();
        return view('admin.user.profile', compact('user'));
    }
    public function profileupdate(Request $request)
    {
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();

        if (isset($request->password)) {
            $request->validate([
                'password' => ['required', 'string', 'min:6', 'confirmed']
            ]);
            $user->password = bcrypt($request->get('password'));
        }
        $user->name = $request->get('name');
        if ($request->image) {
            $oldImage = $this->path . $user->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
            $imageName = $this->random . '_' . $request->image->getClientOriginalName();
            $uploadFile = $request->file('image')->storeAs($this->path, $imageName);
            $user->image = $imageName;
        }
        $user->update();

        return redirect()->route('home')->with('success', 'Profile updated successfully');
    }
}