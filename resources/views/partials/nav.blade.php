<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fa fa-car-side text-primary mr-1"></i>
            Ecoguata
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav ml-auto d-flex">
                @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item ">
                        <a href="{{ route('friends.index') }}" class="nav-link" >
                            <i class="fas fa-user-friends" title="{{ __('Friends') }}"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('accept-friendships.index') }}" class="nav-link">
                            <i class="fas fa-hand-paper" title="{{ __('Requests') }}"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('travel.create') }}" class="nav-link">
                            <i class="fas fa-map-marked-alt" title="{{ __('Travel') }}"></i>
                        </a>
                    </li>
                    <notification-list><i class="fa fa-bell" title="{{ __('Notifications') }}"></i></notification-list>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/upload/avatars/{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" width="20" height="20" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">
                                <i class="fas fa-user"></i> {{ __('Profile') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a onclick="document.getElementById('logout').submit()" class="dropdown-item" href="#">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                    <form id="logout" action="{{ route('logout') }}" method="post">@csrf</form>
                @endguest
            </ul>
        </div>
    </div>
</nav>