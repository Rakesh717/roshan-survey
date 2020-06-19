<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function store(Request $request)
    {
        $user_id = Cookie::get('user_id');

        if (Survey::where('question_id', $request->question_id)->where('user_id', $user_id)->exists()) {
            return response()->json(['success' => false, 'message' => 'You have already answered']);
        }

        $request->validate([
            'question_id' => ['required', 'exists:questions,id'],
            'option_id' => ['required', 'exists:options,id'],
        ]);

        Survey::insert([
            'question_id' => $request->question_id,
            'option_id' => $request->option_id,
            'user_id' => $user_id
        ]);

        $users = $this->relatedUsers($request->question_id, $request->option_id, $user_id);

        return response()->json(['success' => true, 'html' => view('partials._relatedUsers', compact('users'))->render()]);
    }

    public function getRelatedUsersHtml(Request $request)
    {
        $users = $this->relatedUsers($request->question_id, $request->option_id, Cookie::get('user_id'));
        return response()->json(['success' => true, 'html' => view('partials._relatedUsers', compact('users'))->render()]);
    }

    public function relatedUsers($question_id, $option_id, $user_id)
    {
        return DB::table('surveys')
            ->where('question_id', $question_id)
            ->where('option_id', $option_id)
            ->where('user_id', '!=', $user_id)
            ->join('users', 'users.id', '=', 'surveys.user_id')
            ->select('users.*')
            ->get();
    }
}
