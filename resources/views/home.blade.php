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
                            <h2>Cabell Shot</h2>
                            <p>Keep your memories in a picture</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3ls-banner-info-bottom">
                <div class="container">
                    <div class="banner-address">
                        <div class="row">
                            <div class="col-md-4 banner-address-left">
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i>Universitas Tarumanagara</p>
                            </div>
                            <div class="col-md-4 banner-address-left">
                                <p><i class="fa fa-envelope" aria-hidden="true"></i>sandydutaa@cabellshot.com</p>
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
                                <p>Setiap momen adalah bagian dari kisah hidup Anda yang tak ternilai. Di Cabell Shot, kami
                                    siap membantu Anda mengabadikan kenangan berharga dengan sentuhan profesional dan
                                    kreatif. Mulai dari pernikahan, pre-wedding, hingga potret keluarga, kami hadir untuk
                                    memastikan setiap gambar berbicara. Hubungi kami sekarang untuk sesi pemotretan yang tak
                                    akan
                                    terlupakan oleh Anda!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wthree-bottom-grid">
                        <div class="w3-agileits-bottom-left w3-agileits-bottom-right">
                            <div class="w3-agileits-bottom-left-text">
                                <h3>Foto yang Bercerita, Kenangan yang Abadi!</h3>
                                <p>Setiap klik kamera kami menciptakan cerita unik yang layak untuk dikenang. Di Cabell
                                    Shot, kami percaya bahwa foto bukan hanya gambar, tetapi juga kenangan. Dengan
                                    pengalaman dan teknik terkini, kami siap menangkap momen spesial Anda dengan keindahan
                                    yang tak terlupakan. Jangan lewatkan kesempatan untuk memiliki karya seni yang bisa Anda
                                    hargai selamanya. Jadwalkan sesi pemotretan sekarang!</p>
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


    <style>
        /* Add some basic styling to the review section */
        .reviews {
            background-color: #f9f9f9;
            padding: 20px;
        }

        .review-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .review-item {
            width: 300px;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .review-item:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        /* Style the rating stars */
        .rating {
            font-size: 1.2rem;
            color: #ccc;
        }

        .rating .star {
            margin-right: 5px;
        }

        .rating .star.filled {
            color: #FFD700;
        }

        /* Style the review text */
        .review-item h4 {
            font-weight: bold;
            margin-top: 0;
        }

        .review-item p {
            margin-bottom: 10px;
        }

        .review-item .small {
            font-size: 0.8rem;
            color: #666;
        }

        /* Add some space between reviews */
        .review-item+.review-item {
            margin-top: 20px;
        }
    </style>

    <!-- The HTML code remains the same -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <div class="py-5 reviews">
        <div class="container">
            <h2 class="mb-5 text-center">Our Reviews</h2>
            <div class="review-list">
                @if ($reviews->count() > 0)
                    @foreach ($reviews as $review)
                        <div class="p-3 mb-4 border rounded shadow-sm review-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-1">{{ $review->name }}</h4>
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star {{ $i <= $review->rating ? 'filled' : '' }}">&#9733;</span>
                                    @endfor
                                </div>
                            </div>
                            <p class="small text-muted">Rating: {{ $review->rating }} / 5</p>
                            <p class="mt-2">{{ $review->comment }}</p>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-muted">No reviews yet.</p>
                @endif
            </div>
        </div>
    </div>


@endsection
