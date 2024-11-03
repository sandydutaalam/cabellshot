@extends('layouts.admin')

@section('content')
    <!-- Bootstrap Register -->
    <div class="block block-themed">
        <div class="block-header bg-gd-emerald">
            <h3 class="block-title">Between Dates Report</h3>
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
            <!-- Form untuk laporan antara tanggal -->
            <form method="POST" action="{{ route('admin.filter-date.filter') }}">
                @csrf <!-- Tambahkan CSRF protection -->

                <div class="form-group row">
                    <label class="col-12" for="fromdate">From Date:</label>
                    <div class="col-12">
                        <input type="date" class="form-control" id="fromdate" name="fromdate" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12" for="todate">To Date:</label>
                    <div class="col-12">
                        <input type="date" class="form-control" id="todate" name="todate" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-alt-success">
                            <i class="fa fa-plus mr-5"></i> Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Bootstrap Register -->
@endsection
