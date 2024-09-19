<?php
$servername = "localhost:8111";
$username = "root";
$password = "";
$dbname = "b5_mydb";

try {
    // Kết nối với MySQL và tạo cơ sở dữ liệu
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Tạo cơ sở dữ liệu nếu chưa tồn tại
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->exec($sql);

    // Kết nối với cơ sở dữ liệu vừa tạo
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Tạo bảng MyGuests
    $sql = "CREATE TABLE IF NOT EXISTS myguests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
    echo "Bảng myguests được tạo thành công";
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
$conn = null;
?>
