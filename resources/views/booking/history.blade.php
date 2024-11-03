@extends('layouts.app')

@section('content')
    <div class="banner jarallax">
        <div class="agileinfo-dot">
            @include('layouts.header')
            <div class="wthree-heading">
                <h2 style="color: white">Book Service</h2>
            </div>
        </div>
    </div>
    <div class="about-top">
        <div class="container">
            <div class="wthree-services-bottom-grids">
                <p class="wow fadeInUp animated" data-wow-delay=".5s">List of booking.</p>
                <div class="bs-docs-example wow fadeInUp animated" data-wow-delay=".5s">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th>Booking Number</th>
                                <th class="d-none d-sm-table-cell">Customer Name</th>
                                <th class="d-none d-sm-table-cell">Mobile Number</th>
                                <th class="d-none d-sm-table-cell">Email</th>
                                <th class="d-none d-sm-table-cell">Booking Date</th>
                                <th class="d-none d-sm-table-cell">Status</th>
                                <th class="d-none d-sm-table-cell">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $key => $booking)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="font-w600">{{ $booking->booking_number }}</td>
                                    <td class="font-w600">{{ $booking->user->name }}</td>
                                    <td class="font-w600">{{ $booking->user->phone_number }}</td>
                                    <td class="font-w600">{{ $booking->user->email }}</td>
                                    <td class="font-w600">
                                        <span class="badge badge-primary">{{ $booking->booking_date }}</span>
                                    </td>
                                    {{-- <td class="font-w600">
                                        <span class="badge badge-primary">{{ $booking->booking_to }}</span>
                                    </td> --}}
                                    <td class="d-none d-sm-table-cell">
                                        @if (!$booking->status)
                                            <span class="font-w600">Not Updated Yet</span>
                                        @else
                                            <span class="badge badge-primary">{{ $booking->status }}</span>
                                        @endif
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <a href="{{ route('booking.view', ['id' => $booking->id, 'bookingid' => $booking->booking_number]) }}"
                                            class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection
