<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Hypebook</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if($currentUser)
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img class="nav-gravatar" src="{{ $currentUser->present()->gravatar }}" alt="{{ $currentUser->username }}">

                            {{ $currentUser->username }}<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>{{ link_to_route('profile_path', 'Your Profile', $currentUser->username) }}</li>
                            <li><a href="#">Another action</a></li>
                            <li class="divider"></li>
                            <li><a href="#">{{ link_to_route('logout_path', 'Log Out') }}</a></li>
                        </ul>
                    </li>
                @else
                    <li>{{ link_to_route('register_path', 'Register') }}</li>
                    <li>{{ link_to_route('login_path', 'Log In') }}</li>
                @endIf()
            </ul>
        </div>

    </div>
</nav>