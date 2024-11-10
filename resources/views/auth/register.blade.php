@extends('layouts.app')

@section('content')
    <!-- Login Form -->
    <div class="banner jarallax">
        <div class="agileinfo-dot">
            @include('layouts.header')
            <div class="wthree-heading">
                <h2 style="color: white">Register</h2>
            </div>
        </div>
    </div>
    <div class="contact">
        <div class="container">
            <div class="agile-contact-form">
                <div class="col-md-6 contact-form-left">

                    <div class="agileits-contact-address">
                        <img src="images/logocabell.png" alt="" height="400" width="400">
                    </div>
                </div>
                <div class="col-md-6 contact-form-right">
                    <div class="contact-form-top">
                        <h3>Register Yourself </h3>
                    </div>
                    <div class="agileinfo-contact-form-grid">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}"
                                required>
                            <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
                            <input type="text" name="phone_number" placeholder="Mobile Number"
                                value="{{ old('phone_number') }}" required maxlength="14" pattern="[0-9]+">
                            <input type="password" name="password" placeholder="Password" required id="password1">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                                id="password2">
                            <button class="btn1" type="submit">Register NOW</button>
                        </form>

                    </div>
                </div>
                <br>
                <div class="col-md-6 contact-form-right">
                    <div class="forgot">
                        <a href="{{ route('login') }}">Already have an account!!!</a>
                    </div>

                </div>
                <div class="clearfix"> </div>
            </div>


        </div>
    </div>
@endsection
