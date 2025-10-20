@extends('frontend.layouts.frontend')

@push('title')
    {{ __('admin_local.Forgot Password') }}
@endpush

@push('css')
<style>
    .forgot-container {
        max-width: 420px;
        margin: 80px auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        padding: 40px 30px;
        transition: 0.3s ease;
    }
    .forgot-container:hover { transform: translateY(-4px); }

    .forgot-title {
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
    .btn-theme:hover { background-color: #e79a13; }

    .back-link {
        display: block;
        text-align: center;
        color: #555;
        font-weight: 600;
        margin-top: 20px;
        text-decoration: none;
    }
    .back-link:hover {
        color: #ffab17;
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="forgot-container">
        <h4 class="forgot-title">{{ __('admin_local.Forgot Your Password?') }}</h4>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('user.forgetPasswordLink') }}">
            @csrf

            <div class="form-group mb-3">
                <label for="email">{{ __('admin_local.Email Address') }}</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autofocus
                       placeholder="Enter your registered email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-theme w-100">
                    {{ __('admin_local.Send Password Reset Link') }}
                </button>
            </div>
        </form>

        <a href="{{ route('user.loginIndex') }}" class="back-link">
            ← {{ __('admin_local.Back to Login') }}
        </a>
    </div>
</div>
@endsection
