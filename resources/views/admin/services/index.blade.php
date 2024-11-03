@extends('layouts.admin')

@section('content')
    <div class="block-header block-header-default">
        <h3 class="block-title">Manage Services</h3>
    </div>
    <div class="block-content block-content-full">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Service Name</th>
                    <th class="d-none d-sm-table-cell">Service Price</th>
                    <th class="d-none d-sm-table-cell">Service Image</th>
                    <th class="d-none d-sm-table-cell">Event Type</th>

                    <th class="d-none d-sm-table-cell">Creation Date</th>
                    <th class="d-none d-sm-table-cell" style="width: 20%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $key => $service)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="font-w600">{{ htmlentities($service->name) }}</td>
                        <td class="d-none d-sm-table-cell">Rp. {{ htmlentities($service->price) }}</td>
                        <td class="d-none d-sm-table-cell">
                            <img src="{{ asset($service->image) }}" width="100" height="100" style="object-fit:cover">
                        </td>
                        <td class="d-none d-sm-table-cell">{{ htmlentities($service->event?->type) }}</td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-primary">{{ htmlentities($service->created_at) }}</span>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?');"
                                    class="btn btn-danger">Delete</button>
                            </form>
                            <button class="btn btn-primary">
                                <a class="text-white" href="{{ route('admin.services.edit', $service->id) }}">Update</a>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
