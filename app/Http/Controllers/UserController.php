<?php

namespace App\Http\Controllers;



class UserController extends Controller {
	/**
	*
	*/
	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
        $this->beforeFilter('guest',
        	array(
        		'only' => array('getLogin','getSignup')
        	));
    }
    /**
	* Show the new user signup form
	* @return View
	*/
	public function getSignup() {
		return View::make('signup');
	}



		public function postSignup() {

        	$data=Input::all();

            $user = new User;
            $user->username = Input::get('username');
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $rules=array(
            	'username'=>array('required','alpha_num','min:3','unique:users,username'),
            	'email'=>array('required','email','unique:users,email'),
            	'password'=>'required','min:5','confirmed');
            $validator = Validator::make($data,$rules);
            if ($validator->passes()) {
            	# Try to add the user 
            	try {
                	$user->save();
            	}
           		# Fail
           		catch (Exception $e) {
                	return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            	}

            	# Log the user in
            	Auth::login($user);

            	return Redirect::to('/')->with('flash_message', 'Welcome to ArtDB!');
            } else {
            	return Redirect::to('/signup')
            	->withInput()
            	->withErrors($validator);
            }
        }


	public function getLogin() {
	    return View::make('login');
	}
	
	public function postLogin() {
		$credentials = Input::only('username', 'password');
        $rules=array(
            	'username'=>array('exists:users,username'));
            $validator=Validator::make($credentials,$rules);
            if ($validator->passes()){
            	if (Auth::attempt($credentials, $remember = true)) {
                	return Redirect::intended('/')
                	->withInput()
                	->with('flash_message', 'Welcome Back!');
            	}
            	else {
                	return Redirect::to('/login')
                	->withInput()
                	->with('flash_message', 'Password failed; please try again.');
            	}
            }
            else {
               	return Redirect::to('/login')->with('flash_message', 'Username does not exist.');
            }
        }

	/**
	* Logout
	* @return Redirect
	*/
	public function getLogout() {
		# Log out
		Auth::logout();
		# Send them to the homepage
		return Redirect::to('/');
	}



 }