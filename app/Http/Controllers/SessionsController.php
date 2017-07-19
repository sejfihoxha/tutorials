<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //

    public function __construct()
    {


        return $this->middleware('guest')->except('destroy');
    }

    public function create()
    {

      return view('sessions.create');
    }
     // kontrollon se a ekziston nje user ne db.
    public function store()
    {
        //atempt if user exits
       if( !auth()->attempt(request(['email','password'])))
       {

         return back()->withErrors([

           'message'=>'Please check your creditentials '

            ]);
       }

       return redirect()->home();
    }

    public function destroy()
    {
    	
      auth()->logout();


      return redirect()->home();
    	
    }
}
