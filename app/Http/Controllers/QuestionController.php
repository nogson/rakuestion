<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{

    public function index(Request $request, Response $response)
    {
        $questions = Question::orderBy('updated_at', 'desc')->paginate(3);
        $max_count = Question::orderBy('updated_at', 'desc')->count();
        // $questions = $questions->latest()->get();

        foreach ($questions as $value) {
            if (isset($value->tags)) {
                $value->tags = explode(',', $value->tags);
            }

            $value->answers = $value->answers;
        }

        return ['data' => ['questions' => $questions, 'max_count' => $max_count]];
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
        $questions = Question::where('question', 'like', '%' . $keyword . '%')
            ->orWhere('tags', 'like', '%' . $keyword . '%')->get();

        foreach ($questions as $value) {
            if (isset($value->tags)) {
                $value->tags = explode(',', $value->tags);
            }

            $value->answers = $value->answers;
        }


        return ['data' => ['questions' => $questions, 'keyword' => $keyword]];
    }

    public function sameTag(Request $request, Response $response)
    {
        $questions = array();

        $tag = $request->input('tag');

        $tags = explode(',', $tag);

        foreach ($tags as $value) {
            $q = Question::where('tags', '=', $value)->get();

            foreach ($q as $qValue) {
                if (isset($qValue->tags)) {
                    $value->tags = explode(',', $value->tags);
                }
                $qValue->answers = $qValue->answers;
            }

            $questions = array_merge($questions, $q->toArray());
        }


        return ['data' => ['questions' => $questions, 'tags' => $tags]];
    }
}
