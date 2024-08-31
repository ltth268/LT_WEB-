<!DOCTYPE html>
<html>
<head>
    <title>Bài 1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 200px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
    <h3>Thông tin sách</h3>
    Tên sách: <?php echo htmlspecialchars($_POST["tensach"]); ?><br>
    Tên tác giả: <?php echo htmlspecialchars($_POST["tacgia"]); ?><br>
    Nhà xuất bản: <?php echo htmlspecialchars($_POST["nhaxuatban"]); ?><br>
    Năm xuất bản: <?php echo htmlspecialchars($_POST["namxuatban"]); ?><br>
    </div>
</body>
</html>
