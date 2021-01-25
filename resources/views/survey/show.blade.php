@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $questionnaire->title }}</h1>

            <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="post">
                @csrf

                @foreach ($questionnaire->questions as $key => $question)
                    <div class="card my-2">
                        <div class="card-header">
                            <strong>{{ $key + 1 }}.</strong>
                            {{ $question->question }}
                        </div>
                            <div class="card-body">
                                @error('responses.'. $key .'.answer_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            <ul class="list-group">
                        @foreach ($question->answers as $answer)
                                <li class="list-group-item p-0">
                                    <label for="answer{{ $answer->id }}" class=" d-block p-3 m-0">
                                    <input type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}" class="mr-2" value="{{ $answer->id }}" {{ (old('responses.'. $key .'.answer_id') == $answer->id) ? 'checked' : ''}}>
                                        {{ $answer->answer }}
                                        <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                    </label>
                                </li>
                        @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach

            <div class="card">
                <div class="card-header">{{ __('Your Information') }}</div>

                <div class="card-body">
                    @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="survey[name]" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name" value="{{ old('survey.name') }}">
                            <small id="nameHelp" class="form-text text-muted">Hello, What is your name</small>

                            @error('survey.name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                      </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="survey[email]" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('survey.email') }}">
                            <small id="emailHelp" class="form-text text-muted">Your email purpose.</small>

                            @error('survey.email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                      </div>

                      <button class="btn btn-dark" type="submit">Complete Survey</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
