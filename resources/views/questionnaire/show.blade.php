@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>{{ strtoupper($questionnaire->title) }}</strong>

                    <small class="form-text text-muted">{{ $questionnaire->purpose }}</small>
                </div>
                
                <div class="card-body">
                    <a href="/questionnaires/{{ $questionnaire->id }}/questions/create" class="btn btn-primary">Add questions</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
