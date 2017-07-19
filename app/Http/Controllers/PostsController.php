<?php

namespace App\Http\Controllers;

use App\Posts;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
        // per me mujt me kriju nje postim duhet te ekzistoj nje perdorues i kyqur!!!
    public function __construct()
    {
      return $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
    	$posts=Posts::latest();
        if($month=request('month'))
        {
            $posts->whereMonth('created_at',Carbon::parse($month)->month);
        }

        if($year=request('year'))
        {
            $posts->whereYear('created_at',$year);
        }
        $posts=$posts->get();

        /* $archives=Posts::archives();*/
           
    	return view('posts.index', compact('posts'));
    }


    public function show($id)
    {
    	$post=Posts::find($id);
    	return view('posts.show',compact('post'));
    }

   public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {

	   $this->validate(request(), [

       'title'=>'required',
       'body'=>'required'

	   	]);
	   
	   Posts::create([
        
          'title'=>request('title'),
          'body'=>request('body'),
          'user_id'=>auth()->id()


        ]);

       //  And Ridirect to home page
    	 return redirect('/');
    	
    }

}
