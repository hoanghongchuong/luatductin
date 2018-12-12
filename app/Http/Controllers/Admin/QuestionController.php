<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Question;
use App\Answer;
class QuestionController extends Controller
{
    
    public function index()
    {
    	$data = Question::orderBy('id','desc')->get();
    	return view('admin.question.index', compact('data'));
    }

    public function edit($id)
    {

    	$data = Question::find($id);
       
    	$answers = Answer::where('question_id', $data->id)->get();

    	return view('admin.question.edit', compact('data', 'answers'));
    }

    public function postEdit(Request $req, $id)
    {
    	$admin_id = Auth::guard()->user()->id;
    	$question = Question::find($id);
    	$answer = new Answer;
    	$answer->admin_id = $admin_id;
    	$answer->question_id = $question->id;
    	$answer->content = $req->content;
        $answer->status = 1;
    	// dd($answer);
    	$answer->save();
    	return back()->with('status', 'Trả lời thành công');
    }

    public function delete($id)
    {
    	$data = Question::find($id);
    	$data->delete();
    	return back()->with('status', 'Xóa thành công');
    }

    public function access(Request $req)
    {
        $question = Question::where('id', $req->question_id)->first();
        if($question){
            $question->status = $question->status == 1 ? 0 : 1;
            $question->save();
        }
        return (Int)$question->status;
    }

    public function activeAnswer(Request $req)
    {
        $data = Answer::where('id', $req->anwser_id)->first();
        if($data){
            $data->status = $data->status == 1 ? 0 : 1;
            $data->save();
        }
        return (Int)$data->status;
    }
}
