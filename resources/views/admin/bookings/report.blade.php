@extends('layouts.admin')

@section('content')
    <div class="content">
        <h2 class="content-heading"> Booking Reports</h2>

        <!-- Dynamic Table Full Pagination -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title"> Booking Reports</h3>
            </div>
            <div class="block-content block-content-full">
                <h3>Total income: {{ $totalIncome }}</h3>
                <a href="{{ route('admin.bookings.view_pdf') }}" target="blank"
                class="btn btn-primary">Cetak</a>
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
        </div>
    </div>
@endsection
