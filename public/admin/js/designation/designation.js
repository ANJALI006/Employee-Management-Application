$(document).ready(function () {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: $('.callout').attr('list-designation'),
        columns: [
            { data: 'DT_RowIndex', 'orderable': false, 'searchable': false },
            { data: 'designation', name: 'designation' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

    $("#addDesignationForm").validate({
        ignore: [],
        rules: {
            designation: {
                required: true
            }
        },
        messages: {
            designation: {
                required: "This field is required.",
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


    $("#updateDesignationForm").validate({
        ignore: [],
        rules: {
            designation: {
                required: true
            }
        },
        messages: {
            designation: {
                required: "This field is required.",
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

});
