<?php

namespace App\Http\Controllers;

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
        
        return Inertia::render('Account', [
            'plan' => $request->user()->plan
        ]);
    }
}
