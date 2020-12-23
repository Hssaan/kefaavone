<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $subscriptions = auth()->user()->subscriptions();
        return view('user.profile')->with(compact('subscriptions'));
    }
}
