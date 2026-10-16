<div class="forgot-page">
    <div class="forgot-card">
        <!-- Header tiêu đề -->
        <div class="forgot-header">
            <h2>Quên mật khẩu?</h2>
            <p>Nhập thông tin tài khoản của bạn để nhận hướng dẫn khôi phục mật khẩu</p>
        </div>

        <!-- Form Khôi phục -->
        <form action="<?php echo BASE_URL; ?>?page=forgot_password_process" method="POST" class="forgot-form">

            <!-- Chọn Vai Trò (Role Selection) -->
            <div class="role-selector">
                <input type="radio" id="role-patient" name="role" value="patient" checked onchange="toggleForgotForm()">
                <label for="role-patient" class="role-tab">
                    <img src="<?php echo BASE_ASSETS; ?>/images/icons/person-square.svg" alt="">
                    <span>Bệnh nhân</span>
                </label>

                <input type="radio" id="role-doctor" name="role" value="doctor" onchange="toggleForgotForm()">
                <label for="role-doctor" class="role-tab">
                    <img src="<?php echo BASE_ASSETS; ?>/images/icons/person-badge.svg" alt="">
                    <span>Bác sĩ</span>
                </label>

                <input type="radio" id="role-manager" name="role" value="manager" onchange="toggleForgotForm()">
                <label for="role-manager" class="role-tab">
                    <img src="<?php echo BASE_ASSETS; ?>/images/icons/person-badge.svg" alt="">
                    <span>Quản lý</span>
                </label>
            </div>

            <!-- Trường Nhập Liệu -->
            <div class="form-body">
                <!-- Ô Nhập SĐT cho Bệnh nhân -->
                <div class="form-group" id="group-phone">
                    <label for="phone">Số điện thoại đăng ký <span class="required">*</span></label>
                    <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại (ví dụ: 0912345678)"
                        pattern="[0-9]{10}" title="Vui lòng nhập số điện thoại 10 chữ số" required autocomplete="off">
                </div>

                <!-- Ô Nhập ID cho Bác sĩ & Manager -->
                <div class="form-group" id="group-id" style="display: none;">
                    <label for="user_id" id="label-id">Mã Bác sĩ (ID) <span class="required">*</span></label>
                    <input type="text" id="user_id" name="user_id" placeholder="Nhập mã định danh của bạn"
                        autocomplete="off">
                </div>

                <!-- Email/SĐT nhận mã xác minh khôi phục -->
                <div class="form-group">
                    <label for="email_recovery">Email hoặc SĐT nhận mã OTP <span class="required">*</span></label>
                    <input type="text" id="email_recovery" name="email_recovery"
                        placeholder="Nhập Email hoặc SĐT nhận OTP" required autocomplete="off">
                </div>

                <!-- Nút Gửi yêu cầu -->
                <button type="submit" class="btn-submit">Gửi mã xác thực OTP</button>
            </div>

            <!-- Quay lại Đăng nhập -->
            <div class="forgot-footer">
                <p>Bạn đã nhớ lại mật khẩu? <a href="?page=login">Đăng nhập ngay</a></p>
            </div>
        </form>
    </div>
</div>

<!-- Script xử lý chuyển đổi giao diện theo vai trò -->
<script>
    function toggleForgotForm() {
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
</script>