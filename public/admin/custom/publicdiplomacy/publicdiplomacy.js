$(document).on('submit', '#add_publicdiplomacy_form', function (e) {
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
            $('button[type=submit]', '#add_publicdiplomacy_form').html(submit_btn_before);
            $('button[type=submit]', '#add_publicdiplomacy_form').removeClass('disabled');
            swal({
                icon: "success",
                title: rdata.title,
                text: rdata.text,
                confirmButtonText: rdata.confirmButtonText,
            }).then(function () {
                let data = rdata.publicdiplomacy;
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

                var publicdiplomacyImgs = data.image?'<img  height="50px" style="border: 1px solid black;margin-right:2px;" src="' + base_url + '/' + data.image + '">' : '';
               

                $('#basic-1 tbody').append(`<tr id="trid-${data.id}" data-id="${data.id}"><td>${publicdiplomacyImgs}</td><td>${data.title}</td><td>${data.name}</td><td>${data.country.name}</td><td>${data.link}</td>
                <td class="text-center">${update_status_btn}</td>
                <td>${action_option}</td></tr>`);

                new Switchery($('#trid-' + data.id).find('input')[0], $('#trid-' + data.id).find('input').data());

                $('#add_publicdiplomacy_form .err-mgs').each(function (id, val) {
                    $(this).prev('input').removeClass('border-danger is-invalid')
                    $(this).prev('textarea').removeClass('border-danger is-invalid')
                    $(this).empty();
                })
                $('#add_publicdiplomacy_form').trigger('reset');
                $('button[type=button]', '#add_publicdiplomacy_form').click();
            })
        },
        error: function (err) {
            $('button[type=submit]', '#add_publicdiplomacy_form').html(submit_btn_before);
            $('button[type=submit]', '#add_publicdiplomacy_form').removeClass('disabled');
            if (err.status === 403) {
                var err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                }).then(function () {
                    $('button[type=button]', '#add_publicdiplomacy_form').click();
                });

            }

            $('#add_publicdiplomacy_form .err-mgs').each(function (id, val) {
                $(this).prev('input').removeClass('border-danger is-invalid')
                $(this).prev('textarea').removeClass('border-danger is-invalid')
                $(this).prev('span').find('.select2-selection--single').attr('id', '')
                $(this).empty();
            })
            $.each(err.responseJSON.errors, function (idx, val) {
                // console.log('#add_course_form #'+idx);
                var exp = idx.replace('.', '_');
                var exp2 = exp.replace('_0', '');

                $('#add_publicdiplomacy_form #' + exp).addClass('border-danger is-invalid')
                $('#add_publicdiplomacy_form #' + exp2).addClass('border-danger is-invalid')
                $('#add_publicdiplomacy_form #' + exp).next('span').find('.select2-selection--single').attr('id', 'invalid-selec2')
                $('#add_publicdiplomacy_form #' + exp).next('.err-mgs').empty().append(val);

                $('#add_publicdiplomacy_form #' + exp + "_err").empty().append(val);
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
        url: 'public-diplomacy/update/status/' + update_id + "/" + status,
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
    $('#edit_publicdiplomacy_form').trigger('reset');
    $('#edit_publicdiplomacy_form .err-mgs').each(function (id, val) {
        $(this).prev('input').removeClass('border-danger is-invalid')
        $(this).prev('textarea').removeClass('border-danger is-invalid')
        $(this).empty();
    })
    let cat = $(this).closest('tr').data('id');
    // alert(cat);
    $.ajax({
        type: "get",
        url: 'public-diplomacy/' + cat + "/edit",
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('#edit_publicdiplomacy_form #publicdiplomacy_id').val(data.id);
            $('#edit_publicdiplomacy_form #publicdiplomacy_title').val(data.title);
            $('#edit_publicdiplomacy_form #publicdiplomacy_name').val(data.name);
            $('#edit_publicdiplomacy_form #country_id').val(data.country.id);
            $('#edit_publicdiplomacy_form #link').val(data.link);
            $('#edit_publicdiplomacy_form #prev_image').attr('src', base_url + '/' + data.image);
            
            $.each(data.translations, function (key, val) {
                if (val.locale == 'en') {
                } else {
                    if (val.key == 'title') {
                        $('#edit_publicdiplomacy_form #publicdiplomacy_title_' + val.locale).val(val.value);
                    }
                    if (val.key == 'name') {
                        $('#edit_publicdiplomacy_form #publicdiplomacy_name_' + val.locale).val(val.value);
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
                    $('button[type=button]', '#edit_publicdiplomacy_form').click();
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

$('#edit_publicdiplomacy_form').submit(function (e) {
    e.preventDefault();
    $('button[type=submit]', this).html(submit_btn_after + '....');
    $('button[type=submit]', this).addClass('disabled');
    var trid = '#trid-' + $('#publicdiplomacy_id', this).val();
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    var formData = new FormData(this);
    formData.append("_method", "PUT");
    $.ajax({
        type: "post",
        url: 'public-diplomacy/' + $('#publicdiplomacy_id', '#edit_publicdiplomacy_form').val(),
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
            $('button[type=submit]', '#edit_publicdiplomacy_form').html(submit_btn_before);
            $('button[type=submit]', '#edit_publicdiplomacy_form').removeClass('disabled');
            var publicdiplomacyImgs = data.publicdiplomacy.image;
            var pImages = publicdiplomacyImgs?`<img  height="50px" style="border: 1px solid black;margin-right:2px;" src="${base_url + '/' + publicdiplomacyImgs}">`:'';
            
            $('td:nth-child(1)', trid).html(pImages);
            $('td:nth-child(2)', trid).html(data.publicdiplomacy.title);
            $('td:nth-child(3)', trid).html(data.publicdiplomacy.name);
            $('td:nth-child(4)', trid).html(data.publicdiplomacy.country.name);
            
            swal({
                icon: "success",
                title: data.title,
                text: data.text,
                confirmButtonText: data.confirmButtonText,
            }).then(function () {
                // window.location.reload();
                $('button[type=button]', '#edit_publicdiplomacy_form').click();
            });
        },
        error: function (err) {
            $('button[type=submit]', '#edit_publicdiplomacy_form').html(submit_btn_before);
            $('button[type=submit]', '#edit_publicdiplomacy_form').removeClass('disabled');
            if (err.status === 403) {
                var err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                }).then(function () {
                    $('button[type=button]', '#edit_publicdiplomacy_form').click();
                });

            }

            $('#edit_publicdiplomacy_form .err-mgs').each(function (id, val) {
                $(this).prev('input').removeClass('border-danger is-invalid')
                $(this).prev('textarea').removeClass('border-danger is-invalid')
                $(this).empty();
            })

            $.each(err.responseJSON.errors, function (idx, val) {

                $('#edit_publicdiplomacy_form #' + idx).addClass('border-danger is-invalid')
                $('#edit_publicdiplomacy_form #' + idx).next('.err-mgs').empty().append(val);
            })
        }
    });
});

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
                url: 'public-diplomacy/' + delete_id,
                data: {
                    _token: $("input[name=_token]").val(),
                },
                success: function (data) {
                    swal({
                        icon: "success",
                        title: data.title,
                        text: data.text,
                        confirmButtonText: data.confirmButtonText,
                    }).then(function () {
                        $('#trid-' + delete_id).hide();
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