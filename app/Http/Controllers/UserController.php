<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=>'required',
            'department_id'=>'required',
            'role_id'=>'required',
            'image'=>'mimes:jpeg,png,jpg',
            'start_from'=>'required',
            'designation'=>'required'
        ]);
        $data = $request->all();
        if($request->hasFile('image')){
            $image = $request->image->hashName();
            $request->image->move(public_path('profile'),$image);
        } else {
            $image = 'avatar2.png';
        }
        $data['name']= $request->firstname.''.$request->lastname;
        $data['image']= $image;
        $data['password'] =bcrypt($request->password);
        User::create($data);
        return redirect()->route('users.index')->with('message','User created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'department_id'=>'required',
            'role_id'=>'required',
            'image'=>'mimes:jpeg,png,jpg',
            'start_from'=>'required',
            'designation'=>'required'
        ]);
        $data = $request->all();
        $user = User::find($id);
        if($request->hasFile('image')){
            $image = $request->image->hashName();
            $request->image->move(public_path('profile'),$image);
        } else {
            $image = $user->image;

        }

        if($request->password){
            $password = $request->password;
        } else {
            $password = $user->password;
        }
        $data['image'] =$image;
        $data['password']= $password;

        $user->update($data);
        return redirect()->route('users.index')->with('message','User updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('message','User deleted Successfully');
    }
}
