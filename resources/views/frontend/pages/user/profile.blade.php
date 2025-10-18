@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.My profile') }}
@endpush
@push('css')
    <style>
        .ns-brand-item {
            height: 150px !important;
            width: 180px !important;
        }

        .nav-tabs .nav-link.active {
            background-color: #e79a13;
            color: #fff;
            font-weight: 600;
        }

        .nav-tabs .nav-link {
            color: #e79a13;
            font-weight: 500;
        }

        .nav-tabs .nav-link:hover {
            color: #e79a13;
        }

        .nav-tabs .nav-link.active:hover {
            color: #000000;
        }

        .tab-content .form-control.is-invalid {
            border-color: #dc3545;
        }

        .btn-theme {
            background-color: #e79a13;
            color: white;
            font-weight: 600;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-theme:hover {
            background-color: #e79a13;
        }

        .tab-pane {
            padding-top: 20px;
        }

        .show-toggle {
            color: #000000;
            cursor: pointer;
            font-weight: 600;
            margin-left: 5px;
            text-decoration: none;
        }

        .show-toggle:hover {
            text-decoration: underline;
        }

        .dropdown-item:hover {
            background-color: #ffab17;
            color: white;
        }

        .dropdown-menu {
            min-width: 100%;
        }

        form textarea.form-control {
            border-radius: 10px;
            resize: none;
            transition: all 0.2s ease-in-out;
        }

        form textarea.form-control:focus {
            border-color: #ffab17;
            box-shadow: 0 0 6px rgba(255, 171, 23, 0.4);
        }

        .feedback-btn {
            background-color: #ffab17;
            border: none;
            color: #fff;
            font-weight: 600;
            transition: all 0.2s ease-in-out;
        }

        .feedback-btn:hover {
            background-color: #e69b14;
            box-shadow: 0 0 8px rgba(255, 171, 23, 0.5);
        }

        .feedback-btn:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 171, 23, 0.4);
        }
    </style>
@endpush

@section('content')
    <!-- 1️⃣ View Updates Modal -->
    <!-- ======================= -->
    <div class="modal fade" id="updatesModal" tabindex="-1" aria-labelledby="updatesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#ffab17; color:white;">
                    <h5 class="modal-title" id="updatesModalLabel">Work Updates</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle" id="append_work_updates">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>S/N</th>
                                    <th>{{ __('admin_local.Updates Details') }}</th>
                                    <th>{{ __('admin_local.Updates Note') }}</th>
                                    <th>{{ __('admin_local.Requested Amount') }}</th>
                                    <th>{{ __('admin_local.Requested Date') }}</th>
                                    <th>{{ __('admin_local.Received Amount') }}</th>
                                    <th>{{ __('admin_local.Received Date') }}</th>
                                    <th>{{ __('admin_local.File') }}</th>
                                    <th>{{ __('admin_local.Feedback') }}</th>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================= -->
    <!-- 2️⃣ View Payments Modal -->
    <!-- ======================= -->
    <div class="modal fade" id="paymentsModal" tabindex="-1" aria-labelledby="paymentsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#ffab17; color:white;">
                    <h5 class="modal-title" id="paymentsModalLabel">Payment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle" id="append_payments">
                            <thead class="bg-dark text-light">
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#ffab17; color:white;">
                    <h5 class="modal-title" id="feedbackModalLabel">{{ __('admin_local.Feedback') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success alert-dismissible fade show" id="feedback_success" style="display:none" role="alert">
                        <strong>{{ __('admin_local.Feedback updated successfully.') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" class="p-3" id="feedback_form">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="wuid" id="update_id">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="customer_feedback" class="form-label fw-semibold" style="font:size:18px">
                                        {{ __('admin_local.Feedback') }}
                                    </label>
                                    <textarea name="customer_feedback" id="customer_feedback" class="form-control shadow-sm" rows="5"
                                        placeholder="{{ __('admin_local.Write your feedback here') }}" required></textarea>
                                </div>
                            </div>

                            <div class="col-12 text-end mt-3">
                                <button type="submit" class="btn px-4 py-2 rounded-3 shadow-sm feedback-btn">
                                    <i class="bi bi-send me-1"></i> {{ __('admin_local.Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 " style="padding-top: 10px;padding-bottom:100px">
        <ul class="nav nav-tabs" id="authTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $errors->any() || session()->has('success') ? '' : 'active' }}" id="login-tab"
                    data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login"
                    aria-selected="true">
                    {{ __('admin_local.My Works') }}
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $errors->any() || session()->has('success') ? 'active' : '' }}"
                    id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab"
                    aria-controls="register" aria-selected="false">
                    {{ __('admin_local.My Profile') }}
                </button>
            </li>
        </ul>

        <div class="tab-content" id="authTabContent">
            <!-- Login Tab -->
            <div class="tab-pane fade {{ $errors->any() || session()->has('success') ? '' : 'show active' }}"
                id="login" role="tabpanel" aria-labelledby="login-tab">
                <div class="container mt-4 px-0">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>{{ __('admin_local.Work Title') }}</th>
                                    <th>{{ __('admin_local.Work Details') }}</th>
                                    <th>{{ __('admin_local.Duration') }}</th>
                                    <th>{{ __('admin_local.Work File') }}</th>
                                    <th>{{ __('admin_local.Total Cost') }}</th>
                                    <th>{{ __('admin_local.Total Paid') }}</th>
                                    <th>{{ __('admin_local.Progress') }}</th>
                                    <th>{{ __('admin_local.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($works as $work)
                                    <tr>
                                        <td>{{ $work->work_title }}</td>
                                        <td>
                                            @php
                                                $plainText = strip_tags($work->work_details); // remove all HTML
                                                $length = mb_strlen($plainText); // count characters safely (UTF-8)
                                            @endphp
                                            @if ($length > 30)
                                                <span class="short-text">{!! Str::limit(strip_tags($work->work_details), 30, '...') !!}</span>
                                            @else
                                                <span class="short-text">{!! $work->work_details !!}</span>
                                            @endif


                                            @if ($length > 30)
                                                <span class="full-text" style="display:none;">
                                                    {!! $work->work_details !!}
                                                </span>
                                                <a href="javascript:void(0);"
                                                    class="show-toggle">{{ __('admin_local.Show More') }}</a>
                                            @endif

                                        </td>
                                        <td>{!! str_replace('-', '<br>to<br>', $work->duration) !!}</td>
                                        <td>
                                            @if ($work->work_file)
                                                <a class="badge bg-success" target="__blank"
                                                    href="{{ asset($work->work_file) }}">{{ __('admin_local.View') }}</a>
                                            @else
                                                <a class="badge bg-danger"
                                                    href="#">{{ __('admin_local.No File') }}</a>
                                            @endif

                                        </td>
                                        <td>{{ $work->total_cost ?? 0 }} BDT</td>
                                        <td>{{ $work->total_paid ?? 0 }} BDT</td>
                                        <td>
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $work->progress }}%; {{ $work->progress == 0 ? 'background-color: #ff5917;' : ($work->progress == 100 ? 'background-color: #228B22;' : 'background-color: #DAA520;') }}"
                                                    aria-valuenow="{{ $work->progress }}" aria-valuemin="0"
                                                    aria-valuemax="100">{{ $work->progress }}%</div>
                                            </div>
                                            <span class="badge bg-warning text-dark">In Progress</span>
                                        </td>
                                        <td>
                                            <div class="dropstart">
                                                <button class="btn btn-theme dropdown-toggle w-100 " type="button"
                                                    id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{ __('admin_local.Action') }}
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="actionDropdown">
                                                    <li><a class="dropdown-item"
                                                            data-wid="{{ \Vinkla\Hashids\Facades\Hashids::encode($work->id) }}"
                                                            id="updates_btn" data-bs-toggle="modal"
                                                            data-bs-target="#updatesModal"
                                                            href="#">{{ __('admin_local.View Updates') }}</a></li>
                                                    <li><a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#paymentsModal"
                                                            data-wid="{{ \Vinkla\Hashids\Facades\Hashids::encode($work->id) }}"
                                                            id="payments_btn"
                                                            href="#">{{ __('admin_local.View Payments') }}</a></li>

                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- Register Tab -->
            <div class="tab-pane fade {{ $errors->any() || session()->has('success') ? 'show active' : '' }}"
                id="register" role="tabpanel" aria-labelledby="register-tab">
                <div class="container py-5">
                    <!-- Profile Card -->
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ __('admin_local.Password changed successfully !') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card shadow-lg border-0 rounded-3">
                        <div class="card-header text-white text-center" style="background-color:#ffab17;">
                            <h4 class="mb-0">{{ __('admin_local.User Profile') }}</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <!-- Profile Image -->
                                <div class="col-md-3 text-center mb-3 mb-md-0">
                                    {{-- <img src="https://via.placeholder.com/120" alt="User Avatar"
                                        class="rounded-circle img-fluid shadow"> --}}
                                    <h5 class="mt-3 fw-bold" style="color:#ffab17;">
                                        {{ Auth::user()->name ?? 'John Doe' }}</h5>
                                    <p class="text-muted mb-0">{{ Auth::user()->email ?? 'example@mail.com' }}</p>
                                </div>

                                <!-- User Info -->
                                <div class="col-md-9">
                                    <h5 class="fw-bold mb-3" style="color:#ffab17;">
                                        {{ __('admin_local.Profile Details') }}</h5>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">{{ __('admin_local.Phone') }} :</label>
                                            <div class="form-control-plaintext">
                                                {{ Auth::user()->phone ?? '+8801XXXXXXX' }}</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">{{ __('admin_local.Address') }}
                                                :</label>
                                            <div class="form-control-plaintext">
                                                {{ Auth::user()->address ?? 'Dhaka, Bangladesh' }}</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">{{ __('admin_local.Joined On') }}
                                                :</label>
                                            <div class="form-control-plaintext">
                                                {{ Auth::user()->created_at->format('d M Y') ?? '-' }}</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-semibold">{{ __('admin_local.Status') }}:</label>
                                            @if (Auth::user()->status == 1)
                                                <div class="form-control-plaintext">
                                                    <span class="badge bg-success">{{ __('admin_local.Active') }}</span>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Change Password Section -->
                    <div class="card shadow-lg border-0 rounded-3 mt-4">
                        <div class="card-header text-white text-center" style="background-color:#ffab17;">
                            <h4 class="mb-0">{{ __('admin_local.Change Password') }}</h4>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('user.changePassword') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="current_password"
                                            class="form-label fw-semibold">{{ __('admin_local.Current Password') }}</label>
                                        <input type="password" id="current_password" name="current_password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            value="{{ old('current_password') }}" required>
                                        @error('current_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="new_password"
                                            class="form-label fw-semibold">{{ __('admin_local.New Passwords') }}</label>
                                        <input type="password" id="new_password" name="new_password"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            value="{{ old('new_password') }}" required>
                                        @error('new_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="new_password_confirmation"
                                            class="form-label fw-semibold">{{ __('admin_local.Retype New Passwords') }}</label>
                                        <input type="password" id="new_password_confirmation"
                                            name="new_password_confirmation" class="form-control"
                                            value="{{ old('new_password_confirmation') }}" required>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit"
                                        class="btn btn-theme px-4">{{ __('admin_local.Update Password') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('#feedbackModal').on('hidden.bs.modal', function() {
            $('#updatesModal').modal('show');
        });
        document.addEventListener("DOMContentLoaded", function() {
            const toggles = document.querySelectorAll(".show-toggle");

            toggles.forEach(function(toggle) {
                toggle.addEventListener("click", function() {
                    const td = this.closest("td");
                    const shortText = td.querySelector(".short-text");
                    const fullText = td.querySelector(".full-text");

                    if (fullText.style.display === "none") {
                        fullText.style.display = "inline";
                        shortText.style.display = "none";
                        this.textContent = "Show Less";
                    } else {
                        fullText.style.display = "none";
                        shortText.style.display = "inline";
                        this.textContent = "Show More";
                    }
                });
            });
        });



        $(document).on('click', '#updates_btn', function() {
            let wid = $(this).data('wid');
            $('#append_work_updates tbody').empty();
            $.ajax({
                type: "get",
                url: 'get-work-updates/' + wid,
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    var newRow = ``;
                    $.each(data, function(key, val) {
                        newRow += `<tr>
                                <td>${key+1}</td>
                                <td>${val.updates_details}</td>
                                <td>${val.updates_note}</td>
                                <td>${val.payment.asking_payment??0}</td>
                                <td>${val.payment.asking_payment_date??''}</td>
                                <td>${val.payment.actual_payment??0}</td>
                                <td>${val.payment.actual_payment_date??''}</td>
                                <td>${val.updates_file?`<a target="__blank" href="${val.updates_file}" class="badge bg-info w-100">{{ __('admin_local.View') }}</span>`:`<span class="badge bg-danger">{{ __('admin_local.No File') }}</span>`}</td>
                                <td>
                                    <a class="btn btn-success py-1" data-bs-toggle="modal"
                                        data-bs-target="#feedbackModal"
                                        data-wuid="${val.id}"
                                        data-feedback="${val.customer_feedback}"
                                        id="feedback_btn"
                                        href="#">{{ __('admin_local.View') }}</a>
                                </td>
                            </tr>
                            `
                    })
                    $('#append_work_updates tbody').append(newRow);
                },
                error: function(err) {

                }
            });

        });
        $(document).on('click', '#payments_btn', function() {
            let wid = $(this).data('wid');
            $('#append_payments tbody').empty();
            $.ajax({
                type: "get",
                url: 'get-work-payments/' + wid,
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    var newRow = ``;
                    $.each(data, function(key, val) {
                        newRow += `<tr>
                                <td>${key+1}</td>
                                <td>${val.work.work_title}</td>
                                <td>${val.asking_payment??0}</td>
                                <td>${val.asking_payment_date??''}</td>
                                <td>${val.actual_payment??0}</td>
                                <td>${val.actual_payment_date??''}</td>
                                <td>${val.admin_name??''}</td>
                            </tr>
                            `
                    })
                    $('#append_payments tbody').append(newRow);
                },
                error: function(err) {

                }
            });

        });

        $(document).on('click', '#feedback_btn', function() {
            var feedback = $(this).data('feedback');
            $('#feedback_form #customer_feedback').text(feedback)
            $('#feedback_form #update_id').val($(this).data('wuid'))
             $('#feedback_success').hide();
        })

        $(document).on('submit', '#feedback_form', function(e) {
            e.preventDefault();
            $('button[type=submit]').addClass('disabled');

            $('button[type=submit]').text('{{ __('admin_local.Updating') }}...');
            var formData = new FormData(this);
            $.ajax({
                type: "post",
                url: 'updates-feedback/' + $('#feedback_form #update_id').val(),
                data: formData,
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('button[type=submit]').removeClass('disabled');
                    $('button[type=submit]').text('{{ __('admin_local.Update') }}');
                    $('#feedback_success').show();
                    window.location.reload();
                },
                error: function(err) {
                    $('button[type=submit]').removeClass('disabled');
                    $('button[type=submit]').text('{{ __('admin_local.Update') }}');
                }
            });

        })
    </script>
@endpush
