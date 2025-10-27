<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Message</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 650px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        .email-header {
            background-color: #f6921e; /* your theme color */
            padding: 20px;
            text-align: center;
            color: #fff;
        }
        .email-header h2 {
            margin: 0;
            font-size: 22px;
            letter-spacing: 1px;
        }
        .email-body {
            padding: 30px;
            color: #333;
        }
        .email-body h3 {
            margin-top: 0;
            color: #f6921e;
        }
        .email-body p {
            font-size: 15px;
            line-height: 1.6;
            margin: 10px 0;
        }
        .info-box {
            background: #f9fafb;
            border-left: 4px solid #f6921e;
            padding: 15px 20px;
            margin: 20px 0;
            border-radius: 6px;
        }
        .info-box strong {
            display: inline-block;
            width: 90px;
        }
        .email-footer {
            background-color: #f1f3f6;
            text-align: center;
            padding: 15px;
            font-size: 13px;
            color: #777;
        }
        .email-footer a {
            color: #f6921e;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>📩 New Contact Message</h2>
        </div>
        <div class="email-body">
            <h3>Hello,</h3>
            <p>You’ve received a new message from your website contact form.</p>

            <div class="info-box">
                <p><strong>Name:</strong> {{ $name }}</p>
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>Phone:</strong> {{ $phone }}</p>
            </div>

            <p><strong>Message:</strong></p>
            <p>{{ $user_message }}</p>

            <p>Best regards,<br>
            <strong>Brandtech Website</strong></p>
        </div>

        <div class="email-footer">
            © {{ date('Y') }} <a href="{{ url('/') }}">Brandtech</a>. All rights reserved.
        </div>
    </div>
</body>
</html>
