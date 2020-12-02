@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{ $questionnaire->title }}</h1>

            <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="POST">
                @csrf

                @foreach ($questionnaire->questions as $key => $question)
                    <div class="card mt-3">
                        <div class="card-header">
                            <strong>{{ $key + 1 }} - {{ strtoupper($question->question) }}</strong>
                        </div>
                        
                        <div class="card-body">
                            
                            @error('responses.' . $key . '.answer_id')
                                <small class="text-danger">This field is required.</small>
                            @enderror

                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <label for="answer{{ $answer->id }}">
                                        <li class="list-group-item">
                                            <input class="mr-2" type="radio" 
                                            name="responses[{{ $key }}][answer_id]" 
                                            id="answer{{ $answer->id }}" 
                                            value="{{ $answer->id }}" 
                                            {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : '' }}>
                                            
                                            {{ $answer->answer }}

                                            <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                        </li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
                
                <div class="card mt-4">
                    <div class="card-header"><strong>YOUR INFORMATION</strong></div>
                    <div class="card-body">        
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="survey[name]" id="name" aria-describedby="nameHelp" placeholder="Enter your name">
                            <small id="nameHelp" class="form-text text-muted">Hello! What's your name?</small>
    
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="survey[email]" id="email" aria-describedby="emailHelp" placeholder="Enter your email">
                            <small id="emailHelp" class="form-text text-muted">Can you provide us your email too?</small>
                        
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>  
    
                        <div class="text-center">
                            <button class="btn btn-primary mt-2" type="submit">Complete Survey</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
