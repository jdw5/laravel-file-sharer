<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\PlanResource;

class PlanController extends Controller
{
    public function __invoke(Request $request)
    {
        return Inertia::render('Plans', [
            'plans' => PlanResource::collection(Plan::orderBy('storage', 'asc')->get())
        ]);
    }
}
