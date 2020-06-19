<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use Illuminate\Support\Facades\Cookie;

class FrontController extends Controller
{
    public function index()
    {
        $user = User::find(Cookie::get('user_id'));

        if (!$user) {
            Cookie::queue(Cookie::forget('user_id'));
            return redirect('/');
        }

        $completed_surveys = $user->surveys()->with(['question' => function ($q) {
            $q->with('options');
        }])->paginate(10);

        $questions = Question::whereNotIn('id', $completed_surveys->pluck('question_id'))->paginate(10);

        return view('welcome', compact('completed_surveys', 'questions'));
    }
}
