$(document).on('submit', '#add_project_form', function (e) {
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
            $('button[type=submit]', '#add_project_form').html(submit_btn_before);
            $('button[type=submit]', '#add_project_form').removeClass('disabled');
            swal({
                icon: "success",
                title: rdata.title,
                text: rdata.text,
                confirmButtonText: rdata.confirmButtonText,
            }).then(function () {
                let data = rdata.project;
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

                var projectImgs = JSON.parse(data.images);
                var projectM_image =``;
                $.each(projectImgs,function(key,val){
                    projectM_image += val ? '<img  height="50px" style="border: 1px solid black;margin-right:2px;" src="' + base_url + '/' + val + '">' : '';
                })

                $('#basic-1 tbody').append(`<tr id="trid-${data.id}" data-id="${data.id}"><td>${projectM_image}</td><td>${data.title}</td><td>${data.details}</td><td>${data.type}</td>
                <td class="text-center">${update_status_btn}</td>
                <td>${action_option}</td></tr>`);

                new Switchery($('#trid-' + data.id).find('input')[0], $('#trid-' + data.id).find('input').data());

                $('#add_project_form .err-mgs').each(function (id, val) {
                    $(this).prev('input').removeClass('border-danger is-invalid')
                    $(this).prev('textarea').removeClass('border-danger is-invalid')
                    $(this).empty();
                })
                $('#add_project_form').trigger('reset');
                $('button[type=button]', '#add_project_form').click();
            })
        },
        error: function (err) {
            $('button[type=submit]', '#add_project_form').html(submit_btn_before);
            $('button[type=submit]', '#add_project_form').removeClass('disabled');
            if (err.status === 403) {
                var err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                }).then(function () {
                    $('button[type=button]', '#add_project_form').click();
                });

            }

            $('#add_project_form .err-mgs').each(function (id, val) {
                $(this).prev('input').removeClass('border-danger is-invalid')
                $(this).prev('textarea').removeClass('border-danger is-invalid')
                $(this).prev('span').find('.select2-selection--single').attr('id', '')
                $(this).empty();
            })
            $.each(err.responseJSON.errors, function (idx, val) {
                // console.log('#add_course_form #'+idx);
                var exp = idx.replace('.', '_');
                var exp2 = exp.replace('_0', '');

                $('#add_project_form #' + exp).addClass('border-danger is-invalid')
                $('#add_project_form #' + exp2).addClass('border-danger is-invalid')
                $('#add_project_form #' + exp).next('span').find('.select2-selection--single').attr('id', 'invalid-selec2')
                $('#add_project_form #' + exp).next('.err-mgs').empty().append(val);

                $('#add_project_form #' + exp + "_err").empty().append(val);
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
        url: 'project/update/status/' + update_id + "/" + status,
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
    $('#edit_project_form').trigger('reset');
    $('#edit_project_form .err-mgs').each(function (id, val) {
        $(this).prev('input').removeClass('border-danger is-invalid')
        $(this).prev('textarea').removeClass('border-danger is-invalid')
        $(this).empty();
    })
    let cat = $(this).closest('tr').data('id');
    // alert(cat);
    $.ajax({
        type: "get",
        url: 'project/' + cat + "/edit",
        dataType: 'JSON',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('#edit_project_form #project_id').val(data.id);
            $('#edit_project_form #project_title').val(data.title);
            $('#edit_project_form #project_type').val(data.type);
            $('#edit_project_form #video_link').val(data.video_link);

           
            CKEDITOR.instances['project_details2'].setData(data.details);

            var projectImgs = JSON.parse(data.images);
            
            $.each(data.translations, function (key, val) {
                if (val.locale == 'en') {
                } else {
                    if (val.key == 'title') {
                        $('#edit_project_form #project_title_' + val.locale).val(val.value);
                    }
                    if (val.key == 'details') {
                        CKEDITOR.instances['project_details2_' + val.locale].setData(val.value);
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
                    $('button[type=button]', '#edit_project_form').click();
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

$('#edit_project_form').submit(function (e) {
    e.preventDefault();
    $('button[type=submit]', this).html(submit_btn_after + '....');
    $('button[type=submit]', this).addClass('disabled');
    var trid = '#trid-' + $('#project_id', this).val();
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    var formData = new FormData(this);
    formData.append("_method", "PUT");
    $.ajax({
        type: "post",
        url: 'project/' + $('#project_id', '#edit_project_form').val(),
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
            $('button[type=submit]', '#edit_project_form').html(submit_btn_before);
            $('button[type=submit]', '#edit_project_form').removeClass('disabled');
            var projectImgs = JSON.parse(data.project.images);
            var pImages = ``;
            $.each(projectImgs,function(key,val){
                pImages += `<img  height="50px" style="border: 1px solid black;margin-right:2px;" src="${base_url + '/' + projectImgs[0]}">`
            });
            $('td:nth-child(1)', trid).html(pImages);
            $('td:nth-child(2)', trid).html(data.project.title);
            $('td:nth-child(3)', trid).html(data.project.details);
            $('td:nth-child(4)', trid).html(data.project.type);
            
            swal({
                icon: "success",
                title: data.title,
                text: data.text,
                confirmButtonText: data.confirmButtonText,
            }).then(function () {
                // window.location.reload();
                $('button[type=button]', '#edit_project_form').click();
            });
        },
        error: function (err) {
            $('button[type=submit]', '#edit_project_form').html(submit_btn_before);
            $('button[type=submit]', '#edit_project_form').removeClass('disabled');
            if (err.status === 403) {
                var err_message = err.responseJSON.message.split("(");
                swal({
                    icon: "warning",
                    title: "Warning !",
                    text: err_message[0],
                    confirmButtonText: "Ok",
                }).then(function () {
                    $('button[type=button]', '#edit_project_form').click();
                });

            }

            $('#edit_project_form .err-mgs').each(function (id, val) {
                $(this).prev('input').removeClass('border-danger is-invalid')
                $(this).prev('textarea').removeClass('border-danger is-invalid')
                $(this).empty();
            })

            $.each(err.responseJSON.errors, function (idx, val) {

                $('#edit_project_form #' + idx).addClass('border-danger is-invalid')
                $('#edit_project_form #' + idx).next('.err-mgs').empty().append(val);
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
                url: 'project/' + delete_id,
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
