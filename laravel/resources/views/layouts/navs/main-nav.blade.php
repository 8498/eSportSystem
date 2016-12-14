<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <img class="img-responsive" alt="esportsystem" src="/images/eSportSystemLogo.png">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    @if(Auth::user()->hasRole('superadmin'))
                    
                        @include('layouts.navs.superadmin-nav')
                        @include('layouts.navs.administrator-nav')
                        @include('layouts.navs.manager-nav')

                    @elseif(Auth::user()->hasRole('administrator'))

                        @include('layouts.navs.administrator-nav')

                    @elseif(Auth::user()->hasRole('manager'))

                        @include('layouts.navs.manager-nav')

                    @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('settings') }}">Ustawienia</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('logout') }}">{{ ('Wyloguj') }}</a></li>
                            </ul>
                        </li>
                @else
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">{{ ('Logowanie') }}</a></li>
                </ul>
                @endif
        </div>
    </div>
</nav>