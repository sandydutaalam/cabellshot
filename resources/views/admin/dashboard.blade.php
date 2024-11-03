@extends('layouts.admin')

@section('content')
    <!-- Main Container -->


    <div class="row gutters-tiny" data-toggle="appear">
        <div class="col-6 col-md-4 col-xl-3">
            <a class="block text-center" href="{{ route('admin.contact-query.unread') }}">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                    <div class="ribbon-box">{{ $totalUnreadQueries }}</div>
                    <p class="mt-5">
                        <i class="si si-book-open fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Total Unread Queries</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-3">
            <a class="block text-center" href="{{ route('admin.contact-query.read') }}">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                    <div class="ribbon-box">{{ $totalReadQueries }}</div>
                    <p class="mt-5">
                        <i class="si si-paper-plane fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Total Read Queries</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-3">
            <a class="block text-center" href="{{ route('admin.bookings.new') }}">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                    <div class="ribbon-box">{{ $totalNewBookings }}</div>
                    <p class="mt-5">
                        <i class="si si-pencil fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Total New Booking</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-3">
            <a class="block text-center" href="{{ route('admin.bookings.approved') }}">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                    <div class="ribbon-box">{{ $totalApprovedBookings }}</div>
                    <p class="mt-5">
                        <i class="si si-target fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Total Approved Booking</p>
                </div>
            </a>
        </div>
    </div>
    </div>
    <div class="content">
        <div class="row gutters-tiny" data-toggle="appear">
            <div class="col-6 col-md-4 col-xl-4">
                <a class="block text-center" href="{{ route('admin.bookings.cancelled') }}">
                    <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                        <div class="ribbon-box">{{ $totalCancelledBookings }}</div>
                        <p class="mt-5">
                            <i class="si si-support fa-3x text-white-op"></i>
                        </p>
                        <p class="font-w600 text-white">Total Cancelled Booking</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-4">
                <a class="block text-center" href="{{ route('admin.services.index') }}">
                    <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                        <div class="ribbon-box">{{ $totalServices }}</div>
                        <p class="mt-5">
                            <i class="si si-wallet fa-3x text-white-op"></i>
                        </p>
                        <p class="font-w600 text-white">Total Services</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-4">
                <a class="block text-center" href="{{ route('admin.event-types.index') }}">
                    <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                        <div class="ribbon-box">{{ $totalEventTypes }}</div>
                        <p class="mt-5">
                            <i class="si si-bubbles fa-3x text-white-op"></i>
                        </p>
                        <p class="font-w600 text-white">Total Event Type</p>
                    </div>
                </a>
            </div>
        </div>


        <!-- END Main Container -->
    @endsection
