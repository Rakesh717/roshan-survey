@extends('layouts.admin')

@section('content')
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Avatar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">1</th>
            <td>{{ $user->name ?? '' }}</td>
            <td>
                @if($user->avatar)
                <a href="{{ asset('storage/' . $user->avatar) }}">
                    <img class="img-thumbnail" src="{{ asset('storage/' . $user->avatar) }}" alt=""
                        style="height: 150px; width: 150px; obect-fit: cover;">
                </a>
                @else
                No image
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
@endsection
