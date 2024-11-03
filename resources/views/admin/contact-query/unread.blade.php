@extends('layouts.admin')

@section('content')
    <div class="content">
        <h2 class="content-heading">Unread Contact Queries</h2>

        <!-- Dynamic Table Full Pagination -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Unread Contact Queries</h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="d-none d-sm-table-cell">Name</th>
                            <th class="d-none d-sm-table-cell">Email</th>
                            <th class="d-none d-sm-table-cell">Send Message Date</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $cnt = 1; @endphp
                        @if ($unreadContacts->count() > 0)
                            @foreach ($unreadContacts as $query)
                                <tr>
                                    <td class="text-center">{{ $cnt++ }}</td>
                                    <td class="font-w600">{{ htmlentities($query->name) }}</td>
                                    <td class="font-w600">{{ htmlentities($query->email) }}</td>
                                    <td class="font-w600">
                                        <span class="badge badge-primary">{{ htmlentities($query->created_at) }}</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <a href="{{ route('admin.contact-query.view', $query->id) }}"
                                            class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No unread contact queries found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full Pagination -->
    </div>
@endsection
