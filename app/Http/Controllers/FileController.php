<?php

namespace App\Http\Controllers;

use Aws\S3\S3Client;
use Inertia\Inertia;
use Aws\S3\PostObjectV4;
use Illuminate\Http\Request;
use App\Http\Resources\FileResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $files = FileResource::collection(Auth::user()->files);
        
        return Inertia::render('Files', [
            'files' => $files,

        ]);
    }

    public function signed(Request $request) 
    {
        $filename = md5($request->name . microtime() . '.' . $request->extension);

        // $client = Storage::disk('s3')->getDriver()->getAdapter()->getClient();
        $client = S3Client::factory([
            'credentials' => [
                'key'    => config('filesystems.disks.s3.key'),
                'secret' => config('filesystems.disks.s3.secret'),
            ],
            'region' => config('filesystems.disks.s3.region'),
            'version' => 'latest',
        ]);

        $object = new PostObjectV4(
            $client,
            config('filesystems.disks.s3.bucket'),
            ['key' => 'files/' . $filename],
            [                
                ['bucket' => config('filesystems.disks.s3.bucket')],
                ['starts-with', '$key', 'files/']
            ]
        );
        $response = json_encode([
            'attributes' => $object->getFormAttributes(),
            'additionalData' => $object->getFormInputs()
        ]);
        
        // dd($object->getFormInputs());
        // return $this->index()->with('response', $response);
        return response()->json([
            'attributes' => $object->getFormAttributes(),
            'additionalData' => $object->getFormInputs()
        ]);
    }

    public function store(Request $request)
    {
        $request->user()
            ->files()
            ->firstOrCreate($request->only('path'), $request->only('name', 'size'));
        
        return redirect()->back();
    }
}
