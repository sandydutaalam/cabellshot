@extends('layouts.admin')

@section('content')
    <div class="content">
        <h2 class="content-heading">View Queries</h2>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">View Queries</h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                    <tr align="center">
                        <td colspan="4" style="font-size:20px;color:blue">View Queries</td>
                    </tr>

                    <tr>
                        <th scope="row">Name</th>
                        <td>{{ $query->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{ $query->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Message</th>
                        <td colspan="3">{{ $query->message }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
