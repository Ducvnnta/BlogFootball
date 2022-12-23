<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    // public function upload(Request $request)
    // {
    //     if($request->hasFile('image')){
    //         $filename = $request->image->getClientOriginalName();
    //         $request->image->storeAs('images',$filename,'public');
    //         Auth()->user()->update(['image'=>$filename]);
    //     }
    //     return redirect()->back();
    // }

}
