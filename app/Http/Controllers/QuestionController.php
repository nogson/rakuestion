<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{

    public function index(Request $request, Response $response)
    {
        $questions = Question::orderBy('updated_at', 'desc')->get();
       // $questions = $questions->latest()->get();

        foreach ($questions as $value) {
            if (isset($value->tags)) {
                $value->tags = explode(',', $value->tags);
            }

            $value->answers = $value->answers;
        }

        return ['data' => ['questions' => $questions]];
    }

    public function show(Request $request, Response $response, $id)
    {
        $question = Question::find($id);

        if (isset($question->tags)) {
            $question->tags = explode(',', $question->tags);
        }

        return ['data' => ['question' => $question]];
    }

    public function create(Request $request, Response $response)
    {

        $question = new Question();

        $data = [
            'question' => $request->question,
            'tags' => isset($value->tags) ? implode(',', $request->tags) : null,
            'avatar' => $request->avatar
        ];

        $question->fill($data)->save();

        return $response;
    }

    public function search(Request $request, Response $response)
    {
        $keyword = $request->input('keyword');
        $questions = Question::where('question','like','%'.$keyword.'%')
            ->orWhere('tags', 'like','%'.$keyword.'%')->get();

        foreach ($questions as $value) {
            if (isset($value->tags)) {
                $value->tags = explode(',', $value->tags);
            }

            $value->answers = $value->answers;
        }


       return ['data' =>['questions' =>$questions]];
    }
}
