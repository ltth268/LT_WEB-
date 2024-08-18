<!DOCTYPE html>
<html>
<head>
    <title>Bài 4</title>
    <link rel="stylesheet" type="text/css" href="bai4.css">
</head>
<body>
<div class="khung">
    <div class="title">Array Functions</div>
    <?php
        $arr = array(5, 2, 9, 1, 7, 3);
        $max_value = max($arr);
        $min_value = min($arr);
        $sum = array_sum($arr);
        sort($arr);
        $contains_seven = in_array(7, $arr);

        echo"<div class='ketqua'>
        <ul>Mảng ban đầu: 5, 2, 9, 1, 7, 3</ul>
        <ul>Giá trị lớn nhất trong mảng: $max_value</ul>
        <ul>Giá trị nhỏ nhất trong mảng: $min_value</ul>
        <ul>Tổng các phần tử trong mảng: $sum</ul>
        <ul>Mảng sau khi sắp xếp: " . implode(", ", $arr) . "</ul>
        <ul>7 " . ($contains_seven ? "có" : "không có") . " trong mảng</ul>
        </div>";
    ?>
</div>

</body>
</html>
