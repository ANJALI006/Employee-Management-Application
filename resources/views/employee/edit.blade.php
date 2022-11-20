@extends('layouts.admin')
@section('content')
    @include('notification.notify')
    <div class="callout callout-info">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="ms-panel-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h2>Edit Employee</h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.employee.index') }}">
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
                            <h3 class="card-title">Edit Employee</h3>
                        </div>

                        <form class="editEmployeeForm" role="form" method="post" id="editEmployeeForm"
                            action="{{ route('admin.employee.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="firstName">First Name</label><span class="validate_star">*</span>
                                            <input type="text" class="form-control" id="firstName" name="firstName"
                                                placeholder="Enter First Name" maxlength="45"
                                                value="{{ $employeeDetails->first_name }}"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label><span class="validate_star">*</span>
                                            <input type="text" class="form-control" id="lastName" name="lastName"
                                                placeholder="Enter Last Name" maxlength="45"
                                                value="{{ $employeeDetails->last_name }}"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Joining Date</label><span class="validate_star">*</span>
                                            <div class="input-group date" id="joiningDate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#joiningDate" name="joiningDate"
                                                    value="{{ date('m/d/Y', strtotime($employeeDetails->joining_date)) }}" />
                                                <div class="input-group-append" data-target="#joiningDate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Date of Birth</label><span class="validate_star">*</span>
                                            <div class="input-group date" id="dob" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#dob" name="dob"
                                                    value="{{ date('m/d/Y', strtotime($employeeDetails->dob)) }}" />
                                                <div class="input-group-append" data-target="#dob"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Designation</label><span class="validate_star">*</span>
                                            <select class="form-control select2" id="designation" name="designation"
                                                style="width: 100%;">
                                                <option>Select Designation</option>
                                                @foreach ($listOfDesignation as $designation)
                                                    <option value="{{ $designation->id }}" @selected($designation->id == $employeeDetails->designation_id)>
                                                        {{ $designation->designation }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="gender-type">Gender</label><span class="validate_star">*</span>
                                                <div id="gender-type" class="row">
                                                    <div class="col-sm-6">
                                                        <label class="radio-inline">
                                                            <input name="genderType" id="gender-type-male" value="0"
                                                                type="radio"
                                                                @if ($employeeDetails->gender == 0) checked @endif /> Male
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="radio-inline">
                                                            <input name="genderType" id="gender-type-female"
                                                                value="1" type="radio"
                                                                @if ($employeeDetails->gender == 1) checked @endif /> Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="mobileNumber">Mobile Number</label><span
                                                class="validate_star">*</span>
                                            <input type="number" class="form-control" id="mobileNumber"
                                                name="mobileNumber" placeholder="Enter Mobile Number" maxlength="10"
                                                value="{{ $employeeDetails->mobile_number }}"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="landLine">LandLine</label><span class="validate_star">*</span>
                                            <input type="text" class="form-control" id="landLine" name="landLine"
                                                placeholder="Enter LandLine Number" maxlength="10"
                                                value="{{ $employeeDetails->land_line }}"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="presentAddress">Present Address</label><span
                                                class="validate_star">*</span>
                                            <textarea class="form-control" id="presentAddress" name="presentAddress" rows="3" placeholder="Enter ...">
                                                {{ $employeeDetails->present_address }}
                                            </textarea>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="addressStatus"
                                                    name="addressStatus" @if ($employeeDetails->same_as_present_address == 1) checked @endif>
                                                <label class="form-check-label">Same as Present Address</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="permanentAddress">Permanent Address</label><span
                                                class="validate_star">*</span>
                                            <textarea class="form-control" id="permanentAddress" name="permanentAddress" rows="3"
                                                placeholder="Enter ...">{{ $employeeDetails->permanent_address }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Email</label><span class="validate_star">*</span>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $employeeDetails->email }}" placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="status">Status</label><span class="validate_star">*</span>
                                            <select class="form-control select2" id="status" name="status"
                                                style="width: 100%;">
                                                <option value='1' @selected($employeeDetails->status == 1)>Active</option>
                                                <option value='0' @selected($employeeDetails->status == 0)>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="profilePicture">Profile Picture</label><span
                                                class="validate_star">*</span>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="profilePicture"
                                                        id="profilePicture"
                                                        value="{{ $employeeDetails->profile_picture }}">
                                                    <label class="custom-file-label"
                                                        for="profilePicture">{{ $employeeDetails->profile_picture }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="resume">Resume</label><span class="validate_star">*</span>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="resume"
                                                        id="resume" value="{{ $employeeDetails->resume }}">
                                                    <label class="custom-file-label"
                                                        for="resume">{{ $employeeDetails->resume }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <input type="hidden" name="employeeId" id="employeeId"
                                    value="{{ $employeeDetails->id }}">
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
    <script src="{{ asset('admin/js/employee/employee.js') }}"></script>
@endsection
