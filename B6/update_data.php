<?php
$servername = "localhost:8111";
$username = "root";
$password = "";
$dbname = "b5_mydb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cập nhật firstname của James thành Jane
    $sql = "UPDATE myguests SET firstname='Jane' WHERE firstname='James'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "Dữ liệu đã được cập nhật";
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
$conn = null;
?>
