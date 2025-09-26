 @extends('backend.shared.layouts.admin')
 @push('title')
     {{ __('admin_local.Team Members') }}
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

     <div class="modal fade" id="add-member-modal" tabindex="-1" aria-labelledby="bs-example-modal-lg" aria-hidden="true">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header d-flex align-items-center" style="border-bottom:1px dashed gray">
                     <h4 class="modal-title" id="myLargeModalLabel">
                         {{ __('admin_local.Add member') }}
                     </h4>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>

                 <p class="px-3 text-danger">
                     <i>{{ __('admin_local.The field labels marked with * are required input fields.') }}</i>
                 </p>
                 <div class="modal-body" style="margin-top: -20px">
                     <form method="POSt" action="" id="add_team_member_form" enctype="multipart/form-data">
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
                                             <label for="">{{ __('admin_local.Team Member Name') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <input type="text" class="form-control" name="team_member_name"
                                                 id="team_member_name">
                                             <span class="text-danger err-mgs" id="team_member_name_err"></span>
                                         </div>

                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.Designation') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <input type="text" class="form-control" name="team_member_desig"
                                                 id="team_member_desig">
                                             <span class="text-danger err-mgs" id="team_member_desig_err"></span>
                                         </div>

                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.About Team Member') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <textarea class="form-control ckeditorappend" name="team_member_about" id="team_member_about"></textarea>
                                             <span class="text-danger err-mgs" id="team_member_about_err"></span>
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
                                                 <label for="">{{ __('admin_local.Team Member Name') }} (
                                                     {{ $lang->name }} )</label>
                                                 <input type="text" class="form-control"
                                                     name="team_member_name_{{ $lang->lang }}"
                                                     id="team_member_name_{{ $lang->lang }}">
                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Designation') }} (
                                                     {{ $lang->name }} ) </label>
                                                 <input type="text" class="form-control"
                                                     name="team_member_desig_{{ $lang->lang }}"
                                                     id="team_member_desig_{{ $lang->lang }}">
                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.About Team Member') }} (
                                                     {{ $lang->name }} ) </label>
                                                 <textarea class="form-control" name="team_member_about_{{ $lang->lang }}"
                                                     id="team_member_about_{{ $lang->lang }}"></textarea>
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
                                         <label for="">{{ __('admin_local.Gender') }} *</label>
                                         <select class="form-control" name="team_member_gender" id="team_member_gender">
                                             <option value="">{{ __('admin_local.Select Please') }}</option>
                                             <option value="Male">{{ __('admin_local.Male') }}</option>
                                             <option value="Female">{{ __('admin_local.Female') }}</option>
                                         </select>
                                         <span class="text-danger err-mgs" id="team_member_gender_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Phone') }} *</label>
                                         <input type="text" class="form-control" name="team_member_phone"
                                             id="team_member_phone">
                                         <span class="text-danger err-mgs" id="team_member_phone_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Email') }} *</label>
                                         <input type="text" class="form-control" name="team_member_email"
                                             id="team_member_email">
                                         <span class="text-danger err-mgs" id="team_member_email_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Address') }} </label>
                                         <input type="text" class="form-control" name="team_member_address"
                                             id="team_member_address">
                                         <span class="text-danger err-mgs" id="team_member_address_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Facebook') }}</label>
                                         <input type="text" class="form-control" name="team_member_facebook"
                                             id="team_member_facebook">
                                         <span class="text-danger err-mgs" id="team_member_facebook_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Instagram') }}</label>
                                         <input type="text" class="form-control" name="team_member_instagram"
                                             id="team_member_instagram">
                                         <span class="text-danger err-mgs" id="team_member_instagram_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Linked-In') }}</label>
                                         <input type="text" class="form-control" name="team_member_linkedin"
                                             id="team_member_linkedin">
                                         <span class="text-danger err-mgs" id="team_member_linkedin_err"></span>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-12 col-xl-6">
                                 <div class="row">
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Team Member Image') }} (370X395)
                                             *</label>
                                         <input type="file" class="form-control" name="team_member_image"
                                             id="team_member_image" accept="image/*"
                                             onchange="document.getElementById('prev_team_member_image').src = window.URL.createObjectURL(this.files[0])">
                                         <span class="text-danger err-mgs" id="team_member_image_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Preview member Icon') }}
                                             *</label><br>
                                         <img src="" id="prev_team_member_image" alt="" height="395px"
                                             width="100%">
                                     </div>
                                     <div class="form-group col-md-12 mt-2">
                                         <label for="">{{ __('admin_local.Youtube') }}</label>
                                         <input type="text" class="form-control" name="team_member_youtube"
                                             id="team_member_youtube">
                                         <span class="text-danger err-mgs" id="team_member_youtube_err"></span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row copy-row">
                             <div class="col-sm-12 col-xl-10">
                                 <div class="row">
                                     <div class="form-group col-md-6">
                                         <label for="">{{ __('admin_local.Expertise') }}</label>
                                         <input type="text" class="form-control" name="expertise[]" id="expertise">
                                         <span class="text-danger err-mgs" id="expertise_err"></span>
                                     </div>
                                     <div class="form-group col-md-6">
                                         <label for="">{{ __('admin_local.Expertise Lavel') }}</label>
                                         <input type="number" min="1" max="100" class="form-control"
                                             name="expertiselavel[]" id="expertiselavel" placeholder="1 to 100">
                                         <span class="text-danger err-mgs" id="expertiselavel_err"></span>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-12 col-xl-2">
                                 <div class="row">
                                     <div class="form-group col-md-12">
                                         <label for=""> &nbsp; </label><br>
                                         <button style="float: right" class="btn btn-success" id="copy_row_btn"
                                             type="button"><i class="fa fa-plus"></i></button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div>

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

     <div class="modal fade" id="edit-member-modal" tabindex="-1" aria-labelledby="bs-example-modal-lg"
         aria-hidden="true">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header d-flex align-items-center" style="border-bottom:1px dashed gray">
                     <h4 class="modal-title" id="myLargeModalLabel">
                         {{ __('admin_local.Edit  member') }}
                     </h4>
                     <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <p class="px-3 text-danger">
                     <i>{{ __('admin_local.The field labels marked with * are required input fields.') }}</i>
                 </p>
                 <div class="modal-body" style="margin-top: -20px">
                     <form id="edit_member_form" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                         <input type="hidden" id="member_id" name="member_id" value="">
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
                                             <label for="">{{ __('admin_local.Team Member Name') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <input type="text" class="form-control" name="team_member_name"
                                                 id="team_member_name">
                                             <span class="text-danger err-mgs" id="team_member_name_err"></span>
                                         </div>

                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.Designation') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <input type="text" class="form-control" name="team_member_desig"
                                                 id="team_member_desig">
                                             <span class="text-danger err-mgs" id="team_member_desig_err"></span>
                                         </div>

                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.About Team Member') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <textarea class="form-control ckeditorappend" name="team_member_about" id="team_member_about2"></textarea>
                                             <span class="text-danger err-mgs" id="team_member_about_err"></span>
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
                                                 <label for="">{{ __('admin_local.Team Member Name') }} (
                                                     {{ $lang->name }} )</label>
                                                 <input type="text" class="form-control"
                                                     name="team_member_name_{{ $lang->lang }}"
                                                     id="team_member_name_{{ $lang->lang }}">
                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Designation') }} (
                                                     {{ $lang->name }} ) </label>
                                                 <input type="text" class="form-control"
                                                     name="team_member_desig_{{ $lang->lang }}"
                                                     id="team_member_desig_{{ $lang->lang }}">
                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.About Team Member') }} (
                                                     {{ $lang->name }} ) </label>
                                                 <textarea class="form-control" name="team_member_about_{{ $lang->lang }}"
                                                     id="team_member_about2_{{ $lang->lang }}"></textarea>
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
                                         <label for="">{{ __('admin_local.Gender') }} *</label>
                                         <select class="form-control" name="team_member_gender" id="team_member_gender">
                                             <option value="">{{ __('admin_local.Select Please') }}</option>
                                             <option value="Male">{{ __('admin_local.Male') }}</option>
                                             <option value="Female">{{ __('admin_local.Female') }}</option>
                                         </select>
                                         <span class="text-danger err-mgs" id="team_member_gender_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Phone') }} *</label>
                                         <input type="text" class="form-control" name="team_member_phone"
                                             id="team_member_phone">
                                         <span class="text-danger err-mgs" id="team_member_phone_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Email') }} *</label>
                                         <input type="text" class="form-control" name="team_member_email"
                                             id="team_member_email">
                                         <span class="text-danger err-mgs" id="team_member_email_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Address') }} </label>
                                         <input type="text" class="form-control" name="team_member_address"
                                             id="team_member_address">
                                         <span class="text-danger err-mgs" id="team_member_address_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Facebook') }}</label>
                                         <input type="text" class="form-control" name="team_member_facebook"
                                             id="team_member_facebook">
                                         <span class="text-danger err-mgs" id="team_member_facebook_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Instagram') }}</label>
                                         <input type="text" class="form-control" name="team_member_instagram"
                                             id="team_member_instagram">
                                         <span class="text-danger err-mgs" id="team_member_instagram_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Linked-In') }}</label>
                                         <input type="text" class="form-control" name="team_member_linkedin"
                                             id="team_member_linkedin">
                                         <span class="text-danger err-mgs" id="team_member_linkedin_err"></span>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-12 col-xl-6">
                                 <div class="row">
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Team Member Image') }} (370X395)
                                             *</label>
                                         <input type="file" class="form-control" name="team_member_image"
                                             id="team_member_image" accept="image/*"
                                             onchange="document.getElementById('prev_team_member_image2').src = window.URL.createObjectURL(this.files[0])">
                                         <span class="text-danger err-mgs" id="team_member_image_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Preview member Icon') }}
                                             *</label><br>
                                         <img src="" id="prev_team_member_image2" alt="" height="395px"
                                             width="100%">
                                     </div>
                                     <div class="form-group col-md-12 mt-2">
                                         <label for="">{{ __('admin_local.Youtube') }}</label>
                                         <input type="text" class="form-control" name="team_member_youtube"
                                             id="team_member_youtube">
                                         <span class="text-danger err-mgs" id="team_member_youtube_err"></span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row copy-row">
                             <div class="col-sm-12 col-xl-10">
                                 <div class="row">
                                     <div class="form-group col-md-6">
                                         <label for="">{{ __('admin_local.Expertise') }}</label>
                                         <input type="text" class="form-control" name="expertise[]" id="expertise">
                                         <span class="text-danger err-mgs" id="expertise_err"></span>
                                     </div>
                                     <div class="form-group col-md-6">
                                         <label for="">{{ __('admin_local.Expertise Lavel') }}</label>
                                         <input type="number" min="1" max="100" class="form-control"
                                             name="expertiselavel[]" id="expertiselavel" placeholder="1 to 100">
                                         <span class="text-danger err-mgs" id="expertiselavel_err"></span>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-12 col-xl-2">
                                 <div class="row">
                                     <div class="form-group col-md-12">
                                         <label for=""> &nbsp; </label><br>
                                         <button style="float: right" class="btn btn-success" id="copy_row_btn"
                                             type="button"><i class="fa fa-plus"></i></button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div id="append_exp_div">

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
                         <h3 class="card-title mb-0 text-center">{{ __('admin_local.Team Members') }}</h3>
                     </div>

                     <div class="card-body">
                         @if (hasPermission(['team-store']))
                             <div class="row mb-3">
                                 <div class="col-md-3">
                                     <button class="btn btn-success" type="btn" data-bs-toggle="modal"
                                         data-bs-target="#add-member-modal">+
                                         {{ __('admin_local.Add Team Member') }}</button>
                                 </div>
                             </div>
                         @endif

                         <div class="table-responsive theme-scrollbar">
                             <table id="basic-1" class="display table-bordered">
                                 <thead>
                                     <tr>
                                         <th>{{ __('admin_local.Image') }}</th>
                                         <th>{{ __('admin_local.Name') }}</th>
                                         <th>{{ __('admin_local.Designation') }}</th>
                                         <th>{{ __('admin_local.Phone') }}</th>
                                         <th>{{ __('admin_local.Email') }}</th>
                                         <th>{{ __('admin_local.Address') }}</th>
                                         <th>{{ __('admin_local.Status') }}</th>
                                         <th>{{ __('admin_local.Action') }}</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($members as $member)
                                         <tr id="trid-{{ $member->id }}" data-id="{{ $member->id }}">
                                             <td>
                                                 @if ($member->team_member_image)
                                                     <img height="50px" src="{{ asset($member->team_member_image) }}"
                                                         alt="">
                                                 @else
                                                     {{ __('admin_local.No File') }}
                                                 @endif
                                             </td>
                                             <td>{{ $member->team_member_name }}</td>
                                             <td>{{ $member->team_member_desig }}</td>
                                             <td>{{ $member->team_member_phone }}</td>
                                             <td>{{ $member->team_member_email }}</td>
                                             <td>{!! $member->team_member_address !!}</td>


                                             <td class="text-center">
                                                 @if (hasPermission(['team-update']))
                                                     <span
                                                         class="mx-2">{{ $member->status == 0 ? 'Inactive' : 'Active' }}</span><input
                                                         data-status="{{ $member->status == 0 ? 1 : 0 }}"
                                                         id="status_change" type="checkbox" data-toggle="switchery"
                                                         data-color="green" data-secondary-color="red" data-size="small"
                                                         {{ $member->status == 1 ? 'checked' : '' }} />
                                                 @else
                                                     <span
                                                         class="badge badge-danger">{{ __('admin_local.No Permission') }}</span>
                                                 @endif
                                             </td>
                                             <td>
                                                 @if (hasPermission(['team-update', 'team-delete']))
                                                     <div class="dropdown">
                                                         <button
                                                             class="btn btn-info text-white px-2 py-1 dropbtn">{{ __('admin_local.Action') }}
                                                             <i class="fa fa-angle-down"></i></button>
                                                         <div class="dropdown-content">
                                                             @if (hasPermission(['team-update']))
                                                                 <a data-bs-toggle="modal" style="cursor: pointer;"
                                                                     data-bs-target="#edit-member-modal"
                                                                     class="text-primary" id="edit_button"><i
                                                                         class=" fa fa-edit mx-1"></i>{{ __('admin_local.Edit') }}</a>
                                                             @endif
                                                             @if (hasPermission(['team-delete']))
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
             CKEDITOR.replace('team_member_about_' + '{{ $lang->lang }}', {
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
             CKEDITOR.replace('team_member_about2_' + '{{ $lang->lang }}', {
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
         CKEDITOR.replace('team_member_about', {
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
         CKEDITOR.replace('team_member_about2', {
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

         var form_url = "{{ route('admin.pages.team.store') }}";
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
         $(document).on('click', '#copy_row_btn', function() {
             var count = $(this).closest('.copy-row').next('div').find('.delete-row').length;
             $(this).closest('.copy-row').next('div').slideDown('slow', function() {
                 let newRow = $(`
                    <div class="row delete-row" >
                        <div class="col-sm-12 col-xl-10">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>{{ __('admin_local.Expertise') }}</label>
                                    <input type="text" class="form-control" id="expertise" name="expertise[]" />
                                    <span class="text-danger err-mgs expertise_err"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>{{ __('admin_local.Expertise Lavel') }}</label>
                                    <input type="number" min="1" max="100" class="form-control" id="expertiselavel" name="expertiselavel[]" placeholder="1 to 100"/>
                                    <span class="text-danger err-mgs expertiselavel_err"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-2">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>&nbsp;</label><br>
                                    <button style="float:right" class="btn btn-danger " id="delete_row_btn" type="button">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `);

                 // append hidden, then fade in
                 $(this).append(newRow);
                 newRow.fadeIn("slow");
             });
         });
         $(document).on('click', '#delete_row_btn', function() {
             $(this).closest('.delete-row').slideUp("slow", function() {
                 $(this).remove();
             });
         })

         var expert = `{{ __('admin_local.Expertise') }}`;
         var expertLvl = `{{ __('admin_local.Expertise Lavel') }}`;
     </script>
     <script src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/custom/team/team.js') }}"></script>
     {{-- <script src="{{ asset(env('ASSET_DIRECTORY','public').'/'.'inventory/custom/user/user_list.js') }}"></script> --}}
 @endpush
