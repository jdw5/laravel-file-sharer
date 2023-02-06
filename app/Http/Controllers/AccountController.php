<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function __invoke(Request $request)
    {
        $planAvailability = Plan::get()->flatMap(function ($plan) use ($request) {
            return [
                $plan->slug => $request->user()->canDowngradeToPlan($plan)
            ];
        });

        return Inertia::render('Account', [
            'plan' => $request->user()->plan,
            'upgrades' => $planAvailability,
        ]);
    }
}
