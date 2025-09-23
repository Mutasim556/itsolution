 @extends('backend.shared.layouts.admin')
 @push('title')
     {{ __('admin_local.About Us') }}
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
     <div class="container-fluid">
         <div class="row">
             <!-- Column -->
             <div class="col-lg-10 mx-auto">
                 <div class="card">
                     <div class="card-header py-3" style="border-bottom: 2px dashed gray">
                         <h3 class="card-title mb-0 text-center">{{ __('admin_local.About Us') }}</h3>
                     </div>

                     <div class="card-body">
                         <form method="POST" action="{{ route('admin.pages.updateAboutUs') }}"
                             enctype="multipart/form-data">
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
                                                 <label for="">{{ __('admin_local.Company Name') }} (
                                                     {{ __('admin_local.Default') }} ) *</label>
                                                 <input type="text" class="form-control" name="company_name"
                                                     id="company_name" value="{{ $aboutus->company_name }}">
                                                 <span class="text-danger err-mgs" id="company_name_err"></span>
                                             </div>

                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.About Us Title') }} (
                                                     {{ __('admin_local.Default') }} ) *</label>
                                                 <input type="text" class="form-control" name="about_us_title"
                                                     id="about_us_title" value="{{ $aboutus->about_us_title }}">
                                                 <span class="text-danger err-mgs" id="about_us_title_err"></span>
                                             </div>

                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Short Details') }} (
                                                     {{ __('admin_local.Default') }} ) *</label>
                                                 <input type="text" class="form-control" name="short_details"
                                                     id="short_details" value="{{ $aboutus->short_details }}">
                                                 <span class="text-danger err-mgs" id="short_details_err"></span>
                                             </div>
                                             <div class="row">
                                                 <div class="form-group col-md-9">
                                                     <label for="">{{ __('admin_local.Points') }} (
                                                         {{ __('admin_local.Default') }} ) *</label>
                                                     <input type="text" class="form-control" name="points[]"
                                                         id="points" value="{{ $aboutus->short_details }}">
                                                     <span class="text-danger err-mgs" id="points_err"></span>
                                                 </div>
                                                 <div class="form-group col-md-3">
                                                     <label for="">{{ __('admin_local.Add More') }} </label><br>
                                                     <button type="button" id="add_more_point_btn"
                                                         class="btn btn-success">+</button>
                                                 </div>
                                             </div>
                                             <div>

                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Project Line') }} (
                                                     {{ __('admin_local.Default') }} ) *</label>
                                                 <input type="text" class="form-control" name="project_line"
                                                     id="project_line" value="{{ $aboutus->short_details }}">
                                                 <span class="text-danger err-mgs" id="project_line_err"></span>
                                             </div>
                                             <div class="form-group">
                                                 <label for="">{{ __('admin_local.Details') }} (
                                                     {{ __('admin_local.Default') }} ) *</label>
                                                 <textarea class="form-control ckeditorappend" name="details" id="details">{{ $aboutus->details }}</textarea>
                                                 <span class="text-danger err-mgs" id="details_err"></span>
                                             </div>
                                         </div>
                                         <script>
                                             var langCode = [];
                                         </script>
                                         @foreach (getLangs() as $lang)
                                             <script>
                                                 langCode.push("{{ $lang->lang }}");
                                             </script>
                                             @php
                                                 $translate = [];
                                                 if (count($aboutus->translations) > 0) {
                                                     foreach ($aboutus->translations as $key => $translation) {
                                                         if (
                                                             $translation->locale == $lang->lang &&
                                                             $translation->key == 'about_us_title'
                                                         ) {
                                                             $translate[$lang->lang]['about_us_title'] =
                                                                 $translation->value;
                                                         }
                                                         if (
                                                             $translation->locale == $lang->lang &&
                                                             $translation->key == 'short_details'
                                                         ) {
                                                             $translate[$lang->lang]['short_details'] =
                                                                 $translation->value;
                                                         }
                                                         if (
                                                             $translation->locale == $lang->lang &&
                                                             $translation->key == 'details'
                                                         ) {
                                                             $translate[$lang->lang]['details'] = $translation->value;
                                                         }
                                                     }
                                                 }
                                             @endphp
                                             <div class="tab-pane fade" id="pills-{{ $lang->name }}" role="tabpanel"
                                                 aria-labelledby="pills-{{ $lang->name }}-tab">
                                                 <div class="form-group">
                                                     <label for="">{{ __('admin_local.Company Name') }} (
                                                         {{ $lang->name }} )</label>
                                                     <input type="text" class="form-control"
                                                         name="company_name_{{ $lang->lang }}"
                                                         id="company_name_{{ $lang->lang }}"
                                                         value="{{ isset($translate[$lang->lang]['company_name']) ? $translate[$lang->lang]['company_name'] : '' }}">
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="">{{ __('admin_local.About Us Title') }} (
                                                         {{ $lang->name }} )</label>
                                                     <input type="text" class="form-control"
                                                         name="about_us_title_{{ $lang->lang }}"
                                                         id="about_us_title_{{ $lang->lang }}"
                                                         value="{{ isset($translate[$lang->lang]['about_us_title']) ? $translate[$lang->lang]['about_us_title'] : '' }}">
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="">{{ __('admin_local.Short Details') }} (
                                                         {{ $lang->name }} ) </label>
                                                     <input type="text" class="form-control"
                                                         name="short_details_{{ $lang->lang }}"
                                                         id="short_details_{{ $lang->lang }}"
                                                         value="{{ isset($translate[$lang->lang]['short_details']) ? $translate[$lang->lang]['short_details'] : '' }}">
                                                 </div>
                                                 <div class="row">
                                                     <div class="form-group col-md-9">
                                                         <label for="">{{ __('admin_local.Points') }} (
                                                             {{ $lang->name }} ) *</label>
                                                         <input type="text" class="form-control" name="points_{{ $lang->lang }}[]"
                                                             id="points" value="{{ $aboutus->short_details }}">
                                                         <span class="text-danger err-mgs" id="points_err"></span>
                                                     </div>
                                                     <div class="form-group col-md-3">
                                                         <label for="">{{ __('admin_local.Add More') }}
                                                         </label><br>
                                                         <button type="button" data-lang='{{ $lang->lang }}' id="add_more_point_btn2"
                                                             class="btn btn-success">+</button>
                                                     </div>
                                                 </div>
                                                 <div>

                                                 </div>
                                                 <div class="form-group">
                                                     <label for="">{{ __('admin_local.Project Line') }} (
                                                         {{ $lang->name }} ) </label>
                                                     <input type="text" class="form-control"
                                                         name="project_line_{{ $lang->lang }}"
                                                         id="project_line_{{ $lang->lang }}"
                                                         value="{{ isset($translate[$lang->lang]['project_line']) ? $translate[$lang->lang]['project_line'] : '' }}">
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="">{{ __('admin_local.Details') }} (
                                                         {{ $lang->name }} ) </label>
                                                     <textarea class="form-control" name="details_{{ $lang->lang }}">{{ isset($translate[$lang->lang]['details']) ? $translate[$lang->lang]['details'] : '' }}</textarea>
                                                 </div>
                                             </div>
                                         @endforeach
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-sm-12 col-xl-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                             <label for="">{{ __('admin_local.Experience') }} ({{ __('admin_local.Years') }})*</label>
                                             <input type="number" min="1" class="form-control" name="experience" id="experience"
                                                 value="{{ $aboutus->email }}">
                                             <span class="text-danger err-mgs" id="experience_err"></span>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label for="">{{ __('admin_local.Video Link') }} </label>
                                             <input type="text" class="form-control" name="video_link" id="video_link"
                                                 value="{{ $aboutus->email }}">
                                             <span class="text-danger err-mgs" id="video_link_err"></span>
                                         </div>
                                    </div>
                                     <div class="row">

                                         <div class="form-group col-md-6">
                                             <label for="">{{ __('admin_local.Responsible Person Name') }} *</label>
                                             <input type="text" class="form-control" name="resp_person_name" id="resp_person_name"
                                                 value="{{ $aboutus->email }}">
                                             <span class="text-danger err-mgs" id="resp_person_name_err"></span>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label for="">{{ __('admin_local.Responsible Person Designation') }} *</label>
                                             <input type="text" class="form-control" name="resp_person_desig" id="resp_person_desig"
                                                 value="{{ $aboutus->email }}">
                                             <span class="text-danger err-mgs" id="resp_person_desig_err"></span>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label for="">{{ __('admin_local.Responsible Person Image') }} (80X80)*</label>
                                             <input type="file" class="form-control" name="resp_person_image" id="resp_person_image"
                                                 value="{{ $aboutus->phone }}" accept="image/*" onchange="document.getElementById('prev_resp_image').src = window.URL.createObjectURL(this.files[0])">
                                             <span class="text-danger err-mgs" id="resp_person_image_err"></span>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label for="">{{ __('admin_local.Responsible Person Signature') }} (196X100) *</label>
                                             <input type="file" class="form-control" name="resp_person_sig" id="resp_person_sig"
                                                 value="{{ $aboutus->phone }}" accept="image/*" onchange="document.getElementById('prev_resp_person_sig').src = window.URL.createObjectURL(this.files[0])">
                                             <span class="text-danger err-mgs" id="resp_person_sig_err"></span>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label for="">{{ __('admin_local.Preview Responsible Person Image') }} *</label><br>
                                             <img src="{{ asset($aboutus->image1) }}" id="prev_resp_image" alt="" height="80px">
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label for="">{{ __('admin_local.Preview Responsible Person Signature') }} *</label><br>
                                             <img src="{{ asset($aboutus->image2) }}" id="prev_resp_person_sig" alt="" height="100px">
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label for="">{{ __('admin_local.Image 1') }} (309X290) *</label>
                                             <input type="file" class="form-control" name="image1" id="image1"
                                                 value="{{ $aboutus->phone }}" accept="image/*" onchange="document.getElementById('prev_img_1').src = window.URL.createObjectURL(this.files[0])">
                                             <span class="text-danger err-mgs" id="image1_err"></span>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label for="">{{ __('admin_local.Image 2') }} (530X327) *</label>
                                             <input type="file" class="form-control" name="image2" id="image2"
                                                 value="{{ $aboutus->phone }}" accept="image/*" onchange="document.getElementById('prev_img_2').src = window.URL.createObjectURL(this.files[0])">
                                             <span class="text-danger err-mgs" id="image2_err"></span>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label for="">{{ __('admin_local.Preview Image 1') }} *</label><br>
                                             <img src="{{ asset($aboutus->image1) }}" id="prev_img_1" alt="" height="290px">
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label for="">{{ __('admin_local.Preview Image 2') }} *</label>
                                             <img src="{{ asset($aboutus->image2) }}" id="prev_img_2" alt="" height="327px">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="row mt-4 mb-2">
                                 <div class="form-group col-lg-12">
                                     <button class="btn btn-primary mx-2" style="float: right"
                                         type="submit">{{ __('admin_local.Submit') }}</button>
                                 </div>
                             </div>
                         </form>
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
             CKEDITOR.replace('details_' + '{{ $lang->lang }}', {
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
         CKEDITOR.replace('details', {
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
         var submit_btn_after =
             `<strong>{{ __('admin_local.Saving ') }} &nbsp; <i class="fa fa-rotate-right fa-spin"></i></strong>`;
         var submit_btn_before = `<strong><i class="fa fa-paper-plane"></i> &nbsp; {{ __('admin_local.Submit') }}</strong>`;
         var no_permission_mgs = `{{ __('admin_local.No Permission') }}`;
         var comfirm_btn = `{{ __('admin_local.Ok') }}`;


         var delete_swal_title = `{{ __('admin_local.Are you sure?') }}`;
         var delete_swal_text =
             `{{ __('admin_local.Once deleted, you will not be able to recover this data') }}`;
         var delete_swal_cancel_text = `{{ __('admin_local.Delete request canceld successfully') }}`;
         var no_file = `{{ __('admin_local.No file') }}`;
         var base_url = `{{ baseUrl() }}`;
     </script>
     <script src="{{ asset(env('ASSET_DIRECTORY', 'public') . '/' . 'admin/custom/service/service.js') }}"></script>
     {{-- <script src="{{ asset(env('ASSET_DIRECTORY','public').'/'.'inventory/custom/user/user_list.js') }}"></script> --}}

     <script>
         $(document).on('click', '#add_more_point_btn', function() {
             var count = $(this).closest('.row').next('div').find('.form-group').length;
             $(this).closest('.row').next('div').append(`
                    <div class="form-group">
                        <label for="">{{ __('admin_local.Points') }} ${count+2}</label>
                        <input type="text" class="form-control" name="points[]"
                            id="points" value="{{ $aboutus->short_details }}">
                        <span class="text-danger err-mgs" id="points_err"></span>
                    </div>
            `);
         })
         $(document).on('click', '#add_more_point_btn2', function() {
             var lang  = $(this).data('lang');
             var count = $(this).closest('.row').next('div').find('.form-group').length;
             $(this).closest('.row').next('div').append(`
                    <div class="form-group">
                        <label for="">{{ __('admin_local.Points') }} ${count+2}</label>
                        <input type="text" class="form-control" name="points_${lang}[]"
                            id="points" value="{{ $aboutus->short_details }}">
                        <span class="text-danger err-mgs" id="points_err"></span>
                    </div>
            `);
         })
     </script>
 @endpush
