@extends('layouts.admin')

@section('content')
@if(isset($question))
<form method="POST" action="{{ route('admin.questions.update', $question->id) }}"
    onkeydown="return event.key != 'Enter';">
    @method('PUT')
    @else
    <form method="POST" action="{{ route('admin.questions.store') }}" onkeydown="return event.key != 'Enter';">
        @endif
        @csrf
        <div class="form-group">
            <label for="question">Question</label>
            <textarea name="text" class="form-control" id="question"
                rows="3">{{ $question->text ?? old('text') }}</textarea>
        </div>
        <div class="form-group">
            <label for="option-input">Options</label>
            <div class="d-flex">
                <input class="form-control" id="option-input" keyup="return appendOptions()">
                <a class="btn btn-primary text-white" onclick="return appendOptions()">Add</a>
            </div>
            <div id="options-list">
                @foreach ($question->options ?? [] as $option)
                <div class="m-2">
                    <input name=options[] id="option-input" value="{{ $option->text }}">
                    <a class="btn btn-sm btn-danger text-white" onclick="return deleteOption(this)">Delete</a>
                </div>
                @endforeach
            </div>
        </div>
        <button class="mt-3 btn btn-success">{{ isset($question) ? 'update' : 'create' }}</button>
    </form>
    @endsection


    @section('scripts')
    <script>
        const optionInput = document.querySelector('#option-input');
    const optionsList = document.querySelector('#options-list');

   function appendOptions(){
        addOption(optionInput.value);
        optionInput.value = '';
        return false;
   }

    function deleteOption(el){
        el.closest('div').remove();
        return false;
    }

    function addOption(text){
        let html = composeOption(text);
        optionsList.insertAdjacentHTML('beforeend', html);
    }

    function composeOption(text){
        return `<div class="m-2">
                    <input name=options[] id="option-input" value="${text}">
                    <a class="btn btn-sm btn-danger text-white" onclick="return deleteOption(this)">Delete</a>
                </div>`;
    }
    </script>
    @endsection
