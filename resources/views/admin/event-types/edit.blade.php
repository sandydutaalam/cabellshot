@extends('layouts.admin')

@section('content')
    <h2 class="content-heading">Update Category</h2>

    <div class="block">
        <div class="block-content block-content-full">
            <form method="POST" action="{{ route('admin.event-types.update', $event_type->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="type">Category Name</label>
                    <input type="text" class="form-control" name="type" id="type"
                        value="{{ old('type', $event_type->type) }}" required>
                </div>

                <div class="form-group">
                    <label for="categoryImage">Category Image</label>
                    <input type="file" class="form-control" name="categoryImage" id="categoryImage">
                    <img src="{{ asset($event_type->category_img) }}" width="100" height="100" style="object-fit: cover"
                        alt="Current Category Image">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
