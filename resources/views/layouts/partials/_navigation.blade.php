<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="{{ url('/plans') }}">{{__('menu.plans')}}</a></li>
                        <li><a href="{{ url('/lessons') }}">{{__('menu.lessons')}}</a></li>
                        <li><a href="{{ url('/prolessons') }}">{{__('menu.lessons_premium')}}</a></li>
                    </ul>
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{url('/user/profile')}}">{{__('menu.profile')}}</a></li>
                                    <li>
                                        @if (Auth::user()->subscribed('main'))
                                                <a href="{{ url('/subscriptions') }}">
                                                    {{__('menu.manage_subscriptions')}}
                                                </a>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="caret"></span> {{ strtoupper(config('app.locale'))}}
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{action('LocalesController@change', ['language' => 'pt'])}}">PT</a></li>
                                <li><a href="{{action('LocalesController@change', ['language' => 'en'])}}">EN</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>