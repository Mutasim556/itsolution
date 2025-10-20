@extends('frontend.layouts.frontend')

@push('title')
    {{ __('admin_local.Reset Password') }}
@endpush

@push('css')
<style>
    .reset-container {
        max-width: 480px;
        margin: 80px auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        padding: 40px 30px;
        transition: 0.3s ease;
    }

    .reset-container:hover {
        transform: translateY(-4px);
    }

    .reset-title {
        text-align: center;
        color: #ffab17;
        font-weight: 700;
        margin-bottom: 30px;
    }

    label {
        font-weight: 600;
        color: #333;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 10px 12px;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #ffab17;
        box-shadow: 0 0 4px rgba(255, 171, 23, 0.5);
    }

    .btn-theme {
        background-color: #ffab17;
        border: none;
        color: white;
        font-weight: 600;
        padding: 10px;
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-theme:hover {
        background-color: #e79a13;
    }

    .back-link {
        text-align: center;
        margin-top: 15px;
    }

    .back-link a {
        color: #ffab17;
        text-decoration: none;
        font-weight: 600;
    }

    .back-link a:hover {
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="reset-container">
        <h4 class="reset-title">{{ __('admin_local.Reset Your Password') }}</h4>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.resetChangePassword') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="form-group mb-3">
                <label for="password">{{ __('admin_local.New Password') }}</label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Enter new password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password_confirmation">{{ __('admin_local.Re-type Password') }}</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="form-control" placeholder="Re-type new password" required>
            </div>

            <button type="submit" class="btn btn-theme w-100">
                {{ __('admin_local.Reset Password') }}
            </button>

            <div class="back-link">
                <a href="{{ route('user.loginIndex') }}">{{ __('admin_local.Back to Login') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection
