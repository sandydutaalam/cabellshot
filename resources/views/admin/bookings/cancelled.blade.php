@extends('layouts.admin')

@section('content')
    <div class="content">
        <h2 class="content-heading">Cancelled Booking</h2>

        <!-- Dynamic Table Full Pagination -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Cancelled Booking</h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            <th>Booking ID</th>
                            <th class="d-none d-sm-table-cell">Customer Name</th>
                            <th class="d-none d-sm-table-cell">Mobile Number</th>
                            <th class="d-none d-sm-table-cell">Email</th>
                            <th class="d-none d-sm-table-cell">Booking Date</th>
                            <th class="d-none d-sm-table-cell">Status</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cancelledBookings as $index => $booking)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="font-w600">{{ $booking->id }}</td>
                                <td class="font-w600">{{ $booking->user->name }}</td>
                                <td class="font-w600">{{ $booking->user->phone_number }}</td>
                                <td class="font-w600">{{ $booking->user->email }}</td>
                                <td class="font-w600">
                                    <span class="badge badge-primary">{{ $booking->booking_date }}</span>
                                </td>
                                <td class="font-w600">
                                    @if ($booking->status == '')
                                        <span class="badge badge-warning">Not Processed Yet</span>
                                    @elseif ($booking->status == 'Approved')
                                        <span class="badge badge-success">{{ $booking->status }}</span>
                                    @elseif ($booking->status == 'Cancelled')
                                        <span class="badge badge-danger">{{ $booking->status }}</span>
                                    @endif
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a href="{{ route('admin.bookings.detail', $booking->id) }}" class="btn btn-primary"
                                        target="_blank">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full Pagination -->
    </div>
@endsection
