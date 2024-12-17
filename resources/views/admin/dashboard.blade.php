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
                    {{-- <div class="ribbon-box">{{ $totalUnreadQueries }}</div>
                    <p class="mt-5">
                        <i class="si si-book-open fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Total Unread Queries</p> --}}
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
            <a class="block text-center" href="{{ route('admin.bookings.all') }}">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                    <div class="ribbon-box">{{ $allBookings }}</div>
                    <p class="mt-5">
                        <i class="si si-pencil fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Total Booking</p>
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

        {{-- <!-- Dynamic Table Full Pagination -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title"> Booking Reports</h3>
            </div>
            <div class="block-content block-content-full">
                <h3>Total income: {{ $totalIncome }}</h3>
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th class="d-none d-sm-table-cell">Service name</th>
                            <th class="d-none d-sm-table-cell">Total booking</th>
                            <th class="d-none d-sm-table-cell">Income</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allServices as $index => $service)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="font-w600">{{ $service->name }}</td>
                                <td class="font-w600">{{ $bookingCounts->get($service->id, 0) }}</td> 
                                <td class="font-w600">{{ $serviceIncomes->get($service->id, 0) }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}


        <!-- END Main Container -->
    @endsection
