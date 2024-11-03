@extends('layouts.admin')

@section('content')
    <h2 class="content-heading">Search Booking</h2>
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Search Booking</h3>
        </div>
        <div class="block-content block-content-full">
            <form id="basic-form" method="get" action="{{ route('admin.search-booking.index') }}">
                <div class="form-group">
                    <label>Search by Booking No./Name/Mobile No.</label>
                    <input id="searchdata" type="text" name="searchdata" value="{{ request('searchdata') }}" required
                        class="form-control" placeholder="Booking No./Name/Mobile No.">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="search">Search</button>
            </form>
        </div>
    </div>

    @if (request('searchdata') && isset($sdata))
        <h4 align="center">Result against "{{ $sdata }}" keyword</h4>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Search Results</h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Booking ID</th>
                            <th>Customer Name</th>
                            <th>Mobile Number</th>
                            <th>Email</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($bookings->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">No record found against this search</td>
                            </tr>
                        @else
                            @foreach ($bookings as $key => $booking)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="font-w600">{{ $booking->id }}</td>
                                    <td class="font-w600">{{ $booking->user->name }}</td>
                                    <td class="font-w600">{{ $booking->user->phone_number }}</td>
                                    <td class="font-w600">{{ $booking->user->email }}</td>
                                    <td class="font-w600">
                                        <span class="badge badge-primary">{{ $booking->booking_date }}</span>
                                    </td>
                                    <td class="font-w600">
                                        <span class="badge badge-primary">{{ $booking->status ?: 'Not Updated Yet' }}</span>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        <a href="{{ route('admin.bookings.detail', $booking->id) }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
