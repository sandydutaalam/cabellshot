@extends('layouts.admin')

@section('content')
    <h2 class="content-heading">Admin Profile</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="block block-themed">
                <div class="block-header bg-gd-emerald">
                    <h3 class="block-title">Admin Profile</h3>
                </div>
                <div class="block-content">
                    <form method="POST" action="{{ route('admin.profile.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-12" for="adminname">Admin Name:</label>
                            <div class="col-12">
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $admin->name) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12" for="email">Email:</label>
                            <div class="col-12">
                                <input type="email" class="form-control" name="email"
                                    value="{{ old('email', $admin->email) }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12" for="phone_number">Contact Number:</label>
                            <div class="col-12">
                                <input type="text" class="form-control" name="phone_number"
                                    value="{{ old('phone_number', $admin->phone_number) }}" required maxlength="10">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12">Admin Registration Date:</label>
                            <div class="col-12">
                                <input type="text" class="form-control" value="{{ $admin->created_at }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-success">
                                    <i class="fa fa-plus mr-5"></i> Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
