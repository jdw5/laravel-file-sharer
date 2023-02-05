<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function store(Request $request)
    {
        // validate
        $plan = Plan::where('slug', $request->get('plan'))->first();
        
        if (!$plan) {
            return redirect()->back();
        }
        $subscription = $request->user()
            ->newSubscription('default', $plan->stripe_id)
            ->create($request->token);
        
        return redirect()->route('user.account');
    }
}
