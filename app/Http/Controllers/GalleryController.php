<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    //
    public function gallery (){
        $arr = Storage::disk('minio')->allFiles();
        
        return view('gallery', compact('arr'));
    }

    public function add () {
        return view('upload');
    }

    public function store (Request $request) {
        $image = $request->file('image');

        if ($image) {

            //generate file name
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

            $manager = new ImageManager(new Driver());

            // read image from file system
            $img = $manager->read($image);

            // resize image 
            $img->resize(200, 200);

            // $manager = new ImageManager(['driver' => 'imagick']);

            // $img = $manager->make($image)->resize(500, 500, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // });


            Storage::disk('minio')->put($fileName, $img->encode());
            // Storage::disk('local')->put($fileName, $image->encode());
            
            return redirect('/gallery')->with('success', 'Image uploaded');
        }
    }
}
