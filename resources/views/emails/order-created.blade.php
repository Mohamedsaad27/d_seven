<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد الطلب - DSeven Store</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            direction: rtl;
            text-align: right;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            line-height: 1.6;
        }
        
        .email-container {
            max-width: 650px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        
        .store-logo {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 10px;
            letter-spacing: 2px;
            position: relative;
            z-index: 1;
        }
        
        .header h1 {
            font-size: 28px;
            margin-bottom: 15px;
            font-weight: 600;
            position: relative;
            z-index: 1;
        }
        
        .header p {
            font-size: 18px;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }
        
        .content {
            padding: 40px 30px;
        }
        
        .order-summary {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 5px solid #007bff;
        }
        
        .order-summary h2 {
            color: #2c3e50;
            font-size: 22px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .order-summary h2::before {
            content: '📋';
            font-size: 24px;
        }
        
        .order-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .info-item {
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .info-label {
            font-weight: 600;
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .info-value {
            color: #2c3e50;
            font-size: 16px;
            font-weight: 500;
        }
        
        .status-badge {
            display: inline-block;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }
        
        .products-section {
            margin: 30px 0;
        }
        
        .products-section h3 {
            color: #2c3e50;
            font-size: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .products-section h3::before {
            content: '🛍️';
            font-size: 22px;
        }
        
        .product-item {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .product-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .product-name {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .product-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 10px;
            margin-top: 10px;
        }
        
        .product-detail {
            background: #f8f9fa;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 14px;
        }
        
        .product-detail strong {
            color: #495057;
        }
        
        .total-section {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            margin: 30px 0;
        }
        
        .total-amount {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .total-label {
            font-size: 16px;
            opacity: 0.9;
        }
        
        .footer {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 30px;
            text-align: center;
            border-radius: 15px;
            margin-top: 30px;
        }
        
        .footer p {
            margin-bottom: 15px;
            color: #495057;
            font-size: 16px;
        }
        
        .footer .thank-you {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
            margin-top: 20px;
        }
        
        .contact-info {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 15px;
            }
            
            .header, .content, .footer {
                padding: 20px;
            }
            
            .order-info {
                grid-template-columns: 1fr;
            }
            
            .product-details {
                grid-template-columns: 1fr;
            }
            
            .total-amount {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="store-logo">DSeven Store</div>
            <h1>تأكيد الطلب</h1>
            <p>شكراً لك {{ $user->name_ar }}، تم إنشاء طلبك بنجاح</p>
        </div>

        <div class="content">
            <div class="order-summary">
                <h2>تفاصيل الطلب</h2>
                <div class="order-info">
                    <div class="info-item">
                        <div class="info-label">رقم الطلب</div>
                        <div class="info-value">{{ $order->order_number }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">تاريخ الطلب</div>
                        <div class="info-value">{{ $order->created_at->format('Y-m-d H:i') }}</div>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">حالة الطلب</div>
                    <div class="info-value">
                        <span class="status-badge">{{ $order->status }}</span>
                    </div>
                </div>
            </div>

            <div class="products-section">
                <h3>المنتجات المطلوبة</h3>
                @foreach($orderItems as $item)
                <div class="product-item">
                    <div class="product-name">{{ $item->product->name_ar }}</div>
                    <div class="product-details">
                        <div class="product-detail">
                            <strong>الكمية:</strong> {{ $item->quantity }}
                        </div>
                        <div class="product-detail">
                            <strong>السعر:</strong> {{ number_format($item->price, 2) }} جنيه
                        </div>
                        @if($item->color)
                        <div class="product-detail">
                            <strong>اللون:</strong> {{ $item->color->color->name_ar }}
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            <div class="total-section">
                <div class="total-amount">{{ number_format($order->total_price, 2) }} جنيه</div>
                <div class="total-label">المجموع الكلي</div>
            </div>
        </div>

        <div class="footer">
            <p>سيتم التواصل معك قريباً لتأكيد الطلب وترتيب التوصيل.</p>
            <div class="contact-info">
                <p><strong>DSeven Store</strong></p>
                <p>نحن هنا لخدمتك على مدار الساعة</p>
            </div>
            <p class="thank-you">شكراً لثقتك بنا! 🙏</p>
        </div>
    </div>
</body>
</html>
