<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Password;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth,DB,Validator;
use App\Models\User;
use App\Models\UserQuestions;
class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
  
	 public function __construct(Guard $auth, PasswordBroker $passwords)
    {
        $this->auth = $auth;
        $this->passwords = $passwords;
        $this->subject = 'Your Password Reset Link'; //  < --JUST ADD THIS LINE
        $this->middleware('guest');
    }
	
	
	public function forgot()
	{
		$questions = \DB::table('security_question')->lists('question_desc','question_id');
		  return view('auth.passwords.email')->with('questions',$questions);
	}

	public function forgotreset(Request $request, $token = null)
	{
		$rules = array(
		'email'             => 'required|email', 
        'question_id1'             => 'required',            
        'user_answer1'         => 'required',  
		 'question_id2'             => 'required',            
        'user_answer2'         => 'required', 
		 'question_id3'             => 'required',            
        'user_answer3'         => 'required'  
		     
    );
 $v = Validator::make($request->all(), $rules);
 	
    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }else{
	
	$email = $request->input('email');
	$question_id1 = $request->input('question_id1');
	$question_id2 = $request->input('question_id2');
	$question_id3 = $request->input('question_id3');
	$user_answer1 = $request->input('user_answer1');
	$user_answer2 = $request->input('user_answer2');
	$user_answer3 = $request->input('user_answer3');
	$users = User::where('email',$email)->first();
	
				
	if($users)
	{
		 //dd($users->id);
		 $user_id = $users->id;
		 $Qcount = UserQuestions::where('user_id', '=', $user_id)->count();
		 if($Qcount==0)
		 {
			 return redirect()->back()->withErrors(['question' => 'You Didnt set any Questions,Contact Administrator'])->withInput($request->input());
		 }
		 
		 
		 $test1 = UserQuestions::where('question_id', '=', $question_id1)->where('user_answer', '=', $user_answer1)->first();
		 //dd($test1);
		 if(empty($test1))
		 {
			
			return redirect()->back()->withErrors(['question' => 'Answer1 incorrect'])->withInput($request->input());
		 }
		 
		  $test2 = UserQuestions::where('question_id', '=', $question_id2)->where('user_answer', '=', $user_answer2)->first();
		
		 if(empty($test2))
		 {
		
			return redirect()->back()->withErrors(['question' => 'Answer2 incorrect'])->withInput($request->input());
		 }
		   $test3 = UserQuestions::where('question_id', '=', $question_id3)->where('user_answer', '=', $user_answer3)->first();
		 if(empty($test3))
		 {
			 
			return redirect()->back()->withErrors(['question' => 'Answer3 incorrect'])->withInput($request->input());
		 }
		$response = $this->sendResetLinkEmail($request);
		 if($response)
		 {
			 return redirect()->back()->withErrors(['sucessmessage' => 'We have e-mailed your password reset link!']);
		 }else{
		  return redirect()->back()->withErrors(['question' => 'Facing problem in sending mail!']);
		 }
		  
		
	}else{
		return redirect()->back()->withErrors(['email' => 'Email Not Registed with us'])->withInput($request->input());
	}
	}
	
	}
	
	
	
	
	public function showResetForm(Request $request, $token = null)
{
	
	$rules = array(
        'question_id1'             => 'required',            
        'user_answer1'         => 'required',  
		 'question_id2'             => 'required',            
        'user_answer2'         => 'required', 
		 'question_id3'             => 'required',            
        'user_answer3'         => 'required',
		'email'         => 'required|unique:posts'
		     
    );
 $v = Validator::make($request->all(), $rules);

    if ($v->fails())
    {
       
    }

  
}
}
