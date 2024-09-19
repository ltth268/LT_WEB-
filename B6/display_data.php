<?php
$servername = "sql110.infinityfree.com";
$username = "if0_37095544";
$password = "Viethung2710";
$dbname = "if0_37095544_b5_mydb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn để lấy dữ liệu từ bảng MyGuests
    $stmt = $conn->prepare("SELECT id, firstname, lastname, email, reg_date FROM MyGuests");
    $stmt->execute();
    
    // Thiết lập chế độ lấy dữ liệu dưới dạng associative array
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
    ?>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Reg Date</th>
        </tr>
        <?php foreach($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['reg_date']; ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
$conn = null;
?>
