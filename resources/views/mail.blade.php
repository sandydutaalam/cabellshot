@extends('layouts.app')

@section('content')
    <div class="banner jarallax">
        <div class="agileinfo-dot">
            @include('layouts.header')
            <div class="wthree-heading">
                <h2 style="color: white">Contact</h2>
            </div>
        </div>
    </div>
    <div class="contact">
        <div class="container">
             <div class="agile-contact-form">
                <div class="col-md-6 contact-form-left">
                    <div class="w3layouts-contact-form-top">
                        <h3>Get in touch</h3>
                        <p>Kami di Cabell Shot sangat ingin mendengar dari Anda! Apakah Anda memiliki pertanyaan?</p>
                    </div>
                    
                    <div class="agileits-contact-address">
                        <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i> <span>+{{ $page->phone_number }}</span></li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i> <span>{{ $page->email }}</span></li>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> <span>{{ $page->description }}</span>
                            </li>
                        </ul>
                    </div>

                </div>
                
                <div class="col-md-6 contact-form-right">
                    <div class="contact-form-top">
                        <h3>Send us a message</h3>
                    </div>
                    <div class="agileinfo-contact-form-grid">
                        <form action="{{ route('mail.submit') }}" method="post">
                            @csrf
                            {{-- <input placeholder="Full Name" name="name" type="text"> --}}
                            <input placeholder="Email" name="email" type="email" required="true">
                            <textarea name="message" placeholder="Message" required></textarea>
                            {{-- <label>Rating (1-5):</label>
                            <select name="rating">
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <textarea name="review" placeholder="Write your review"></textarea> --}}
                            <button class="btn1" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
