<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserActivity;
use Validator,DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home/web';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
	
	protected function authenticated($request, $user)
    {
		//dd($user);
		$results = DB::select('select * from users where id ='.$user->id);
		$count = $results[0]->sign_in_count;
		$ques_count = $results[0]->ques_count;
        $log = new UserActivity;
        $log->user_id = $user->id;
		$log->user_activity_time = date("h:i:sa");
		$log->sign_in_count = $count+1;
		$log->current_sign_in_at = date("Y-m-d");
		$log->last_sign_in_at = date("Y-m-d");
		$log->current_sign_in_ip = $request->ip();
		$log->last_sign_in_ip =  $request->ip();
		$log->created_by = '1';$log->updated_by = '1';
        $log->save();
		
	     $orgs = User::find($user->id);
		 $orgs->sign_in_count = $count+1;
   	     $orgs->login = 1;
       	 $orgs->save();
		 
				 
		if($ques_count!=5)
		{   

            $token = JWTAuth::fromUser($orgs);
            dd($token);
			return redirect()->intended('http://52.32.253.191/cmsadmin/question/create');
			//return redirect()->intended('http://admin.attili.com/question/create');
		}else{
             
		  return redirect()->intended('/');
		}
		
       // return redirect()->intended('/home/web');
		
    }
	public function getLogout()
    {
        $this->auth->logout();
        return redirect('auth/login');
    }
	
}
