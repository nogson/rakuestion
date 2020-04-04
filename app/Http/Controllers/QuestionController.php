<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{

    private $limit = 20;

    public function index(Request $request, Response $response)
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');

        $questions = Question::orderBy('updated_at', 'desc')->offset($offset)->limit($limit)->get();
        $max_count = Question::orderBy('updated_at', 'desc')->count();

        foreach ($questions as $value) {
            if (isset($value->tags)) {
                $value->tags = explode(',', $value->tags);
            }

            $value->answers = $value->answers;
        }

        return ['data' => ['questions' => $questions, 'max_count' => $max_count, 'req' => $request]];
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
            'tags' => isset($request->tags) ? implode(',', $request->tags) : null,
            'avatar' => $request->avatar
        ];

        $question->fill($data)->save();

        return $response;
    }

    public function search(Request $request, Response $response)
    {
        $keyword = $request->input('keyword');
        $offset = $request->input('offset');
        $limit = $request->input('limit');

        $questions = Question::where('question', 'like', '%' . $keyword . '%')
            ->orWhere('tags', 'like', '%' . $keyword . '%')->offset($offset)->limit($limit)->get();
        $max_count = Question::orderBy('updated_at', 'desc')->count();

        foreach ($questions as $value) {
            if (isset($value->tags)) {
                $value->tags = explode(',', $value->tags);
            }

            $value->answers = $value->answers;
        }


        return ['data' => ['questions' => $questions, 'max_count' => $max_count, 'keyword' => $keyword]];
    }

    public function sameTag(Request $request, Response $response)
    {
        $questions = array();

        $tag = $request->input('tag');

        $tags = explode(',', $tag);

        foreach ($tags as $value) {
            $q = Question::where('tags', '=', $value)->paginate($this->limit);

            foreach ($q as $qValue) {
                if (isset($qValue->tags)) {
                    $qValue->tags = explode(',', $qValue->tags);
                }
                $qValue->answers = isset($qValue->answers) ? $qValue->answers : [];
            }

            $questions = array_merge($questions, $q->toArray());
        }


        return ['data' => ['questions' => $questions, 'tags' => $tags]];
    }
}
