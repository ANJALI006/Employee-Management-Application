$(document).ready(function () {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('.callout').attr('list-employees'),
        columns: [
            { data: 'DT_RowIndex', 'orderable': false, 'searchable': false },
            { data: 'full_name', name: 'full_name' },
            { data: 'employee_designation.designation', name: 'designation' },
            { data: 'formated_joining_date', name: 'joining_date' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

    $("#addEmployeeForm").validate({
        ignore: [],
        rules: {
            firstName: {
                required: true
            },
            lastName: {
                required: true
            },
            joiningDate: {
                required: true
            },
            dob: {
                required: true
            },
            designation: {
                required: true
            },
            genderType: {
                required: true
            },
            mobileNumber: {
                required: true
            },
            landLine: {
                required: true
            },
            presentAddress: {
                required: true
            },
            permanentAddress: {
                required: true
            },
            email: {
                required: true
            },
            status: {
                required: true
            },
            profilePicture: {
                required: true
            },
            resume: {
                required: true
            }
        },
        messages: {
            firstName: {
                required: "This field is required."
            },
            lastName: {
                required: "This field is required."
            },
            joiningDate: {
                required: "This field is required."
            },
            dob: {
                required: "This field is required."
            },
            designation: {
                required: "This field is required."
            },
            genderType: {
                required: "This field is required."
            },
            mobileNumber: {
                required: "This field is required."
            },
            landLine: {
                required: "This field is required."
            },
            presentAddress: {
                required: "This field is required."
            },
            permanentAddress: {
                required: "This field is required."
            },
            email: {
                required: "This field is required."
            },
            status: {
                required: "This field is required."
            },
            profilePicture: {
                required: "This field is required."
            },
            resume: {
                required: "This field is required."
            }
        },
        errorPlacement: function (error, element) {
            if ($(element).is('select')) {
                element.next().after(error); // special placement for select elements
            } else {
                error.insertAfter(element); // default placement for everything else
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    })


    $("#updateEmployeeForm").validate({
        ignore: [],
        rules: {
            firstName: {
                required: true
            },
            lastName: {
                required: true
            },
            joiningDate: {
                required: true
            },
            dob: {
                required: true
            },
            designation: {
                required: true
            },
            genderType: {
                required: true
            },
            mobileNumber: {
                required: true
            },
            landLine: {
                required: true
            },
            presentAddress: {
                required: true
            },
            permanentAddress: {
                required: true
            },
            email: {
                required: true
            },
            status: {
                required: true
            },
            profilePicture: {
                required: true
            },
            resume: {
                required: true
            }
        },
        messages: {
            firstName: {
                required: "This field is required."
            },
            lastName: {
                required: "This field is required."
            },
            joiningDate: {
                required: "This field is required."
            },
            dob: {
                required: "This field is required."
            },
            designation: {
                required: "This field is required."
            },
            genderType: {
                required: "This field is required."
            },
            mobileNumber: {
                required: "This field is required."
            },
            landLine: {
                required: "This field is required."
            },
            presentAddress: {
                required: "This field is required."
            },
            permanentAddress: {
                required: "This field is required."
            },
            email: {
                required: "This field is required."
            },
            status: {
                required: "This field is required."
            },
            profilePicture: {
                required: "This field is required."
            },
            resume: {
                required: "This field is required."
            }
        },
        errorPlacement: function (error, element) {
            if ($(element).is('select')) {
                element.next().after(error); // special placement for select elements
            } else {
                error.insertAfter(element); // default placement for everything else
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    })


    $("body").delegate(".cdelete", "click", function (e) {
        e.preventDefault();
        var destroyRoute = $(this).attr('destroy-route');
        bootbox.confirm({
            message: "You want to delete ?  This cannot be undone.",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Yes'
                }
            },
            callback: function (result) {
                if (result) {
                    window.location.href = destroyRoute;
                }
            }
        });
    });

    $('#joiningDate').datetimepicker({
        format: 'L'
    });

    $('#dob').datetimepicker({
        format: 'L'
    });

    $(document).on('click', '#addressStatus', function (e) {
        if ($(this).is(':checked')) {
            var presentAddress = $('#presentAddress').val();
            if (presentAddress) {
                $('#permanentAddress').val(presentAddress);
            } else {
                $('#permanentAddress').val('');
            }
        } else {
            $('#permanentAddress').val('');
        }
    });

});
