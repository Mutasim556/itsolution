var reload_flag = false;

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
$('#post_work_form #progress_status').on('mousedown keydown', function (e) {
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

var today = moment();
//////// Edit Form Start///////////
$('#edit_work_form input[name="duration"]').daterangepicker({
    locale: {
        format: 'MM/DD/YYYY'  // display format
    },
    startDate: today, // default start date
    endDate: today,   // default end date
    autoUpdateInput: true
});

$(document).on('blur', '#edit_work_form #total_cost', function () {
    if (parseFloat($(this).val()) < parseFloat($('#edit_work_form #total_paid').val())) {
        $('#edit_work_form #total_paid').val($('#edit_work_form #total_cost').val());
    }
})

$(document).on('input', '#edit_work_form #total_paid', function () {
    if (parseFloat($(this).val()) > parseFloat($('#edit_work_form #total_cost').val())) {
        swal({
            icon: "warning",
            title: "Warning !",
            text: paid_amount_err,
            confirmButtonText: "Ok",
        }).then(function () {
            $('#edit_work_form #total_paid').val($('#edit_work_form #total_cost').val());
        });
    }

    if (parseFloat($(this).val()) > 0 && parseFloat($(this).val()) < parseFloat($('#edit_work_form #total_cost').val())) {

    }
})
$('#edit_work_form #progress_status').on('mousedown keydown', function (e) {
    e.preventDefault();
});
$(document).on('input', '#edit_work_form #progress', function () {
    if ($(this).val() != '') {
        if ($(this).val() > 0 && $(this).val() < 100) {
            $('#edit_work_form #progress_status').val(1)
        } else if ($(this).val() > 0 && $(this).val() == 100) {
            $('#edit_work_form #progress_status').val(2)
        } else if ($(this).val() > 0 && $(this).val() > 100) {
            $('#edit_work_form #progress_status').val(2)
            $(this).val(100)
        }
        else {
            $('#edit_work_form #progress_status').val(0)
        }
    } else {
        $('#edit_work_form #progress_status').val(0)
    }
})

$(document).on('input', '#edit_work_form #customer_phone', function () {
    // Remove non-digit characters
    this.value = this.value.replace(/\D/g, '');
    // Limit to 11 digits
    if (this.value.length > 11) {
        this.value = this.value.slice(0, 11);
    }

    let remaining = 11 - this.value.length;
    $('#edit_work_form #append_digit_counter').empty().append(`Enter ${remaining} digits`);

    // Auto-trigger AJAX on mobile when 11 digits entered
    if (this.value.length === 11 && !$(this).data('ajax-running')) {
        triggerEditPhoneAjax(this.value);
    }
});

// Trigger AJAX on Enter key (desktop)
$(document).on('keydown', '#edit_work_form #customer_phone', function (e) {
    if (e.key === "Enter") {
        e.preventDefault();
        if (this.value.length === 11) {
            triggerEditPhoneAjax(this.value);
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
function triggerEditPhoneAjax(phone) {
    let $input = $('#edit_work_form #customer_phone');
    $input.data('ajax-running', true); // prevent multiple calls
    $('#edit_work_form #append_digit_counter').text('Please wait ....');

    $.ajax({
        type: "get",
        url: 'work/' + phone,
        success: function (data) {
            $('#edit_work_form #append_digit_counter').text('Showing results');

            $('#edit_work_form #customer_name').val(data.name || '');
            $('#edit_work_form #customer_name').prop('placeholder', data.name ? '' : 'No data found');

            $('#edit_work_form #customer_email').val(data.email || '');
            $('#edit_work_form #customer_email').prop('placeholder', data.email ? '' : 'No data found');

            $('#edit_work_form #customer_address').val(data.address || '');
            $('#edit_work_form #customer_address').prop('placeholder', data.address ? '' : 'No data found');
        },
        error: function (err) {
            $('#edit_work_form #append_digit_counter').text('Showing results');
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
//////// Edit Form End///////////
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
                let data = rdata.work;
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
                        action_option = action_option + `<a data-bs-toggle="modal" style="cursor: pointer;" data-bs-target="#edit-work-modal" class="text-primary" id="edit_button"><i class=" fa fa-edit mx-1"></i>Edit</a>`;
                    }
                    if (rdata.hasDeletePermission) {
                        action_option = action_option + `<a class="text-danger" id="delete_button" style="cursor: pointer;"><i class="fa fa-trash mx-1"></i> Delete</a>`;
                    }

                    action_option = action_option + `</div></div>`;
                }


                let workFile = data.work_file ? '<atarget="__blank" class="badge badge-info" href="' + base_url + '/' + data.work_file + '"></a>' : no_file;
                let newRow = `<tr id="trid-${data.id}" data-id="${data.id}"><td>${data.work_title}</td><td>${data.user.name}</td><td>${data.user.phone}</td><td>${workFile}</td><td>${data.duration}</td><td>${data.total_cost}</td><td>${data.total_paid}</td><td>${data.total_cost - data.total_paid}</td><td>${data.payment_status}</td><td>${data.progress} %</td>
                <td class="text-center">${update_status_btn}</td>
                <td>${action_option}</td></tr>`;
                oTable.row.add($(newRow)).draw(false);

                // Initialize Switchery for the new row only
                $('#trid-' + data.id).find('input').each(function () {
                    if (!$(this).data('switchery')) {
                        new Switchery(this, $(this).data());
                    }
                });



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

//update status
$(document).on('change', '#status_change', function () {
    var status = $(this).data('status');
    var update_id = $(this).closest('tr').data('id');
    var cat_td = $(this).parent();
    cat_td.empty().append(`<i class="fa fa-refresh fa-spin"></i>`);
    $.ajax({
        type: "get",
        url: 'work/update/status/' + update_id + "/" + status,
        success: function (data) {
            cat_td.empty().append(`<span class="mx-2">${data.status == 0 ? 'Inactive' : 'Active'}</span><input data-status="${data.status == 1 ? 0 : 1}" id="status_change" type="checkbox" data-toggle="switchery" data-color="green"  data-secondary-color="red" data-size="small" ${data.status == 1 ? 'checked' : ''} />`);
            // parent_td.children('input').each(function (idx, obj) {
            //     new Switchery($(this)[0], $(this).data());
            // });
            new Switchery(cat_td.find('input')[0], cat_td.find('input').data());
        },
        error: function (err) {
            var err_message = err.responseJSON.message.split("(");
            swal({
                icon: "warning",
                title: "Warning !",
                text: err_message[0],
                confirmButtonText: "Ok",
            });
        }
    });
});


$(document).on('click', '#edit_button', function () {
    $('#edit_work_form').trigger('reset');
    $('#edit_work_form .err-mgs').each(function (id, val) {
        $(this).prev('input').removeClass('border-danger is-invalid')
        $(this).prev('textarea').removeClass('border-danger is-invalid')
        $(this).empty();
    })
    let cat = $(this).closest('tr').data('id');

    $.ajax({
        type: "get",
        url: 'work/' + cat + "/edit",
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('#edit_work_form #work_id').val(data.id);
            $('#edit_work_form #work_title').val(data.work_title);
            CKEDITOR.instances['work_details2'].setData(data.work_details);
            $('#edit_work_form #duration').val(data.duration);
            $('#edit_work_form #total_cost').val(data.total_cost);
            $('#edit_work_form #progress').val(data.progress);
            $('#edit_work_form #total_paid').val(data.total_paid);
            $('#edit_work_form #progress_status').val(data.progress_status);
            $('#edit_work_form #work_status').val(data.status);
            $('#edit_work_form #customer_phone').val(data.user.phone);
            $('#edit_work_form #customer_name').val(data.user.name);
            $('#edit_work_form #customer_email').val(data.user.email);
            $('#edit_work_form #customer_address').val(data.user.address);
            $.each(data.translations, function (key, val) {
                if (val.locale == 'en') {
                } else {
                    if (val.key == 'work_title') {
                        $('#edit_work_form #work_title_' + val.locale).val(val.value);
                    }
                    if (val.key == 'work_details') {
                        CKEDITOR.instances['work_details2_' + val.locale].setData(val.value);
                    }
                }
            })
        },
        error: function (err) {
            if (err.status === 403) {
                let err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                }).then(function () {
                    $('button[type=button]', '#edit_work_form').click();
                });

            } else {
                let err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                });
            }
        }
    });

});

$('#edit_work_form').submit(function (e) {
    e.preventDefault();
    $('button[type=submit]', this).html(submit_btn_after + '....');
    $('button[type=submit]', this).addClass('disabled');
    var trid = '#trid-' + $('#work_id', this).val();
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    var formData = new FormData(this);
    formData.append("_method", "PUT");
    $.ajax({
        type: "post",
        url: 'work/' + $('#work_id', '#edit_work_form').val(),
        data: formData,
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            $('button[type=submit]', '#edit_work_form').html(submit_btn_before);
            $('button[type=submit]', '#edit_work_form').removeClass('disabled');
            $('td:nth-child(1)', trid).html(data.work.work_title);
            $('td:nth-child(2)', trid).html(data.work.user.name);
            $('td:nth-child(3)', trid).html(data.work.user.phone);
            $('td:nth-child(4)', trid).html(data.work.work_file);
            $('td:nth-child(5)', trid).html(data.work.duration);
            $('td:nth-child(6)', trid).html(data.work.total_cost);
            $('td:nth-child(7)', trid).html(data.work.total_paid);
            $('td:nth-child(8)', trid).html(data.work.total_cost - data.work.total_paid);
            $('td:nth-child(9)', trid).html(data.work.payment_status);
            $('td:nth-child(10)', trid).html(data.work.progress + " %");
            oTable.rows().invalidate().draw(false);


            swal({
                icon: "success",
                title: data.title,
                text: data.text,
                confirmButtonText: data.confirmButtonText,
            }).then(function () {
                // window.location.reload();
                $('button[type=button]', '#edit_work_form').click();
            });
        },
        error: function (err) {
            $('button[type=submit]', '#edit_work_form').html(submit_btn_before);
            $('button[type=submit]', '#edit_work_form').removeClass('disabled');
            if (err.status === 403) {
                var err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                }).then(function () {
                    $('button[type=button]', '#edit_work_form').click();
                });

            }

            $('#edit_work_form .err-mgs').each(function (id, val) {
                $(this).prev('input').removeClass('border-danger is-invalid')
                $(this).prev('textarea').removeClass('border-danger is-invalid')
                $(this).empty();
            })

            $.each(err.responseJSON.errors, function (idx, val) {

                $('#edit_work_form #' + idx).addClass('border-danger is-invalid')
                $('#edit_work_form #' + idx).next('.err-mgs').empty().append(val);
            })
        }
    });
});


//delete data
$(document).on('click', '#delete_button', function () {
    var delete_id = $(this).closest('tr').data('id');
    swal({
        title: delete_swal_title,
        text: delete_swal_text,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "delete",
                url: 'work/' + delete_id,
                data: {
                    _token: $("input[name=_token]").val(),
                },
                success: function (data) {
                    oTable.rows().invalidate().draw(false);

                    swal({
                        icon: "success",
                        title: data.title,
                        text: data.text,
                        confirmButtonText: data.confirmButtonText,
                    }).then(function () {
                        // Properly remove the row via DataTables
                        oTable.row('#trid-' + delete_id).remove().draw(false);
                    });
                },
                error: function (err) {
                    var err_message = err.responseJSON.message.split("(");
                    swal({
                        icon: "warning",
                        title: "Warning !",
                        text: err_message[0],
                        confirmButtonText: "Ok",
                    });
                }
            });

        } else {
            swal(delete_swal_cancel_text);
        }
    })
});

$(document).on('click', '#work_updates_button', function () {
    $('#add_work_update').trigger('reset');
    $('#add_work_update .err-mgs').each(function (id, val) {
        $(this).prev('input').removeClass('border-danger is-invalid')
        $(this).prev('textarea').removeClass('border-danger is-invalid')
        $(this).empty();
    })
    let cat = $(this).closest('tr').data('id');

    $.ajax({
        type: "get",
        url: 'work/updates/' + cat,
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('#add_work_update #work_id').val(data.work.id);
            $('#add_work_update #work_title').val(data.work.work_title);
            $('#add_work_update #customer_id').val(data.work.user.id);
            $('#add_work_update #customer_name').val(data.work.user.name);
            $('#add_work_update #customer_phone').val(data.work.user.phone);
            $('#add_work_update #request_amount').attr('max', data.work.total_cost - data.work.total_paid);
            $('#add_work_update #request_amount').val(data.work.total_cost - data.work.total_paid);
            $('#add_work_update #paid_amount').attr('max', data.work.total_cost - data.work.total_paid);

            var newRow = ` `;
            var newRowP = ` `;
            wuTable.clear().draw();
            $.each(data.workupdates, function (key, val) {
                console.log(key);

                let update_status_btn = `<span class="badge badge-danger">${no_permission_mgs}</span>`;
                if (data.hasEditPermission) {
                    update_status_btn = `<span class="mx-2">${data.status == 0 ? 'Inactive' : 'Active'}</span><input
                    data-status="${data.status == 0 ? 1 : 0}"
                    id="status_change" type="checkbox" data-toggle="switchery"
                    data-color="green" data-secondary-color="red" data-size="small" checked />`;
                }
                let action_option = `<span class="badge badge-danger">${no_permission_mgs}</span>`;
                if (data.hasAnyPermission) {
                    action_option = `<div class="dropdown"><button class="btn btn-info text-white px-2 py-1 dropbtn">Action <i class="fa fa-angle-down"></i></button> <div class="dropdown-content">`;
                    if (data.hasEditPermission) {
                        action_option = action_option + `<a data-bs-toggle="modal" style="cursor: pointer;" data-bs-target="#edit-updates-modal" class="text-primary" id="edit_updates_button"><i class=" fa fa-edit mx-1"></i>Edit</a>`;
                    }
                    if (data.hasDeletePermission) {
                        action_option = action_option + `<a class="text-danger" id="delete_updates_button" style="cursor: pointer;"><i class="fa fa-trash mx-1"></i> Delete</a>`;
                    }

                    action_option = action_option + `</div></div>`;
                }
                let updatesFile =val.updates_file;
                newRow = newRow + `<tr id="trid-${val.id}" data-id="${val.id}"><td></td><td>${val.updates_details}</td><td>${val.payment?val.payment.asking_payment ?? 0:0}</td><td>${val.payment?val.payment.asking_payment_date:''}</td><td>${val.payment?val.payment.actual_payment ?? 0:0}</td><td>${val.payment?val.payment.actual_payment_date:''}</td><td>${val.customer_feedback??''}</td><td>${updatesFile}</td>
                <td>${action_option}</td></tr>`;
            })

            wuTable.rows.add($(newRow)).draw(false);
            $.each(data.payments, function (key, val) {
                newRowP = newRowP + `<tr id="trid-${val.id}" data-id="${val.id}"><td></td><td>${data.work.work_title}</td><td>${val.asking_payment ?? 0}</td><td>${val.asking_payment_date}</td><td>${val.actual_payment ?? 0}</td><td>${val.actual_payment_date}</td><td>${val.admin_name??''}</td></tr>`;
            })
            paymentTable.clear().draw();
            paymentTable.rows.add($(newRowP)).draw(false);
        },
        error: function (err) {
            if (err.status === 403) {
                let err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                }).then(function () {
                    $('button[type=button]', '#edit_work_form').click();
                });

            } else {
                let err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                });
            }
        }
    });

});

$(document).on('submit', '#add_work_update', function (e) {
    e.preventDefault();
    $('button[type=submit]', this).html(submit_btn_after + '....');
    $('button[type=submit]', this).addClass('disabled');
    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: form_url2,
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (rdata) {
            $('button[type=submit]', '#add_work_update').html(submit_btn_before);
            $('button[type=submit]', '#add_work_update').removeClass('disabled');
            swal({
                icon: "success",
                title: rdata.title,
                text: rdata.text,
                confirmButtonText: rdata.confirmButtonText,
            }).then(function () {
                let data = rdata.workupdates;
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
                        action_option = action_option + `<a data-bs-toggle="modal" style="cursor: pointer;" data-bs-target="#edit-updates-modal" class="text-primary" id="edit_updates_button"><i class=" fa fa-edit mx-1"></i>Edit</a>`;
                    }
                    if (rdata.hasDeletePermission) {
                        action_option = action_option + `<a class="text-danger" id="delete_updates_button" style="cursor: pointer;"><i class="fa fa-trash mx-1"></i> Delete</a>`;
                    }

                    action_option = action_option + `</div></div>`;
                }


                let updatesFile = data.updates_file ;
                let newRow = `<tr id="trid-${data.id}" data-id="${data.id}"><td></td><td>${data.updates_details}</td><td>${data.payment?data.payment.asking_payment ?? 0:0}</td><td>${data.payment?data.payment.asking_payment_date:''}</td><td>${data.payment?data.payment.actual_payment ?? 0 :0}</td><td>${data.payment?data.payment.actual_payment_date:''}</td><td>${updatesFile}</td>
                <td>${action_option}</td></tr>`;
                wuTable.row.add($(newRow)).draw(false);
                reload_flag = true

                $('#right-home-tab').trigger('click');
                $('#right-home-tab').tab('show');


                $('#add_work_update .err-mgs').each(function (id, val) {
                    $(this).prev('input').removeClass('border-danger is-invalid')
                    $(this).prev('textarea').removeClass('border-danger is-invalid')
                    $(this).empty();
                })
                $('#add_work_update').trigger('reset');
                // $('button[type=button]', '#add_work_update').click();
            })
        },
        error: function (err) {
            $('button[type=submit]', '#add_work_update').html(submit_btn_before);
            $('button[type=submit]', '#add_work_update').removeClass('disabled');
            if (err.status === 403) {
                var err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                }).then(function () {
                    $('button[type=button]', '#add_work_update').click();
                });

            }

            $('#add_work_update .err-mgs').each(function (id, val) {
                $(this).prev('input').removeClass('border-danger is-invalid')
                $(this).prev('textarea').removeClass('border-danger is-invalid')
                $(this).prev('span').find('.select2-selection--single').attr('id', '')
                $(this).empty();
            })
            $.each(err.responseJSON.errors, function (idx, val) {
                // console.log('#add_course_form #'+idx);
                var exp = idx.replace('.', '_');
                var exp2 = exp.replace('_0', '');

                $('#add_work_update #' + exp).addClass('border-danger is-invalid')
                $('#add_work_update #' + exp2).addClass('border-danger is-invalid')
                $('#add_work_update #' + exp).next('span').find('.select2-selection--single').attr('id', 'invalid-selec2')
                $('#add_work_update #' + exp).next('.err-mgs').empty().append(val);

                $('#add_work_update #' + exp + "_err").empty().append(val);
            })
        },
    })
});
$('#edit-updates-modal').on('show.bs.modal', function () {
  $('#work-updates-modal .modal-content').addClass('blur');
});

$('#edit-updates-modal').on('hidden.bs.modal', function () {
  $('#work-updates-modal .modal-content').removeClass('blur');
});


$(document).on('click', '#edit_updates_button', function () {
    $('#edit_work_update').trigger('reset');
    $('#edit_work_update .err-mgs').each(function (id, val) {
        $(this).prev('input').removeClass('border-danger is-invalid')
        $(this).prev('textarea').removeClass('border-danger is-invalid')
        $(this).empty();
    })
    let cat = $(this).closest('tr').data('id');

    $.ajax({
        type: "get",
        url: 'work/updates/' + cat + "/edit",
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('#edit_work_update #work_updates_id').val(data.id);
            $('#edit_work_update #updates_note').val(data.updates_note);
            CKEDITOR.instances['updates_details2'].setData(data.updates_details);
            $('#edit_work_update #checkbox-primary').attr('checked',data.payment?true:false);
            if(data.payment){
                $('#edit_work_update #request_amount_div').show();
                $('#edit_work_update #request_amount').val(data.payment.asking_payment);
                $('#edit_work_update #paid_amount').val(data.payment.actual_payment);
                $('#edit_work_update #payment_last_date').val(data.payment.actual_payment_date);
            }else{
                $('#edit_work_update #request_amount_div').hide();
                $('#edit_work_update #request_amount').val('');
                $('#edit_work_update #paid_amount').val('');
                $('#edit_work_update #payment_last_date').val('');
            }
            $('#edit_work_update #work_title').val(data.work.work_title);
            $('#edit_work_update #customer_phone').val(data.user.phone);
            $('#edit_work_update #customer_name').val(data.user.name);
            $.each(data.translations, function (key, val) {
                if (val.locale == 'en') {
                } else {
                    if (val.key == 'updates_note') {
                        $('#edit_work_update #updates_note_' + val.locale).val(val.value);
                    }
                    if (val.key == 'updates_details') {
                        CKEDITOR.instances['updates_details2_' + val.locale].setData(val.value);
                    }
                }
            })
        },
        error: function (err) {
            if (err.status === 403) {
                let err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                }).then(function () {
                    $('button[type=button]', '#edit_work_update').click();
                });

            } else {
                let err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                });
            }
        }
    });

});

$('#edit_work_update').submit(function (e) {
    e.preventDefault();
    $('button[type=submit]', this).html(submit_btn_after + '....');
    $('button[type=submit]', this).addClass('disabled');
    var trid = '#trid-' + $('#work_updates_id', this).val();
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    var formData = new FormData(this);
    formData.append("_method", "PUT");
    $.ajax({
        type: "post",
        url: 'work/updates/' + $('#work_updates_id', '#edit_work_update').val(),
        data: formData,
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            $('button[type=submit]', '#edit_work_update').html(submit_btn_before);
            $('button[type=submit]', '#edit_work_update').removeClass('disabled');

            $('td:nth-child(2)', '#basic-2 tbody '+trid).html(data.work.updates_details);

            $('td:nth-child(3)', '#basic-2 tbody '+trid).html(data.work.payment?data.work.payment.asking_payment:0);
            $('td:nth-child(4)', '#basic-2 tbody '+trid).html(data.work.payment?data.work.payment.asking_payment_date:'');
            $('td:nth-child(5)', '#basic-2 tbody '+trid).html(data.work.payment?data.work.payment.actual_payment:0);
            $('td:nth-child(6)', '#basic-2 tbody '+trid).html(data.work.payment?data.work.payment.actual_payment_date:'');
            $('td:nth-child(7)', '#basic-2 tbody '+trid).html(data.work.updates_file);
            oTable.rows().invalidate().draw(false);
            wuTable.rows().invalidate().draw(false);
            reload_flag = true

            swal({
                icon: "success",
                title: data.title,
                text: data.text,
                confirmButtonText: data.confirmButtonText,
            }).then(function () {
                // window.location.reload();
                $('button[type=button]', '#edit_work_update').click();
            });
        },
        error: function (err) {
            $('button[type=submit]', '#edit_work_update').html(submit_btn_before);
            $('button[type=submit]', '#edit_work_update').removeClass('disabled');
            if (err.status === 403) {
                var err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                }).then(function () {
                    $('button[type=button]', '#edit_work_update').click();
                });

            }

            $('#edit_work_form .err-mgs').each(function (id, val) {
                $(this).prev('input').removeClass('border-danger is-invalid')
                $(this).prev('textarea').removeClass('border-danger is-invalid')
                $(this).empty();
            })

            $.each(err.responseJSON.errors, function (idx, val) {

                $('#edit_work_update #' + idx).addClass('border-danger is-invalid')
                $('#edit_work_update #' + idx).next('.err-mgs').empty().append(val);
            })
        }
    });
});
$('#work-updates-modal').on('hidden.bs.modal', function () {
  // Your code here
  if(reload_flag==true){
    window.location.reload();
  }
});
$('#edit-updates-modal').on('hidden.bs.modal', function () {
  $('#work-updates-modal .modal-dialog').removeClass('modal-blur');

  // re-enable scrolling if background modal still open
  if ($('.modal.show').length) {
    $('body').addClass('modal-open');
  }
});

//delete data
$(document).on('click', '#delete_updates_button', function () {
    var delete_id = $(this).closest('tr').data('id');
    swal({
        title: delete_swal_title,
        text: delete_swal_text,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "delete",
                url: 'work/updates/' + delete_id,
                data: {
                    _token: $("input[name=_token]").val(),
                },
                success: function (data) {
                    wuTable.rows().invalidate().draw(false);

                    swal({
                        icon: "success",
                        title: data.title,
                        text: data.text,
                        confirmButtonText: data.confirmButtonText,
                    }).then(function () {
                        // Properly remove the row via DataTables
                        reload_flag=true;
                        wuTable.row('#trid-' + delete_id).remove().draw(false);
                    });
                },
                error: function (err) {
                    var err_message = err.responseJSON.message.split("(");
                    swal({
                        icon: "warning",
                        title: "Warning !",
                        text: err_message[0],
                        confirmButtonText: "Ok",
                    });
                }
            });

        } else {
            swal(delete_swal_cancel_text);
        }
    })
});
