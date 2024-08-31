<!DOCTYPE html>
<html>
<head>
    <title>Bài trên lớp</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        .container{
            max-width: 200px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <script>
        function validateForm() {
            var tensach = document.forms["bookForm"]["tensach"].value;
            var tacgia = document.forms["bookForm"]["tacgia"].value;
            var nhaxuatban = document.forms["bookForm"]["nhaxuatban"].value;
            var namxuatban = document.forms["bookForm"]["namxuatban"].value;
            var namXuatBanNum = parseInt(namxuatban);

            if (tensach == "") {
                alert("Tên sách không được để trống");
                return false;
            }
            if (tacgia == "") {
                alert("Tác giả không được để trống");
                return false;
            }
            if (nhaxuatban == "") {
                alert("Nhà xuất bản không được để trống");
                return false;
            }
            if (namxuatban == "" || isNaN(namXuatBanNum) || namXuatBanNum < 1000 || namXuatBanNum > new Date().getFullYear()) {
                alert("Năm xuất bản phải là một số hợp lệ");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
    <h3>Thông tin sách</h3>
    <form name="bookForm" action="Server_bai1.php" method="post" onsubmit="return validateForm()">
        Tên sách: <input type="text" name="tensach"><br>
        Tác giả: <input type="text" name="tacgia"><br>
        Nhà xuất bản: <input type="text" name="nhaxuatban"><br>
        Năm Xuất bản: <input type="text" name="namxuatban"><br>
        <input type="submit" value="Submit">
    </form>
    </div>
</body>
</html>
