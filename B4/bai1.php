<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #FFDAB9;
        }
        .container1 {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .bang {
            border-spacing: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Payment Receipt Upload Form</h1>
    <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // File upload process
    $targetDir = "uploads/";
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
        echo "File của bạn quá lớn.";
        exit;
    }
    
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Kiểm tra xem tệp có phải là hình ảnh không
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        echo "Tệp không phải là hình ảnh.";
        exit;
    }

    // Kiểm tra định dạng tệp
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Xin lỗi, chỉ cho phép các định dạng JPG, JPEG, PNG & GIF.";
        exit;
    }

    // Kiểm tra nếu thư mục tồn tại, nếu không thì tạo
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    // Di chuyển tệp đến thư mục uploads
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        $uploadedImage = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
        echo "<div class='container1'>";
        echo "<table class='bang'>";
        echo "<tr><td>First Name:</td><td>" . htmlspecialchars($_POST["firstname"]) . "</td></tr>";
        echo "<tr><td>Last Name:</td><td>" . htmlspecialchars($_POST["lastname"]) . "</td></tr>";
        echo "<tr><td>Email:</td><td>" . htmlspecialchars($_POST["email"]) . "</td></tr>";
        echo "<tr><td>Invoice ID:</td><td>" . htmlspecialchars($_POST["invoiceid"]) . "</td></tr>";
        echo "<tr><td>Pay For:</td><td>" . implode(", ", $_POST["pay_for"]) . "</td></tr>";
        echo "<tr><td>Uploaded Receipt:</td><td><img src='$targetDir$uploadedImage' alt='$uploadedImage' style='max-width: 100%; height: auto; margin-top: 20px;'></td></tr>";
        echo "<tr><td>Additional Information:</td><td>" . htmlspecialchars($_POST["additional_info"]) . "</td></tr>";
        echo "</table></div>";
    } else {
        echo "Xin lỗi, đã có lỗi xảy ra khi tải tệp lên.";
    }
}
?>
</body>
</html>