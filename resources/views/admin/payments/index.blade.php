@extends('layouts.admin')

@section('content')
    <h2 class="content-heading">Manage Payment type</h2>

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Manage Payment type</h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="d-none d-sm-table-cell">Payment type</th>
                        {{-- <th>Category photo</th>
                        <th class="d-none d-sm-table-cell">Creation Date</th> --}}
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="font-w600">{{ $payment->payment_proof_type }}</td>
                            {{-- <td class="d-none d-sm-table-cell">
                                <img src="{{ asset($payment->category_img) }}" width="100" height="100" style="object-fit:cover">
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-primary">{{ $payment->created_at }}</span>
                            </td> --}}
                            <td class="d-none d-sm-table-cell">
                                <!-- Tombol Edit -->
                                {{-- <button class="btn btn-sm btn-primary">
                                    <a href="{{ route('admin.payments.update', $payments->id) }}"
                                        class="text-center text-white">Edit Payment</a>
                                </button> --}}
                                <button class="btn btn-sm btn-primary">
                                    <a href="{{ route('admin.payments.edit', $payment->id) }}"
                                        class="text-center text-white">Edit Payment</a>
                                </button>

                                <!-- Form Delete, menggunakan class d-inline-block agar sejajar dengan tombol Edit -->
                                <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST"
                                    class="d-inline-block" onsubmit="return confirm('Do you really want to Delete?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-center btn btn-danger btn-sm">Delete</button>

                                    
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
