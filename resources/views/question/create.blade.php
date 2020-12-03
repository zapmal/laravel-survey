@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Question</div>

                <div class="card-body">
                    <form action="{{ $questionnaire->path() }}/questions" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="question" style="font-size: 1.2rem; margin:0;">Question</label>
                            <small id="questionHelp" class="form-text text-muted">Ask simple and to the point questions for the best results.</small>
                            <input type="text" class="form-control" name="question[question]" id="question" aria-describedby="questionHelp" placeholder="Enter question" value="{{ old("question.question") }}">

                            @error('question.question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <fieldset>
                                <legend style="font-size: 1.2rem; margin: 0;">Choices</legend>
                                <small id="choicesHelp" style="margin-bottom: 5px" class="form-text text-muted">Give choices that give you the most insight into your question.</small>

                                {{-- Should be done dynamically with JS --}}
                                <div>
                                    <div class="form-group">
                                        <label for="answer1">Choice 1</label>
                                        <input type="text" class="form-control" name="answers[][answer]" id="answer1" aria-describedby="choicesHelp" placeholder="Enter Choice 1" value="{{ old("answers.0.answer") }}">
            
                                        @error('answers.0.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer2">Choice 2</label>
                                        <input type="text" class="form-control" name="answers[][answer]" id="answer2" aria-describedby="choicesHelp" placeholder="Enter Choice 2" value="{{ old("answers.1.answer") }}">
            
                                        @error('answers.1.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer3">Choice 3</label>
                                        <input type="text" class="form-control" name="answers[][answer]" id="answer3" aria-describedby="choicesHelp" placeholder="Enter Choice 3" value="{{ old("answers.2.answer") }}">
            
                                        @error('answers.2.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer4">Choice 4</label>
                                        <input type="text" class="form-control" name="answers[][answer]" id="answer4" aria-describedby="choicesHelp" placeholder="Enter Choice 4" value="{{ old("answers.3.answer") }}">
            
                                        @error('answers.3.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
