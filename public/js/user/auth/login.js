$(document).ready(function() {
    const passwordInput = $("#passwordInput");
    const showPasswordToggle = $("#showPasswordToggle");
    let isMouseDown = false;

    // Bắt sự kiện khi nhấn giữ
    showPasswordToggle.mousedown(function() {
        isMouseDown = true;
        togglePasswordVisibility();
    });

    // Bắt sự kiện khi thả ra
    showPasswordToggle.mouseup(function() {
        isMouseDown = false;
        togglePasswordVisibility();
    });

    // Bắt sự kiện khi di chuột ra khỏi nút
    showPasswordToggle.mouseout(function() {
        if (isMouseDown) {
            isMouseDown = false;
            togglePasswordVisibility();
        }
    });

    // Hàm thực hiện chức năng hiển thị/ẩn mật khẩu
    function togglePasswordVisibility() {
        if (isMouseDown) {
            // Hiển thị mật khẩu khi nhấn giữ
            passwordInput.attr("type", "text");
        } else {
            // Ẩn mật khẩu khi thả ra
            passwordInput.attr("type", "password");
        }
    }
});