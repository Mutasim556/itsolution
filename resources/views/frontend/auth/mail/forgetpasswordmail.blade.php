<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
    <style>
        /* === Global Reset === */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #f7f8fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .email-wrapper {
            width: 100%;
            padding: 40px 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #ffab17;
            color: #fff;
            text-align: center;
            padding: 25px;
        }
        .email-header h1 {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        .email-body {
            padding: 35px 30px;
        }
        .email-body h2 {
            font-size: 20px;
            color: #111;
            margin-bottom: 10px;
        }
        .email-body p {
            margin-bottom: 18px;
            font-size: 15px;
        }
        .reset-button {
            display: inline-block;
            background-color: #ffab17;
            color: #fff;
            padding: 12px 28px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s ease;
        }
        .reset-button:hover {
            background-color: #e79900;
        }
        .email-footer {
            text-align: center;
            background-color: #f9fafc;
            padding: 20px;
            font-size: 13px;
            color: #777;
            border-top: 1px solid #eee;
        }
        .email-footer a {
            color: #ffab17;
            text-decoration: none;
        }
        .logo {
            max-width: 140px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">
            <div class="email-header">
                @php
                    $logo = \App\Models\Admin\Logo::first();
                @endphp
                <img src="{{ asset($logo->main_site_header_logo??'') }}" alt="{{ env('APP_FRONTEND_NAME','Website') }} Logo" class="logo">
                <h1>{{ env('APP_FRONTEND_NAME', 'Website') }}</h1>
            </div>
            <div class="email-body">
                <h2>Hello {{ $name ?? 'User' }},</h2>
                <p>
                    We received a request to reset your password for your
                    <strong>{{ env('APP_FRONTEND_NAME', 'Website') }}</strong> account.
                </p>

                <p>Click the button below to reset your password:</p>

                <p style="text-align:center; margin: 25px 0;">
                    <a href="{{ $reset_link }}" class="reset-button">Reset Password</a>
                </p>

                <p>This password reset link will expire in <strong>15 minutes</strong>.</p>

                <p>If you didn’t request a password reset, you can safely ignore this email.</p>

                <p>Best regards,<br>
                <strong>The Brandtech Team</strong></p>
            </div>

            <div class="email-footer">
                <p>© {{ date('Y') }} {{ env('APP_FRONTEND_NAME','Website') }}. All rights reserved.</p>
                <p>
                    Need help? <a href="{{ url('/') }}">Contact Support</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
