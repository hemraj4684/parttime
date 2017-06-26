<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserQuestions;
use Hash;
use Auth,DB;
//Validator;

use App\Http\Requests;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
	
    }
	
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = \DB::table('security_question')->lists('question_desc','question_id');
		 
        return view('auth.question')->with('questions',$questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
		
		$rules = array(
        'question_id1'             => 'required',            
        'user_answer1'         => 'required',  
		 'question_id2'             => 'required',            
        'user_answer2'         => 'required', 
		 'question_id3'             => 'required',            
        'user_answer3'         => 'required', 
		 'question_id4'             => 'required',            
        'user_answer4'         => 'required',
		 'question_id5'             => 'required',            
        'user_answer5'         => 'required'    
		
		     
    );
 $v = Validator::make($request->all(), $rules);
 	
    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }
		 $user = Auth::id();
            $q1 = new UserQuestions;		
			$q1->user_id = $user;
            $q1->question_id = $request->input('question_id1');
			$q1->user_answer = $request->input('user_answer1');
			$q1->created_by = $request->input('created_by');
            $q1->updated_by = $request->input('updated_by');
            $res = $q1->save();
			
			  $q2 = new UserQuestions;		
			$q2->user_id = $user;
            $q2->question_id = $request->input('question_id2');
			$q2->user_answer = $request->input('user_answer2');
			$q2->created_by = $request->input('created_by');
            $q2->updated_by = $request->input('updated_by');
            $res = $q2->save();
			
			  $q3 = new UserQuestions;		
			$q3->user_id = $user;
            $q3->question_id = $request->input('question_id3');
			$q3->user_answer = $request->input('user_answer3');
			$q3->created_by = $request->input('created_by');
            $q3->updated_by = $request->input('updated_by');
            $res = $q3->save();
			
			  $q4 = new UserQuestions;		
			$q4->user_id = $user;
            $q4->question_id = $request->input('question_id4');
			$q4->user_answer = $request->input('user_answer4');
			$q4->created_by = $request->input('created_by');
            $q4->updated_by = $request->input('updated_by');
            $res = $q4->save();
			
			  $q5 = new UserQuestions;		
			$q5->user_id = $user;
            $q5->question_id = $request->input('question_id5');
			$q5->user_answer = $request->input('user_answer5');
			$q5->created_by = $request->input('created_by');
            $q5->updated_by = $request->input('updated_by');
            $res = $q5->save();
			
			$a4 = User::where('id', '=', $user)->update(['ques_count' => 5]);
			$request->session()->flash('alert-success', 'Questions successfully Added!');
			return redirect()->intended('/');
			
		

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
         //$questions = \DB::table('security_question')->lists('question_desc','question_id');
		 //$questions = UserQuestions::all();
		 $questions = DB::table('security_question')
		->select('security_question.*') 
		->get();
			
				  $userand = DB::table('user_opt_security_question')
		->select('user_opt_security_question.*')
		->where('user_opt_security_question.user_id','=',$id) 
		->get();
//echo '<pre>';print_r($userand);exit;
		   $url = env('API_URL')."users/edit/$id";
			 $result = $this->httpGet($url);
			 $results = json_decode($result,false);
		$user = $results->users[0];

        return view('users.question')->with('questions',$questions)->with('user',$user)->with('exuser',$userand);
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
       
		
		$rules = array(
        'question_id1'             => 'required',            
        'user_answer1'         => 'required',  
		 'question_id2'             => 'required',            
        'user_answer2'         => 'required', 
		 'question_id3'             => 'required',            
        'user_answer3'         => 'required', 
		 'question_id4'             => 'required',            
        'user_answer4'         => 'required',
		 'question_id5'             => 'required',            
        'user_answer5'         => 'required'    
		
		     
    );
 $v = Validator::make($request->all(), $rules);
 	
    if ($v->fails())
    {
        return redirect()->back()->withErrors($v->errors())->withInput($request->input());
    }
		 $user = Auth::id();
		 $oldq1 = $request->input('oldq1');
		 $oldq2 = $request->input('oldq2');
		 $oldq3 = $request->input('oldq3');
		 $oldq4 = $request->input('oldq4');
		 $oldq5 = $request->input('oldq5');
		 
            $q1 = UserQuestions::find($oldq1);		
			$q1->user_id = $user;
            $q1->question_id = $request->input('question_id1');
			$q1->user_answer = $request->input('user_answer1');
			 $q1->updated_by = $request->input('updated_by');
            $res = $q1->save();
			
			$q2 = UserQuestions::find($oldq2);		
			$q2->user_id = $user;
            $q2->question_id = $request->input('question_id2');
			$q2->user_answer = $request->input('user_answer2');
			 $q2->updated_by = $request->input('updated_by');
            $res = $q2->save();
			
			  $q3 = UserQuestions::find($oldq3);		
			$q3->user_id = $user;
            $q3->question_id = $request->input('question_id3');
			$q3->user_answer = $request->input('user_answer3');
			$q3->created_by = $request->input('created_by');
            $q3->updated_by = $request->input('updated_by');
            $res = $q3->save();
			
			  $q4 = UserQuestions::find($oldq4);		
			$q4->user_id = $user;
            $q4->question_id = $request->input('question_id4');
			$q4->user_answer = $request->input('user_answer4');
			$q4->updated_by = $request->input('updated_by');
            $res = $q4->save();
			
			  $q5 = UserQuestions::find($oldq5);	
			$q5->user_id = $user;
            $q5->question_id = $request->input('question_id5');
			$q5->user_answer = $request->input('user_answer5');
			 $q5->updated_by = $request->input('updated_by');
            $res = $q5->save();
			
			$request->session()->flash('alert-success', 'Questions successfully Updated!');
			
			
		return redirect('users/'.$user.'/profile');

    
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
