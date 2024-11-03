@extends('layouts.app')

@section('content')
    <div class="banner jarallax">
        <div class="agileinfo-dot">
            @include('layouts.header')
            <div class="wthree-heading">
                <h2 style="color: white">Book Service</h2>
            </div>
        </div>
    </div>
    <div class="contact">
        <div class="container">
            <div class="agile-contact-form">
                <div class="col-md-6 contact-form-right">
                    <div class="contact-form-top">
                        <h3>Book Services for {{ $service->name }}</h3>
                    </div>

                    <div class="agileinfo-contact-form-grid">
                        <form action="{{ route('booking.store', $service->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Booking Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" name="booking_date" required>
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label class="col-form-label col-md-4">Type of Event:</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="event_type_id" required>
                                        <option value="">Choose Event Type</option>
                                        @foreach ($eventTypes as $eventType)
                                            <option value="{{ $eventType->id }}">{{ $eventType->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Choose Photographer:</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="photographer_id" required>
                                        <option value="">Select Photographer</option>
                                        @foreach ($photographers as $photographer)
                                            <option value="{{ $photographer->id }}">{{ $photographer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Number of Guests:</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="number_of_guest" required>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label col-md-4">Venue and Details:</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="message" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-10">Upload Payment Proof (BCA 1234567890 a/n Lorem
                                    Ipsum):</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control" name="payment_proof" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10">
                                    <input type="submit" class="btn btn-primary" value="Book Now">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('select[name="event_type_id"]').on('change', function() {
                var eventTypeId = $(this).val();
                if (eventTypeId) {
                    $.ajax({
                        url: '/get-photographers/' + eventTypeId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('select[name="photographer_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="photographer_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .name + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="photographer_id"]').empty();
                }
            });
        });
    </script> --}}
@endsection
