<?php
$servername = "sql110.infinityfree.com";
$username = "if0_37095544";
$password = "Viethung2710";
$dbname = "if0_37095544_b5_mydb";

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
