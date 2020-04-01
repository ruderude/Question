<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Question_detail;
use App\Question_replie;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function users(int $id)
    {
        return view('users');
    }

    public function question(Request $request)
    {
        // $user = Auth::user();
        $user_id = Auth::id();

        try {
            DB::beginTransaction();

            // TODO
            $question = Question::make();
            $question->title = $request->questionTitle;
            $question->created_id = $user_id;
            $question->save();

            $questionId = $question->id;

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        // dd($questionId);

        try {
            DB::beginTransaction();

            // TODO
            $details = Question_detail::make();
            $details->question_id = $questionId;
            $details->question = $request->questionName;
            $details->type = $request->type;
            $details->option = $request->questionOption;
            $details->created_id = $user_id;
            $details->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect('/');
    }

    public function show(int $id)
    {
        $user_id = Auth::id();
        // $question = Question_detail::where('question_id', $id)->get();
        $result = Question_replie::where('question_id', $id)->where('answered_id', $user_id)->first();
        // dd($result);
        if ($result) {
            $question = Question::find($id);
            $results = Question_detail::with('question_replie')->where('question_id', $id)->get();
            $data = [
                'question' => $question,
                'results' => $results,
            ];
            return view('result', $data);
        }

        $question = Question::find($id);
        $details = Question_detail::where('question_id', $id)->get();
        $data = [
            'question' => $question,
            'details' => $details,
        ];
        return view('show', $data);

    }

    public function answer(Request $request)
    {
        // dd($request);
        if (is_array($request->answer0)) {
            $answer = implode("、", $request->answer0);
        } else {
            $answer = $request->answer0;
        }
        // dd($answer);

        try {
            DB::beginTransaction();

            // TODO
            $replies = Question_replie::make();
            $replies->question_id = $request->question_id;
            $replies->question_detail_id = $request->detail_id;
            $replies->answer = $answer;
            $replies->answered_id = Auth::id();
            $replies->created_id = $request->created_id;
            $replies->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect('/');

    }
}
