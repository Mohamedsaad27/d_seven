<!DOCTYPE html>
<html lang="ar-en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحقق من حساب متجر دي-سفن | Verify Your D-Seven Store Account</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Tajawal', 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            color: #4a4a4a;
            background-color: #f5f7fa;
            -webkit-font-smoothing: antialiased;
        }
        
        .email-wrapper {
            max-width: 650px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        .email-header {
            background: linear-gradient(135deg, #6554c0 0%, #4e73df 50%, #224abe 100%);
            padding: 35px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .email-header:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.5;
        }
        
        .email-header img {
            max-width: 200px;
            height: auto;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        
        .email-header h1 {
            color: #ffffff;
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .language-toggle {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 2;
            color: white;
            font-size: 14px;
            opacity: 0.9;
        }
        
        .email-body {
            padding: 40px 35px;
            background-color: #ffffff;
        }
        
        .content-ar {
            text-align: right;
            direction: rtl;
            font-family: 'Tajawal', Arial, sans-serif;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 1px solid #eaeaea;
        }
        
        .content-en {
            text-align: left;
            direction: ltr;
            font-family: 'Poppins', Arial, sans-serif;
        }
        
        .greeting {
            font-size: 20px;
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
            background: linear-gradient(145deg, #f7f9fc 0%, #eff3f9 100%);
            border-radius: 12px;
            padding: 30px 25px;
            text-align: center;
            margin: 30px 0;
            border: 1px dashed #c0cfe0;
            position: relative;
            overflow: hidden;
        }
        
        .verification-code-container:before {
            content: '';
            position: absolute;
            width: 160px;
            height: 160px;
            background: radial-gradient(circle, rgba(78, 115, 223, 0.08) 0%, rgba(78, 115, 223, 0) 70%);
            border-radius: 50%;
            top: -80px;
            right: -50px;
        }
        
        .verification-code-container:after {
            content: '';
            position: absolute;
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, rgba(78, 115, 223, 0.08) 0%, rgba(78, 115, 223, 0) 70%);
            border-radius: 50%;
            bottom: -60px;
            left: -40px;
        }
        
        .verification-code {
            font-family: 'Courier New', monospace;
            font-size: 36px;
            font-weight: 700;
            letter-spacing: 8px;
            color: #4e73df;
            padding: 15px 25px;
            background-color: #ffffff;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0 4px 12px rgba(78, 115, 223, 0.18);
            position: relative;
            z-index: 1;
            border: 1px solid rgba(78, 115, 223, 0.12);
        }
        
        .verification-note {
            font-size: 14px;
            color: #888888;
            margin-top: 18px;
        }
        
        .instructions {
            margin: 25px 0;
            font-size: 15px;
            color: #555555;
        }
        
        .cta-button {
            display: block;
            text-align: center;
            margin: 35px 0;
        }
        
        .cta-button a {
            display: inline-block;
            background: linear-gradient(135deg, #6554c0 0%, #4e73df 100%);
            color: #ffffff;
            text-decoration: none;
            padding: 14px 34px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(78, 115, 223, 0.25);
        }
        
        .cta-button a:hover {
            background: linear-gradient(135deg, #5745b3 0%, #3a5ccc 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(78, 115, 223, 0.35);
        }
        
        .email-footer {
            background-color: #f7f9fc;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #eaeaea;
        }
        
        .social-links {
            margin-bottom: 25px;
        }
        
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            background-color: #ffffff;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.15);
        }
        
        .social-links img {
            width: 20px;
            height: 20px;
            vertical-align: middle;
        }
        
        .footer-text {
            font-size: 13px;
            color: #999999;
            margin-bottom: 10px;
        }
        
        .address {
            font-size: 12px;
            color: #aaaaaa;
            max-width: 400px;
            margin: 0 auto;
        }
        
        @media only screen and (max-width: 600px) {
            .email-wrapper {
                margin: 10px;
                border-radius: 12px;
            }
            
            .email-body {
                padding: 30px 20px;
            }
            
            .verification-code {
                font-size: 28px;
                letter-spacing: 5px;
                padding: 12px 15px;
            }
            
            .content-ar, .content-en {
                padding: 0 5px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-header">
            <div class="language-toggle">AR | EN</div>
            <img src="{{ asset('logo.jpg') }}" alt="D-Seven Store Logo">
            <h1>تحقق من حسابك | Verify Your Account</h1>
        </div>
        
        <div class="email-body">
            <!-- Arabic Content -->
            <div class="content-ar">
                <p class="greeting">مرحباً {{ $user->name_ar ?? $user->name_en }}،</p>
                
                <p class="message">شكراً لإنشاء حساب في متجر دي-سفن. لإكمال التسجيل وضمان أمان حسابك، يرجى استخدام رمز التحقق أدناه:</p>
                
                <div class="verification-code-container">
                    <div class="verification-code">{{ $user->verification_code }}</div>
                    <p class="verification-note">سينتهي صلاحية هذا الرمز خلال 30 دقيقة</p>
                </div>
                
                <p class="instructions">يرجى إدخال هذا الرمز في صفحة التحقق لتفعيل حسابك. إذا لم تطلب هذا الرمز، يرجى تجاهل هذا البريد الإلكتروني أو الاتصال بفريق الدعم إذا كانت لديك مخاوف.</p>
                
                <div class="cta-button">
                    <a href="{{ route('verification.form') }}">تحقق من حسابك</a>
                </div>
                
                <p class="message">نحن متحمسون لانضمامك إلى مجتمعنا! بمجرد التحقق، ستتمكن من الوصول إلى عروض حصرية وتوصيات مخصصة والمزيد.</p>
                
                <p class="message">إذا كانت لديك أي أسئلة أو تحتاج إلى مساعدة، فإن فريق الدعم لدينا متواجد دائمًا للمساعدة.</p>
                
                <p class="message">مع أطيب التحيات،<br>فريق متجر دي-سفن</p>
            </div>
            
            <!-- English Content -->
            <div class="content-en">
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
        </div>
        
        <div class="email-footer">
            <div class="social-links">
                <a href="#"><img src="/api/placeholder/20/20" alt="Facebook"></a>
                <a href="#"><img src="/api/placeholder/20/20" alt="Instagram"></a>
                <a href="#"><img src="/api/placeholder/20/20" alt="Twitter"></a>
                <a href="#"><img src="/api/placeholder/20/20" alt="LinkedIn"></a>
            </div>
            
            <p class="footer-text">© {{ date('Y') }} متجر دي-سفن | D-Seven Store. جميع الحقوق محفوظة | All rights reserved.</p>
            <p class="footer-text">
                إذا كانت لديك أسئلة، يرجى التواصل على | If you have questions, please contact: 
                <a href="mailto:support@d-sevenstore.com" style="color: #4e73df;">support@d-sevenstore.com</a>
            </p>
            
            <p class="address">متجر دي-سفن، شارع التجارة 123، المدينة، البلد | D-Seven Store Inc., 123 Commerce Street, City, Country</p>
        </div>
    </div>
</body>
</html>