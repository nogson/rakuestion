<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnswerController extends Controller
{
    public function index(Request $request, Response $response, $id)
    {
        $answers = Question::find($id)->answers()->latest()->get();

        return ['data' => ['answers' => $answers]];
    }

    public function create(Request $request, Response $response, $id)
    {

        $answer = new Answer();

        $data = [
            'question_id' => $request->question_id,
            'answer' => $request->answer,
            'avatar' => $request->avatar
        ];

        $answer->fill($data)->save();

        $answers = Question::find($id)->answers()->latest()->get();


        return ['data' => ['answers' => $answers]];
    }

    public function like(Request $request, Response $response, $id)
    {
        $answer = Answer::find($id);

        $answer->like_count += 1;

        $answer->update();

        return ['data' => ['answer' => $answer]];

    }
}
