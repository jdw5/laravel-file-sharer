<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserUsageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function __invoke(Request $request)
    {
        return Inertia::render('Usage', [
            'usage' => $request->user()->usage(),
            'plan' => PlanResource::make($request->user()->plan)
        ]);
    }
}
