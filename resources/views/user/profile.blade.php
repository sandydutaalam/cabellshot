@extends('layouts.app')

@section('content')
    <div class="banner jarallax">
        <div class="agileinfo-dot">
            @include('layouts.header')
            <div class="wthree-heading">
                <h2>Profile</h2>
            </div>
        </div>
    </div>

    <div class="contact">
        <div class="container">
            <div class="agile-contact-form">
                <div class="col-md-6 contact-form-right">
                    <div class="contact-form-top">
                        <h3>User Profile</h3>
                    </div>
                    <div class="agileinfo-contact-form-grid">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf

                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ old('name', $user->name) }}" name="name" required
                                        class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Mobile Number</label>
                                <div class="col-md-12">
                                    <input type="text" name="phone_number" class="form-control" required maxlength="10"
                                        pattern="[0-9]+" value="{{ old('phone_number', $user->phone_number) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Email Address</label>
                                <div class="col-md-12">
                                    <input type="email" class="form-control" value="{{ $user->email }}" name="email"
                                        required readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Registration Date</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $user->created_at }}" class="form-control"
                                        name="regdate" readonly>
                                </div>
                            </div>

                            <br>
                            <div class="tp">
                                <button type="submit" class="btn btn-primary" name="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection
