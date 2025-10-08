$('#post_work_form input[name="duration"]').daterangepicker();

$(document).on('blur', '#post_work_form #total_cost', function () {
    if (parseFloat($(this).val()) < parseFloat($('#post_work_form #total_paid').val())) {
        $('#post_work_form #total_paid').val($('#post_work_form #total_cost').val());
    }
})

$(document).on('input', '#post_work_form #total_paid', function () {
    if (parseFloat($(this).val()) > parseFloat($('#post_work_form #total_cost').val())) {
        swal({
            icon: "warning",
            title: "Warning !",
            text: paid_amount_err,
            confirmButtonText: "Ok",
        }).then(function () {
            $('#post_work_form #total_paid').val($('#post_work_form #total_cost').val());
        });
    }

    if (parseFloat($(this).val()) > 0 && parseFloat($(this).val()) < parseFloat($('#post_work_form #total_cost').val())) {

    }
})
$('#progress_status').on('mousedown keydown', function (e) {
    e.preventDefault();
});
$(document).on('input', '#post_work_form #progress', function () {
    if ($(this).val() != '') {
        if ($(this).val() > 0 && $(this).val() < 100) {
            $('#post_work_form #progress_status').val(1)
        } else if ($(this).val() > 0 && $(this).val() == 100) {
            $('#post_work_form #progress_status').val(2)
        } else if ($(this).val() > 0 && $(this).val() > 100) {
            $('#post_work_form #progress_status').val(2)
            $(this).val(100)
        }
        else {
            $('#post_work_form #progress_status').val(0)
        }
    } else {
        $('#post_work_form #progress_status').val(0)
    }
})
// Allow only numbers, max 11 digits, and trigger AJAX on Enter
// $(document).on('keypress', '#post_work_form #customer_phone', function (e) {
//     // Block non-digit keys
//     if (e.which < 48 || e.which > 57) {
//         e.preventDefault();
//     }

//     // Prevent more than 11 digits
//     if (this.value.length > 11) {
//         e.preventDefault();
//     }

//     // Trigger AJAX on Enter (only if 11 digits entered)
//     if (e.which === 13 && this.value.length === 11) {
//         e.preventDefault();
//         $('#post_work_form #append_digit_counter').empty().append(`Please wait ....`);
//         $.ajax({
//             type: "get",
//             url: 'work/' + $(this).val(),
//             success: function (data) {
//                 $('#post_work_form #append_digit_counter').empty().append(`Now Hit Enter`);
//                 if (data.name) {
//                     $('#post_work_form #customer_name').val(data.name);
//                 } else {
//                     $('#post_work_form #customer_name').prop('placeholder', 'No data found');
//                 }

//                 if (data.email) {
//                     $('#post_work_form #customer_email').val(data.email);
//                 } else {
//                     $('#post_work_form #customer_email').prop('placeholder', 'No data found');
//                 }

//                 if (data.address) {
//                     $('#post_work_form #customer_address').val(data.address);
//                 } else {
//                     $('#post_work_form #customer_address').prop('placeholder', 'No data found');
//                 }
//             },
//             error: function (err) {
//                 var err_message = err.responseJSON.message.split("(");
//                 $('#post_work_form #append_digit_counter').empty().append(`Now Hit Enter`);
//                 swal({
//                     icon: "warning",
//                     title: "Warning !",
//                     text: err_message[0],
//                     confirmButtonText: "Ok",
//                 });
//             }
//         });
//     } else {
//         $('#post_work_form #customer_name').val('');
//         $('#post_work_form #customer_email').val('');
//         $('#post_work_form #customer_address').val('');
//         $('#post_work_form #customer_name').prop('placeholder', 'No data found');
//         $('#post_work_form #customer_email').prop('placeholder', 'No data found');
//         $('#post_work_form #customer_address').prop('placeholder', 'No data found');
//     }
// });

// // Handle paste / input to remove non-digits
// $(document).on('input', '#post_work_form #customer_phone', function () {
//     // Remove non-digit characters
//     this.value = this.value.replace(/\D/g, '');

//     // Limit to 11 digits
//     if (this.value.length > 11) {
//         this.value = this.value.slice(0, 11);
//     } else {
//         if (11 - this.value.length > 0) {
//             $('#post_work_form #append_digit_counter').empty().append(`Enter ${11 - this.value.length} Digits`);
//         } else {
//             $('#post_work_form #append_digit_counter').empty().append(`Now Hit Enter`);
//         }

//     }
// });

$(document).on('input', '#post_work_form #customer_phone', function () {
    // Remove non-digit characters
    this.value = this.value.replace(/\D/g, '');
    // Limit to 11 digits
    if (this.value.length > 11) {
        this.value = this.value.slice(0, 11);
    }

    let remaining = 11 - this.value.length;
    $('#post_work_form #append_digit_counter').empty().append(`Enter ${remaining} digits`);

    // Auto-trigger AJAX on mobile when 11 digits entered
    if (this.value.length === 11 && !$(this).data('ajax-running')) {
        triggerPhoneAjax(this.value);
    }
});

// Trigger AJAX on Enter key (desktop)
$(document).on('keydown', '#post_work_form #customer_phone', function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        if (this.value.length === 11) {
            triggerPhoneAjax(this.value);
        } else {
            swal({
                icon: "warning",
                title: "Warning !",
                text: "Please enter exactly 11 digits.",
                confirmButtonText: "Ok",
            });
        }
    }
});

// AJAX function
function triggerPhoneAjax(phone) {
    let $input = $('#post_work_form #customer_phone');
    $input.data('ajax-running', true); // prevent multiple calls
    $('#post_work_form #append_digit_counter').text('Please wait ....');

    $.ajax({
        type: "get",
        url: 'work/' + phone,
        success: function (data) {
            $('#post_work_form #append_digit_counter').text('Showing results');

            $('#post_work_form #customer_name').val(data.name || '');
            $('#post_work_form #customer_name').prop('placeholder', data.name ? '' : 'No data found');

            $('#post_work_form #customer_email').val(data.email || '');
            $('#post_work_form #customer_email').prop('placeholder', data.email ? '' : 'No data found');

            $('#post_work_form #customer_address').val(data.address || '');
            $('#post_work_form #customer_address').prop('placeholder', data.address ? '' : 'No data found');
        },
        error: function (err) {
            $('#post_work_form #append_digit_counter').text('Showing results');
            var err_message = err.responseJSON.message.split("(");
            swal({
                icon: "warning",
                title: "Warning !",
                text: err_message[0],
                confirmButtonText: "Ok",
            });
        },
        complete: function () {
            $input.data('ajax-running', false); // allow future calls
        }
    });
}
$(document).on('submit', '#post_work_form', function (e) {
    e.preventDefault();
    $('button[type=submit]', this).html(submit_btn_after + '....');
    $('button[type=submit]', this).addClass('disabled');
    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: form_url,
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (rdata) {
            $('button[type=submit]', '#post_work_form').html(submit_btn_before);
            $('button[type=submit]', '#post_work_form').removeClass('disabled');
            swal({
                icon: "success",
                title: rdata.title,
                text: rdata.text,
                confirmButtonText: rdata.confirmButtonText,
            }).then(function () {
                let data = rdata.team;
                let update_status_btn = `<span class="badge badge-danger">${no_permission_mgs}</span>`;
                if (rdata.hasEditPermission) {
                    update_status_btn = `<span class="mx-2">${data.status == 0 ? 'Inactive' : 'Active'}</span><input
                    data-status="${data.status == 0 ? 1 : 0}"
                    id="status_change" type="checkbox" data-toggle="switchery"
                    data-color="green" data-secondary-color="red" data-size="small" checked />`;
                }
                let action_option = `<span class="badge badge-danger">${no_permission_mgs}</span>`;
                if (rdata.hasAnyPermission) {
                    action_option = `<div class="dropdown"><button class="btn btn-info text-white px-2 py-1 dropbtn">Action <i class="fa fa-angle-down"></i></button> <div class="dropdown-content">`;
                    if (rdata.hasEditPermission) {
                        action_option = action_option + `<a data-bs-toggle="modal" style="cursor: pointer;" data-bs-target="#edit-member-modal" class="text-primary" id="edit_button"><i class=" fa fa-edit mx-1"></i>Edit</a>`;
                    }
                    if (rdata.hasDeletePermission) {
                        action_option = action_option + `<a class="text-danger" id="delete_button" style="cursor: pointer;"><i class="fa fa-trash mx-1"></i> Delete</a>`;
                    }

                    action_option = action_option + `</div></div>`;
                }


                let teamM_image = data.team_member_image ? '<a class="btn btn-info" href="' + base_url + '/' + data.team_member_image + '"></a>' : no_file;
                $('#basic-1 tbody').append(`<tr id="trid-${data.id}" data-id="${data.id}"><td>${teamM_image}</td><td>${data.team_member_name}</td><td>${data.team_member_desig}</td><td>${data.team_member_phone}</td><td>${data.team_member_email}</td><td>${data.team_member_address}</td>
                <td class="text-center">${update_status_btn}</td>
                <td>${action_option}</td></tr>`);

                new Switchery($('#trid-' + data.id).find('input')[0], $('#trid-' + data.id).find('input').data());

                $('#post_work_form .err-mgs').each(function (id, val) {
                    $(this).prev('input').removeClass('border-danger is-invalid')
                    $(this).prev('textarea').removeClass('border-danger is-invalid')
                    $(this).empty();
                })
                $('#post_work_form').trigger('reset');
                $('button[type=button]', '#post_work_form').click();
            })
        },
        error: function (err) {
            $('button[type=submit]', '#post_work_form').html(submit_btn_before);
            $('button[type=submit]', '#post_work_form').removeClass('disabled');
            if (err.status === 403) {
                var err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                }).then(function () {
                    $('button[type=button]', '#post_work_form').click();
                });

            }

            $('#post_work_form .err-mgs').each(function (id, val) {
                $(this).prev('input').removeClass('border-danger is-invalid')
                $(this).prev('textarea').removeClass('border-danger is-invalid')
                $(this).prev('span').find('.select2-selection--single').attr('id', '')
                $(this).empty();
            })
            $.each(err.responseJSON.errors, function (idx, val) {
                // console.log('#add_course_form #'+idx);
                var exp = idx.replace('.', '_');
                var exp2 = exp.replace('_0', '');

                $('#post_work_form #' + exp).addClass('border-danger is-invalid')
                $('#post_work_form #' + exp2).addClass('border-danger is-invalid')
                $('#post_work_form #' + exp).next('span').find('.select2-selection--single').attr('id', 'invalid-selec2')
                $('#post_work_form #' + exp).next('.err-mgs').empty().append(val);

                $('#post_work_form #' + exp + "_err").empty().append(val);
            })
        },
    })
});



