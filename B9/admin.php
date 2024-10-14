<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: authentication.php'); // Chuyển hướng đến trang đăng nhập
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Admin</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
    </style>
    <script>
    $(document).ready(function() {
        // Load default content
        loadPage('employee_list.php');

        $('.nav a').click(function(e) {
            e.preventDefault();
            const page = $(this).attr('href');
            loadPage(page);
        });

        // Function to load content via AJAX
        function loadPage(page) {
            $.ajax({
                url: page,
                type: 'GET',
                success: function(data) {
                    $('#content').html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#content').html('<p>Đã xảy ra lỗi khi tải trang: ' + textStatus + ' - ' + errorThrown + '</p>');
                }
            });
        }

        // Xử lý form từ user.php
        $(document).on('submit', 'form', function(e) {
            e.preventDefault(); // Ngăn chặn hành vi mặc định của form
            const formData = $(this).serialize(); // Lấy dữ liệu từ form

            $.post($(this).attr('action'), formData, function(data) {
                $('#content').html(data); // Cập nhật nội dung
            }).fail(function(jqXHR, textStatus, errorThrown) {
                $('#content').html('<p>Đã xảy ra lỗi khi gửi dữ liệu: ' + textStatus + ' - ' + errorThrown + '</p>');
            });
        });
    });
    </script>
</head>
<body>
    <div class="content">
        <p>Trang dành cho quản lý.</p>
        <p><a href="user.php">Quản trị người dùng</a></p>
        <p><a href="http://hoailtt.000.pe/B8/department_list.php?i=1.php">Departments</a></p>
        <p><a href="http://hoailtt.000.pe/B8/roles_list.php?i=1.php">Roles</a></p>
        <p><a href="http://hoailtt.000.pe/B8/employee_list.php?i=1.php">Employees</a></p>
        <p><a class="logout" href="logout.php">Đăng xuất</a></p>
    </div>
</body>
</html>