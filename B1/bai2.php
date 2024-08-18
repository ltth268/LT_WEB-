<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bài 2</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .hienthimottrang {
            margin-top: 20px;
        }
        .hienthimottrang a {
            margin: 0 5px;
            padding: 8px 16px;
            text-decoration: none;
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            color: #333;
        }
        .hienthimottrang a.active {
            background-color: #333;
            color: white;
            border: 1px solid #333;
        }
    </style>
</head>
<body>

    <h2>Danh sách sách</h2>

    <?php
// Tổng số sách
    $totalBooks = 100;
// Số sách trên mỗi trang
    $booksPerPage = 10;
// Tính tổng số trang
    $totalPages = ceil($totalBooks / $booksPerPage);

// Xác định trang hiện tại
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($current_page < 1) $current_page = 1;
    if ($current_page > $totalPages) $current_page = $totalPages;

// Tính chỉ số bắt đầu cho dữ liệu trang hiện tại
    $start = ($current_page - 1) * $booksPerPage;

// Hiển thị bảng dữ liệu
    echo "<table>";
    echo "<tr><th>STT</th><th>Tên sách</th><th>Nội dung sách</th></tr>";
    for ($i = $start + 1; $i <= min($start + $booksPerPage, $totalBooks); $i++) {
        echo "<tr>";
        echo "<td>{$i}</td>";
        echo "<td>Tensach{$i}</td>";
        echo "<td>Noidung{$i}</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Hiển thị phân trang
    echo '<div class="hienthimottrang">';
    for ($page = 1; $page <= $totalPages; $page++) {
        if ($page == $current_page) {
            echo "<a class='active' href='?page={$page}'>{$page}</a>";
        } else {
            echo "<a href='?page={$page}'>{$page}</a>";
        }
    }
    echo '</div>';
    ?>
</body>
</html>
