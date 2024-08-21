<!DOCTYPE html>
<html>
<head>
    <title>Bài 3</title>
    <link rel="stylesheet" type="text/css" href="bai3.css">
</head>
<body>
    <h3>PHÉP TÍNH TRÊN HAI SỐ</h3>
    <div style="color: red;">
        Chọn phép tính:
        <input type="radio" id="cong" name="chon" value="cong" <?= isset($_POST['chon']) && $_POST['chon'] == 'cong' ? 'checked' : ''; ?>>
        <label for="cong">Cộng</label>
        <input type="radio" id="tru" name="chon" value="tru" <?= isset($_POST['chon']) && $_POST['chon'] == 'tru' ? 'checked' : ''; ?>>
        <label for="tru">Trừ</label>
        <input type="radio" id="nhan" name="chon" value="nhan" <?= isset($_POST['chon']) && $_POST['chon'] == 'nhan' ? 'checked' : ''; ?>>
        <label for="nhan">Nhân</label>
        <input type="radio" id="chia" name="chon" value="chia" <?= isset($_POST['chon']) && $_POST['chon'] == 'chia' ? 'checked' : ''; ?>>
        <label for="chia">Chia</label>
    </div>
    <br>
    <div>
        Số thứ nhất: <?= isset($_POST["field1"]) ? htmlspecialchars($_POST["field1"]) : ''; ?><br>
        <br>
        Số thứ hai: <?= isset($_POST["field2"]) ? htmlspecialchars($_POST["field2"]) : ''; ?><br>
        <br>
        Kết quả: 
        <input type="text" id="field3" name="field3" placeholder="Hiển thị kết quả" readonly value="<?= calculateResult(); ?>">
    </div>
    <?php
function calculateResult() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = isset($_POST['field1']) ? (float)$_POST['field1'] : 0;
        $num2 = isset($_POST['field2']) ? (float)$_POST['field2'] : 0;
        $chon = isset($_POST['chon']) ? $_POST['chon'] : '';

        switch ($chon) {
            case 'cong':
                return $num1 + $num2;
            case 'tru':
                return $num1 - $num2;
            case 'nhan':
                return $num1 * $num2;
            case 'chia':
                return $num2 != 0 ? $num1 / $num2 : "Không thể chia cho 0";
            default:
                return "Phép tính không hợp lệ";
        }
    }
    return '';
}
?>
<br>
    <i><a href="bai3.php">Quay lại trang trước</a></i>
</body>
</html>