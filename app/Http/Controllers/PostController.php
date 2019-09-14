<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\SSCBoardQuestion;
use App\Comment;
use App\Reply;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Http\Resources\Post as PostResource;
use App\Http\Resources\SSCBoardQuestion as SSCResource;

class PostController extends Controller
{
    public function postQuestion(Request $request){
        //$correctAnswer = "";
        $question = $request->question;
        $optionOne = $request->optionOne;
        $optionTwo = $request->optionTwo;
        $optionThree = $request->optionThree;
        $optionFour = $request->optionFour;
        $answer = $request->correctAnswer;
    
        if($answer == 1){
            $correctAnswer = $optionOne;
        }elseif ($answer == 2){
            $correctAnswer = $optionTwo;
        }elseif ($answer == 3){
            $correctAnswer = $optionThree;
        }elseif($answer == 4){
            $correctAnswer = $optionFour;
        }

        $newQuestion = new Post;
        $newQuestion->question = $question;
        $newQuestion->optionOne = $optionOne;
        $newQuestion->optionTwo = $optionTwo;
        $newQuestion->optionThree = $optionThree;
        $newQuestion->optionFour = $optionFour;
        $newQuestion->answer = $correctAnswer;
        $newQuestion->chapterid = 2;
  
        $newQuestion->save();
        return view('pages.addAQuestion');
    }

    public function postSSCQuestion(Request $request){
        $correctAnswer = "";
        $question = $request->question;
        $optionOne = $request->optionOne;
        $optionTwo = $request->optionTwo;
        $optionThree = $request->optionThree;
        $optionFour = $request->optionFour;
        $answer = $request->correctAnswer;
        $subject = $request->subject;
        $board = $request->board;
        $year =  $request->year;
    
        if($answer == 1){
            $correctAnswer = $optionOne;
        }elseif ($answer == 2){
            $correctAnswer = $optionTwo;
        }elseif ($answer == 3){
            $correctAnswer = $optionThree;
        }elseif($answer == 4){
            $correctAnswer = $optionFour;
        }

        $newQuestion = new SSCBoardQuestion;
        $newQuestion->question = $question;
        $newQuestion->optionOne = $optionOne;
        $newQuestion->optionTwo = $optionTwo;
        $newQuestion->optionThree = $optionThree;
        $newQuestion->optionFour = $optionFour;
        $newQuestion->answer = $correctAnswer;
        $newQuestion->subjectCode = $subject;
        $newQuestion->boardCode = $board;
        $newQuestion->year = $year;
  
        $newQuestion->save();
        return view('pages.addSSCBoardQuestion');
    }
    public function getQuestionsApi(){
        return PostResource::collection(Post::all());
    }

    public function getSSCQuestionApi( $subject, $board, $year){
        return SSCResource::collection(SSCBoardQuestion::where('boardCode', $board)
                                                        ->where('subjectCode', $subject)
                                                        ->where('year',$year)
                                                        ->get());
    }

    public function getpost($question){
        $post = Post::find($question);
        return new PostResource(Post::find($question));
    }

    public function getTenQuestions($number){
        return PostResource::collection(Post::inRandomOrder()->take($number)->get());
    }

}
