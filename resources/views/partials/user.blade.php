{{-- <div class="card border-0 bg-light shadow-sm"> --}}
        {{-- <div class="card-body"> --}}
    @if (auth()->id() === $user->id)
        <div class="text-center">
            <div class="rounded-circle img-thumbnail mx-auto mt-2" style="background-image: url(/upload/avatars/{{ $user->avatar }}); background-size:cover; background-repeat:no-repeat; background-position:center; width:200px; height:200px;border-width: 5px;">
            </div>
            <div class="text-white">
                {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }}
                <p class="lead"><small>{{ '@'.Auth::user()->name }}</small></p>
            </div>
            <a href="{{ route('users.edit', Auth::user()) }}" class="mx-auto text-white">
                <small><i class="fas fa-user-edit"></i> {{ __('Edit profile') }}</small>
            </a>
        </div>
    @else
        <div class="card border-0 bg-light shadow-sm">
            <div class="card-body">
                <h5 class="card-title"><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></h5>
                <friendship-btn
                    dusk="request-friendship"
                    class="btn btn-primary btn-block"
                    :recipient="{{ $user }}"
                ></friendship-btn>
            </div>
        </div>
    @endif
    {{-- </div> --}}
{{-- </div> --}}