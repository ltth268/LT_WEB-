<!DOCTYPE html>
<html>
<head>
    <title>Bài 4
    </title>
    <link rel="stylesheet" type="text/css" href="bai4.css">
</head>
<body>
<div class="khung">
    <div class="title">Kết quả của mảng</div>
    <div class="ketqua">
        <?php
            if (isset($_POST['array'])) {
                $arr = explode(",", $_POST['array']);
                $arr = array_map('intval', $arr);
                
                $max_value = max($arr);
                $min_value = min($arr);
                $sum = array_sum($arr);
                sort($arr);
                $contains_seven = in_array(7, $arr);

                echo "<div>
                    <ul>Mảng ban đầu: " . htmlspecialchars($_POST['array']) . "</ul>
                    <ul>Giá trị lớn nhất trong mảng: $max_value</ul>
                    <ul>Giá trị nhỏ nhất trong mảng: $min_value</ul>
                    <ul>Tổng các phần tử trong mảng: $sum</ul>
                    <ul>Mảng sau khi sắp xếp: " . implode(", ", $arr) . "</ul>
                    <ul>7 " . ($contains_seven ? "có" : "không có") . " trong mảng</ul>
                </div>";
            } else {
                echo "<p>Không có mảng nào được nhập.</p>";
            }
        ?>
    </div>
</div>
</body>
</html>