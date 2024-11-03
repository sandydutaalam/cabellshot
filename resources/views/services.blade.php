@extends('layouts.app')

@section('styles')
    <style>
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
                <h2 style="color: white">Services</h2>
            </div>
        </div>
    </div>
    <div class="about-top">
        <div class="contact">
            <div class="container">
                <div class="wthree-services-bottom-grids">
                    <p class="wow fadeInUp animated" data-wow-delay=".5s">Select a service category.</p>
                    <div class="mt-5 row" style="display: flex; flex-wrap: wrap; justify-content: center;">
                        @foreach (['Sports', 'Wedding', 'Event'] as $type)
                            <div style="margin: 20px;">
                                <a href="{{ route('services.filter', $type) }}"
                                    style="text-decoration: none; color: inherit;">
                                    <div class="service-card"
                                        style="width: 300px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); transition: transform 0.3s; display: flex; flex-direction: column; align-items: center;">

                                        @if ($type == 'Sports')
                                            <img src="https://asset-a.grid.id/crop/0x0:0x0/x/photo/2023/06/13/ezgifcom-gif-makerjpg-20230613093534.jpg"
                                                alt="{{ $type }} Image"
                                                style="width: 100%; height: 200px; object-fit: cover;">
                                        @elseif ($type == 'Wedding')
                                            <img src="https://awsimages.detik.net.id/community/media/visual/2020/10/12/ilustrasi-pernikahan.jpeg?w=600&q=90"
                                                alt="{{ $type }} Image"
                                                style="width: 100%; height: 200px; object-fit: cover;">
                                        @elseif ($type == 'Event')
                                            <img src="https://youngontop.com/wp-content/uploads/2024/09/63ecdf6e6df724eab1f0e8ca_20230215T0132-25bece5c-5ab8-4c33-98c7-60ad2668054b.webp"
                                                alt="{{ $type }} Image"
                                                style="width: 100%; height: 200px; object-fit: cover;">
                                        @endif

                                        <div class="card-body" style="padding: 15px; text-align: center;">
                                            <h5 class="card-title" style="margin: 0; font-size: 24px;">{{ $type }}
                                            </h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
