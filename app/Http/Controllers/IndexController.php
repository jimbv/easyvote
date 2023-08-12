<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Question;
use App\Models\Result;
use App\Models\Vote;
use Validator;

class IndexController extends Controller
{
    public function index()
    {   
        return view('create');
    }

    private function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 6; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function create(Request $request)
    {    

        $request->validate([
            'description'=> 'required', 
        ]);
        
        
        $quest = new Question;


        $quest->description = $description = $request->description;	 
        $quest->code = $code = $this->randomPassword();	 
        $quest->status = 1;	 
  
        $quest->save();
        
        $electors = $request->electors;
        for($i=1;$i<=$electors;$i++){
            $vote = new Vote;
            $vote->link_code = $this->randomPassword();
            $vote->status = 1;
            $vote->question_id = $quest->id;
            $vote->save();

        } 
        $votes = Vote::where('question_id',$quest->id)->get();

        return view('results',compact('description','code'))->with('votes', $votes);
    }

    public function vote(Request $respuesta)
    { 
        $link_code = $respuesta->link_code;
        $vote = Vote::where('link_code',$link_code)->firstOrFail(); 
        $question = Question::where('id',$vote->question)->firstOrFail(); 
        return view('vote',compact('vote'));
    }
    public function view(Request $respuesta)
    { /*
        $validator = respuesta()->validate([ 
            'g-recaptcha-response' => 'recaptcha',
        ]); */

        $validator = Validator::make($respuesta->all(), [
            'credit_card_number' => 'required_if:payment_type,cc'
        ]);

        if($validator->fails()) { 
            $error = $validator->errors();
            return view('error',compact('error'));
        }
        

        $code = $respuesta->code;
        $question = Question::where('code',$code)->first();
         
        if ($question == null){
            $error = "Question not found";
            return view('error',compact('error'));
        }else{
            $description = $question->description;
            $votes = Vote::where('question_id',$question->id)->get();  
            return view('results',compact('description','code'))->with('votes', $votes);
        }
    }

    public function question(Request $respuesta)
    {  
        
        $code = $respuesta->code;
        $question = Question::where('code',$code)->firstOrFail();  
        return view('question',compact('question'));
    }

    
}
