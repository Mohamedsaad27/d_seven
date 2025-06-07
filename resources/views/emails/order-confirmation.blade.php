<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد الطلب - DSeven Store</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap');
    </style>
</head>
<body style="margin: 0; padding: 0; font-family: 'Cairo', Arial, sans-serif; background-color: #f9fafb; direction: rtl;">
    <div style="min-height: 100vh; padding: 32px 16px;">
        <div style="max-width: 672px; margin: 0 auto; background-color: white; border-radius: 8px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); overflow: hidden;">
            
            <!-- Header -->
            <div style="background: linear-gradient(to left, #2563eb, #1d4ed8); padding: 32px; color: white;">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div style="display: flex; align-items: center;">
                        <div style="background-color: white; padding: 8px; border-radius: 8px; margin-left: 12px;">
                            <svg style="height: 32px; width: 32px; color: #2563eb;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 style="margin: 0; font-size: 24px; font-weight: bold; color: white;">DSeven Store</h1>
                            <p style="margin: 4px 0 0 0; color: #bfdbfe; font-size: 14px;">متجرك الموثوق  للدوات المنزلية </p>
                        </div>
                    </div>
                    <div>
                        <div style="background-color: #dcfce7; padding: 4px 12px; border-radius: 9999px; display: flex; align-items: center;">
                            <svg style="height: 16px; width: 16px; color: #16a34a; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span style="color: #166534; font-weight: 500; font-size: 14px;">تم تأكيد الطلب</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Details -->
            <div style="padding: 32px;">
                <div style="margin-bottom: 24px;">
                    <h2 style="margin: 0 0 8px 0; font-size: 20px; font-weight: bold; color: #1f2937;">شكراً لك على طلبك!</h2>
                    <p style="margin: 0; color: #6b7280;">
                        مرحباً {{ $user->name_ar }}، تم استلام طلبك بنجاح وسيتم معالجته في أقرب وقت ممكن.
                    </p>
                </div>

                <!-- Order Summary -->
                <div style="background-color: #f9fafb; border-radius: 8px; padding: 24px; margin-bottom: 24px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                        <div>
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <svg style="height: 20px; width: 20px; color: #6b7280; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <span style="font-weight: 500; color: #374151;">رقم الطلب</span>
                            </div>
                            <p style="margin: 0; font-size: 18px; font-weight: bold; color: #2563eb;">{{ $order->order_number }}</p>
                        </div>
                        <div>
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <svg style="height: 20px; width: 20px; color: #6b7280; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0h6m-6 0l-1 12a2 2 0 002 2h6a2 2 0 002-2L16 7"></path>
                                </svg>
                                <span style="font-weight: 500; color: #374151;">تاريخ الطلب</span>
                            </div>
                            <p style="margin: 0; color: #1f2937;">{{ $order->created_at->format('d F Y - H:i') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Customer Information -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 32px;">
                    <div style="background-color: white; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px;">
                        <h3 style="margin: 0 0 12px 0; font-weight: bold; color: #1f2937; display: flex; align-items: center;">
                            <svg style="height: 20px; width: 20px; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>بيانات العميل</span>
                        </h3>
                        <div style="font-size: 14px;">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <span style="color: #6b7280; margin-left: 8px;">الاسم:</span>
                                <span style="font-weight: 500;">{{ $user->name_ar }}</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <svg style="height: 16px; width: 16px; color: #9ca3af; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span style="color: #6b7280;">{{ $user->email }}</span>
                            </div>
                            @if($user->phone)
                            <div style="display: flex; align-items: center;">
                                <svg style="height: 16px; width: 16px; color: #9ca3af; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span style="color: #6b7280;">{{ $user->phone }}</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($order->shippingZone)
                    <div style="background-color: white; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px;">
                        <h3 style="margin: 0 0 12px 0; font-weight: bold; color: #1f2937; display: flex; align-items: center;">
                            <svg style="height: 20px; width: 20px; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>عنوان الشحن</span>
                        </h3>
                        <div style="font-size: 14px; color: #6b7280;">
                            <p style="margin: 0 0 4px 0;">{{ $order->shippingZone->zone_name ?? '' }}</p>
                            <p style="margin: 0;">{{ 'جمهورية مصر العربية' }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Order Items -->
                <div style="margin-bottom: 32px;">
                    <h3 style="margin: 0 0 16px 0; font-weight: bold; color: #1f2937;">تفاصيل الطلب</h3>
                    <div>
                        @foreach($order->orderItems as $item)
                        <div style="display: flex; align-items: center; background-color: #f9fafb; border-radius: 8px; padding: 16px; margin-bottom: 16px;">
                            @php
                                $firstImage = $item->product->productImages()->first();
                            @endphp
                            @if($firstImage && $firstImage->image_url)
                            <img 
                                src="{{ $firstImage->image_url }}" 
                                alt="{{ $item->product->name_ar }}"
                                style="width: 64px; height: 64px; object-fit: cover; border-radius: 8px; margin-left: 16px;"
                            />
                            @else
                            <div style="width: 64px; height: 64px; background-color: #e5e7eb; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-left: 16px;">
                                <svg style="height: 32px; width: 32px; color: #9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            @endif
                            <div style="flex: 1;">
                                <h4 style="margin: 0 0 4px 0; font-weight: 500; color: #1f2937;">{{ $item->product->name_ar }}</h4>
                                @if($item->color && $item->color->color)
                                <p style="margin: 0 0 4px 0; font-size: 14px; color: #6b7280;">اللون: {{ $item->color->color->name }}</p>
                                @endif
                                <p style="margin: 0; font-size: 14px; color: #6b7280;">الكمية: {{ $item->quantity }}</p>
                            </div>
                            <div style="text-align: left;">
                                <p style="margin: 0 0 4px 0; font-weight: bold; color: #1f2937;">{{ number_format($item->price * $item->quantity, 2) }} EGP</p>
                                <p style="margin: 0; font-size: 14px; color: #6b7280;">{{ number_format($item->price, 2) }} EGP × {{ $item->quantity }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Order Total -->
                @php
                    $subtotal = $order->total_price;
                    $shipping = $order->shippingZone->shipping_cost;
                    $total = $subtotal + $shipping;
                @endphp
                
                <div style="background-color: #f9fafb; border-radius: 8px; padding: 24px; margin-bottom: 24px;">
                    <h3 style="margin: 0 0 16px 0; font-weight: bold; color: #1f2937;">ملخص الفاتورة</h3>
                    <div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                            <span style="color: #6b7280;">المجموع الفرعي</span>
                            <span style="font-weight: 500;">{{ number_format($subtotal, 2) }} EGP</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                            <span style="color: #6b7280;">الشحن</span>
                            <span style="font-weight: 500;">{{ number_format($shipping, 2) }} EGP</span>
                        </div>
                        <div style="border-top: 1px solid #e5e7eb; padding-top: 12px;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="font-size: 18px; font-weight: bold; color: #1f2937;">المجموع الكلي</span>
                                <span style="font-size: 18px; font-weight: bold; color: #2563eb;">{{ number_format($total, 2) }} EGP</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Next Steps -->
                <div style="background-color: #eff6ff; border: 1px solid #bfdbfe; border-radius: 8px; padding: 24px; margin-bottom: 24px;">
                    <h3 style="margin: 0 0 12px 0; font-weight: bold; color: #1e40af;">الخطوات التالية</h3>
                    <ul style="margin: 0; padding: 0; list-style: none;">
                        <li style="display: flex; align-items: flex-start; margin-bottom: 8px; font-size: 14px; color: #1d4ed8;">
                            <div style="width: 8px; height: 8px; background-color: #60a5fa; border-radius: 50%; margin-top: 8px; margin-left: 8px; flex-shrink: 0;"></div>
                            <span>سيتم معالجة طلبك خلال 1-2 أيام عمل</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; margin-bottom: 8px; font-size: 14px; color: #1d4ed8;">
                            <div style="width: 8px; height: 8px; background-color: #60a5fa; border-radius: 50%; margin-top: 8px; margin-left: 8px; flex-shrink: 0;"></div>
                            <span>ستتلقى رسالة تأكيد الشحن مع رقم التتبع</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; font-size: 14px; color: #1d4ed8;">
                            <div style="width: 8px; height: 8px; background-color: #60a5fa; border-radius: 50%; margin-top: 8px; margin-left: 8px; flex-shrink: 0;"></div>
                            <span>مدة التوصيل المتوقعة: 3-5 أيام عمل</span>
                        </li>
                    </ul>
                </div>

                <!-- Payment Information -->
                @if($order->payment_method)
                <div style="background-color: white; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; margin-bottom: 24px;">
                    <h3 style="margin: 0 0 12px 0; font-weight: bold; color: #1f2937; display: flex; align-items: center;">
                        <svg style="height: 20px; width: 20px; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        <span>طريقة الدفع</span>
                    </h3>
                    <p style="margin: 0 0 4px 0; font-size: 14px; color: #6b7280;">{{ $order->payment_method }}</p>
                    @if($order->payment_status)
                    <p style="margin: 0; font-size: 14px;">
                        <span style="color: #6b7280;">حالة الدفع: </span>
                        <span style="font-weight: 500; color: {{ $order->payment_status === 'paid' ? '#16a34a' : '#ea580c' }};">
                            {{ $order->payment_status === 'paid' ? 'مدفوع' : 'في انتظار الدفع' }}
                        </span>
                    </p>
                    @endif
                </div>
                @endif
            </div>

            <!-- Footer -->
            <div style="background-color: #f3f4f6; padding: 32px; border-top: 1px solid #e5e7eb;">
                <div style="text-align: center; margin-bottom: 16px;">
                    <h3 style="margin: 0 0 8px 0; font-weight: bold; color: #1f2937;">تحتاج مساعدة؟</h3>
                    <p style="margin: 0 0 12px 0; font-size: 14px; color: #6b7280;">
                        فريق خدمة العملاء متاح لمساعدتك على مدار الساعة
                    </p>
                    <div style="display: flex; justify-content: center; align-items: center; gap: 24px; font-size: 14px;">
                        <div style="display: flex; align-items: center;">
                            <svg style="height: 16px; width: 16px; color: #6b7280; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span style="color: #6b7280;">support@dseven.com</span>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <svg style="height: 16px; width: 16px; color: #6b7280; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span style="color: #6b7280;">01098001021</span>
                        </div>
                    </div>
                </div>
                
                <div style="text-align: center; font-size: 12px; color: #6b7280; border-top: 1px solid #e5e7eb; padding-top: 16px;">
                    <p style="margin: 0 0 4px 0;">© {{ date('Y') }} DSeven Store. جميع الحقوق محفوظة.</p>
                    <p style="margin: 0;">هذا البريد الإلكتروني تم إرساله تلقائياً، يرجى عدم الرد عليه مباشرة.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>