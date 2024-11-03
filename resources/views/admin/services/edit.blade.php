@extends('layouts.admin')

@section('content')
    <h2 class="content-heading">Update Service</h2>

    <div class="block">
        <div class="block-content block-content-full">
            <form method="POST" action="{{ route('admin.services.update', $service->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="sername">Service Name</label>
                    <input type="text" class="form-control" name="sername" id="sername"
                        value="{{ old('sername', $service->name) }}" required>
                </div>

                <div class="form-group ">
                    <label for="sername">Event Type:</label>
                    {{-- <input type="text" class="form-control" name="sername" required> --}}
                    <select name="event_type_id" id="" class="form-control">
                        @foreach ($event_types as $event)
                            <option value="{{ $event->id }}" @if ($event->id == $service->event_type_id) selected @endif>
                                {{ $event->type }}</option>
                            {{-- <option value="{{ $event->id }}">{{ $event->type }}</option> --}}
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="serdes">Service Description</label>
                    <textarea class="form-control" name="serdes" id="serdes" required>{{ old('serdes', $service->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="serprice">Service Price</label>
                    <input type="text" class="form-control" name="serprice" id="serprice"
                        value="{{ old('serprice', $service->price) }}" required>
                </div>

                <div class="form-group">
                    <label for="serimage">Service Image</label>
                    <input type="file" class="form-control" name="serviceImage" id="serimage">
                    <img src="{{ asset($service->image) }}" width="100" height="100" style="object-fit: cover"
                        alt="Current Service Image">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
