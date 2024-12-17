@extends('layouts.admin')

@section('content')
    <h2 class="content-heading">Add Payment</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="block block-themed">
                <div class="block-header bg-gd-emerald">
                    <h3 class="block-title">Add Payment</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                            data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                            data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <form method="POST" action="{{ route('admin.payments.store') }}"
                    >
                    {{-- bila ada gambar pakai ini enctype="multipart/form-data" --}}
                        @csrf
                        <div class="form-group row">
                            <label class="col-12" for="type">Payment:</label>
                            <div class="col-12">
                                <input type="text" class="form-control" name="payment_proof_type" required>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="col-12" for="categoryImage">Upload Category Image:</label>
                            <div class="col-12">
                                <input type="file" class="form-control" name="categoryImage" id="categoryImage"
                                accept="image/*" required>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-success">
                                    <i class="fa fa-plus mr-5"></i> Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
