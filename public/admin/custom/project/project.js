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

                var projectImgs = JSON.parse(data.project_images);

                let projectM_image = projectImgs[0] ? '<img style="height: 50px;width:50px;" src="' + base_url + '/' + projectImgs[0] + '">' : no_file;

                var projectPoints = '';
                if (data.project_points != '') {
                    projectPoints = projectPoints + `<ul>`;
                    $.each(JSON.parse(data.project_points), function (key, val) {
                        projectPoints = projectPoints + `<li>${(key + 1) + ". " + val}</li>`;
                    })
                    projectPoints = projectPoints + `</ul>`;
                }

                $('#basic-1 tbody').append(`<tr id="trid-${data.id}" data-id="${data.id}"><td>${projectM_image}</td><td>${data.project_name}</td><td>${data.project_category}</td><td>${data.project_quotes}</td><td>${projectPoints}</td>
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
            $('#edit_project_form #project_name').val(data.project_name);
            $('#edit_project_form #project_category').val(data.project_category);
            $('#edit_project_form #project_quotes').val(data.project_quotes);

            if (data.project_points != '') {
                 $("#edit_project_form #project_points").first().closest('.row').next('div').empty();
                $.each(JSON.parse(data.project_points), function (key, val) {
                    if (key == 0) {
                        $("#edit_project_form #project_points").first().val(val);
                    } else {
                        $("#edit_project_form #project_points").first().closest('.row').next('div').append(`
                            <div class="row">
                                <div class="form-group col-md-10">
                                    <label for="">${projPoint}  ( ${defa} )</label>
                                    <input type="text" class="form-control" name="project_points[]"
                                        id="project_points" value="${val}">
                                    <span class="text-danger err-mgs" id="project_points_err"></span>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for=""> &nbsp;</label><br>
                                    <button style="float:right;" type="button" id="remove_point_btn"
                                        class="btn btn-danger">-</button>
                                </div>
                            </div>
                        `);
                        // $("#edit_project_form #project_points").eq(key).val(val);
                    }
                })
            }
            CKEDITOR.instances['project_details2'].setData(data.project_details);

            var projectImgs = JSON.parse(data.project_images);
            $('#edit_project_form #eprev_project_image').prop('src', base_url + "/" + projectImgs[0]);
            $('#edit_project_form #eprev_project_image_2').prop('src', base_url + "/" + projectImgs[1]);

            $.each(data.translations, function (key, val) {
                if (val.locale == 'en') {
                } else {
                    if (val.key == 'project_name') {
                        $('#edit_project_form #project_name_' + val.locale).val(val.value);
                    }
                    if (val.key == 'project_category') {
                        $('#edit_project_form #project_category_' + val.locale).val(val.value);
                    }
                    if (val.key == 'project_quotes') {
                        $('#edit_project_form #project_quotes_' + val.locale).val(val.value);
                    }
                    if (val.key == 'project_details') {
                        CKEDITOR.instances['project_details2_' + val.locale].setData(val.value);
                    }
                    if (val.key == 'project_points') {
                        if (val.value != '') {
                            $("#edit_project_form #project_points_" + val.locale).first().closest('.row').next('#append_lang_points_'+val.locale).empty();
                            $.each(JSON.parse(val.value), function (keyyy, vallll) {
                                if (keyyy == 0) {
                                    $('#edit_project_form #project_points_' + val.locale).first().val(vallll);
                                } else {
                                    $("#edit_project_form #project_points_" + val.locale).first().closest('.row').next('#append_lang_points_'+val.locale).append(`
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <label for="">${projPoint}  ( ${val.LangName} )</label>
                                                <input type="text" class="form-control" name="project_points_${val.locale}[]"
                                                    id="project_points_${val.locale}" value="${vallll}">
                                                <span class="text-danger err-mgs" id="project_points_err"></span>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for=""> &nbsp;</label><br>
                                                <button style="float:right;" type="button" id="remove_point_btn"
                                                    class="btn btn-danger">-</button>
                                            </div>
                                        </div>
                                    `);
                                }
                            });
                        }
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
            var projectImgs = JSON.parse(data.project.project_images);
            $('td:nth-child(1)', trid).html(projectImgs[0] ? `<img style="height: 50px;" src="${base_url + '/' + projectImgs[0]}">` : no_file);
            $('td:nth-child(2)', trid).html(data.project.project_name);
            $('td:nth-child(3)', trid).html(data.project.project_category);
            $('td:nth-child(4)', trid).html(data.project.quotes);
            var projectPoints = '';
            if (data.project.project_points != '') {
                projectPoints = projectPoints + `<ul>`;
                $.each(JSON.parse(data.project.project_points), function (key, val) {
                    projectPoints = projectPoints + `<li>${(key + 1) + ". " + val}</li>`;
                })
                projectPoints = projectPoints + `</ul>`;
            }
            $('td:nth-child(5)', trid).html(projectPoints);
            // $('td:nth-child(6)', trid).html(data.team.team_member_address);
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
