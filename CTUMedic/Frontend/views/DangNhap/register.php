<div class="register-page">
    <!-- Khối Thông báo Đăng ký Thành công (Mặc định ẩn) -->
    <div id="success-modal" class="success-card" style="display: none;">
        <div class="icon-success">
            <img src="<?php echo BASE_ASSETS; ?>/images/icons/person-plus.svg" alt="Thành công">
        </div>
        <h2>Đăng ký thành công!</h2>
        <p>Tài khoản của bạn đã được tạo thành công trên hệ thống CTUMedic.</p>
        <p class="redirect-text">Đang tự động chuyển sang trang <strong>Đăng nhập</strong> trong <span id="countdown">3</span> giây...</p>
        <!-- Chuyển hướng gọn chỉ dùng ?page=login -->
        <a href="?page=login" class="btn-login-now">Đăng nhập ngay</a>
    </div>

    <!-- Form Đăng ký -->
    <div class="register-card" id="register-card">
        <div class="register-header">
            <h2>Đăng ký tài khoản</h2>
            <p>Tạo tài khoản để đặt lịch khám và quản lý hồ sơ sức khỏe</p>
        </div>

        <!-- Action form ngắn gọn -->
        <form action="?page=register_process" method="POST" class="register-form" onsubmit="return handleRegisterSubmit(event)">
            <div class="form-body">
                
                <!-- Họ và tên -->
                <div class="form-group">
                    <label for="fullname">Họ và tên <span class="required">*</span></label>
                    <input type="text" id="fullname" name="fullname" placeholder="Nhập đầy đủ họ và tên" required autocomplete="off">
                </div>

                <!-- Hàng 2 cột: Số điện thoại & Ngày sinh -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Số điện thoại <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone" placeholder="Ví dụ: 0912345678" pattern="[0-9]{10}" title="Vui lòng nhập số điện thoại gồm 10 chữ số" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="dob">Ngày sinh <span class="required">*</span></label>
                        <input type="date" id="dob" name="dob" required>
                    </div>
                </div>

                <!-- Hàng 2 cột: Giới tính & Địa chỉ -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="gender">Giới tính <span class="required">*</span></label>
                        <select id="gender" name="gender" required>
                            <option value="" disabled selected>Chọn giới tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" id="address" name="address" placeholder="Ví dụ: Ninh Kiều, Cần Thơ" autocomplete="off">
                    </div>
                </div>

                <!-- Mật khẩu -->
                <div class="form-group">
                    <label for="password">Mật khẩu <span class="required">*</span></label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu (tối thiểu 6 ký tự)" minlength="6" required>
                </div>

                <!-- Xác nhận mật khẩu -->
                <div class="form-group">
                    <label for="confirm_password">Xác nhận mật khẩu <span class="required">*</span></label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
                    <small id="error-msg" class="error-text" style="display: none;">Mật khẩu xác nhận không trùng khớp!</small>
                </div>

                <!-- Đồng ý điều khoản -->
                <div class="form-terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">
                        Tôi đồng ý với <a href="#">Điều khoản sử dụng</a> và <a href="#">Chính sách bảo mật</a> của CTUMedic.
                    </label>
                </div>

                <!-- Nút Đăng ký -->
                <button type="submit" class="btn-submit">Tạo tài khoản</button>
            </div>

            <!-- Chuyển sang Đăng nhập gọn -->
            <div class="register-footer">
                <p>Bạn đã có tài khoản? <a href="?page=login">Đăng nhập ngay</a></p>
            </div>
        </form>
    </div>
</div>

<!-- Script đếm ngược tự động chuyển trang -->
<script>
function handleRegisterSubmit(e) {
    e.preventDefault();

    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    const errorMsg = document.getElementById('error-msg');

    if (password !== confirmPassword) {
        errorMsg.style.display = 'block';
        document.getElementById('confirm_password').focus();
        return false;
    }

    errorMsg.style.display = 'none';

    // Ẩn Form đăng ký & Hiện thông báo Đăng ký thành công
    document.getElementById('register-card').style.display = 'none';
    document.getElementById('success-modal').style.display = 'block';

    // Đếm ngược 3 giây tự động chuyển sang ?page=login
    let seconds = 3;
    const countdownEl = document.getElementById('countdown');
    
    const timer = setInterval(() => {
        seconds--;
        countdownEl.textContent = seconds;
        if (seconds <= 0) {
            clearInterval(timer);
            window.location.href = "?page=login"; // Đường dẫn tương đối cực gọn
        }
    }, 1000);

    return false;
}
</script>