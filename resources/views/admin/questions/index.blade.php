@extends('layouts.admin')

@section('content')
<a class="btn btn-primary mb-3" href="{{ route('admin.questions.create') }}">Add Question</a>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Question</th>
            <th scope="col">Options</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($questions as $question)
        <tr>
            <th scope="row">1</th>
            <td>{{ $question->text }}</td>
            <td>
                <ol>
                    @foreach ($question->options as $option)
                    <li>{{ $option->text }}</li>
                    @endforeach
                </ol>
            </td>
            <td>
                <div>
                    <a href="{{ route('admin.questions.edit', $question->id) }}" class="badge badge-primary">edit</a>
                    <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST"
                        style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="badge badge-danger">delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $questions->links() }}
@endsection
