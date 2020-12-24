<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('user.index')->with(compact('users'));
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){

        $validate = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
            'isadmin' => 'required|in:1,0'
        ]);
    
        $user = new User;
        $user->uuid = \DB::raw('UUID()');
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->isadmin = $request->isadmin;

        $user_save = $user->save();

        if($user_save){
            return redirect()->back()->with('status','تمت الاضافة بنجاح');
        }
    }

    public function edit($uuid){

        $user = User::where('uuid',$uuid)->first();
        
        if(!$user){
            return redirect()->route('user.index');
        }

        return view('user.edit')->with(compact('user'));
    }


    public function update(Request $request,$uuid){

        $user = User::where('uuid',$uuid)->first();
        
        if(!$user){
            return redirect()->route('user.index');
        }

        $validate = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$user->id.'id',
            'password' => 'nullable|min:8',
            'confirm_password' => 'nullable|min:8|same:password',
            'isadmin' => 'required|in:1,0'
        ]);
    
        $user->name = $request->username;
        $user->email = $request->email;

        if($request->filled('password'))
        $user->password = \Hash::make($request->password);

        if(auth()->user()->id != $user->id)
        $user->isadmin = $request->isadmin;

        $user_save = $user->save();

        if($user_save){
            return redirect()->back()->with('status','تم التعديل بنجاح');
        }
    }

    public function delete(Request $request,$uuid){

        $user = User::where('uuid',$uuid)
            ->where('uuid','<>',auth()->user()->uuid)
            ->where('uuid','<>',1)->first();
        
        if(!$user){
            return redirect()->route('user.index');
        }

        $user_delete = $user->delete();

        if($user_delete){
            return redirect()->back()->with('status','تم الحذف بنجاح');
        }
    }
}
