@extends('layouts.admin')

@section('content')
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Question</th>
            <th scope="col">Answer</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($surveys as $survey)
        <tr>
            <th scope="row">1</th>
            <td>{{ $survey->user->name }}</td>
            <td>{{ $survey->question->text }}</td>
            <td>{{ $survey->option->text }}</td>
            <td>
                <div>
                    <form action="{{ route('admin.surveys.destroy', $survey->id) }}" method="POST"
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
@endsection
