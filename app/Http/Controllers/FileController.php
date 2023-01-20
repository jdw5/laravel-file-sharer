<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\FileResource;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index()
    {
        $files = FileResource::collection(Auth::user()->files);
        
        return Inertia::render('Files', [
            'files' => $files,

        ]);
    }
}
