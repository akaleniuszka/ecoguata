@if (auth()->id() === $user->id)
    <div class="text-center">
        <div class="rounded-circle img-thumbnail mx-auto mt-2" style="background-image: url(/upload/avatars/{{ $user->avatar }}); background-size:cover; background-repeat:no-repeat; background-position:center; width:200px; height:200px;border-width: 5px;">
        </div>
        <div class="text-white">
            {{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}
            <p class="lead"><small>{{ '@'.$user->name }}</small></p>
        </div>
        <a href="{{ route('users.edit', $user) }}" class="mx-auto text-white">
            <small><i class="fas fa-user-edit"></i> {{ __('Edit profile') }}</small>
        </a>
    </div>
@else
    <div class="text-center">
        <div class="rounded-circle img-thumbnail mx-auto mt-2" style="background-image: url(/upload/avatars/{{ $user->avatar }}); background-size:cover; background-repeat:no-repeat; background-position:center; width:200px; height:200px;border-width: 5px;">
        </div>
        @if (\Route::current()->getName() == 'users.show')
            <div class="text-white">
                {{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}
                <p class="lead"><small>{{ '@'.$user->name }}</small></p>
            </div>
        @else
            <div>
                {{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}
                <p class="lead"><small><a href="{{ route('users.show', $user) }}">{{ '@'.$user->name }}</a></small></p>
            </div>
        @endif
    </div>
    @if (\Route::current()->getName() == 'friends.index')
        <friendship-btn
            dusk="request-friendship"
            class="btn btn-primary btn-block"
            :recipient="{{ $user }}"
        ></friendship-btn>
    @endif
@endif