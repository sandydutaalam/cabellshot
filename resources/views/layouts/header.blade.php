<div class="header">
    <div class="container">
        <div class="header-top-grids">
            <div class="agileits-logo">
                <h1><a href="{{ route('home') }}">CS</a></h1>
            </div>
            <div class="top-nav">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <nav>
                            <ul class="nav navbar-nav">
                                <li class="{{ request()->is('/') ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="{{ request()->is('about') ? 'active' : '' }}">
                                    <a href="{{ route('about') }}">About</a>
                                </li>
                                <li class="{{ request()->is('service') ? 'active' : '' }}">
                                    <a href="{{ route('service') }}">Services</a>
                                </li>

                                @auth
                                    <li
                                        class="dropdown {{ request()->is('profile', 'booking-history', 'change-password') ? 'active' : '' }}">
                                        <a href="#" class="dropdown-toggle hvr-bounce-to-bottom"
                                            data-toggle="dropdown" role="button" aria-haspopup="true"
                                            aria-expanded="false">My Account <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="hvr-bounce-to-bottom" href="{{ route('profile') }}">Profile</a>
                                            </li>
                                            <li><a class="hvr-bounce-to-bottom"
                                                    href="{{ route('booking.history') }}">Booking
                                                    History</a></li>
                                            {{-- <li><a class="hvr-bounce-to-bottom"
                                                    href="{{ route('change-password') }}">Change
                                                    Password</a></li> --}}
                                            <li>
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-link hvr-bounce-to-bottom">Logout</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endauth

                                <li class="{{ request()->is('mail') ? 'active' : '' }}"><a
                                        href="{{ route('mail') }}">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </nav>
            </div>
            <br>

            <div class="collapse navbar-collapse nav-wil">
                <ul style="color: white;">
                    @guest
                        <li><a href="{{ route('login') }}" style="color: white">Login</a></li>
                        <li><a href="{{ route('register') }}" style="color: white">Register</a></li>
                    @endguest
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
