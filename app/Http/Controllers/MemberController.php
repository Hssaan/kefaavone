<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;


class MemberController extends Controller
{
    public function index(){

        $members = Member::all();

        return view('member.index')->with(compact('members'));
    }

    public function create(){
        return view('member.create');
    }

    public function store(Request $request){

        $validate = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);
    
        $member = new Member;
        $member->uuid = \DB::raw('UUID()');

        $member->name = $request->name;
        $member->description = $request->description;
        $member->price = $request->price;

        $member_save = $member->save();

        if($member_save){
            return redirect()->back()->with('status','تمت الاضافة بنجاح');
        }
    }

    public function edit($id){

        $member = Member::where('id',$id)->first();
        
        if(!$member){
            return redirect()->route('member.index');
        }

        return view('member.edit')->with(compact('member'));
    }


    public function update(Request $request,$id){

        $member = Member::where('id',$id)->first();
        
        if(!$member){
            return redirect()->route('member.index');
        }

        $validate = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);
    
        $member->name = $request->name;
        $member->description = $request->description;
        $member->price = $request->price;

        $member_save = $member->save();

        if($member_save){
            return redirect()->back()->with('status','تم التعديل بنجاح');
        }
    }

    public function delete(Request $request,$id){

        $member = Member::where('id',$id)->first();
        
        if(!$member){
            return redirect()->route('member.index');
        }

        $member_delete = $member->delete();

        if($member_delete){
            return redirect()->back()->with('status','تم الحذف بنجاح');
        }
    }
}
