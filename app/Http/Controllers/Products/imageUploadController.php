<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Image;
use Log;

class imageUploadController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
  
    /**
     * Image resize
     */
    public function imgResize(Request $request)
    {
        $this->validate($request, [
            'imgFile' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        Log::info(date('Y-m-d H:i:s'));
        
        $image = $request->file('imgFile');
        $input['imagename'] = time().'.'.$image->extension();
     
        $filePath = public_path('/profile-images');
        if (!file_exists($filePath))
        {
            mkdir($filePath, 0777);
        }
        $img = Image::make($image->path());
        $img->resize(800, 600, function ($const) {
            $const->aspectRatio();
        })->save($filePath.'/'.$input['imagename']);
   
        $filePath = public_path('/images');
        $image->move($filePath, $input['imagename']);
        Log::info(date('Y-m-d H:i:s'));
        return back()
            ->with('success','Image uploaded')
            ->with('fileName',$input['imagename']);
    }
}
