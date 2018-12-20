@extends('layouts.app')

@section('content')

    <h1>Car Listing <h6>(6 Records Per Page)</h6></h1>
    <h3>Click on any car for detail record</h3>
    <hr>

    @if (count($questions) > 0)
        @foreach ($questions as $question)
            <div class="well">
                <h3><a href="/{{$question->id}}">id-{{$question->body}}</a></h3>

            </div>
        @endforeach
        {{$questions->links()}}
    @else
        <p>no questions found</p>
    @endif

    <small>written on  {{$question->created_at}}</small>

@endsection
