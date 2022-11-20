@extends('layouts.admin')
@section('content')
    @include('notification.notify')
    <div class="callout callout-info">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="ms-panel-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h2>Add Designation</h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.designation.index') }}">
                                <button class="btn btn-success"> <i class="fa fa-list" aria-hidden="true"></i> List</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Designation</h3>
                        </div>

                        <form class="addDesignationForm" role="form" method="post" id="addDesignationForm"
                            action="{{ route('admin.designation.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="designation">Designation</label><span class="validate_star">*</span>
                                    <input type="text" class="form-control" id="designation" name="designation"
                                        placeholder="Enter Designation" maxlength="45"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    @if ($errors->has('designation'))
                                        <div class="error">{{ $errors->first('designation') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin/js/designation/designation.js') }}"></script>
@endsection
