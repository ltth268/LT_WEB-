<?php
$servername = "sql110.infinityfree.com";
$username = "if0_37095544";
$password = "Viethung2710";
$dbname = "if0_37095544_b5_mydb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Chèn dữ liệu vào bảng MyGuests
    $sql = "INSERT INTO myguests (firstname, lastname, email) 
            VALUES ('John', 'Doe', 'john@example.com'),
                   ('Jane', 'Smith', 'jane@example.com'),
                   ('James', 'Johnson', 'james@example.com'),
                   ('Emily', 'Brown', 'emily@example.com'),
                   ('Michael', 'Davis', 'michael@example.com')";
    $conn->exec($sql);
    echo "Dữ liệu đã được chèn thành công";
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
$conn = null;
?>
