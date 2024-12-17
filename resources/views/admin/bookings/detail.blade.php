@extends('layouts.admin')

@section('content')
    <h2 class="content-heading">View Booking</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="block block-themed">
                <div class="block-header bg-gd-emerald">
                    <h3 class="block-title">View Booking</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                            data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
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
                                @elseif($booking->status == 'On Process')
                                    <span class="badge badge-success">{{ $booking->status }}</span>
                                @endif
                            </td>
                            <th>Admin Remark</th>
                            <td>{{ $booking->remark ?: 'Not Updated Yet' }}</td>
                        </tr>
                        <tr>
                            <th>Payment Proof</th>
                            <td>
                                <a href="{{ asset($booking->payment_proof) }}" target="_blank"
                                    class="text-white btn btn-primary">
                                    Lihat Bukti
                                    Pembayaran</a>
                            </td>

                            <th>Photographer</th>
                            <td>
                                {{ $booking->photographer->name }}
                            </td>
                        </tr>

                        <tr>
                            <th>Review</th>
                            @if ($booking->review != null)
                                <td>
                                    Comment : {{ $booking->review->comment }}
                                    Rating : {{ $booking->review->rating }} / 5
                                </td>
                            @else
                                <td>
                                    No Review Yet
                                </td>
                            @endif


                        </tr>

                    </table>

                    {{-- @if ($booking->status == 'Pending')
                        <p align="center" style="padding-top: 20px">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Take
                                Action</button>
                        </p>
                    @endif --}}

                    @if (in_array($booking->status, ['Pending','On Process']))
                        <p align="center" style="padding-top: 20px">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Take
                                Action</button>
                        </p>
                    @endif

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('admin.bookings.update', $booking->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <th>Remark :</th>
                                                <td>
                                                    <textarea name="remark" placeholder="Remark" rows="5" class="form-control" required></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Status :</th>
                                                <td>
                                                    <select name="status" class="form-control" required>
                                                        <option value="Approved" selected>Approved</option>
                                                        <option value="On Process">Process</option>
                                                        <option value="Cancelled">Cancelled</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
