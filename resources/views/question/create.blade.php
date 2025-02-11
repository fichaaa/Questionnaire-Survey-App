@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Question') }}</div>

                <div class="card-body">
                    <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="question">question</label>
                            <input type="text" name="question[question]" class="form-control" id="question" aria-describedby="questionHelp" placeholder="Enter Question" value="{{ old('question.question') }}">
                            <small id="questionHelp" class="form-text text-muted">Ask simple and to the point question for best results.</small>

                            @error('question.question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                      </div>

                      <div class="form-group">
                          <fieldset>
                              <legend>Choices</legend>
                              <small id="choicesHelp" class="form-text text-muted">Give choices that give you the most insights into your question.</small>

                              <div>
                                    <div class="form-group">
                                        <label for="answer1">Choice 1</label>
                                        <input type="text" name="answers[][answer]" class="form-control" id="answer1" aria-describedby="choiceHelp" placeholder="Enter choice 1" value="{{ old('answers.0.answer') }}">
            
                                        @error('answers.0.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer2">Choice 1</label>
                                        <input type="text" name="answers[][answer]" class="form-control" id="answer2" aria-describedby="choiceHelp" placeholder="Enter choice 2" value="{{ old('answers.1.answer') }}">
            
                                        @error('answers.1.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer3">Choice 3</label>
                                        <input type="text" name="answers[][answer]" class="form-control" id="answer3" aria-describedby="choiceHelp" placeholder="Enter choice 3" value="{{ old('answers.2.answer') }}">
            
                                        @error('answers.2.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer4">Choice 4</label>
                                        <input type="text" name="answers[][answer]" class="form-control" id="answer4" aria-describedby="choiceHelp" placeholder="Enter choice 4" value="{{ old('answers.3.answer') }}">
            
                                        @error('answers.3.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                        </fieldset>
                      </div>

                      <button type="submit" class="btn btn-primary">Add Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
