@extends('layouts.app')

@section('content')
    <div class="banner jarallax">
        <div class="agileinfo-dot">
            @include('layouts.header')
            <div class="wthree-heading">
                <h2 style="color: white">Forgot Password</h2>
            </div>
        </div>
    </div>
    <div class="about-top">
        <div class="container">
            <div class="agile-contact-form">
                <div class="col-md-6 contact-form-left">

                    <div class="agileits-contact-address">
                        <img src="images/5.jpg" alt="" height="500" width="500">
                    </div>
                </div>
                <div class="col-md-6 contact-form-right">
                    <div class="contact-form-top">
                        <h3>Reset Your Password</h3>
                    </div>
                    <div class="agileinfo-contact-form-grid">
                        <form action="{{ route('reset-password.submit') }}" method="POST">
                            @csrf
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="E-mail" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                name="phone_number" maxlength="10" pattern="[0-9]+" placeholder="Mobile Number" required>
                            @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <input type="password" class="form-control @error('newpassword') is-invalid @enderror"
                                name="newpassword" placeholder="New Password" required>
                            @error('newpassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <br>

                            <input type="password" class="form-control @error('confirmpassword') is-invalid @enderror"
                                name="newpassword_confirmation" placeholder="Confirm Password" required>
                            @error('confirmpassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
