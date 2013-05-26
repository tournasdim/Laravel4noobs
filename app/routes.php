<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', array('as' => 'home', function () 
{
    return View::make('home')->with('title' , 'Welcome visitor');
}));


// Contactus ( only for loged-in users)
Route::get('contactus', array('before' => 'restrict',
							   'as' => 'contactus', function () 
{
	return View::make('contactus')->with('title' , 'Contact-us') ; 
}));


Route::get('login', array('as' => 'login', function () 
{
    return View::make('login');
}))->before('guest');

Route::post('login', function () 
{

/* Don't allow empty reCaptha field */
	if ( Input::get('recaptcha_response_field') == '') {
		return Redirect::route('login')
		->with('flash_error' , 'Sorry , your reCaptha secret words field was empty . Please try again ')
		->withInput(); 
	}


/*  Validating form fields and reCaptcha  */
	$rules = array(
			'username' => 'Required',
			'password'  => 'Required',
			'recaptcha_response_field' => 'recaptcha',
		);
	$inputs = Input::all();
	$validator = Validator::make($inputs, $rules);
	if ($validator->fails()  ) {
	return Redirect::route('login')
	->with('flash_error', 'Sorry , wrong reCaptcha secret words . Try again')
	->withInput(); 
	}

/* Checking for user's credentials  */
    $usercreds = array(
    'username' => Input::get('username'),
    'password' => Input::get('password')
		);
    if (!Auth::attempt($usercreds)) {
    	return Redirect::route('login')
        ->with('flash_error', 'Your username/password combination was incorrect.')
        ->withInput();

    }

/* User's credentials passed all checks , redirect  */        
		return Redirect::route('home')
        ->with('flash_notice', 'You are successfully logged in.');
})->before('csrf');


// Let's use Laravel's build-in basic-auth system
Route::get('basic-auth' , array('before' => 'auth.basic' , 
								'as' => 'basic-auth' , 
								function() 
{
  return View::make('basic-auth-admin')
  ->with('title' , 'A basic auth demo') ; 
})) ; 


/* Routes with a common filter are grouped into one section */
Route::group(array('before' => 'auth'), function()
{
	Route::get('logout', array('as' => 'logout', function () 
	{
	    Auth::logout();
	    return Redirect::route('home')
	        ->with('flash_notice', 'You are successfully logged out.');
	}));

	Route::get('vip', array('as' => 'vip', function () 
	{
	    return View::make('vip')->with('title' , 'VIP') ;
	}));

	Route::get('listmembers' , array('as' => 'listmembers' , function()
	{
		$users = DB::table('users')->get();
		return View::make('listmembers')
						->with('title' , 'Listing all members')
						->with('users' , $users);
	}));

	/* Sending Email using postmarkapp's web service */
	Route::post('sendmail' , function()
	{
	    $msg = Input::get('msg') ; 
	    $email = Input::get('email') ; 
	    $name = Input::get('name') ; 
	/* DB has the following information stored for this logged-in user */
	    $user = User::find(Auth::User()->id) ; 
	    $data = array('user' => $user, 
	                  'msg' => $msg ,
	                  'email' => $email , 
	                  'name' => $name) ;
	/* Validating submitted fields */
		$inputs = Input::all();
		$rules = array(
			'name' => 'Required|max:100',
			'email'  => 'Required|email|max:100',
			'msg' => 'Required|max:500'
		);
		$validator = Validator::make($inputs, $rules);
		$error_msg = '<li>All fields must be filled</li>
			<li>Message must not exceed the size of 500 characters</li>
			<li>Name / email field must not exceed the size of 100 characters</li>' ; 
		if ($validator->fails()  ) {
		return Redirect::route('contactus')
		->with('flash_error', "Sorry , not accepted due to : $error_msg")
		->withInput(); 
		} //End of validation 

	   Mail::send('emails.contactus' , $data , function($m) use ($user)
	    {
	    $m->to('tournasdimitrios@gmail.com')
	    ->subject("A message from $user->username"); 
	    }) ; 
	    
	    return View::make('home')
	    ->with('title' , 'Welcome visitor')
	   	->with('flash_notice', 'Thanks for sending us a mesage');
	})->before('csrf');

}); // end of group

