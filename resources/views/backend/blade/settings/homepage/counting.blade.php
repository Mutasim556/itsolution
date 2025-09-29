@extends('backend.shared.layouts.admin')
@push('title')
    {{ __('admin_local.Countings') }}
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset(env('ASSET_DIRECTORY').'/'.'admin/assets/css/custom.css') }}">
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
    </style>
@endpush
@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header py-3" style="border-bottom: 2px dashed gray">
                        <h3 class="card-title mb-0 text-center">{{ __('admin_local.Homepage Countings') }}</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.pages.homepage.counting') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">{{ __('admin_local.Counting Name') }} 1</label>
                                    <input type="text" class="form-control" name="counting1_name" id="counting1_name" value="{{ $counting->counting1_name }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">{{ __('admin_local.Counting Value') }} 1</label>
                                    <input type="text" class="form-control" name="counting1_value" id="counting1_value" placeholder="EX- 255" value="{{ $counting->counting1_value }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">{{ __('admin_local.Counting Name') }} 2</label>
                                    <input type="text" class="form-control" name="counting2_name" id="counting2_name" value="{{ $counting->counting2_name }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">{{ __('admin_local.Counting Value') }} 2</label>
                                    <input type="text" class="form-control" name="counting2_value" id="counting2_value" placeholder="EX- 255" value="{{ $counting->counting2_value }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">{{ __('admin_local.Counting Name') }} 3</label>
                                    <input type="text" class="form-control" name="counting3_name" id="counting3_name" value="{{ $counting->counting3_name }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">{{ __('admin_local.Counting Value') }} 3</label>
                                    <input type="text" class="form-control" name="counting3_value" id="counting3_value" placeholder="EX- 255" value="{{ $counting->counting3_value }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">{{ __('admin_local.Counting Name') }} 4</label>
                                    <input type="text" class="form-control" name="counting4_name" id="counting4_name" value="{{ $counting->counting4_name }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">{{ __('admin_local.Counting Value') }} 4</label>
                                    <input type="text" class="form-control" name="counting4_value" id="counting4_value" placeholder="EX- 255" value="{{ $counting->counting4_value }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 py-2">

                                </div>
                                <div class="col-md-6">
                                    <button type="submit" style="float:right" class="btn btn-primary">{{ __('admin_local.Update') }}</button>
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
    <script src="{{ asset(env('ASSET_DIRECTORY').'/'.'admin/assets/js/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset(env('ASSET_DIRECTORY').'/'.'admin/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset(env('ASSET_DIRECTORY').'/'.'admin/plugins/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset(env('ASSET_DIRECTORY').'/'.'admin/assets/js/select2/select2.full.min.js') }}"></script>
    {{-- <script src="{{ asset(env('ASSET_DIRECTORY').'/'.'inventory/assets/js/select2/select2-custom.js') }}"></script> --}}
    <script>
        $('[data-toggle="switchery"]').each(function(idx, obj) {
            new Switchery($(this)[0], $(this).data());
        });
        $('.js-example-basic-single').select2({
            dropdownParent: $('#add-slider-modal')
        });
        $('.js-example-basic-single1').select2({
            dropdownParent: $('#edit-slider-modal')
        });
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
        var oTable = $("#basic-1").DataTable({
            "language": {
                "decimal": "",
                "emptyTable": "{{ __('admin_local.No size available in table') }}",
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
        var submit_btn_after = `{{ __('admin_local.Submitting') }}`;
        var submit_btn_before = `{{ __('admin_local.Submit') }}`;
        var no_permission_mgs = `{{ __('admin_local.No Permission') }}`;
        var base_url = '{{ URL::to("/") }}';
        var asset_url = '{{ URL::to("/")."/".env("ASSET_DIRECTORY")."/" }}';


        var delete_swal_title = `{{ __('admin_local.Are you sure?') }}`;
        var delete_swal_text =
            `{{ __('admin_local.Once deleted, you will not be able to recover this size data') }}`;
        var delete_swal_cancel_text = `{{ __('admin_local.Delete request canceld successfully') }}`;
        var no_file = `{{ __('admin_local.No file') }}`;
    </script>
    <script src="{{ asset(env('ASSET_DIRECTORY').'/'.'admin/custom/settings/slider.js') }}"></script>
    {{-- <script src="{{ asset(env('ASSET_DIRECTORY').'/'.'inventory/custom/user/user_list.js') }}"></script> --}}
@endpush
