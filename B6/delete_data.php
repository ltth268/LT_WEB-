<?php
$servername = "localhost:8111";
$username = "root";
$password = "";
$dbname = "b5_mydb";

try {
    // Kết nối tới cơ sở dữ liệu
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Xóa bản ghi có id = 3
    $sql = "DELETE FROM myguests WHERE id=3";
    $conn->exec($sql);
    echo "Dữ liệu đã được xóa thành công<br>";
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
$conn = null;
?>