@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

            </div><a href="{{ route('questions.show', ['id' => $question->id]) }}">Go Back</a>
        </div>

@endsection