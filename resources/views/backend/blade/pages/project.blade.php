 @extends('backend.shared.layouts.admin')
 @push('title')
     {{ __('admin_local.Projects') }}
 @endpush
 @push('css')
     <link rel="stylesheet" href="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/assets/css/custom.css') }}">
 @endpush
 @push('page_css')
     <style>
         .loader-box {
             height: auto;
             padding: 10px 0px;
         }

         .loader-box .loader-35:after {
             height: 20px;
             width: 10px;
         }

         .loader-box .loader-35:before {
             width: 20px;
             height: 10px;
         }

         .cke_contents {
             border: 2px dashed #5c61f2 !important;
             border-radius: 0px 0px 10px 10px
         }

         .cke_top {
             border: 2px dashed #5c61f2 !important;
             border-bottom: 0px !important;
             border-radius: 10px 10px 0px 0px
         }

         .invalid-selec2 {
             border-color: red !important;
         }
     </style>
 @endpush
 @section('content')
     {{-- Add User Modal Start --}}

     <div class="modal fade" id="add-project-modal" tabindex="-1" aria-labelledby="bs-example-modal-lg" aria-hidden="true">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header d-flex align-items-center" style="border-bottom:1px dashed gray">
                     <h4 class="modal-title" id="myLargeModalLabel">
                         {{ __('admin_local.Add project') }}
                     </h4>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>

                 <p class="px-3 text-danger">
                     <i>{{ __('admin_local.The field labels marked with * are required input fields.') }}</i>
                 </p>
                 <div class="modal-body" style="margin-top: -20px">
                     <form method="POSt" action="" id="add_project_form" enctype="multipart/form-data">
                         @csrf
                         <div class="row">
                             <div class="col-sm-12 col-xl-12">
                                 <ul class="nav nav-pills nav-primary my-0" id="pills-successtab" role="tablist">
                                     @php
                                         $lang = \App\Models\Admin\Language::where([
                                             ['status', 1],
                                             ['delete', 0],
                                             ['default', 1],
                                         ])->first();
                                     @endphp
                                     <li class="nav-item"><a class="nav-link active" id="pills-defaultLang-tab"
                                             data-bs-toggle="pill" href="#pills-defaultLang" role="tab"
                                             aria-controls="pills-defaultLang" aria-selected="true">{{ $lang->name }}
                                             ( {{ __('admin_local.Default') }} )</a></li>
                                     @foreach (getLangs() as $lang)
                                         <li class="nav-item"><a class="nav-link" id="pills-{{ $lang->name }}-tab"
                                                 data-bs-toggle="pill" href="#pills-{{ $lang->name }}" role="tab"
                                                 aria-controls="pills-{{ $lang->name }}"
                                                 aria-selected="true">{{ $lang->name }}</a></li>
                                     @endforeach
                                 </ul>
                                 <div class="tab-content mt-3" id="pills-successtabContent">
                                     <div class="tab-pane fade show active" id="pills-defaultLang" role="tabpanel"
                                         aria-labelledby="pills-defaultLang-tab">
                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.Project Name') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <input type="text" class="form-control" name="project_name"
                                                 id="project_name">
                                             <span class="text-danger err-mgs" id="project_name_err"></span>
                                         </div>

                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.Project Category') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <input type="text" class="form-control" name="project_category"
                                                 id="project_category">
                                             <span class="text-danger err-mgs" id="project_category_err"></span>
                                         </div>

                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.Project Quotes') }} (
                                                 {{ __('admin_local.Default') }} )</label>
                                             <input type="text" class="form-control" name="project_quotes"
                                                 id="project_quotes">
                                             <span class="text-danger err-mgs" id="project_quotes_err"></span>
                                         </div>
                                         <div class="row">
                                             <div class="form-group col-md-10">
                                                 <label for="">{{ __('admin_local.Project Points') }} (
                                                     {{ __('admin_local.Default') }} )</label>
                                                 <input type="text" class="form-control" name="project_points[]"
                                                     id="project_points">
                                                 <span class="text-danger err-mgs" id="project_points_err"></span>
                                             </div>
                                             <div class="form-group col-md-2">
                                                 <label for=""> &nbsp;</label><br>
                                                 <button style="float:right" type="button" id="add_more_point_btn"
                                                     class="btn btn-success">+</button>
                                             </div>
                                         </div>
                                         <div>

                                         </div>
                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.Project Details') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <textarea class="form-control ckeditorappend" name="project_details" id="project_details"></textarea>
                                             <span class="text-danger err-mgs" id="project_details_err"></span>
                                         </div>
                                     </div>
                                     <script>
                                         var langCode = [];
                                     </script>
                                     @foreach (getLangs() as $lang)
                                         <script>
                                             langCode.push("{{ $lang->lang }}");
                                         </script>
                                         <div class="tab-pane fade" id="pills-{{ $lang->name }}" role="tabpanel"
                                             aria-labelledby="pills-{{ $lang->name }}-tab">
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Project Name') }} (
                                                     {{ $lang->name }} )</label>
                                                 <input type="text" class="form-control"
                                                     name="project_name_{{ $lang->lang }}"
                                                     id="project_name_{{ $lang->lang }}">
                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Project Category') }} (
                                                     {{ $lang->name }} ) </label>
                                                 <input type="text" class="form-control"
                                                     name="project_category_{{ $lang->lang }}"
                                                     id="project_category_{{ $lang->lang }}">
                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Project Quotes') }} (
                                                     {{ $lang->name }} ) </label>
                                                 <input type="text" class="form-control"
                                                     name="project_quotes_{{ $lang->lang }}"
                                                     id="project_quotes_{{ $lang->lang }}">
                                             </div>
                                             <div class="row">
                                                 <div class="form-group col-md-10">
                                                     <label for="">{{ __('admin_local.Project Points') }} (
                                                         {{ $lang->name }} ) *</label>
                                                     <input type="text" class="form-control"
                                                         name="project_points_{{ $lang->lang }}[]" id="project_points">
                                                     <span class="text-danger err-mgs" id="project_points_err"></span>
                                                 </div>
                                                 <div class="form-group col-md-2">
                                                     <label for="">&nbsp;
                                                     </label><br>
                                                     <button type="button" style="float:right" data-lang_name='{{ $lang->name }}' data-lang='{{ $lang->lang }}'
                                                         id="add_more_point_btn2" class="btn btn-success">+</button>
                                                 </div>
                                             </div>
                                             <div>

                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Project Details') }} (
                                                     {{ $lang->name }} ) </label>
                                                 <textarea class="form-control" name="project_details_{{ $lang->lang }}" id="project_details_{{ $lang->lang }}"></textarea>
                                             </div>
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12 col-xl-6">
                                 <div class="row">
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Project Image') }} (399X529)
                                             *</label>
                                         <input type="file" class="form-control" name="project_image"
                                             id="project_image" accept="image/*"
                                             onchange="document.getElementById('prev_project_image').src = window.URL.createObjectURL(this.files[0])">
                                         <span class="text-danger err-mgs" id="project_image_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Preview project Icon') }}
                                             *</label><br>
                                         <img src="" id="prev_project_image" alt="" height="529px"
                                             width="100%">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-12 col-xl-6">
                                 <div class="row">
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Project Image') }} 2 (770X435)
                                             *</label>
                                         <input type="file" class="form-control" name="project_image_2"
                                             id="project_image_2" accept="image/*"
                                             onchange="document.getElementById('prev_project_image_2').src = window.URL.createObjectURL(this.files[0])">
                                         <span class="text-danger err-mgs" id="project_image_2_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Preview project Icon') }}
                                             *</label><br>
                                         <img src="" id="prev_project_image_2" alt="" height="435px"
                                             width="100%">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row mt-4 mb-2">
                             <div class="form-group col-lg-12">
                                 <button class="btn btn-danger text-white font-weight-medium waves-effect text-start"
                                     data-bs-dismiss="modal" style="float: right"
                                     type="button">{{ __('admin_local.Close') }}</button>
                                 <button class="btn btn-primary mx-2" style="float: right" type="submit"><strong><i
                                             class="fa fa-paper-plane"></i> &nbsp;
                                         {{ __('admin_local.Submit') }}</strong></button>
                             </div>

                         </div>
                     </form>
                 </div>

             </div>
             <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
     </div>

     {{-- Add User Modal End --}}

     {{-- Add User Modal Start --}}

     <div class="modal fade" id="edit-project-modal" tabindex="-1" aria-labelledby="bs-example-modal-lg"
         aria-hidden="true">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header d-flex align-items-center" style="border-bottom:1px dashed gray">
                     <h4 class="modal-title" id="myLargeModalLabel">
                         {{ __('admin_local.Edit  project') }}
                     </h4>
                     <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <p class="px-3 text-danger">
                     <i>{{ __('admin_local.The field labels marked with * are required input fields.') }}</i>
                 </p>
                 <div class="modal-body" style="margin-top: -20px">
                     <form id="edit_project_form" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                         <input type="hidden" id="project_id" name="project_id" value="">
                         <div class="row">
                             <div class="col-sm-12 col-xl-12">
                                 <ul class="nav nav-pills nav-primary my-0" id="pills-successtab" role="tablist">
                                     @php
                                         $lang = \App\Models\Admin\Language::where([
                                             ['status', 1],
                                             ['delete', 0],
                                             ['default', 1],
                                         ])->first();
                                     @endphp
                                     <li class="nav-item"><a class="nav-link active" id="epills-defaultLang-tab"
                                             data-bs-toggle="pill" href="#epills-defaultLang" role="tab"
                                             aria-controls="epills-defaultLang" aria-selected="true">{{ $lang->name }}
                                             ( {{ __('admin_local.Default') }} )</a></li>
                                     @foreach (getLangs() as $lang)
                                         <li class="nav-item"><a class="nav-link" id="epills-{{ $lang->name }}-tab"
                                                 data-bs-toggle="pill" href="#epills-{{ $lang->name }}" role="tab"
                                                 aria-controls="epills-{{ $lang->name }}"
                                                 aria-selected="true">{{ $lang->name }}</a></li>
                                     @endforeach
                                 </ul>
                                 <div class="tab-content mt-3" id="epills-successtabContent">
                                     <div class="tab-pane fade show active" id="epills-defaultLang" role="tabpanel"
                                         aria-labelledby="epills-defaultLang-tab">
                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.Project Name') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <input type="text" class="form-control" name="project_name"
                                                 id="project_name">
                                             <span class="text-danger err-mgs" id="project_name_err"></span>
                                         </div>

                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.Project Category') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <input type="text" class="form-control" name="project_category"
                                                 id="project_category">
                                             <span class="text-danger err-mgs" id="project_category_err"></span>
                                         </div>

                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.Project Quotes') }} (
                                                 {{ __('admin_local.Default') }} )</label>
                                             <input type="text" class="form-control" name="project_quotes"
                                                 id="project_quotes">
                                             <span class="text-danger err-mgs" id="project_quotes_err"></span>
                                         </div>
                                         <div class="row">
                                             <div class="form-group col-md-10">
                                                 <label for="">{{ __('admin_local.Project Points') }} (
                                                     {{ __('admin_local.Default') }} )</label>
                                                 <input type="text" class="form-control" name="project_points[]"
                                                     id="project_points">
                                                 <span class="text-danger err-mgs" id="project_points_err"></span>
                                             </div>
                                             <div class="form-group col-md-2">
                                                 <label for=""> &nbsp;</label><br>
                                                 <button style="float:right" type="button" id="add_more_point_btn"
                                                     class="btn btn-success">+</button>
                                             </div>
                                         </div>
                                         <div>

                                         </div>
                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.Project Details') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <textarea class="form-control ckeditorappend" name="project_details" id="project_details2"></textarea>
                                             <span class="text-danger err-mgs" id="project_details_err"></span>
                                         </div>
                                     </div>
                                     <script>
                                         var langCode = [];
                                     </script>
                                     @foreach (getLangs() as $lang)
                                         <script>
                                             langCode.push("{{ $lang->lang }}");
                                         </script>
                                         <div class="tab-pane fade" id="epills-{{ $lang->name }}" role="tabpanel"
                                             aria-labelledby="epills-{{ $lang->name }}-tab">
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Project Name') }} (
                                                     {{ $lang->name }} )</label>
                                                 <input type="text" class="form-control"
                                                     name="project_name_{{ $lang->lang }}"
                                                     id="project_name_{{ $lang->lang }}">
                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Project Category') }} (
                                                     {{ $lang->name }} ) </label>
                                                 <input type="text" class="form-control"
                                                     name="project_category_{{ $lang->lang }}"
                                                     id="project_category_{{ $lang->lang }}">
                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Project Quotes') }} (
                                                     {{ $lang->name }} ) </label>
                                                 <input type="text" class="form-control"
                                                     name="project_quotes_{{ $lang->lang }}"
                                                     id="project_quotes_{{ $lang->lang }}">
                                             </div>
                                             <div class="row">
                                                 <div class="form-group col-md-10">
                                                     <label for="">{{ __('admin_local.Project Points') }} (
                                                         {{ $lang->name }} ) *</label>
                                                     <input type="text" class="form-control"
                                                         name="project_points_{{ $lang->lang }}[]" id="project_points_{{ $lang->lang }}">
                                                     <span class="text-danger err-mgs" id="project_points_err"></span>
                                                 </div>
                                                 <div class="form-group col-md-2">
                                                     <label for="">&nbsp;
                                                     </label><br>
                                                     <button type="button" style="float:right" data-lang_name='{{ $lang->name }}' data-lang='{{ $lang->lang }}'
                                                         id="add_more_point_btn3" class="btn btn-success">+</button>
                                                 </div>
                                             </div>
                                             <div id="append_lang_points_{{ $lang->lang }}">

                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Project Details') }} (
                                                     {{ $lang->name }} ) </label>
                                                 <textarea class="form-control" name="project_details_{{ $lang->lang }}" id="project_details2_{{ $lang->lang }}"></textarea>
                                             </div>
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12 col-xl-6">
                                 <div class="row">
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Project Image') }} (399X529)
                                             *</label>
                                         <input type="file" class="form-control" name="project_image"
                                             id="project_image" accept="image/*"
                                             onchange="document.getElementById('eprev_project_image').src = window.URL.createObjectURL(this.files[0])">
                                         <span class="text-danger err-mgs" id="project_image_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Preview project Icon') }}
                                             *</label><br>
                                         <img src="" id="eprev_project_image" alt="" height="529px"
                                             width="100%">
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-12 col-xl-6">
                                 <div class="row">
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Project Image') }} 2 (770X435)
                                             *</label>
                                         <input type="file" class="form-control" name="project_image_2"
                                             id="project_image_2" accept="image/*"
                                             onchange="document.getElementById('eprev_project_image_2').src = window.URL.createObjectURL(this.files[0])">
                                         <span class="text-danger err-mgs" id="project_image_2_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Preview project Icon') }}
                                             *</label><br>
                                         <img src="" id="eprev_project_image_2" alt="" height="435px"
                                             width="100%">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row mt-4 mb-2">
                             <div class="form-group col-lg-12">
                                 <button class="btn btn-danger text-white font-weight-medium waves-effect text-start"
                                     data-bs-dismiss="modal" style="float: right"
                                     type="button">{{ __('admin_local.Close') }}</button>
                                 <button class="btn btn-primary mx-2" style="float: right"
                                     type="submit">{{ __('admin_local.Submit') }}</button>
                             </div>
                         </div>
                     </form>
                 </div>

             </div>
             <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
     </div>

     {{-- Add User Modal End --}}



     <div class="container-fluid">
         <div class="row">
             <!-- Column -->
             <div class="col-lg-12 mx-auto">
                 <div class="card">
                     <div class="card-header py-3" style="border-bottom: 2px dashed gray">
                         <h3 class="card-title mb-0 text-center">{{ __('admin_local.Projects') }}</h3>
                     </div>

                     <div class="card-body">
                         @if (hasPermission(['project-store']))
                             <div class="row mb-3">
                                 <div class="col-md-3">
                                     <button class="btn btn-success" type="btn" data-bs-toggle="modal"
                                         data-bs-target="#add-project-modal">+
                                         {{ __('admin_local.Add Project') }}</button>
                                 </div>
                             </div>
                         @endif

                         <div class="table-responsive theme-scrollbar">
                             <table id="basic-1" class="display table-bordered">
                                 <thead>
                                     <tr>
                                         <th>{{ __('admin_local.Image') }}</th>
                                         <th>{{ __('admin_local.Name') }}</th>
                                         <th>{{ __('admin_local.Category') }}</th>
                                         <th>{{ __('admin_local.Quotes') }}</th>
                                         <th>{{ __('admin_local.Points') }}</th>
                                         <th>{{ __('admin_local.Status') }}</th>
                                         <th>{{ __('admin_local.Action') }}</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($projects as $project)
                                         <tr id="trid-{{ $project->id }}" data-id="{{ $project->id }}">
                                             <td>
                                                 @if ($project->project_images)
                                                 @php
                                                     $pImages = json_decode($project->project_images)
                                                 @endphp
                                                     <img height="50px" src="{{ asset($pImages[0]) }}"
                                                         alt="">
                                                 @else
                                                     {{ __('admin_local.No File') }}
                                                 @endif
                                             </td>
                                             <td>{{ $project->project_name }}</td>
                                             <td>{{ $project->project_category }}</td>
                                             <td>{{ $project->project_quotes }}</td>
                                             <td>
                                                <ul>
                                                 @php
                                                     $points = $project->project_points
                                                         ? json_decode($project->project_points)
                                                         : '';
                                                     foreach ($points as $key => $point) {
                                                         echo "<li>".($key+1).". ".$point."</li>";
                                                     }
                                                 @endphp
                                                 </ul>
                                             </td>


                                             <td class="text-center">
                                                 @if (hasPermission(['project-update']))
                                                     <span
                                                         class="mx-2">{{ $project->status == 0 ? 'Inactive' : 'Active' }}</span><input
                                                         data-status="{{ $project->status == 0 ? 1 : 0 }}"
                                                         id="status_change" type="checkbox" data-toggle="switchery"
                                                         data-color="green" data-secondary-color="red" data-size="small"
                                                         {{ $project->status == 1 ? 'checked' : '' }} />
                                                 @else
                                                     <span
                                                         class="badge badge-danger">{{ __('admin_local.No Permission') }}</span>
                                                 @endif
                                             </td>
                                             <td>
                                                 @if (hasPermission(['project-update', 'project-delete']))
                                                     <div class="dropdown">
                                                         <button
                                                             class="btn btn-info text-white px-2 py-1 dropbtn">{{ __('admin_local.Action') }}
                                                             <i class="fa fa-angle-down"></i></button>
                                                         <div class="dropdown-content">
                                                             @if (hasPermission(['project-update']))
                                                                 <a data-bs-toggle="modal" style="cursor: pointer;"
                                                                     data-bs-target="#edit-project-modal"
                                                                     class="text-primary" id="edit_button"><i
                                                                         class=" fa fa-edit mx-1"></i>{{ __('admin_local.Edit') }}</a>
                                                             @endif
                                                             @if (hasPermission(['project-delete']))
                                                                 <a class="text-danger" id="delete_button"
                                                                     style="cursor: pointer;"><i
                                                                         class="fa fa-trash mx-1"></i>
                                                                     {{ __('admin_local.Delete') }}</a>
                                                             @endif
                                                         </div>
                                                     </div>
                                                 @else
                                                     <span
                                                         class="badge badge-danger">{{ __('admin_local.No Permission') }}</span>
                                                 @endif
                                             </td>
                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                             @csrf
                         </div>
                     </div>
                 </div>
             </div>

         </div>
         <!-- Row -->
     </div>
 @endsection
 @push('js')
     <script src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/assets/js/sweet-alert/sweetalert.min.js') }}">
     </script>
     <script
         src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/assets/js/datatable/datatables/jquery.dataTables.min.js') }}">
     </script>
     <script src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/plugins/switchery/switchery.min.js') }}">
     </script>
     <script src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/assets/js/select2/select2.full.min.js') }}">
     </script>
     {{-- <script src="{{ asset(env('ASSET_DIRECTORY','public').'/'.'inventory/assets/js/select2/select2-custom.js') }}"></script> --}}
     <script src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/assets/js/editor/ckeditor/ckeditor.js') }}">
     </script>
     <script
         src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/assets/js/editor/ckeditor/adapters/jquery.js') }}">
     </script>
     <script src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/assets/js/editor/ckeditor/styles.js') }}">
     </script>
     <script
         src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/assets/js/editor/ckeditor/ckeditor.custom.js') }}">
     </script>
     @foreach (getLangs() as $lang)
         <script>
             CKEDITOR.replace('project_details_' + '{{ $lang->lang }}', {
                 on: {
                     contentDom: function(evt) {
                         // Allow custom context menu only with table elemnts.
                         evt.editor.editable().on('contextmenu', function(contextEvent) {
                             var path = evt.editor.elementPath();

                             if (!path.contains('table')) {
                                 contextEvent.cancel();
                             }
                         }, null, null, 5);
                     }
                 }
             });
         </script>
         <script>
             CKEDITOR.replace('project_details2_' + '{{ $lang->lang }}', {
                 on: {
                     contentDom: function(evt) {
                         // Allow custom context menu only with table elemnts.
                         evt.editor.editable().on('contextmenu', function(contextEvent) {
                             var path = evt.editor.elementPath();

                             if (!path.contains('table')) {
                                 contextEvent.cancel();
                             }
                         }, null, null, 5);
                     }
                 }
             });
         </script>
     @endforeach
     <script>
         CKEDITOR.replace('project_details', {
             on: {
                 contentDom: function(evt) {
                     // Allow custom context menu only with table elemnts.
                     evt.editor.editable().on('contextmenu', function(contextEvent) {
                         var path = evt.editor.elementPath();

                         if (!path.contains('table')) {
                             contextEvent.cancel();
                         }
                     }, null, null, 5);
                 }
             }
         });
         CKEDITOR.replace('project_details2', {
             on: {
                 contentDom: function(evt) {
                     // Allow custom context menu only with table elemnts.
                     evt.editor.editable().on('contextmenu', function(contextEvent) {
                         var path = evt.editor.elementPath();

                         if (!path.contains('table')) {
                             contextEvent.cancel();
                         }
                     }, null, null, 5);
                 }
             }
         });
         $('[data-toggle="switchery"]').each(function(idx, obj) {
             new Switchery($(this)[0], $(this).data());
         });
         $('.js-example-basic-single').select2({
             dropdownParent: $('#add-brand-modal')
         });
         $('.js-example-basic-single1').select2({
             dropdownParent: $('#edit-brand-modal')
         });
         $(document).on('select2:open', () => {
             document.querySelector('.select2-search__field').focus();
         });
         var oTable = $("#basic-1").DataTable({
             "language": {
                 "decimal": "",
                 "emptyTable": "{{ __('admin_local.No data available in table') }}",
                 "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                 "infoEmpty": "Showing 0 to 0 of 0 entries",
                 "infoFiltered": "(filtered from _MAX_ total entries)",
                 "infoPostFix": "",
                 "thousands": ",",
                 "lengthMenu": "Show _MENU_ entries",
                 "loadingRecords": "Loading...",
                 "processing": "",
                 "search": "Search:",
                 "zeroRecords": "No matching records found",
                 "paginate": {
                     "first": "First",
                     "last": "Last",
                     "next": "Next",
                     "previous": "Previous"
                 },
                 "aria": {
                     "sortAscending": ": activate to sort column ascending",
                     "sortDescending": ": activate to sort column descending"
                 }
             }
         });

         var form_url = "{{ route('admin.pages.project.store') }}";
         var submit_btn_after =
             `<strong>{{ __('admin_local.Saving ') }} &nbsp; <i class="fa fa-rotate-right fa-spin"></i></strong>`;
         var submit_btn_before =
             `<strong><i class="fa fa-paper-plane"></i> &nbsp; {{ __('admin_local.Submit') }}</strong>`;
         var no_permission_mgs = `{{ __('admin_local.No Permission') }}`;
         var comfirm_btn = `{{ __('admin_local.Ok') }}`;


         var delete_swal_title = `{{ __('admin_local.Are you sure?') }}`;
         var delete_swal_text =
             `{{ __('admin_local.Once deleted, you will not be able to recover this data') }}`;
         var delete_swal_cancel_text = `{{ __('admin_local.Delete request canceld successfully') }}`;
         var no_file = `{{ __('admin_local.No file') }}`;
         var base_url = `{{ baseUrl() }}`;
         var translate_url = `{{ route('admin.translateString') }}`;
     </script>
     <script>
         $(document).on('click', '#add_more_point_btn', function() {
             var count = $(this).closest('.row').next('div').find('.row').length;
             $(this).closest('.row').next('div').append(`
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="">{{ __('admin_local.Project Points') }}  ( {{ __('admin_local.Default') }} )</label>
                        <input type="text" class="form-control" name="project_points[]"
                            id="project_points">
                        <span class="text-danger err-mgs" id="project_points_err"></span>
                    </div>
                    <div class="form-group col-md-2">
                        <label for=""> &nbsp;</label><br>
                        <button style="float:right;" type="button" id="remove_point_btn"
                            class="btn btn-danger">-</button>
                    </div>
                </div>
            `);
         })
         $(document).on('click', '#add_more_point_btn2', function() {
             var lang = $(this).data('lang');
             var langName = $(this).data('lang_name');
             var count = $(this).closest('.row').next('div').find('.row').length;
             $(this).closest('.row').next('div').append(`
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="">{{ __('admin_local.Project Points') }} ( ${langName} )</label>
                        <input type="text" class="form-control" name="project_points_${lang}[]"
                            id="project_points">
                        <span class="text-danger err-mgs" id="project_points_err"></span>
                    </div>
                    <div class="form-group col-md-2">
                        <label for=""> &nbsp;</label><br>
                        <button style="float:right;" type="button" id="remove_point_btn"
                            class="btn btn-danger">-</button>
                    </div>
                </div>
            `);
         })

         $(document).on('click', '#add_more_point_btn3', function() {
             var lang = $(this).data('lang');
             var langName = $(this).data('lang_name');
             var count = $(this).closest('.row').next('div').find('.row').length;
             $(this).closest('.row').next('div').append(`
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="">{{ __('admin_local.Project Points') }} ( ${langName} )</label>
                        <input type="text" class="form-control" name="project_points_${lang}[]"
                            id="project_points_${lang}">
                        <span class="text-danger err-mgs" id="project_points_err"></span>
                    </div>
                    <div class="form-group col-md-2">
                        <label for=""> &nbsp;</label><br>
                        <button style="float:right;" type="button" id="remove_point_btn"
                            class="btn btn-danger">-</button>
                    </div>
                </div>
            `);
         })

         $(document).on('click', '#remove_point_btn', function() {
             $(this).closest('.row').remove();
         })

         var projPoint = `{{ __('admin_local.Project Points') }}`;
         var defa = `{{ __('admin_local.Default') }}`;
     </script>
     <script src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/custom/project/project.js') }}"></script>
     {{-- <script src="{{ asset(env('ASSET_DIRECTORY','public').'/'.'inventory/custom/user/user_list.js') }}"></script> --}}
 @endpush
