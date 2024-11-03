@extends('layouts.app')

@section('styles')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: auto;
        }

        .gallery-item {
            flex: 0 1 calc(33.33% - 10px);
            /* Tiga kolom dengan jarak 10px */
            margin-bottom: 15px;
            /* Jarak antara baris */
            overflow: hidden;
            /* Menghindari gambar meluber keluar div */
            border-radius: 8px;
            /* Sudut melengkung */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Bayangan */
            transition: transform 0.3s;
            /* Efek transisi */
        }

        .gallery-item img {
            width: 100%;
            /* Mengatur lebar gambar menjadi 100% dari div */
            height: auto;
            /* Menjaga proporsi gambar */
            border-radius: 8px;
            /* Sudut melengkung pada gambar */
        }

        .gallery-item:hover {
            transform: scale(1.05);
            /* Efek zoom saat hover */
        }
    </style>
@endsection
@section('content')
    <!-- banner -->
    <div class="banner jarallax">
        <div class="agileinfo-dot">
            @include('layouts.header')
            <div class="w3layouts-banner">
                <div class="container">
                    <div class="w3-banner-info">
                        <div class="w3l-banner-text">
                            <h2>Create Your Memory</h2>
                            <p>We capture your special day</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3ls-banner-info-bottom">
                <div class="container">
                    <div class="banner-address">
                        <div class="row">
                            <div class="col-md-4 banner-address-left">
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Alamat perusahaan di sini</p>
                            </div>
                            <div class="col-md-4 banner-address-left">
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> email@domain.com</p>
                            </div>
                            <div class="col-md-4 banner-address-left">
                                <p><i class="fa fa-phone" aria-hidden="true"></i> +123 456 789</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //banner -->

    <!-- banner-bottom -->
    <div class="banner-bottom">
        <div class="container">
            <div class="wthree-bottom-grids">
                <div class="row">
                    <div class="col-md-6 wthree-bottom-grid">
                        <div class="w3-agileits-bottom-left">
                            <div class="w3-agileits-bottom-left-text">
                                <h3>Abadikan Momen Berharga Anda!</h3>
                                <p>Setiap momen adalah bagian dari kisah hidup Anda yang tak ternilai. Di Cobell Shot, kami
                                    siap membantu Anda mengabadikan kenangan berharga dengan sentuhan profesional dan
                                    kreatif. Mulai dari pernikahan, pre-wedding, hingga potret keluarga, kami hadir untuk
                                    memastikan setiap gambar berbicara. Hubungi kami sekarang untuk sesi pemotretan yang tak
                                    terlupakan!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wthree-bottom-grid">
                        <div class="w3-agileits-bottom-left w3-agileits-bottom-right">
                            <div class="w3-agileits-bottom-left-text">
                                <h3>Foto yang Bercerita, Kenangan yang Abadi!</h3>
                                <p>Setiap klik kamera kami menciptakan cerita unik yang layak untuk dikenang. Di Cobell
                                    Shot, kami percaya bahwa foto bukan hanya gambar, tetapi juga kenangan. Dengan
                                    pengalaman dan teknik terkini, kami siap menangkap momen spesial Anda dengan keindahan
                                    yang tak terlupakan. Jangan lewatkan kesempatan untuk memiliki karya seni yang bisa Anda
                                    hargai selamanya. Jadwalkan sesi pemotretan Anda hari ini!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="gallery-container">
        <div class="gallery-item">
            <img src="{{ asset('images/IMG_1928.PNG') }}" alt="Photo 1">
        </div>
        <div class="gallery-item">
            <img src="{{ asset('images/IMG_1919.PNG') }}" alt="Photo 2">
        </div>
        <div class="gallery-item">
            <img src="{{ asset('images/IMG_1926.PNG') }}" alt="Photo 3">
        </div>
        <div class="gallery-item">
            <img src="{{ asset('images/IMG_1924.PNG') }}" alt="Photo 4">
        </div>
        <div class="gallery-item">
            <img src="{{ asset('images/IMG_1922.PNG') }}" alt="Photo 5">
        </div>
        <div class="gallery-item">
            <img src="{{ asset('images/IMG_1916.PNG') }}" alt="Photo 6">
        </div>
    </div>

    <!-- Review Section -->
    <div class="reviews">
        <div class="container">
            <h2>OUR REVIEW</h2>
            <div class="review-list">
                @if ($reviews->count() > 0)
                    @foreach ($reviews as $review)
                        <div class="review-item">
                            <h4>{{ $review->name }}</h4>
                            <p>Rating: {{ $review->rating }} / 5</p>
                            <p>{{ $review->review }}</p>
                        </div>
                        <hr>
                    @endforeach
                @else
                    <p>No reviews yet.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
