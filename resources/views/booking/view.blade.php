{{-- @extends('layouts.app')

@section('content')
    <div class="banner jarallax">
        <div class="agileinfo-dot">
            @include('layouts.header')
            <div class="wthree-heading">
                <h2 style="color: white">Booking Detail</h2>
            </div>
        </div>
    </div>
    <div class="about-top">
        <div class="container">
            <div class="wthree-services-bottom-grids">
                <p class="wow fadeInUp animated" data-wow-delay=".5s">View Your Booking Details.</p>
                <div class="bs-docs-example wow fadeInUp animated" data-wow-delay=".5s">
                    <table class="table table-bordered table-striped table-vcenter">
                        <tr>
                            <th colspan="5" style="text-align: center;font-size: 20px;color: blue;">Booking
                                Number: {{ $booking->booking_number }}</th>
                        </tr>
                        <tr>
                            <th>Client Name</th>
                            <td>{{ $booking->user->name }}</td>
                            <th>Mobile Number</th>
                            <td>{{ $booking->user->phone_number }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $booking->user->email }}</td>
                            <th>Number of Guest</th>
                            <td>{{ $booking->number_of_guest }}</td>
                        </tr>
                        <tr>
                            <th>Event Type</th>
                            <td>{{ $booking->eventType->type }}</td>
                            <th>Message</th>
                            <td>{{ $booking->message }}</td>
                        </tr>
                        <tr>
                            <th>Service Name</th>
                            <td>{{ $booking->service->name }}</td>
                            <th>Service Description</th>
                            <td>{{ $booking->service->description }}</td>
                        </tr>
                        <tr>
                            <th>Service Price</th>
                            <td>Rp{{ $booking->service->price }}</td>
                            <th>Apply Date</th>
                            <td>{{ $booking->booking_date }}</td>
                        </tr>
                        <tr>
                            <th>Order Final Status</th>
                            <td class="font-w600">
                                @if ($booking->status == 'Pending')
                                    <span class="badge badge-warning">No Processed yet</span>
                                @elseif($booking->status == 'Approved')
                                    <span class="badge badge-success">{{ $booking->status }}</span>
                                @elseif($booking->status == 'Cancelled')
                                    <span class="badge badge-danger">{{ $booking->status }}</span>
                                @endif
                            </td>
                            <th>Admin Remark</th>
                            <td>{{ $booking->remark ?: 'Not Updated Yet' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
 --}}




 @extends('layouts.app')

 @section('content')
     <div class="banner jarallax">
         <div class="agileinfo-dot">
             @include('layouts.header')
             <div class="wthree-heading">
                 <h2 style="color: white">Booking Detail</h2>
             </div>
         </div>
     </div>
     <div class="about-top">
         <div class="container">
             <div class="wthree-services-bottom-grids">
                 <p class="wow fadeInUp animated" data-wow-delay=".5s">View Your Booking Details.</p>
                 <div class="bs-docs-example wow fadeInUp animated" data-wow-delay=".5s">
                     <table class="table table-bordered table-striped table-vcenter">
                         <tr>
                             <th colspan="5" style="text-align: center;font-size: 20px;color: blue;">Booking
                                 Number: {{ $booking->booking_number }}</th>
                         </tr>
                         <tr>
                             <th>Client Name</th>
                             <td>{{ $booking->user->name }}</td>
                             <th>Mobile Number</th>
                             <td>{{ $booking->user->phone_number }}</td>
                         </tr>
                         <tr>
                             <th>Email</th>
                             <td>{{ $booking->user->email }}</td>
                             <th>Number of Guest</th>
                             <td>{{ $booking->number_of_guest }}</td>
                         </tr>
                         <tr>
                             <th>Event Type</th>
                             <td>{{ $booking->eventType->type }}</td>
                             <th>Message</th>
                             <td>{{ $booking->message }}</td>
                         </tr>
                         <tr>
                             <th>Service Name</th>
                             <td>{{ $booking->service->name }}</td>
                             <th>Service Description</th>
                             <td>{{ $booking->service->description }}</td>
                         </tr>
                         <tr>
                             <th>Service Price</th>
                             <td>Rp{{ $booking->service->price }}</td>
                             <th>Apply Date</th>
                             <td>{{ $booking->booking_date }}</td>
                         </tr>
                         <tr>
                             <th>Order Final Status</th>
                             <td class="font-w600">
                                 @if ($booking->status == 'Pending')
                                     <span class="badge badge-warning">No Processed yet</span>
                                 @elseif($booking->status == 'Approved')
                                     <span class="badge badge-success">{{ $booking->status }}</span>
                                 @elseif($booking->status == 'On Process')
                                     <span class="badge badge-success">{{ $booking->status }}</span>
                                 @elseif($booking->status == 'Cancelled')
                                     <span class="badge badge-danger">{{ $booking->status }}</span>
                                 @endif
                             </td>
                             <th>Admin Remark</th>
                             <td>{{ $booking->remark ?: 'Not Updated Yet' }}</td>
                         </tr>
                     </table>
                 </div>

                 {{-- <a href="{{ url('/booking/view/{id}/pdf') }}" class="btn btn-primary">View</a> --}}
 
                 @if ($booking->is_reviewed == false && $booking->status == 'Approved')
                     <!-- Button to Open the Review Modal -->
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal">
                         Give a Review
                     </button>
                 @else
                     {{-- show rating  dan comment --}}
                     <style>
                         .rating .star.filled {
                             color: #FFD700;
                         }
                     </style>
                     @if (isset($booking->review->rating))
                         <div class="review-item">
                             <h4>Your Review</h4>
                             <div class="rating">
                                 @for ($i = 1; $i <= 5; $i++)
                                     <span class="star {{ $i <= $booking->review->rating ? 'filled' : '' }}">&#9733;</span>
                                 @endfor
                             </div>
                             <p class="small text-muted">Rating: {{ $booking->review->rating }} / 5</p>
                             <p>{{ $booking->review->comment }}</p>
                         </div>
                     @endif
 
                 @endif
 
 
                 <!-- The Review Modal -->
                 <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog" role="document">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="reviewModalLabel">Submit Your Review</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <div class="modal-body">
                                 <form action="{{ route('review.store', $booking->id) }}" method="POST">
                                     @csrf
                                     {{-- <input type="hidden" name="booking_id" value="{{ $booking->id }}"> --}}
 
                                     <!-- Rating Stars -->
                                     <div class="form-group">
                                         <label for="rating">Rating:</label>
                                         <select class="form-control" name="rating" id="rating" required>
                                             <option value="5">5 Stars</option>
                                             <option value="4">4 Stars</option>
                                             <option value="3">3 Stars</option>
                                             <option value="2">2 Stars</option>
                                             <option value="1">1 Star</option>
                                         </select>
                                     </div>
 
                                     <!-- Review Textarea -->
                                     <div class="form-group">
                                         <label for="review">Review:</label>
                                         <textarea class="form-control" name="comment" id="review" rows="4" placeholder="Write your review here..."
                                             required></textarea>
                                     </div>
 
                                     <button type="submit" class="btn btn-primary">Submit Review</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- End of Modal -->
 
                 <div class="clearfix"></div>
             </div>
         </div>
     </div>
 @endsection
 