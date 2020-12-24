<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Subscription;
use App\Mail\OrderSubscription;

class SubscriptionController extends Controller
{
    public function index(){

        $members = Member::all();

        return view('subscription.index')->with(compact('members'));
    }

    public function userSubscription(){

        $subscriptions = Subscription::all();

        return view('subscription.user_subscription')->with(compact('subscriptions'));
    }

    public function confirm($uuid){

        $member = Member::where('uuid',$uuid)->first();
        
        if(!$member){
            return redirect()->route('subscription.index');
        }
        

        return view('subscription.confirm')->with(compact('member'));
    }

    public function store(Request $request,$id){

        $chcek_user_subscription = auth()->user()->subscriptions()->where(function($query){
            $query->whereNull('end_date')
                ->orWhere('end_date','>',DATE('Y-m-d'));
        });

        if($chcek_user_subscription->exists()){
            return redirect()->back()->with('error','لديك اشتراك في العضوية سابقا');
        }

        if(auth()->user()->isadmin){
             return redirect()->back()->with('error','لايمكنك الاشتراك في العضويات');
        }

        $member = Member::where('id',$id)->first();
        
        if(!$member){
            return redirect()->route('subscription.index');
        }

        $validate = $request->validate([
            'payment_method' => 'required|in:paypal,bank_transfer',
        ]);

        $subscription = new Subscription;
    
        $subscription->member_id = $member->uuid;
        $subscription->amount = $member->price;
        $subscription->user_id = auth()->user()->id;
        $subscription->payment_method = $request->payment_method;
        $subscription->payment_status = 'pending';
        $subscription->status = 'inactive';

        $subscription_save = $subscription->save();

        if($subscription_save){
            Mail::to(auth()->user())->send(new OrderSubscription($subscription));

            return redirect()->route('subscription.index')->with('status','تم الاشتراك بنجاح');
        }
    }

    public function active(Request $request,$id){

        $subscription = Subscription::where('id',$id)->first();
        
        if(!$subscription){
            return redirect()->route('subscription.index');
        }
    
        $subscription->payment_status = 'paid';
        $subscription->status = 'active';
        $subscription->start_date = DATE('Y-m-d H:i:s');
        $subscription->end_date = (new \Carbon\Carbon)->addYear(1) ;

        $subscription_save = $subscription->save();

        if($subscription_save){
            return redirect()->back()->with('status','تم تفعيل الاشتراك بنجاح');
        }
    }
}
