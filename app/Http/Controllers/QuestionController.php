<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\SSCBoardQuestion;
use App\savedquestionssc as Save;
use App\Comment;
use App\Reply;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;
use DB;
use App\Http\Resources\Post as Question;
use App\Http\Resources\PostCollection;

class QuestionController extends Controller
{
    public function show($question)
    {
        return new Question(Post::find($question));
    }

    public function index()
    {
        return new PostCollection(Post::all());
    }
    
    public function random(){
        return new Question(Post::inRandomOrder()->first());
    }
    
    public function saveQuestion(Request $request){
        $save = new Save;
        $save->studentid = $request->studentid;
        $save->questionid = $request->questionid;
        $save->starred = 0;
        $save->save();
        return response()->json([
            "message" => "question saved"
        ], 201);
    }
}
