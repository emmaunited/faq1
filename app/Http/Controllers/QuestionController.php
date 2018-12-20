<?php
/**
 * Created by PhpStorm.
 * User: emmanuel
 * Date: 12/20/18
 * Time: 4:40 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Answer;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question;
        $edit = FALSE;
        return view('editquestion', ['question' => $question,'edit' => $edit  ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'body' => 'required',
        ],
            [
                'body.required' => 'Body is required',
            ]);
        $input = request()->all();
        $question = new Question($input);
        $question->user()->associate(Auth::user());
        $question->save();
        return redirect()->route('home')->with('success','Question Record Created');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('question')->with ('question',$question);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $edit = TRUE;
        return view('editquestion', ['question' => $question, 'edit' => $edit ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $input = $request->validate([
            'body' => 'required',
        ], [
            'body.required' => 'Body is required',
        ]);
        $question->body = $request->body;
        $question->save();
        return redirect()->route('questions.show',['question_id' => $question->id])->with('message', 'Saved');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('home')->with('message', 'Deleted');
    }
    public function showComment($question_id)
    {
        $question = Question::where('question_id', $question_id)->firstOrFail();
        $comments = $question->comments;
        return view('questions.show', compact('question', 'comments'));
    }
}