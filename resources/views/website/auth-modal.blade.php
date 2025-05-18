<div id="auth-modal" class="auth-modal">
    <div class="auth-modal-content">
        <div class="auth-modal-header">
            <h3>تسجيل الدخول مطلوب</h3>
            <span class="auth-modal-close">&times;</span>
        </div>
        <div class="auth-modal-body">
            <div class="auth-modal-icon">
                <i class="lni lni-user"></i>
            </div>
            <p>يرجى تسجيل الدخول أو إنشاء حساب جديد لإضافة المنتجات إلى سلة التسوق الخاصة بك.</p>
            <div class="auth-modal-actions">
                <a href="{{ route('login') }}" class="btn-login">تسجيل الدخول</a>
                <a href="{{ route('register') }}" class="btn-register">إنشاء حساب جديد</a>
            </div>
        </div>
    </div>
</div>