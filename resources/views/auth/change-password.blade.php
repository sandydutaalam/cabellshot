@extends('layouts.app')

@section('content')
    <div class="banner jarallax">
        <div class="agileinfo-dot">
            @include('layouts.header')
            <div class="wthree-heading">
                <h2 style="color: white">Change Password</h2>
            </div>
        </div>
    </div>
    <div class="about-top">
        <div class="container">
            <div class="agile-contact-form">
                <div class="col-md-6 contact-form-right">
                    <div class="contact-form-top">
                        <h3>User Profile</h3>
                    </div>
                    <div class="agileinfo-contact-form-grid">
                        @if (session('error'))
                            <div class="mt-3 alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if (session('success'))
                            <div class="mt-3 alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form method="POST" action="{{ route('change-password.update') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Current Password</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" style="font-size: 20px" required
                                        name="currentpassword">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-4">New Password</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" required name="newpassword"
                                        style="font-size: 20px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Confirm Password</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" required name="newpassword_confirmation"
                                        style="font-size: 20px">
                                </div>
                            </div>

                            <br>
                            <div class="tp">
                                <button type="submit" class="btn btn-primary" name="submit">Change</button>
                            </div>
                        </form>


                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
