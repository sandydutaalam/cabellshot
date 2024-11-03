@extends('layouts.admin')

@section('content')
    <h2 class="content-heading">Add Services</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="block block-themed">
                <div class="block-header bg-gd-emerald">
                    <h3 class="block-title">Add Services</h3>
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
                    <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-12" for="sername">Service Name:</label>
                            <div class="col-12">
                                <input type="text" class="form-control" name="sername" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="sername">Event Type:</label>
                            <div class="col-12">
                                {{-- <input type="text" class="form-control" name="sername" required> --}}
                                <select name="event_type_id" id="" class="form-control">
                                    @foreach ($event_types as $event)
                                        <option value="{{ $event->id }}">{{ $event->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="serdes">Service Description:</label>
                            <div class="col-12">
                                <textarea class="form-control" name="serdes" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="serprice">Service Price:</label>
                            <div class="col-12">
                                <input type="text" class="form-control" name="serprice" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="serviceImage">Upload Service Image:</label>
                            <div class="col-12">
                                <input type="file" class="form-control" name="serviceImage" id="serviceImage"
                                    accept="image/*" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-success">
                                    <i class="mr-5 fa fa-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
