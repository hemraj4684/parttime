<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use DB;

use App\Http\Requests;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		$id = Auth::user()->id; 
                $url = env('API_URL')."users/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
		$user = $results->users[0];		
 $user->created_at  = date( 'F j, Y, g:i a', strtotime( $user->created_at ) );			
 $user->updated_at  = date( 'F j, Y, g:i a',strtotime( $user->updated_at ) );

            return view('users.profile')->with('user',$user);
    }
	
	/**
	
	forgot passwod
	*/
public function getForgotPassword() {
		return view('account.forgot');
	}
	
	public function postForgotPassword() {
		$validator = Validator::make(Input::all(),
			array(
				'email' => 'required|email'
			)
		);

		if($validator->fails()) {
			return Redirect::route('account-forgot-password')
				->withErrors($validator)
				->withInput();
		} else {
		}

		/* fall back */
		return Redirect::route('account-forgot-password')
			->with('global', 'Could not request new password.');
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
