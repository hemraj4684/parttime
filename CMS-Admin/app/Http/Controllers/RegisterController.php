<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use DB;


class RegisterController extends Controller {

    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            return redirect('/');
        }
		$user = User::where('confirmation_code', $confirmation_code)->first();
		//dd($user);
		        if ( ! $user)
        {
            return redirect('/login');
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

      
		\Session::flash('alert-danger','You have successfully verified your account.');

        return redirect('/login');
    }
}