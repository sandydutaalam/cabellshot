@extends('layouts.admin')

@section('content')
    <h2 class="content-heading">Update Contact Us</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="block block-themed">
                <div class="block-header bg-gd-emerald">
                    <h3 class="block-title">Update Contact Us</h3>
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
                    <form method="POST" action="{{ route('admin.pages.update.contact') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-12" for="pagetitle">Page Title:</label>
                            <div class="col-12">
                                <input type="text" name="pagetitle" id="pagetitle" required="true"
                                    value="{{ $page->title }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="email">Email:</label>
                            <div class="col-12">
                                <input type="text" name="email" id="email" required="true"
                                    value="{{ $page->email }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="mobnum">Mobile Number:</label>
                            <div class="col-12">
                                <input type="text" name="mobnum" id="mobnum" required="true"
                                    value="{{ $page->phone_number }}" class="form-control" maxlength="10" pattern="[0-9]+">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="pagedes">Page Description:</label>
                            <div class="col-12">
                                <textarea type="text" name="pagedes" class="form-control" required="true">{{ $page->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-success" name="submit">
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
