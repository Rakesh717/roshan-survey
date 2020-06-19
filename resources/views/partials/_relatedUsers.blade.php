<div class="mt-3 alert alert-info">
    @if($users->count() > 0)
    People who answered same:
    <ul>
        @foreach ($users as $user)
        <li>{{ $user->name }}
            @if($user->avatar)
            <a href="{{ asset('storage/'. $user->avatar) }}">
                <img src="{{ asset('storage/'. $user->avatar) }}" class="mr-1 rounded-circle" alt="">
            </a>
            @endif
        </li>
        @endforeach
    </ul>
    @else
    You are the first to select this option 👌
    @endif
</div>
