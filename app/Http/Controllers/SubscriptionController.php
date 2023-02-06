<?php

namespace App\Http\Controllers;

use Exception;
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

        $this->validate($request, [
            'token' => ['required'],
        ]);

        $plan = Plan::where('slug', $request->get('plan'))->first();
        
        if (!$plan) {
            return redirect()->back();
        }

        $request->user()
            ->newSubscription('default', $plan->stripe_id)
            ->create($request->token);
        
        return redirect()->route('user.account');
    }

    public function update(Request $request)
    {
        // validate

        $plan = Plan::whereSlug($request->plan)->first();
        
        if (!$plan) {
            return redirect()->back();
        }
        
        if ($request->user()->canDowngradeToPlan($plan))
        {
            throw new Exception();
        }
        if (!$plan->purchasable) {
            $request->user()->subscription('default')->cancel();
            return;
        }

        $request->user()->subscription('default')->swap($plan->stripe_id);
        return redirect()->route('user.account');
        
    }
}
