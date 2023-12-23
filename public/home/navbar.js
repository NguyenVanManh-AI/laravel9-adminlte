$(document).ready(function () {
    $('.nav-link[data-toggle="dropdown"]').click(function () {
        var $dropdownToggle = $(this);

        // Kiểm tra trạng thái hiện tại của aria-expanded
        var isExpanded = $dropdownToggle.attr('aria-expanded') === 'true';

        // Thay đổi thuộc tính aria-expanded
        $dropdownToggle.attr('aria-expanded', !isExpanded);

        // Tìm li.dropdown và thực hiện thay đổi class
        var $parentLi = $dropdownToggle.parents('li.dropdown');
        if (!isExpanded) {
            // Nếu trạng thái là false, thêm class show
            $parentLi.addClass('show');
        } else {
            // Nếu trạng thái là true, loại bỏ class show
            $parentLi.removeClass('show');
        }

        // Tìm dropdown-menu và thực hiện thay đổi class
        var $dropdownMenu = $dropdownToggle.next('.dropdown-menu');
        if (!isExpanded) {
            // Nếu trạng thái là false, thêm class show
            $dropdownMenu.addClass('show');
        } else {
            // Nếu trạng thái là true, loại bỏ class show
            $dropdownMenu.removeClass('show');
        }
    });
});
