 @extends('backend.shared.layouts.admin')
 @push('title')
     {{ __('admin_local.Works') }}
 @endpush
 @push('css')
     <link rel="stylesheet" href="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/assets/css/custom.css') }}">
     <link rel="stylesheet" type="text/css"
         href="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/assets/css/vendors/daterange-picker.css') }}">
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

         #basic-1 tfoot {
             background-color: #f2f2f2;
             /* light gray */
             color: #000;
             /* text color */
             font-weight: bold;
             /* optional */
         }

         #basic-1 tfoot th,
         #basic-1 tfoot td {
             background-color: #ffeb3b;
             /* yellow */
             color: #000;
         }

         #basic-1,
         #basic-1 th,
         #basic-1 td {
             border: 2px solid #3498db;
             /* your desired border color */
         }

         /* Change header background for #basic-1 table */
         #basic-1 thead {
             background-color: #3498db;
             /* your desired color */
             color: #fff;
             /* optional: header text color */
         }

         /* Optional: add bold text */
         #basic-1 thead th {
             font-weight: bold;
         }

         #basic-2_wrapper {
             border: 1px solid #ddd;
             /* border color */
             box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
             /* nice subtle shadow */
             border-radius: 8px;
             padding: 10px;
             background: #fff;
         }


         #edit-updates-modal .modal-content {
             background-color: #fff89b;
             border: 1px solid #ddd;
             box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
         }
     </style>
 @endpush
 @section('content')
     {{-- Add User Modal Start --}}

     <div class="modal fade" id="add-work-modal" tabindex="-1" aria-labelledby="bs-example-modal-lg" aria-hidden="true">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header d-flex align-items-center" style="border-bottom:1px dashed gray">
                     <h4 class="modal-title" id="myLargeModalLabel">
                         {{ __('admin_local.Post Work') }}
                     </h4>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>

                 <p class="px-3 text-danger">
                     <i>{{ __('admin_local.The field labels marked with * are required input fields.') }}</i>
                 </p>
                 <div class="modal-body" style="margin-top: -20px">
                     <form method="POSt" action="" id="post_work_form" enctype="multipart/form-data">
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
                                             <label for="">{{ __('admin_local.Work Title') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <input type="text" class="form-control" name="work_title" id="work_title">
                                             <span class="text-danger err-mgs" id="work_title_err"></span>
                                         </div>
                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.Work Details') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <textarea class="form-control ckeditorappend" name="work_details" id="work_details"></textarea>
                                             <span class="text-danger err-mgs" id="work_details_err"></span>
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
                                                 <label for="">{{ __('admin_local.Work Title') }} (
                                                     {{ $lang->name }} )</label>
                                                 <input type="text" class="form-control"
                                                     name="work_title_{{ $lang->lang }}"
                                                     id="work_title_{{ $lang->lang }}">
                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Work Details') }} (
                                                     {{ $lang->name }} ) </label>
                                                 <textarea class="form-control" name="work_details_{{ $lang->lang }}" id="work_details_{{ $lang->lang }}"></textarea>
                                             </div>
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12 col-xl-6">
                                 <div class="row">
                                     {{-- <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Gender') }} *</label>
                                         <select class="form-control" name="team_work_gender" id="team_work_gender">
                                             <option value="">{{ __('admin_local.Select Please') }}</option>
                                             <option value="Male">{{ __('admin_local.Male') }}</option>
                                             <option value="Female">{{ __('admin_local.Female') }}</option>
                                         </select>
                                         <span class="text-danger err-mgs" id="team_work_gender_err"></span>
                                     </div> --}}
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Duration') }} *</label>
                                         <input type="text" class="form-control" name="duration" id="duration">
                                         <span class="text-danger err-mgs" id="duration_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Total Cost') }} *</label>
                                         <input type="text" class="form-control" name="total_cost" id="total_cost">
                                         <span class="text-danger err-mgs" id="total_cost_err"></span>
                                     </div>

                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Progress') }} *</label>
                                         <input type="number" min="0" max="100" class="form-control"
                                             name="progress" id="progress" placeholder="Ex : 1-100 %">
                                         <span class="text-danger err-mgs" id="progress_err"></span>
                                     </div>

                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Status') }} *</label>
                                         <select class="form-control" name="work_status" id="work_status">
                                             <option value="">{{ __('admin_local.Select Please') }}</option>
                                             <option value="0">{{ __('admin_local.Inactive') }}</option>
                                             <option value="1">{{ __('admin_local.Active') }}</option>
                                         </select>
                                         <span class="text-danger err-mgs" id="work_status_err"></span>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-12 col-xl-6">
                                 <div class="row">
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Work File') }}</label>
                                         <input type="file" class="form-control" name="work_file" id="work_file"
                                             accept=".pdf, .doc, .docx">
                                         <span class="text-danger err-mgs" id="work_file_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Total Paid') }} </label>
                                         <input type="text" class="form-control" name="total_paid" id="total_paid"
                                             value="0">
                                         <span class="text-danger err-mgs" id="total_paid_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Progress Status') }}</label>
                                         <select class="form-control" name="progress_status" id="progress_status"
                                             readonly>
                                             <option value="0">{{ __('admin_local.Not Started') }}</option>
                                             <option value="1">{{ __('admin_local.Ongoing') }}</option>
                                             <option value="2">{{ __('admin_local.Completed') }}</option>
                                         </select>
                                         <span class="text-danger err-mgs" id="progress_status_err"></span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <u>
                                 <h5 class="text-center"> {{ __('admin_local.Customer Informations') }}</h5>
                             </u>
                             <div class="col-sm-12 col-xl-6">
                                 <div class="mb-3">
                                     <label for="">{{ __('admin_local.Customer Phone') }} *</label>
                                     <div class="input-group">
                                         <input class="form-control" name="customer_phone" id="customer_phone"
                                             type="text" placeholder="Ex-01XXXXXXXXX"
                                             aria-label="Ex-01XXXXXXXXX"><span class="input-group-text"
                                             id="append_digit_counter">Enter 11 digits</span>
                                     </div>
                                 </div>
                                 <span class="text-danger err-mgs" id="customer_phone_err"></span>
                             </div>
                             <div class="col-sm-12 col-xl-6">
                                 <label for="">{{ __('admin_local.Customer Name') }} *</label>
                                 <input type="text" class="form-control" name="customer_name" id="customer_name">
                                 <span class="text-danger err-mgs" id="customer_name_err"></span>
                             </div>
                             <div class="col-sm-12 col-xl-6 mt-3">
                                 <label for="">{{ __('admin_local.Customer Email') }}</label>
                                 <input type="email" class="form-control" name="customer_email" id="customer_email">
                                 <span class="text-danger err-mgs" id="customer_email_err"></span>
                             </div>
                             <div class="col-sm-12 col-xl-6 mt-3">
                                 <label for="">{{ __('admin_local.Customer Address') }} *</label>
                                 <input type="text" class="form-control" name="customer_address"
                                     id="customer_address">
                                 <span class="text-danger err-mgs" id="customer_address_err"></span>
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

     <div class="modal fade" id="edit-work-modal" tabindex="-1" aria-labelledby="bs-example-modal-lg"
         aria-hidden="true">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header d-flex align-items-center" style="border-bottom:1px dashed gray">
                     <h4 class="modal-title" id="myLargeModalLabel">
                         {{ __('admin_local.Edit Work') }}
                     </h4>
                     <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <p class="px-3 text-danger">
                     <i>{{ __('admin_local.The field labels marked with * are required input fields.') }}</i>
                 </p>
                 <div class="modal-body" style="margin-top: -20px">
                     <form id="edit_work_form" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                         <input type="hidden" id="work_id" name="work_id" value="">
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
                                             <label for="">{{ __('admin_local.Work Title') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <input type="text" class="form-control" name="work_title"
                                                 id="work_title">
                                             <span class="text-danger err-mgs" id="work_title_err"></span>
                                         </div>
                                         <div class="form-group">
                                             <label for="">{{ __('admin_local.Work Details') }} (
                                                 {{ __('admin_local.Default') }} ) *</label>
                                             <textarea class="form-control ckeditorappend" name="work_details" id="work_details2"></textarea>
                                             <span class="text-danger err-mgs" id="work_details_err"></span>
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
                                                 <label for="">{{ __('admin_local.Work Title') }} (
                                                     {{ $lang->name }} )</label>
                                                 <input type="text" class="form-control"
                                                     name="work_title_{{ $lang->lang }}"
                                                     id="work_title_{{ $lang->lang }}">
                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Work Details') }} (
                                                     {{ $lang->name }} ) </label>
                                                 <textarea class="form-control" name="work_details_{{ $lang->lang }}" id="work_details2_{{ $lang->lang }}"></textarea>
                                             </div>
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-12 col-xl-6">
                                 <div class="row">
                                     {{-- <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Gender') }} *</label>
                                         <select class="form-control" name="team_work_gender" id="team_work_gender">
                                             <option value="">{{ __('admin_local.Select Please') }}</option>
                                             <option value="Male">{{ __('admin_local.Male') }}</option>
                                             <option value="Female">{{ __('admin_local.Female') }}</option>
                                         </select>
                                         <span class="text-danger err-mgs" id="team_work_gender_err"></span>
                                     </div> --}}
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Duration') }} *</label>
                                         <input type="text" class="form-control" name="duration" id="duration">
                                         <span class="text-danger err-mgs" id="duration_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Total Cost') }} *</label>
                                         <input type="text" class="form-control" name="total_cost" id="total_cost">
                                         <span class="text-danger err-mgs" id="total_cost_err"></span>
                                     </div>

                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Progress') }} *</label>
                                         <input type="number" min="0" max="100" class="form-control"
                                             name="progress" id="progress" placeholder="Ex : 1-100 %">
                                         <span class="text-danger err-mgs" id="progress_err"></span>
                                     </div>

                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Status') }} *</label>
                                         <select class="form-control" name="work_status" id="work_status">
                                             <option value="">{{ __('admin_local.Select Please') }}</option>
                                             <option value="0">{{ __('admin_local.Inactive') }}</option>
                                             <option value="1">{{ __('admin_local.Active') }}</option>
                                         </select>
                                         <span class="text-danger err-mgs" id="work_status_err"></span>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-12 col-xl-6">
                                 <div class="row">
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Work File') }}</label>
                                         <input type="file" class="form-control" name="work_file" id="work_file"
                                             accept=".pdf, .doc, .docx">
                                         <span class="text-danger err-mgs" id="work_file_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Total Paid') }} </label>
                                         <input type="text" class="form-control" name="total_paid" id="total_paid"
                                             value="0">
                                         <span class="text-danger err-mgs" id="total_paid_err"></span>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="">{{ __('admin_local.Progress Status') }}</label>
                                         <select class="form-control" name="progress_status" id="progress_status"
                                             readonly>
                                             <option value="0">{{ __('admin_local.Not Started') }}</option>
                                             <option value="1">{{ __('admin_local.Ongoing') }}</option>
                                             <option value="2">{{ __('admin_local.Completed') }}</option>
                                         </select>
                                         <span class="text-danger err-mgs" id="progress_status_err"></span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <u>
                                 <h5 class="text-center"> {{ __('admin_local.Customer Informations') }}</h5>
                             </u>
                             <div class="col-sm-12 col-xl-6">
                                 <div class="mb-3">
                                     <label for="">{{ __('admin_local.Customer Phone') }} *</label>
                                     <div class="input-group">
                                         <input class="form-control" name="customer_phone" id="customer_phone"
                                             type="text" placeholder="Ex-01XXXXXXXXX"
                                             aria-label="Ex-01XXXXXXXXX"><span class="input-group-text"
                                             id="append_digit_counter">Enter 11 digits</span>
                                     </div>
                                 </div>
                                 <span class="text-danger err-mgs" id="customer_phone_err"></span>
                             </div>
                             <div class="col-sm-12 col-xl-6">
                                 <label for="">{{ __('admin_local.Customer Name') }} *</label>
                                 <input type="text" class="form-control" name="customer_name" id="customer_name">
                                 <span class="text-danger err-mgs" id="customer_name_err"></span>
                             </div>
                             <div class="col-sm-12 col-xl-6 mt-3">
                                 <label for="">{{ __('admin_local.Customer Email') }}</label>
                                 <input type="email" class="form-control" name="customer_email" id="customer_email">
                                 <span class="text-danger err-mgs" id="customer_email_err"></span>
                             </div>
                             <div class="col-sm-12 col-xl-6 mt-3">
                                 <label for="">{{ __('admin_local.Customer Address') }} *</label>
                                 <input type="text" class="form-control" name="customer_address"
                                     id="customer_address">
                                 <span class="text-danger err-mgs" id="customer_address_err"></span>
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

     <div class="modal fade" id="work-updates-modal" tabindex="-1" aria-labelledby="bs-example-modal-lg"
         aria-hidden="true">
         <div class="modal-dialog modal-xl">
             <div class="modal-content">
                 <div class="modal-header d-flex align-items-center" style="border-bottom:1px dashed gray">
                     <h4 class="modal-title" id="myLargeModalLabel">
                         {{ __('admin_local.Work Updates') }}
                     </h4>
                     <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <p class="px-3 text-danger">
                     <i>{{ __('admin_local.The field labels marked with * are required input fields.') }}</i>
                 </p>
                 <div class="modal-body" style="margin-top: -20px">
                     <div class="row">
                         <div class="col-sm-12 col-xl-12">
                             <div class="card">
                                 <div class="card-body my-0 py-0">
                                     <ul class="nav nav-tabs nav-right" id="right-tab" role="tablist">
                                         <li class="nav-item"><a class="nav-link active" id="right-home-tab"
                                                 data-bs-toggle="tab" href="#right-home" role="tab"
                                                 aria-controls="right-home" aria-selected="true"><i
                                                     class="icofont icofont-list"></i>{{ __('admin_local.Previous Updates') }}</a>
                                         </li>
                                         <li class="nav-item"><a class="nav-link" id="profile-right-tab"
                                                 data-bs-toggle="tab" href="#right-profile" role="tab"
                                                 aria-controls="profile-icon" aria-selected="false"><i
                                                     class="icofont icofont-contact-add"></i>{{ __('admin_local.New Update') }}</a>
                                         </li>
                                         <li class="nav-item"><a class="nav-link" id="contact-right-tab"
                                                 data-bs-toggle="tab" href="#right-contact" role="tab"
                                                 aria-controls="contact-icon" aria-selected="false"><i
                                                     class="icofont icofont-contacts"></i>{{ __('admin_local.Payments') }}</a>
                                         </li>

                                     </ul>
                                     <div class="tab-content" id="right-tabContent">
                                         <div class="tab-pane fade show active" id="right-home" role="tabpanel"
                                             aria-labelledby="right-home-tab">
                                             <div class="table-responsive theme-scrollbar py-4">
                                                 <table id="basic-2" class="display table-bordered py-3">
                                                     <thead>
                                                         <tr>
                                                             <th>S/N</th>
                                                             <th>{{ __('admin_local.Updates Details') }}</th>
                                                             <th>{{ __('admin_local.Requested Amount') }}</th>
                                                             <th>{{ __('admin_local.Requested Date') }}</th>
                                                             <th>{{ __('admin_local.Received Amount') }}</th>
                                                             <th>{{ __('admin_local.Received Date') }}</th>
                                                             <th>{{ __('admin_local.Updates File') }}</th>
                                                             <th>{{ __('admin_local.Action') }}</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>

                                                     </tbody>
                                                     <tfoot>
                                                         <tr>
                                                             <th></th>
                                                             <th>{{ __('admin_local.Total') }}</th>
                                                             <th></th>
                                                             <th></th>
                                                             <th></th>
                                                             <th></th>
                                                             <th></th>
                                                             <th></th>
                                                         </tr>
                                                     </tfoot>
                                                 </table>
                                             </div>
                                         </div>

                                         <div class="tab-pane fade" id="right-profile" role="tabpanel"
                                             aria-labelledby="profile-right-tab">
                                             <form method="POST" id="add_work_update" enctype="multipart/form-data"
                                                 action="">
                                                 @csrf
                                                 <div class="row mt-3">
                                                     <div class="col-sm-12 col-xl-12">
                                                         <ul class="nav nav-pills nav-primary my-0" id="pills-successtab"
                                                             role="tablist">
                                                             @php
                                                                 $lang = \App\Models\Admin\Language::where([
                                                                     ['status', 1],
                                                                     ['delete', 0],
                                                                     ['default', 1],
                                                                 ])->first();
                                                             @endphp
                                                             <li class="nav-item"><a class="nav-link active"
                                                                     id="wupills-defaultLang-tab" data-bs-toggle="pill"
                                                                     href="#wupills-defaultLang" role="tab"
                                                                     aria-controls="wupills-defaultLang"
                                                                     aria-selected="true">{{ $lang->name }}
                                                                     ( {{ __('admin_local.Default') }} )</a></li>
                                                             @foreach (getLangs() as $lang)
                                                                 <li class="nav-item"><a class="nav-link"
                                                                         id="wupills-{{ $lang->name }}-tab"
                                                                         data-bs-toggle="pill"
                                                                         href="#wupills-{{ $lang->name }}"
                                                                         role="tab"
                                                                         aria-controls="wupills-{{ $lang->name }}"
                                                                         aria-selected="true">{{ $lang->name }}</a>
                                                                 </li>
                                                             @endforeach
                                                         </ul>
                                                         <div class="tab-content mt-3" id="wupills-successtabContent">
                                                             <div class="tab-pane fade show active"
                                                                 id="wupills-defaultLang" role="tabpanel"
                                                                 aria-labelledby="wupills-defaultLang-tab">
                                                                 <div class="form-group">
                                                                     <label
                                                                         for="">{{ __('admin_local.Updates Note') }}
                                                                         (
                                                                         {{ __('admin_local.Default') }} ) *</label>
                                                                     <input type="text" class="form-control"
                                                                         name="updates_note" id="updates_note">
                                                                     <span class="text-danger err-mgs"
                                                                         id="updates_note_err"></span>
                                                                 </div>
                                                                 <div class="form-group">
                                                                     <label
                                                                         for="">{{ __('admin_local.Updates Details') }}
                                                                         (
                                                                         {{ __('admin_local.Default') }} ) *</label>
                                                                     <textarea class="form-control ckeditorappend" name="updates_details" id="updates_details"></textarea>
                                                                     <span class="text-danger err-mgs"
                                                                         id="updates_details_err"></span>
                                                                 </div>
                                                             </div>
                                                             <script>
                                                                 var langCode = [];
                                                             </script>
                                                             @foreach (getLangs() as $lang)
                                                                 <script>
                                                                     langCode.push("{{ $lang->lang }}");
                                                                 </script>
                                                                 <div class="tab-pane fade"
                                                                     id="wupills-{{ $lang->name }}" role="tabpanel"
                                                                     aria-labelledby="wupills-{{ $lang->name }}-tab">
                                                                     <div class="form-group">
                                                                         <label
                                                                             for="">{{ __('admin_local.Updates Note') }}
                                                                             ({{ $lang->name }})
                                                                         </label>
                                                                         <input type="text" class="form-control"
                                                                             name="updates_note_{{ $lang->lang }}"
                                                                             id="updates_note_{{ $lang->lang }}">
                                                                     </div>
                                                                     <div class="form-group">
                                                                         <label
                                                                             for="">{{ __('admin_local.Updates Details') }}
                                                                             (
                                                                             {{ $lang->name }} ) </label>
                                                                         <textarea class="form-control" name="updates_details_{{ $lang->lang }}"
                                                                             id="updates_details_{{ $lang->lang }}"></textarea>
                                                                     </div>
                                                                 </div>
                                                             @endforeach
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="row">
                                                     <div class="col-md-12">
                                                         <div class="row">
                                                             <div class="form-group col-md-3">
                                                                 <div class="form-check checkbox checkbox-primary mb-0">
                                                                     <input class="form-check-input"
                                                                         id="checkbox-primary-1" type="checkbox"
                                                                         onchange="$(this).is(':checked')?$('#add_work_update #request_amount_div').show():$('#add_work_update #request_amount_div').hide()"
                                                                         name="add_payment">
                                                                     <label class="form-check-label"
                                                                         for="checkbox-primary-1">{{ __('admin_local.Add Payment') }}</label>
                                                                 </div>
                                                             </div>
                                                             <div class="col-md-9" style="display:none"
                                                                 id="request_amount_div">
                                                                 <div class="row">
                                                                     <div class="form-group col-md-4">
                                                                         <label
                                                                             for="">{{ __('admin_local.Request Amount') }}
                                                                             *</label>
                                                                         <input type="number" class="form-control"
                                                                             name="request_amount" id="request_amount">
                                                                         <span class="text-danger err-mgs"
                                                                             id="request_amount_err"></span>
                                                                     </div>
                                                                     <div class="form-group col-md-4">
                                                                         <label
                                                                             for="">{{ __('admin_local.Paid Amount') }}
                                                                         </label>
                                                                         <input type="number" class="form-control"
                                                                             name="paid_amount" id="paid_amount">
                                                                         <span class="text-danger err-mgs"
                                                                             id="paid_amount_err"></span>
                                                                     </div>
                                                                     <div class="form-group col-md-4">
                                                                         <label
                                                                             for="">{{ __('admin_local.Payment Last Date') }}
                                                                         </label>
                                                                         <input type="date" class="form-control"
                                                                             name="payment_last_date"
                                                                             id="payment_last_date">
                                                                         <span class="text-danger err-mgs"
                                                                             id="payment_last_date_err"></span>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="form-group col-md-6">
                                                         <label
                                                             for="">{{ __('admin_local.Updates File') }}</label>
                                                         <input type="file" class="form-control" name="updates_file"
                                                             id="updates_file" accept=".pdf, .doc, .docx">
                                                         <span class="text-danger err-mgs" id="updates_file_err"></span>
                                                     </div>
                                                     <div class="form-group col-md-6">
                                                         <input type="hidden" name="work_id" id="work_id">
                                                         <label for="">{{ __('admin_local.Work Title') }}</label>
                                                         <input type="text" class="form-control" name="work_title"
                                                             id="work_title" readonly>
                                                         <span class="text-danger err-mgs" id="work_title_err"></span>
                                                     </div>
                                                     <div class="form-group col-md-6">
                                                         <input type="hidden" name="customer_id" id="customer_id">
                                                         <label
                                                             for="">{{ __('admin_local.Customer Name') }}</label>
                                                         <input type="text" class="form-control" name="customer_name"
                                                             id="customer_name" readonly>
                                                         <span class="text-danger err-mgs" id="customer_name_err"></span>
                                                     </div>
                                                     <div class="form-group col-md-6">
                                                         <label
                                                             for="">{{ __('admin_local.Customer Phone') }}</label>
                                                         <input type="text" class="form-control" name="customer_phone"
                                                             id="customer_phone" readonly>
                                                         <span class="text-danger err-mgs" id="customer_phone_err"></span>
                                                     </div>
                                                 </div>
                                                 <div class="row mt-4 mb-2">
                                                     <div class="form-group col-lg-12">
                                                         <button
                                                             class="btn btn-danger text-white font-weight-medium waves-effect text-start"
                                                             data-bs-dismiss="modal" style="float: right"
                                                             type="button">{{ __('admin_local.Close') }}</button>
                                                         <button class="btn btn-primary mx-2" style="float: right"
                                                             type="submit">{{ __('admin_local.Submit') }}</button>
                                                     </div>
                                                 </div>
                                             </form>
                                         </div>
                                         <div class="tab-pane fade" id="right-contact" role="tabpanel"
                                             aria-labelledby="contact-right-tab">
                                             <div class="table-responsive theme-scrollbar py-4">
                                                 <table id="basic-55" class="display table-bordered py-3">
                                                     <thead>
                                                         <tr>
                                                             <th>S/N</th>
                                                             <th>{{ __('admin_local.Work Title') }}</th>
                                                             <th>{{ __('admin_local.Requested Amount') }}</th>
                                                             <th>{{ __('admin_local.Requested Date') }}</th>
                                                             <th>{{ __('admin_local.Received Amount') }}</th>
                                                             <th>{{ __('admin_local.Received Date') }}</th>
                                                             <th>{{ __('admin_local.Received By') }}</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>

                                                     </tbody>
                                                     <tfoot>
                                                         <tr>
                                                             <th></th>
                                                             <th>{{ __('admin_local.Total') }}</th>
                                                             <th></th>
                                                             <th></th>
                                                             <th></th>
                                                             <th></th>
                                                             <th></th>
                                                         </tr>
                                                     </tfoot>
                                                 </table>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
             <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
     </div>

     <div class="modal fade" id="edit-updates-modal" tabindex="-1" aria-labelledby="bs-example-modal-lg"
         aria-hidden="true">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header d-flex align-items-center" style="border-bottom:1px dashed gray">
                     <h4 class="modal-title" id="myLargeModalLabel">
                         {{ __('admin_local.Edit Work Updates') }}
                     </h4>
                     <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <p class="px-3 text-danger">
                     <i>{{ __('admin_local.The field labels marked with * are required input fields.') }}</i>
                 </p>
                 <div class="modal-body" style="margin-top: -20px">
                     <div class="row">
                         <div class="col-sm-12 col-xl-12">
                             <div class="card">
                                 <div class="card-body my-0 py-0">
                                     <form method="POST" id="edit_work_update" enctype="multipart/form-data"
                                         action="">
                                         @csrf
                                         <input type="hidden" name="work_updates_id" id="work_updates_id">
                                         <div class="row mt-3">
                                             <div class="col-sm-12 col-xl-12">
                                                 <ul class="nav nav-pills nav-primary my-0" id="pills-successtab"
                                                     role="tablist">
                                                     @php
                                                         $lang = \App\Models\Admin\Language::where([
                                                             ['status', 1],
                                                             ['delete', 0],
                                                             ['default', 1],
                                                         ])->first();
                                                     @endphp
                                                     <li class="nav-item"><a class="nav-link active"
                                                             id="wuepills-defaultLang-tab" data-bs-toggle="pill"
                                                             href="#wuepills-defaultLang" role="tab"
                                                             aria-controls="wuepills-defaultLang"
                                                             aria-selected="true">{{ $lang->name }}
                                                             ( {{ __('admin_local.Default') }} )</a></li>
                                                     @foreach (getLangs() as $lang)
                                                         <li class="nav-item"><a class="nav-link"
                                                                 id="wuepills-{{ $lang->name }}-tab"
                                                                 data-bs-toggle="pill"
                                                                 href="#wuepills-{{ $lang->name }}" role="tab"
                                                                 aria-controls="wuepills-{{ $lang->name }}"
                                                                 aria-selected="true">{{ $lang->name }}</a>
                                                         </li>
                                                     @endforeach
                                                 </ul>
                                                 <div class="tab-content mt-3" id="wuepills-successtabContent">
                                                     <div class="tab-pane fade show active" id="wuepills-defaultLang"
                                                         role="tabpanel" aria-labelledby="wuepills-defaultLang-tab">
                                                         <div class="form-group">
                                                             <label for="">{{ __('admin_local.Updates Note') }}
                                                                 (
                                                                 {{ __('admin_local.Default') }} ) *</label>
                                                             <input type="text" class="form-control"
                                                                 name="updates_note" id="updates_note">
                                                             <span class="text-danger err-mgs"
                                                                 id="updates_note_err"></span>
                                                         </div>
                                                         <div class="form-group">
                                                             <label
                                                                 for="">{{ __('admin_local.Updates Details') }}
                                                                 (
                                                                 {{ __('admin_local.Default') }} ) *</label>
                                                             <textarea class="form-control ckeditorappend" name="updates_details" id="updates_details2"></textarea>
                                                             <span class="text-danger err-mgs"
                                                                 id="updates_details_err"></span>
                                                         </div>
                                                     </div>
                                                     <script>
                                                         var langCode = [];
                                                     </script>
                                                     @foreach (getLangs() as $lang)
                                                         <script>
                                                             langCode.push("{{ $lang->lang }}");
                                                         </script>
                                                         <div class="tab-pane fade" id="wuepills-{{ $lang->name }}"
                                                             role="tabpanel"
                                                             aria-labelledby="wuepills-{{ $lang->name }}-tab">
                                                             <div class="form-group">
                                                                 <label
                                                                     for="">{{ __('admin_local.Updates Note') }}
                                                                     ({{ $lang->name }})
                                                                 </label>
                                                                 <input type="text" class="form-control"
                                                                     name="updates_note_{{ $lang->lang }}"
                                                                     id="updates_note_{{ $lang->lang }}">
                                                             </div>
                                                             <div class="form-group">
                                                                 <label
                                                                     for="">{{ __('admin_local.Updates Details') }}
                                                                     (
                                                                     {{ $lang->name }} ) </label>
                                                                 <textarea class="form-control" name="updates_details2_{{ $lang->lang }}"
                                                                     id="updates_details_{{ $lang->lang }}"></textarea>
                                                             </div>
                                                         </div>
                                                     @endforeach
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="col-md-12">
                                                 <div class="row">
                                                     <div class="form-group col-md-3">
                                                         <div class="form-check checkbox checkbox-primary mb-0">
                                                             <input class="form-check-input" id="checkbox-primary"
                                                                 type="checkbox"
                                                                 onchange="$(this).is(':checked')?$('#edit_work_update #request_amount_div').show():$('#edit_work_update #request_amount_div').hide()"
                                                                 name="add_payment">
                                                             <label class="form-check-label"
                                                                 for="checkbox-primary">{{ __('admin_local.Add Payment') }}</label>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-9" style="display:none" id="request_amount_div">
                                                         <div class="row">
                                                             <div class="form-group col-md-4">
                                                                 <label
                                                                     for="">{{ __('admin_local.Request Amount') }}
                                                                     *</label>
                                                                 <input type="number" class="form-control"
                                                                     name="request_amount" id="request_amount">
                                                                 <span class="text-danger err-mgs"
                                                                     id="request_amount_err"></span>
                                                             </div>
                                                             <div class="form-group col-md-4">
                                                                 <label
                                                                     for="">{{ __('admin_local.Paid Amount') }}
                                                                 </label>
                                                                 <input type="number" class="form-control"
                                                                     name="paid_amount" id="paid_amount">
                                                                 <span class="text-danger err-mgs"
                                                                     id="paid_amount_err"></span>
                                                             </div>
                                                             <div class="form-group col-md-4">
                                                                 <label
                                                                     for="">{{ __('admin_local.Payment Last Date') }}
                                                                 </label>
                                                                 <input type="date" class="form-control"
                                                                     name="payment_last_date" id="payment_last_date">
                                                                 <span class="text-danger err-mgs"
                                                                     id="payment_last_date_err"></span>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="form-group col-md-6">
                                                 <label for="">{{ __('admin_local.Updates File') }}</label>
                                                 <input type="file" class="form-control" name="updates_file"
                                                     id="updates_file" accept=".pdf, .doc, .docx">
                                                 <span class="text-danger err-mgs" id="updates_file_err"></span>
                                             </div>
                                             <div class="form-group col-md-6">
                                                 <input type="hidden" name="work_id" id="work_id">
                                                 <label for="">{{ __('admin_local.Work Title') }}</label>
                                                 <input type="text" class="form-control" name="work_title"
                                                     id="work_title" readonly>
                                                 <span class="text-danger err-mgs" id="work_title_err"></span>
                                             </div>
                                             <div class="form-group col-md-6">
                                                 <input type="hidden" name="customer_id" id="customer_id">
                                                 <label for="">{{ __('admin_local.Customer Name') }}</label>
                                                 <input type="text" class="form-control" name="customer_name"
                                                     id="customer_name" readonly>
                                                 <span class="text-danger err-mgs" id="customer_name_err"></span>
                                             </div>
                                             <div class="form-group col-md-6">
                                                 <label for="">{{ __('admin_local.Customer Phone') }}</label>
                                                 <input type="text" class="form-control" name="customer_phone"
                                                     id="customer_phone" readonly>
                                                 <span class="text-danger err-mgs" id="customer_phone_err"></span>
                                             </div>
                                         </div>
                                         <div class="row mt-4 mb-2">
                                             <div class="form-group col-lg-12">
                                                 <button
                                                     class="btn btn-danger text-white font-weight-medium waves-effect text-start"
                                                     data-bs-dismiss="modal" style="float: right"
                                                     type="button">{{ __('admin_local.Close') }}</button>
                                                 <button class="btn btn-primary mx-2" style="float: right"
                                                     type="submit">{{ __('admin_local.Submit') }}</button>
                                             </div>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
             <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
     </div>


     <div class="container-fluid">
         <div class="row">
             <!-- Column -->
             <div class="col-lg-12 mx-auto">
                 <div class="card">
                     <div class="card-header py-3" style="border-bottom: 2px dashed gray">
                         <h3 class="card-title mb-0 text-center">{{ __('admin_local.Work List') }}</h3>
                     </div>

                     <div class="card-body">
                         @if (hasPermission(['work-store']))
                             <div class="row mb-3">
                                 <div class="col-md-3">
                                     <button class="btn btn-success" type="btn" data-bs-toggle="modal"
                                         data-bs-target="#add-work-modal">+
                                         {{ __('admin_local.Post Work') }}</button>
                                 </div>
                             </div>
                         @endif

                         <div class="table-responsive theme-scrollbar">
                             <table id="basic-1" class="display table-bordered">
                                 <thead>
                                     <tr>
                                         <th>{{ __('admin_local.Work Title') }}</th>
                                         <th>{{ __('admin_local.Customer Name') }}</th>
                                         <th>{{ __('admin_local.Customer Phone') }}</th>
                                         <th>{{ __('admin_local.Work File') }}</th>
                                         <th>{{ __('admin_local.Duration') }}</th>
                                         <th>{{ __('admin_local.Total Cost') }}</th>
                                         <th>{{ __('admin_local.Total Paid') }}</th>
                                         <th>{{ __('admin_local.Total Due') }}</th>
                                         <th>{{ __('admin_local.Payment Status') }}</th>
                                         <th>{{ __('admin_local.Progress') }}</th>
                                         <th>{{ __('admin_local.Status') }}</th>
                                         <th>{{ __('admin_local.Action') }}</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($works as $work)
                                         <tr id="trid-{{ $work->id }}" data-id="{{ $work->id }}">

                                             <td>{{ $work->work_title }}</td>
                                             <td>{{ $work->user->name }}</td>
                                             <td>{{ $work->user->phone }}</td>
                                             <td>
                                                 @if ($work->work_file)
                                                     <a target="__blank" class="badge badge-info"
                                                         href="{{ asset($work->work_file) }}">{{ __('admin_local.View File') }}</a>
                                                 @else
                                                     <span
                                                         class="badge badge-danger">{{ __('admin_local.No File') }}</span>
                                                 @endif
                                             </td>
                                             <td>{{ $work->duration }}</td>
                                             <td>{{ $work->total_cost }}</td>
                                             <td>{{ $work->total_paid }}</td>
                                             <td>{{ $work->total_cost - $work->total_paid }}</td>
                                             <td>
                                                 @if ($work->payment_status == 0)
                                                     <span
                                                         class="badge badge-danger">{{ __('admin_local.Unpaid') }}</span>
                                                 @elseif($work->payment_status == 1)
                                                     <span
                                                         class="badge badge-warning">{{ __('admin_local.Partially Paid') }}</span>
                                                 @else
                                                     <span
                                                         class="badge badge-success">{{ __('admin_local.Paid') }}</span>
                                                 @endif
                                             </td>
                                             <td>{{ $work->progress }} %</td>
                                             <td class="text-center">
                                                 @if (hasPermission(['work-update']))
                                                     <span
                                                         class="mx-2">{{ $work->status == 0 ? 'Inactive' : 'Active' }}</span><input
                                                         data-status="{{ $work->status == 0 ? 1 : 0 }}"
                                                         id="status_change" type="checkbox" data-toggle="switchery"
                                                         data-color="green" data-secondary-color="red" data-size="small"
                                                         {{ $work->status == 1 ? 'checked' : '' }} />
                                                 @else
                                                     <span
                                                         class="badge badge-danger">{{ __('admin_local.No Permission') }}</span>
                                                 @endif
                                             </td>
                                             <td>
                                                 @if (hasPermission(['work-update', 'work-delete']))
                                                     <div class="dropdown">
                                                         <button
                                                             class="btn btn-info text-white px-2 py-1 dropbtn">{{ __('admin_local.Action') }}
                                                             <i class="fa fa-angle-down"></i></button>
                                                         <div class="dropdown-content">
                                                             @if (hasPermission(['work-update']))
                                                                 <a data-bs-toggle="modal" style="cursor: pointer;"
                                                                     data-bs-target="#edit-work-modal"
                                                                     class="text-primary" id="edit_button"><i
                                                                         class=" fa fa-edit mx-1"></i>{{ __('admin_local.Edit') }}</a>
                                                             @endif
                                                             @if (hasPermission(['work-delete']))
                                                                 <a class="text-danger" id="delete_button"
                                                                     style="cursor: pointer;"><i
                                                                         class="fa fa-trash mx-1"></i>
                                                                     {{ __('admin_local.Delete') }}</a>
                                                             @endif
                                                             @if (hasPermission(['work-updates-index', 'work-updates-create']))
                                                                 <a data-bs-toggle="modal" style="cursor: pointer;"
                                                                     data-bs-target="#work-updates-modal"
                                                                     class="text-primary" id="work_updates_button"
                                                                     style="cursor: pointer;"><i
                                                                         class="fa fa-book mx-1"></i>
                                                                     {{ __('admin_local.Work Updates') }}</a>
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
                                 <tfoot>
                                     <tr>
                                         <th colspan="4"></th>
                                         <th>Total:</th>
                                         <th></th>
                                         <th></th>
                                         <th></th>
                                         <th colspan="4"></th>
                                     </tr>
                                 </tfoot>
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
     <script
         src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/assets/js/datepicker/daterange-picker/moment.min.js') }}">
     </script>
     <script
         src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/assets/js/datepicker/daterange-picker/daterangepicker.js') }}">
     </script>
     <script
         src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/assets/js/datepicker/daterange-picker/daterange-picker.custom.js') }}">
     </script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}">
     </script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}">
     </script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}">
     </script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}">
     </script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}">
     </script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}">
     </script>
     <script src="{{ asset('public/admin/assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
     @foreach (getLangs() as $lang)
         <script>
             CKEDITOR.replace('work_details_' + '{{ $lang->lang }}', {
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
             CKEDITOR.replace('work_details2_' + '{{ $lang->lang }}', {
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
             CKEDITOR.replace('updates_details_' + '{{ $lang->lang }}', {
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
             CKEDITOR.replace('updates_details2_' + '{{ $lang->lang }}', {
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
         CKEDITOR.replace('work_details', {
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
         CKEDITOR.replace('updates_details', {
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
         CKEDITOR.replace('updates_details2', {
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
         CKEDITOR.replace('work_details2', {
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
             dom: 'Bfltip', // B = Buttons, f = search, l = length menu, t = table, i = info, p = pagination
             buttons: [{
                 extend: 'excelHtml5',
                 text: 'Excel',
                 className: 'btn btn-info mx-4',
                 filename: 'work_list', // Excel file name
                 title: `{{ __('admin_local.Work List') }}`, // Sheet title inside Excel
                 exportOptions: {
                     columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], // only export these column indexes (0-based)
                     footer: true
                 }
             }],
             "lengthMenu": [
                 [10, 20, 100, 1, -1],
                 [10, 20, 100, 1, "All"]
             ],
             "pageLength": 10, // default page size
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
             },
             "order": [], // no initial sort

             "footerCallback": function(row, data, start, end, display) {
                 var api = this.api();

                 // Helper function to parse values
                 var intVal = function(i) {
                     return typeof i === 'string' ?
                         i.replace(/[\$,]/g, '') * 1 :
                         typeof i === 'number' ? i : 0;
                 };

                 // Sum over all pages
                 var total_cost = api
                     .column(5, {
                         page: 'current'
                     }) // index of total_cost column
                     .data()
                     .reduce(function(a, b) {
                         return intVal(a) + intVal(b);
                     }, 0);
                 var total_paid = api
                     .column(6, {
                         page: 'current'
                     }) // index of total_cost column
                     .data()
                     .reduce(function(a, b) {
                         return intVal(a) + intVal(b);
                     }, 0);
                 var total_due = api
                     .column(7, {
                         page: 'current'
                     }) // index of total_cost column
                     .data()
                     .reduce(function(a, b) {
                         return intVal(a) + intVal(b);
                     }, 0);
                 // Update footer
                 $(api.column(5).footer()).html(total_cost.toFixed(2));
                 $(api.column(6).footer()).html(total_paid.toFixed(2));
                 $(api.column(7).footer()).html(total_due.toFixed(2));
             }
         });

         var wuTable = $("#basic-2").DataTable({
             dom: 'Bfltip', // B = Buttons, f = search, l = length menu, t = table, i = info, p = pagination
             buttons: [{
                 extend: 'excelHtml5',
                 text: 'Excel',
                 className: 'btn btn-info mx-4',
                 filename: 'work_updates_list', // Excel file name
                 title: `{{ __('admin_local.Work Updates') }}`, // Sheet title inside Excel
                 exportOptions: {
                     columns: [0, 1, 2, 3, 4, 5, 6, 7, ], // only export these column indexes (0-based)
                     footer: true
                 }
             }],
             "lengthMenu": [
                 [10, 20, 100, 1, -1],
                 [10, 20, 100, 1, "All"]
             ],
             "pageLength": 10, // default page size
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
             },
             columnDefs: [{
                 targets: 0, // first column
                 searchable: false,
                 orderable: false,
                 render: function(data, type, row, meta) {
                     return meta.row + 1; // row index + 1
                 }
             }],
             "order": [], // no initial sort

             "footerCallback": function(row, data, start, end, display) {
                 var api = this.api();

                 // Helper function to parse values
                 var intVal = function(i) {
                     return typeof i === 'string' ?
                         i.replace(/[\$,]/g, '') * 1 :
                         typeof i === 'number' ? i : 0;
                 };

                 // Sum over all pages
                 var req_amount = api
                     .column(2, {
                         page: 'current'
                     }) // index of total_cost column
                     .data()
                     .reduce(function(a, b) {
                         return intVal(a) + intVal(b);
                     }, 0);
                 var rec_amount = api
                     .column(4, {
                         page: 'current'
                     }) // index of total_cost column
                     .data()
                     .reduce(function(a, b) {
                         return intVal(a) + intVal(b);
                     }, 0);

                 // Update footer
                 $(api.column(2).footer()).html(req_amount.toFixed(2));
                 $(api.column(4).footer()).html(rec_amount.toFixed(2));
             }
         });

         var paymentTable = $("#basic-55").DataTable({
             dom: 'Bfltip', // B = Buttons, f = search, l = length menu, t = table, i = info, p = pagination
             buttons: [{
                 extend: 'excelHtml5',
                 text: 'Excel',
                 className: 'btn btn-info mx-4',
                 filename: 'payment_list', // Excel file name
                 title: `{{ __('admin_local.Payments') }}`, // Sheet title inside Excel
                 exportOptions: {
                     columns: [0, 1, 2, 3, 4, 5, 6, 7, ], // only export these column indexes (0-based)
                     footer: true
                 }
             }],
             "lengthMenu": [
                 [10, 20, 100, 1, -1],
                 [10, 20, 100, 1, "All"]
             ],
             "pageLength": 10, // default page size
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
             },
             columnDefs: [{
                 targets: 0, // first column
                 searchable: false,
                 orderable: false,
                 render: function(data, type, row, meta) {
                     return meta.row + 1; // row index + 1
                 }
             }],
             "order": [], // no initial sort

             "footerCallback": function(row, data, start, end, display) {
                 var api = this.api();

                 // Helper function to parse values
                 var intVal = function(i) {
                     return typeof i === 'string' ?
                         i.replace(/[\$,]/g, '') * 1 :
                         typeof i === 'number' ? i : 0;
                 };

                 // Sum over all pages
                 var req_amount = api
                     .column(2, {
                         page: 'current'
                     }) // index of total_cost column
                     .data()
                     .reduce(function(a, b) {
                         return intVal(a) + intVal(b);
                     }, 0);
                 var rec_amount = api
                     .column(4, {
                         page: 'current'
                     }) // index of total_cost column
                     .data()
                     .reduce(function(a, b) {
                         return intVal(a) + intVal(b);
                     }, 0);

                 // Update footer
                 $(api.column(2).footer()).html(req_amount.toFixed(2));
                 $(api.column(4).footer()).html(rec_amount.toFixed(2));
             }
         });

         var form_url = "{{ route('admin.work.store') }}";
         var form_url2 = "{{ route('admin.updates.store') }}";
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
         var no_file = `<span class="badge badge-danger">{{ __('admin_local.No File') }}</span>`;
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

         var paid_amount_err = `{{ __('admin_local.Paid amount can not greter then total cost.') }}`;
     </script>
     <script src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/custom/work/work.js') }}"></script>
     {{-- <script src="{{ asset(env('ASSET_DIRECTORY','public').'/'.'inventory/custom/user/user_list.js') }}"></script> --}}
 @endpush
