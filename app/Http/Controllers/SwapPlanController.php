<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\PlanResource;

class SwapPlanController extends Controller
{
    public function index()
    {
        return Inertia::render('Swap', [
            'plans' => PlanResource::collection(Plan::orderBy('storage', 'asc')->get())
        ]);
    }
}
