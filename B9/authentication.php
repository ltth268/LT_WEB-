<?php
session_start();

// Kiểm tra nếu người dùng đã đăng nhập
if (isset($_SESSION['username'])) {
    // Nếu đã đăng nhập, chuyển hướng đến trang chính
    if ($_SESSION['username'] === 'admin') {
        header('Location: admin.php');
    } else {
        header('Location: admin.php');
    }
    exit();
}

// Dữ liệu giả lập cho tên đăng nhập và mật khẩu đã được mã hóa
$users = [
    '123456789' => password_hash('123456789', PASSWORD_DEFAULT),
    '987654321' => password_hash('987654321', PASSWORD_DEFAULT),
    'heheheh' => password_hash('heheheh', PASSWORD_DEFAULT),
    'asdfg' => password_hash('asdfg', PASSWORD_DEFAULT)
];

// Kiểm tra nếu form được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra tên đăng nhập và mật khẩu
    if (array_key_exists($username, $users) && password_verify($password, $users[$username])) {
        $_SESSION['username'] = $username;

        // Phân quyền
        if ($username === 'admin') {
            header('Location: admin.php'); // Điều hướng đến trang admin
        } else {
            header('Location: admin.php'); // Điều hướng đến trang employee
        }
        exit();
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại.";
    }
}

// Nếu không có phương thức POST, yêu cầu xác thực
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Secure Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Bạn cần đăng nhập để truy cập trang này.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
</head>
<body>

<div class="login-form">
    <h2>Đăng Nhập</h2>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        username:<input type="text" id="username" name="username" placeholder="Tên đăng nhập" required>
        <br>
        password:<input type="password" id="password" name="password" placeholder="Mật khẩu" required>
        <br>
        <input type="submit" value="Đăng Nhập">
    </form>
    <p>username: heheheh - password: heheheh</p>
    <p>username: 123456789 - password: 123456789</p>
    <p>username: 987654321 - password: 987654321</p>
    <p>username: asdf - password: asdf</p>
</div>

</body>
</html>