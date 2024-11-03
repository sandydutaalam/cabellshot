@extends('layouts.app')

@section('content')
    <div class="banner jarallax">
        <div class="agileinfo-dot">
            @include('layouts.header')
            <div class="wthree-heading">
                <h2 style="color: white">Booking Detail</h2>
            </div>
        </div>
    </div>
    <div class="about-top">
        <div class="container">
            <div class="wthree-services-bottom-grids">
                <p class="wow fadeInUp animated" data-wow-delay=".5s">View Your Booking Details.</p>
                <div class="bs-docs-example wow fadeInUp animated" data-wow-delay=".5s">
                    <table class="table table-bordered table-striped table-vcenter">
                        <tr>
                            <th colspan="5" style="text-align: center;font-size: 20px;color: blue;">Booking
                                Number: {{ $booking->booking_number }}</th>
                        </tr>
                        <tr>
                            <th>Client Name</th>
                            <td>{{ $booking->user->name }}</td>
                            <th>Mobile Number</th>
                            <td>{{ $booking->user->phone_number }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $booking->user->email }}</td>
                            <th>Number of Guest</th>
                            <td>{{ $booking->number_of_guest }}</td>
                        </tr>
                        <tr>
                            <th>Event Type</th>
                            <td>{{ $booking->eventType->type }}</td>
                            <th>Message</th>
                            <td>{{ $booking->message }}</td>
                        </tr>
                        <tr>
                            <th>Service Name</th>
                            <td>{{ $booking->service->name }}</td>
                            <th>Service Description</th>
                            <td>{{ $booking->service->description }}</td>
                        </tr>
                        <tr>
                            <th>Service Price</th>
                            <td>Rp{{ $booking->service->price }}</td>
                            <th>Apply Date</th>
                            <td>{{ $booking->booking_date }}</td>
                        </tr>
                        <tr>
                            <th>Order Final Status</th>
                            <td class="font-w600">
                                @if ($booking->status == 'Pending')
                                    <span class="badge badge-warning">No Processed yet</span>
                                @elseif($booking->status == 'Approved')
                                    <span class="badge badge-success">{{ $booking->status }}</span>
                                @elseif($booking->status == 'Cancelled')
                                    <span class="badge badge-danger">{{ $booking->status }}</span>
                                @endif
                            </td>
                            <th>Admin Remark</th>
                            <td>{{ $booking->remark ?: 'Not Updated Yet' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
