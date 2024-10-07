<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class uploadImage extends Controller
{
    public function showImage(){
        return view('uploadImage');
    }
    public function storeImage(Request $request){
        $image = $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('users',$image,'storeImage');
        comment::create([
           'body'=> $path,
           'post_id'=>1
        ]);
        return 'ok';
    }
}
