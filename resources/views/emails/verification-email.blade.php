<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your D-Seven Store Account</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            color: #4a4a4a;
            background-color: #f9f9f9;
            -webkit-font-smoothing: antialiased;
        }
        
        .email-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .email-header {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            padding: 30px 20px;
            text-align: center;
        }
        
        .email-header img {
            max-width: 180px;
            height: auto;
            margin-bottom: 15px;
        }
        
        .email-header h1 {
            color: #ffffff;
            font-size: 24px;
            font-weight: 600;
            margin: 0;
        }
        
        .email-body {
            padding: 40px 30px;
            background-color: #ffffff;
        }
        
        .greeting {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333333;
        }
        
        .message {
            font-size: 16px;
            color: #555555;
            margin-bottom: 25px;
            line-height: 1.7;
        }
        
        .verification-code-container {
            background-color: #f7f9fc;
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            margin: 30px 0;
            border: 1px dashed #d1d9e6;
        }
        
        .verification-code {
            font-family: 'Courier New', monospace;
            font-size: 32px;
            font-weight: 700;
            letter-spacing: 5px;
            color: #4e73df;
            padding: 10px 20px;
            background-color: #ffffff;
            border-radius: 6px;
            display: inline-block;
            box-shadow: 0 2px 8px rgba(78, 115, 223, 0.15);
        }
        
        .verification-note {
            font-size: 14px;
            color: #888888;
            margin-top: 15px;
        }
        
        .instructions {
            margin: 25px 0;
            font-size: 15px;
            color: #555555;
        }
        
        .cta-button {
            display: block;
            text-align: center;
            margin: 30px 0;
        }
        
        .cta-button a {
            display: inline-block;
            background-color: #4e73df;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .cta-button a:hover {
            background-color: #3a5ccc;
        }
        
        .email-footer {
            background-color: #f7f9fc;
            padding: 25px 30px;
            text-align: center;
            border-top: 1px solid #eaeaea;
        }
        
        .social-links {
            margin-bottom: 20px;
        }
        
        .social-links a {
            display: inline-block;
            margin: 0 8px;
            color: #4e73df;
            text-decoration: none;
        }
        
        .footer-text {
            font-size: 13px;
            color: #999999;
            margin-bottom: 10px;
        }
        
        .address {
            font-size: 12px;
            color: #aaaaaa;
        }
        
        @media only screen and (max-width: 600px) {
            .email-body {
                padding: 30px 20px;
            }
            
            .verification-code {
                font-size: 28px;
                letter-spacing: 3px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-header">
            <img src="{{ asset('assets/images/logo.jpg') }}" alt="D-Seven Store Logo">
            <h1>Verify Your Account</h1>
        </div>
        
        <div class="email-body"> 
            <p class="greeting">Hello {{ $user->name_en }},</p>
            
            <p class="message">Thank you for creating an account with D-Seven Store. To complete your registration and ensure the security of your account, please use the verification code below:</p>
            
            <div class="verification-code-container">
                <div class="verification-code">{{ $user->verification_code }}</div>
                <p class="verification-note">This code will expire in 30 minutes</p>
            </div>
            
            <p class="instructions">Please enter this code on the verification page to activate your account. If you didn't request this code, please ignore this email or contact our support team if you have concerns.</p>
            
            <div class="cta-button">
                <a href="{{ route('verification.form') }}">Verify Your Account</a>
            </div>
            
            <p class="message">We're excited to have you join our community! Once verified, you'll have access to exclusive deals, personalized recommendations, and much more.</p>
            
            <p class="message">If you have any questions or need assistance, our support team is always here to help.</p>
            
            <p class="message">Best regards,<br>The D-Seven Store Team</p>
        </div>
        
        <div class="email-footer">
            <div class="social-links">
                <a href="#"><img src="{{ asset('assets/images/social/facebook.png') }}" alt="Facebook" width="24"></a>
                <a href="#"><img src="{{ asset('assets/images/social/instagram.png') }}" alt="Instagram" width="24"></a>
                <a href="#"><img src="{{ asset('assets/images/social/twitter.png') }}" alt="Twitter" width="24"></a>
            </div>
            
            <p class="footer-text">© {{ date('Y') }} D-Seven Store. All rights reserved.</p>
            <p class="footer-text">If you have questions, please contact <a href="mailto:support@d-sevenstore.com" style="color: #4e73df;">support@d-sevenstore.com</a></p>
            
            <p class="address">D-Seven Store Inc., 123 Commerce Street, City, Country</p>
        </div>
    </div>
</body>
</html>

