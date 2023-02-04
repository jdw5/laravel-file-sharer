<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\PlanResource;

class CheckoutController extends Controller
{
    public function __invoke(Request $request, Plan $plan)
    {
        return Inertia::render('Checkout', [
            'plan' => PlanResource::make($plan),
            'intent' => $request->user()->createSetupIntent(),
            'stripeKey' => env('STRIPE_KEY'),
        ]);
    }
}
