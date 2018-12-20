@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Questions</div>
                    <a class="btn btn-primary float-right" href="{{ route('questions.create') }}">
                        Create a Question
                    </a>

                    <div class="card-body">

                        <div class="card-dack">
                            @foreach($questions as $question)
                                <div class="col-lg-12 d-flex align-items-stretch">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <small class="text-muted">
                                                Updated: {{ $question->created_at->diffForHumans() }}
                                                Answers: {{ $question->answer()->count() }}
                                                Comments: {{ $question->comments()->count() }}
                                            </small>
                                        </div>
                                        <div class="card-body">
                                            <p class="'card-text">{{$question->body}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <p class="card-text">

                                                <a class="btn btn-primary float-right" href="{{ route('questions.show', ['id' => $question->id]) }}">
                                                    View
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            {{$questions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section ('js')
    <script src="{{ asset('vendor\unisharp\laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'artical-ckeditor' );
    </script>

@append