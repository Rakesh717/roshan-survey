<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Survey;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::with(['user', 'question', 'option'])->paginate(10);
        return view('admin.surveys.index', compact('surveys'));
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();

        return redirect()->back();
    }
}
