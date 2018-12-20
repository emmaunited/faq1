@extends('layouts.app')

@section ('content')

    <div class="container">

        <div>
        <div class="row">
            <div class="card">
                <div class="card-header">Question
                </div>
                <div class="card-body">{{$question->body}}
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary float-right"
                       href="{{ route('questions.edit',['id'=> $question->id])}}">
                        Edit Question</a>
                    {{ Form::open(['method'  => 'DELETE', 'route' => ['questions.destroy', $question->id]])}}
                    <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                    </button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header"><a class="btn btn-primary float-left"
                                        href="{{ route('answers.create', ['question_id'=> $question->id])}}">Answer Question</a>
            </div>
            <div class="card-body">Comments:
            </div>
            <div class="comment-form">
                <form action="{{ url('comment') }}" method="POST" class="form">
                    {!! csrf_field() !!}

                    <input type="hidden" name="question_id" value="{{ $question->id }}">

                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                        <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>
                        @if ($errors->has('comment'))
                            <span class="help-block"><strong>{{ $errors->first('comment') }}</strong>
                                                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>


            <a href="/home" class="btn btn-default">Go Back</a>
        </div>
    </div>
    </div>

@endsection
