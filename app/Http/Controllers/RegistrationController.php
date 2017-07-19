<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use App\User;
use App\Mail\Welcome;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    //

    public function create()
    {

    	return view('registration.create');
    }

    public function store(RegistrationRequest $request)
    {
       // validate the form
       // validimi i formes behet ne klasen RegistrationRequest
      // create and store user.

    	$user = User::create([
                            'name' => request('name'),
                            'email' => request('email'),
                            'password' => Hash::make(request('password'))
                            ]);
      
      // sign in them.

    	auth()->login($user);
   
     // sent a welcome email to the user!
      \Mail::to($user)->send(new Welcome($user));
    
     //redirect to the home page

     return redirect()->home();	
    	
    }
}
