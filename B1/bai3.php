<!DOCTYPE html>
<html>
<head>
    <title>Bài 3</title>
    <style>
        .container {
        width: 400px;
        margin: 50px auto;
        border: 2px solid #000;
        padding: 20px;
        }
    input, button {
        margin: 10px 0;
        padding: 10px;
        width: 100%;
        box-sizing: border-box;
    }
    button {
        background-color: #009999;
        color: white;
        border: none;
        cursor: pointer;
        padding: 10px;
        font-size: 16px;
    }
    .operation-container {
        display: flex;
        gap: 20px; 
        align-items: center; 
    }
    .operation-container div {
        display: flex;
        align-items: center; 
    }
    </style>

</head>
<body>
<div class="container">
    <div class="form-container">
        <h2>PHÉP TÍNH TRÊN HAI SỐ</h2>
        <form method="post" action="">
            <label for="operation">Phép tính:</label>
            <div class="operation-container">
                <div>
                    <input type="radio" id="cong" name="operation" value="cong" <?php if(isset($_POST['operation']) && $_POST['operation'] == 'cong') echo 'checked'; ?>>
                    <label for="cong">Cộng</label>
                </div>
                <div>
                    <input type="radio" id="tru" name="operation" value="tru" <?php if(isset($_POST['operation']) && $_POST['operation'] == 'tru') echo 'checked'; ?>>
                    <label for="tru">Trừ</label>
                </div>
                <div>
                    <input type="radio" id="nhan" name="operation" value="nhan" <?php if(isset($_POST['operation']) && $_POST['operation'] == 'nhan') echo 'checked'; ?>>
                    <label for="nhan">Nhân</label>
                </div>
                <div>
                    <input type="radio" id="chia" name="operation" value="chia" <?php if(isset($_POST['operation']) && $_POST['operation'] == 'chia') echo 'checked'; ?>>
                    <label for="chia">Chia</label>
                </div>
            </div>
            <label for="field1">Số thứ nhất:</label>
            <input type="text" id="field1" name="field1" placeholder="Nhập số 1" value="<?php echo isset($_POST['field1']) ? $_POST['field1'] : ''; ?>">
            <label for="field2">Số thứ hai:</label>
            <input type="text" id="field2" name="field2" placeholder="Nhập số 2" value="<?php echo isset($_POST['field2']) ? $_POST['field2'] : ''; ?>">
            <button type="submit">Tính</button>
        </form>
    </div>
    <div class="form-container">
        <label for="field3">Kết quả:</label>
        <input type="text" id="field3" name="field3" placeholder="Hiển thị kết quả" readonly value="
        <?php
            function isPrime($num) {
                if ($num <= 1) return false;
                for ($i = 2; $i <= sqrt($num); $i++) {
                    if ($num % $i == 0) return false;
                }
                return true;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $num1 = isset($_POST['field1']) ? (float)$_POST['field1'] : 0;
                $num2 = isset($_POST['field2']) ? (float)$_POST['field2'] : 0;
                $operation = isset($_POST['operation']) ? $_POST['operation'] : '';

                switch ($operation) {
                    case 'cong':
                        echo $num1 + $num2;
                        break;
                    case 'tru':
                        echo $num1 - $num2;
                        break;
                    case 'nhan':
                        echo $num1 * $num2;
                        break;
                    case 'chia':
                        if ($num2 != 0) {
                            echo $num1 / $num2;
                        } else {
                            echo "Không thể chia cho 0";
                        }
                        break;
                    default:
                        echo "Phép tính không hợp lệ";
                }
            }
        ?>">
        <button type="button" onclick="window.location.href=window.location.href">Làm lại</button>

        <div class="additional-results">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Check even/odd
                    echo "<p>Số thứ nhất là: " . ($num1 % 2 === 0 ? "Chẵn" : "Lẻ") . "</p>";
                    echo "<p>Số thứ hai là: " . ($num2 % 2 === 0 ? "Chẵn" : "Lẻ") . "</p>";

                    // Check prime
                    echo "<p>Số thứ nhất " . (isPrime($num1) ? "là số nguyên tố" : "không phải là số nguyên tố") . "</p>";
                    echo "<p>Số thứ hai " . (isPrime($num2) ? "là số nguyên tố" : "không phải là số nguyên tố") . "</p>";
                }
            ?>
        </div>
    </div>
</div>
</body>
</html>