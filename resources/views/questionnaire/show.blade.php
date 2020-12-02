@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">
                    <strong>QUESTIONNAIRE#: {{ $questionnaire->id }} - {{ strtoupper($questionnaire->title) }}</strong>

                    <small class="form-text text-muted">{{ $questionnaire->purpose }}</small>
                </div>
                
                <div class="card-body">
                    <a href="/questionnaires/{{ $questionnaire->id }}/questions/create" class="btn btn-primary">Add questions</a>
                    <a href="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" class="btn btn-primary">Take Survey</a>
                </div>
            </div>

            @foreach($questionnaire->questions as $question)
                <div class="card mt-3">
                    <div class="card-header">
                        <strong>{{ strtoupper($question->question) }}</strong>
                    </div>
                    
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($question->answers as $answer)
                                 <li class="list-group-item">{{ $answer->answer }}</li>
                            @endforeach
                         </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
