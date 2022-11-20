@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
@endsection

@section('content')
    @include('notification.notify')

    <div class="callout callout-info" list-designation="{{ route('admin.designation.list') }}">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="ms-panel-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h2>Designation List</h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.designation.create') }}">
                                <button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="invoice p-3 mb-3">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="{{ asset('admin/js/designation/designation.js') }}"></script>
@endsection
