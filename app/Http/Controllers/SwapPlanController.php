<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\PlanResource;

class SwapPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request)
    {
        $planAvailability = Plan::get()->flatMap(function ($plan) use ($request) {
            return [
                $plan->slug => $request->user()->canDowngradeToPlan($plan)
            ];
        });

        return Inertia::render('Swap', [
            'plans' => PlanResource::collection(Plan::orderBy('storage', 'asc')->get()),
            'upgrades' => $planAvailability,
            'currentPlan' => $request->user()->plan

        ]);


    }
}
