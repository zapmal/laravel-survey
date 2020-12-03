<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function __construct() 
    {
        $this->middleware("auth");
    }

    public function create() 
    {
        return view("questionnaire.create");
    }

    public function store() 
    {
        $data = request()->validate([
            "title" => "required|max:30",
            "purpose" => "required"
        ]);

        $questionnaire = auth()->user()->questionnaires()->create($data);

        return redirect("/questionnaires/" . $questionnaire->id);
    }

    public function show(Questionnaire $questionnaire)
    {
        // eager load to avoid n+1
        $questionnaire->load("questions.answers.responses");

        return view("questionnaire.show", compact("questionnaire"));
    }
}
