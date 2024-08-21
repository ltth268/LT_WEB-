<!DOCTYPE html>
<html>
<head>
    <title>Bài 3</title>
    <link rel="stylesheet" type="text/css" href="bai3.css">
</head>
<body>
    <h3>PHÉP TÍNH TRÊN HAI SỐ</h3>
    <form action="bai3.1.php" method="post">
        <div style="color: red;">
            Chọn phép tính:
            <input type="radio" id="cong" name="chon" value="cong">
            <label for="cong">Cộng</label>
            <input type="radio" id="tru" name="chon" value="tru">
            <label for="tru">Trừ</label>
            <input type="radio" id="nhan" name="chon" value="nhan">
            <label for="nhan">Nhân</label>
            <input type="radio" id="chia" name="chon" value="chia">
            <label for="chia">Chia</label>
        </div>
        <br>
        <div>
            Số thứ nhất: <input type="text" name="field1" required><br>
            <br>
            Số thứ hai: <input type="text" name="field2" required><br>
            <br>
        </div>
        <button type="submit">Tính</button>
    </form>
</body>
</html>
