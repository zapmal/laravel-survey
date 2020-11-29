@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Questionnaire: "{{ $questionnaire->title }}"</div>

                <div class="card-body">
                    <p>Purpose: "{{ $questionnaire->purpose }}"</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
