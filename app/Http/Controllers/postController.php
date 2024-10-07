<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

class postController extends Controller
{
    public function index(){
        $comments = comment::find(3)->post;
        // foreach($comments as $comment){
        //  echo "title is : ".$comment->title . '<br>';
        // }
        return $comments->title;
    }
}
