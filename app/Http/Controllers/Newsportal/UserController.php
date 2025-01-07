<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private $path='public/images/';

    public function __construct()
    {
        $this->middleware('admin');
        $this->random = substr(str_shuffle("0123456hdgafshgdfahaiudvfgybsauydgafueGFHFVDAHSFH"), 0, 5);
    }

    
   public function index(){
      $users= User::orderBy('id','desc')->get();
      return view('admin.user.index',compact('users'));
   }
   public function create(){
      return view('admin.user.create');
   }
    public function store(Request $request)
    { 
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users'],
            'password' => ['required', 'string', 'min:6']
            
        ]);
       
        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->user_id = Auth::user()->id;
        $user->role=$request->role ? 1:0;
        $user->password = bcrypt($request->get('password'));
        if ($request->image) {
        $imageName = $this->random . '_' . $request->file('image')->getClientOriginalName();
        $uploadFile = $request->file('image')->storeAs($this->path, $imageName);
        $user->image = $imageName;
    }
        $user->save();
       return redirect()->route('user.index')->with('success','user added successfully');
    }
    public function edit(User $user)
    {   
        return view('admin.user.create', compact('user'));
    }
    public function update(Request $request, User $user)
    { 
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$user->id],
            
        ]);
       if(isset($request->password)){
        $request->validate([
            'password' => ['required', 'string', 'min:6']
        ]);
        $user->password = bcrypt($request->get('password'));
       }
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role=$request->role ? 1:0;
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

        return redirect()->route('user.index')->with('success','user updated successfully');
    }

    public function destroy(User $user){

        $oldImage = $this->path. $user->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
        $user->delete();
        return redirect()->route('user.index')->with('success','User delete successfully');
    }
    
}
