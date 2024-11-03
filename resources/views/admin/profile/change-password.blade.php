@extends('layouts.admin')

@section('content')
    <h2 class="content-heading">Change Password</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Bootstrap Register -->
            <div class="block block-themed">
                <div class="block-header bg-gd-emerald">
                    <h3 class="block-title">Change Password</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                            data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <form method="POST" action="{{ route('admin.profile.change-password.update') }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-12" for="currentpassword">Current Password:</label>
                            <div class="col-12">
                                <input type="password" class="form-control" name="currentpassword" id="currentpassword"
                                    required>
                                @error('currentpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="newpassword">New Password:</label>
                            <div class="col-12">
                                <input type="password" class="form-control" name="newpassword" id="newpassword" required>
                                @error('newpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="confirmpassword">Confirm Password:</label>
                            <div class="col-12">
                                <input type="password" class="form-control" name="newpassword_confirmation"
                                    id="confirmpassword" required>
                                @error('confirmpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-success" name="submit">
                                    <i class="fa fa-plus mr-5"></i> Change
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Bootstrap Register -->
        </div>
    </div>
@endsection
