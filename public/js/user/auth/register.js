$(document).ready(function() {
    const showPasswordToggles = $(".show-password-toggle");
    let isMouseDown = false;

    // Bắt sự kiện khi nhấn giữ
    showPasswordToggles.mousedown(function() {
        isMouseDown = true;
        const targetInputId = $(this).data("target");
        togglePasswordVisibility(targetInputId);
    });

    // Bắt sự kiện khi thả ra
    showPasswordToggles.mouseup(function() {
        isMouseDown = false;
        const targetInputId = $(this).data("target");
        togglePasswordVisibility(targetInputId);
    });

    // Bắt sự kiện khi di chuột ra khỏi nút
    showPasswordToggles.mouseout(function() {
        if (isMouseDown) {
            isMouseDown = false;
            const targetInputId = $(this).data("target");
            togglePasswordVisibility(targetInputId);
        }
    });

    // Hàm thực hiện chức năng hiển thị/ẩn mật khẩu
    function togglePasswordVisibility(targetInputId) {
        const targetInput = $("#" + targetInputId);
        if (isMouseDown) {
            // Hiển thị mật khẩu khi nhấn giữ
            targetInput.attr("type", "text");
        } else {
            // Ẩn mật khẩu khi thả ra
            targetInput.attr("type", "password");
        }
    }
});