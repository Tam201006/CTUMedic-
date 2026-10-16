<div class="login-page">
    <div class="login-card">
        <!-- Header tiêu đề -->
        <div class="login-header">
            <h2>Đăng nhập hệ thống</h2>
            <p>Vui lòng chọn vai trò của bạn để tiếp tục</p>
        </div>

        <!-- Form Đăng nhập -->
        <form action="?page=login_process" method="POST" class="login-form" onsubmit="return handleLoginSubmit(event)">
            
            <!-- Chọn Vai Trò (Role Selection) -->
            <div class="role-selector">
                <input type="radio" id="role-patient" name="role" value="patient" checked onchange="toggleLoginForm()">
                <label for="role-patient" class="role-tab">
                    <img src="<?php echo BASE_ASSETS; ?>/images/icons/person-square.svg" alt="">
                    <span>Bệnh nhân</span>
                </label>

                <input type="radio" id="role-doctor" name="role" value="doctor" onchange="toggleLoginForm()">
                <label for="role-doctor" class="role-tab">
                    <img src="<?php echo BASE_ASSETS; ?>/images/icons/person-badge.svg" alt="">
                    <span>Bác sĩ</span>
                </label>

                <input type="radio" id="role-manager" name="role" value="manager" onchange="toggleLoginForm()">
                <label for="role-manager" class="role-tab">
                    <img src="<?php echo BASE_ASSETS; ?>/images/icons/person-badge.svg" alt="">
                    <span>Quản lý</span>
                </label>
            </div>

            <!-- Trường Nhập Liệu -->
            <div class="form-body">
                <!-- Ô Nhập cho Bệnh nhân (Số điện thoại) -->
                <div class="form-group" id="group-phone">
                    <label for="phone">Số điện thoại <span class="required">*</span></label>
                    <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại (ví dụ: 0912345678)" pattern="[0-9]{10}" title="Vui lòng nhập số điện thoại gồm 10 chữ số" required autocomplete="off">
                </div>

                <!-- Ô Nhập cho Bác sĩ & Manager (ID) -->
                <div class="form-group" id="group-id" style="display: none;">
                    <label for="user_id" id="label-id">Mã Bác sĩ (ID) <span class="required">*</span></label>
                    <input type="text" id="user_id" name="user_id" placeholder="Nhập mã định danh của bạn" autocomplete="off">
                </div>

                <!-- Mật khẩu (Chung) -->
                <div class="form-group">
                    <label for="password">Mật khẩu <span class="required">*</span></label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                </div>

                <!-- Ghi nhớ & Quên mật khẩu -->
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember"> Ghi nhớ đăng nhập
                    </label>
                    <a href="?page=forgotPassword" class="forgot-pass">Quên mật khẩu?</a>
                </div>

                <!-- Nút Đăng nhập -->
                <button type="submit" class="btn-submit">Đăng nhập</button>
            </div>

            <!-- Chuyển sang Đăng ký -->
            <div class="login-footer">
                <p>Bạn chưa có tài khoản? <a href="?page=register">Đăng ký ngay</a></p>
            </div>
        </form>
    </div>
</div>

<script>
// Chuyển đổi giao diện nhập SĐT / ID theo vai trò
function toggleLoginForm() {
    const isPatient = document.getElementById('role-patient').checked;
    const isDoctor = document.getElementById('role-doctor').checked;
    const isManager = document.getElementById('role-manager').checked;

    const groupPhone = document.getElementById('group-phone');
    const groupId = document.getElementById('group-id');
    const labelId = document.getElementById('label-id');
    const inputPhone = document.getElementById('phone');
    const inputId = document.getElementById('user_id');

    if (isPatient) {
        groupPhone.style.display = 'block';
        groupId.style.display = 'none';
        inputPhone.setAttribute('required', 'required');
        inputId.removeAttribute('required');
    } else {
        groupPhone.style.display = 'none';
        groupId.style.display = 'block';
        inputPhone.removeAttribute('required');
        inputId.setAttribute('required', 'required');

        if (isDoctor) {
            labelId.innerHTML = 'Mã Bác sĩ (ID) <span class="required">*</span>';
            inputId.placeholder = 'Ví dụ: BS102';
        } else if (isManager) {
            labelId.innerHTML = 'Mã Quản lý (ID) <span class="required">*</span>';
            inputId.placeholder = 'Ví dụ: MN001';
        }
    }
}

// Xử lý chuyển hướng đến đúng trang tương ứng sau khi Đăng nhập thành công
function handleLoginSubmit(e) {
    e.preventDefault(); // Ngăn submit form mặc định

    const isPatient = document.getElementById('role-patient').checked;
    const isDoctor = document.getElementById('role-doctor').checked;
    const isManager = document.getElementById('role-manager').checked;

    // Chuyển hướng giao diện tùy theo vai trò đã chọn
    if (isPatient) {
        window.location.href = "?page=benhnhan";
    } else if (isDoctor) {
        window.location.href = "?page=bacsi";
    } else if (isManager) {
        window.location.href = "?page=manager";
    }

    return false;
}
</script>