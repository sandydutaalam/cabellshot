@extends('layouts.app')

@section('content')
    <!-- Login Form -->
    <div class="banner jarallax">
        <div class="agileinfo-dot">
            @include('layouts.header')
            <div class="wthree-heading">
                <h2 style="color: white">Login</h2>
            </div>
        </div>
    </div>
    <div class="contact">
        <div class="container">
            <div class="agile-contact-form">
                <div class="col-md-6 contact-form-left">
                    <div class="agileits-contact-address">
                        <img src="images/LOGO.jpg" alt="Logo" height="500" width="500">
                    </div>
                </div>
                <div class="col-md-6 contact-form-right">
                    <div class="contact-form-top">
                        <h3>Login to User Panel</h3>
                    </div>
                    <div class="agileinfo-contact-form-grid">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <input type="email" name="email" placeholder="E-mail" required>
                            <input type="password" name="password" placeholder="Password" required>
                            {{-- <div class="forgot">
                                <a href="{{ route('reset-password') }}">Forgot Password?</a>
                            </div> --}}
                            <button class="btn1">LOGIN NOW</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 contact-form-right">
                    <div class="forgot">
                        <a href="{{ route('register') }}">Register Yourself</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
@endsection
