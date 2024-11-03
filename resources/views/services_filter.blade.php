@extends('layouts.app')

@section('styles')
    <style>
        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }

        .img-responsive {
            border-radius: 5px;
        }

        .table-bordered {
            border: 2px solid #ddd;
        }

        .table thead {
            background-color: #f8f9fa;
        }

        .btn-default {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        .btn-default:hover {
            background-color: #0056b3;
            color: white;
        }
    </style>
@endsection

@section('content')
    <div class="banner jarallax">
        <div class="agileinfo-dot">
            @include('layouts.header')
            <div class="wthree-heading">
                <h2 style="color: white">Services {{ $eventType->type }}</h2>
            </div>
        </div>
    </div>
    <div class="about-top">
        <div class="contact">
            <div class="container">
                <div class="wthree-services-bottom-grids">
                    <p class="wow fadeInUp animated" data-wow-delay=".5s">List of services of {{ $eventType->type }}.</p>
                    @if (isset($services) && $services->isNotEmpty())
                        <div class="bs-docs-example wow fadeInUp animated" data-wow-delay=".5s">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Service Image</th>
                                        <th>Package Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $key => $service)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($service->image) }}" alt="{{ $service->name }}"
                                                    class="img-responsive"
                                                    style="width:100px; height:100px; object-fit:cover">
                                            </td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->description }}</td>
                                            <td>Rp.{{ number_format($service->price) }}</td>
                                            <td>
                                                @guest
                                                    <a href="{{ route('login') }}" class="btn btn-default">Book Services</a>
                                                @else
                                                    <a href="{{ route('booking.create', $service->id) }}"
                                                        class="btn btn-default">Book Services</a>
                                                @endguest
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">No services available for the selected event type.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
