@extends('layouts.admin')

@section('content')
    <h2 class="content-heading">
        Detail Event Type: {{ $event_type->type }}
    </h2>
    <div class="row">
        <div class="col-md-12">
            <div class="block block-themed">
                <div class="block-header bg-gd-emerald">
                    <h3 class="block-title"> Detail Event Type: {{ $event_type->type }}</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                            data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">

                    @if ($event_type->photographers->isEmpty())
                        <p>No photographers assigned yet.</p>
                    @else
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Photographer Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event_type->photographers as $index => $photographer)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $photographer->name }}</td>
                                        <td>{{ $photographer->email }}</td>
                                        <td>
                                            <form
                                                action="{{ route('admin.event-types.removePhotographer', [$event_type->id, $photographer->id]) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <hr>

                    <h3>Add Photographer to Event Type</h3>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form class="mb-20" action="{{ route('admin.event-types.addPhotographer', $event_type->id) }}"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="user_id">Select Photographer:</label>
                            {{-- <select name="user_id" id="user_id" class="form-control">
                                <option value="">-- Select Photographer --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select> --}}
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        @error('user_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary">Add Photographer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
