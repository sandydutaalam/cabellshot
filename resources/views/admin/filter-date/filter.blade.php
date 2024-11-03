@extends('layouts.admin')

@section('content')
    <h2 class="content-heading">Filtered Bookings</h2>
    <div class="block block-themed">
        <div class="block-header bg-gd-emerald">
            <h3 class="block-title">Bookings from {{ request('fromdate') }} to {{ request('todate') }}</h3>
        </div>
        <div class="block-content">
            @if ($bookings->isEmpty())
                <p>No bookings found for the selected date range.</p>
            @else
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>Booking Number</th>
                            <th>Client Name</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->booking_number }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->booking_date }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>
                                    <a href="{{ route('admin.bookings.detail', $booking->id) }}" class="btn btn-info">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
