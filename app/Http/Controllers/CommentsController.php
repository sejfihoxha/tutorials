<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

use App\Posts;

use App\Comment;

class CommentsController extends Controller
{

    //function to add a comment in a post
    public function store(Posts $post)
    {

    $this->validate(request(),['body'=>'required|min:2']);	
    $post->addComment(request('body'));

    	return back();
    }
}
