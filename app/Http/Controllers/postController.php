<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;
use App\Models\post;

class postController extends Controller
{
    public function index(){
        $comments = comment::find(3)->post;
        // foreach($comments as $comment){
        //  echo "title is : ".$comment->title . '<br>';
        // }
        return $comments->title;
    }
    public function edit(post $post){
        $this->authorize('update',$post);
        // auth()->user()->cannot('update',$post);
    //    $boolean = $this->authorize('create', post::class);
        return "boolean";
    }
}
 