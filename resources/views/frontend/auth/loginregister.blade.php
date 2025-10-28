@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Login or Register') }}
@endpush
@push('css')
    <style>
        .ns-brand-item {
            height: 150px !important;
            width: 180px !important;
        }

        .register-container {
            max-width: 480px;
            margin: 70px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            padding: 40px 30px;
            transition: 0.3s ease;
        }

        .register-container:hover {
            transform: translateY(-4px);
        }

        .register-title {
            text-align: center;
            color: var(--theme-color);
            font-weight: 700;
            margin-bottom: 30px;
        }

        .login-container {
            max-width: 420px;
            margin: 80px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            padding: 40px 30px;
            transition: 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-4px);
        }

        .login-title {
            text-align: center;
            color: var(--theme-color);
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
            border-color: var(--theme-color);
            box-shadow: 0 0 4px rgba(255, 171, 23, 0.5);
        }

        .btn-theme {
            background-color: #e79a13;
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

        .forgot-link {
            font-size: 0.9rem;
            color: #666;
            text-decoration: none;
            float: right;
        }

        .forgot-link:hover {
            color: var(--theme-color);
            text-decoration: underline;
        }
        body{
            background: #f1f0ef;
        }
    </style>
@endpush
@section('content')
    <div class="container" id="login_form_div">
        <div class="login-container">
            <h4 class="login-title">{{ __('admin_local.User Login Form') }}</h4>
            @if (session()->has('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('user.attemptLogin') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="user_phone">{{ __('admin_local.User Phone') }}</label>
                    <input type="tel" inputmode="numeric" pattern="[0-9]*" name="user_phone" id="user_phone"
                        class="form-control @error('user_phone') is-invalid @enderror" placeholder="Ex: 01XXXXXXXXX"
                        value="{{ old('user_phone') }}" required>
                    @error('user_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password">{{ __('admin_local.User Password') }}</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group d-flex justify-content-between align-items-center mb-3">
                    <a href="{{ route('user.forgetPassword') }}"
                        class="forgot-link">{{ __('admin_local.Forgot Password?') }}</a>
                </div>

                <div class="form-group">
                    <button class="btn btn-theme w-100" type="submit">{{ __('admin_local.Login') }}</button>
                </div>
                <div class="login-link">
                    {{ __('admin_local.Dont have an account?') }}
                    <a
                        onclick="$('#login_form_div').hide(500); $('#register_form_div').show(500);">{{ __('admin_local.Register') }}</a>
                </div>
            </form>
        </div>
    </div>
    <div class="container" id="register_form_div" style="display:none">
        <div class="register-container">
            <h4 class="register-title">{{ __('admin_local.User Registration Form') }}</h4>

            <form action="{{ route('user.register') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="user_name">{{ __('admin_local.User Name') }}</label>
                    <input type="text" name="user_name" id="user_name"
                        class="form-control @error('user_name') is-invalid @enderror" placeholder="Enter your full name"
                        value="{{ old('user_name') }}" >
                    @error('user_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="user_phone">{{ __('admin_local.User Phone') }}</label>
                    <input type="tel" inputmode="numeric" pattern="[0-9]*" name="user_phone" id="user_phone"
                        class="form-control @error('user_phone') is-invalid @enderror" placeholder="Ex: 01XXXXXXXXX"
                        value="{{ old('user_phone') }}" required>
                    @error('user_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="user_email">{{ __('admin_local.User Email') }}</label>
                    <input type="email" name="user_email" id="user_email"
                        class="form-control @error('user_email') is-invalid @enderror" placeholder="example@mail.com"
                        value="{{ old('user_email') }}" required>
                    @error('user_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="user_address">{{ __('admin_local.Address') }}</label>
                    <textarea name="user_address" id="user_address" rows="3"
                        class="form-control @error('user_address') is-invalid @enderror" placeholder="Enter your full address">{{ old('user_address') }}</textarea>
                    @error('user_address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">{{ __('admin_local.Password') }}</label>
                    <input type="password" name="password" id="password" value="{{ old('password') }}"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Enter password"
                        required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password_confirmation">{{ __('admin_local.Re-enter Password') }}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control" value="{{ old('password_confirmation') }}" placeholder="Re-enter password" required>
                </div>



                <div class="form-group mt-4">
                    <button class="btn btn-theme w-100" type="submit">{{ __('admin_local.Register') }}</button>
                </div>
            </form>

            <div class="login-link">
                {{ __('admin_local.Already have an account?') }}
                <a
                    onclick="$('#register_form_div').hide(500);$('#login_form_div').show(500); ">{{ __('admin_local.Login') }}</a>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if ($errors->any())
            @php
                // Check if any error belongs to the register form
                $registerFields = ['user_name','user_phone','user_email','user_address','password','password_confirmation'];
                $showRegister = false;
                foreach ($errors->keys() as $field) {
                    if (in_array($field, $registerFields)) {
                        $showRegister = true;
                        break;
                    }
                }
            @endphp

            @if ($showRegister)
                $('#login_form_div').hide();
                $('#register_form_div').show();
            @endif
        @endif
    });
</script>
@endpush
