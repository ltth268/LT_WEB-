<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
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
        .checkbox {
            display: flex;
            justify-content: space-between;
        }
        .submit{
            padding: 20px;
            width: 100%;
            background-color: #FFEFD5;
            border-radius: 10px;
            text-align: center;
        }
    </style>
    <script>
    function validateForm() {
        const firstname = document.getElementById('firstname').value;
        const lastname = document.getElementById('lastname').value;
        const email = document.getElementById('email').value;
        const invoiceid = document.getElementById('invoiceid').value;
        const payForCheckboxes = document.querySelectorAll('input[name="pay_for[]"]:checked');

        if (!firstname) {
            alert("Vui lòng điền vào trường Họ.");
            return false;
        }
        if (!lastname) {
            alert("Vui lòng điền vào trường Tên.");
            return false;
        }
        if (!email) {
            alert("Vui lòng điền vào trường Email.");
            return false;
        }
        if (!invoiceid || isNaN(invoiceid)) {
            alert("Vui lòng chọn Invoice ID và đảm bảo nó là một số.");
            return false;
        }
        if (payForCheckboxes.length === 0) {
            alert("Vui lòng chọn ít nhất một phương thức thanh toán.");
            return false;
        }

        return true;
    }
</script>
</head>
<body>
    <div class="container">
        <h1>Payment Receipt Upload Form</h1>
        <form action="bai2_cookies.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div class="container1">
            <table class="bang">
                <tr>
                    <td>Name</td>
                </tr>
                <tr>
                    <td><input type="text" id="firstname" name="firstname" placeholder="First Name"></td>
                    <td><input type="text" id="lastname" name="lastname" placeholder="Last Name"></td>
                </tr>
                <tr> 
                    <td>Email</td>
                    <td>Invoice ID</td>
                </tr>
                <tr>
                    <td><input type="email" id="email" name="email" placeholder="example@gmail.com"></td>
                    <td><input type="text" id="invoiceid" name="invoiceid"></td>
                </tr>
            </table>
            <h3>Pay For</h3>
            <div class="checkbox">
                <div>
                    <input type="checkbox" name="pay_for[]" value="15k_Category"> 15K Category<br>
                    <input type="checkbox" name="pay_for[]" value="55k_Category"> 55K Category<br>
                    <input type="checkbox" name="pay_for[]" value="116k_Category"> 116K Category<br>
                    <input type="checkbox" name="pay_for[]" value="Shuttle_Two_Ways"> Shuttle Two Ways<br>
                    <input type="checkbox" name="pay_for[]" value="Compressport_T-Shirt_Merchandise"> Compressport T-Shirt Merchandise<br>
                    <input type="checkbox" name="pay_for[]" value="Other"> Other <br>
                </div>
                <div>
                    <input type="checkbox" name="pay_for[]" value="35k_Category"> 35K Category<br>
                    <input type="checkbox" name="pay_for[]" value="75k_Category"> 75K Category <br>
                    <input type="checkbox" name="pay_for[]" value="Shuttle_One_Way"> Shuttle One Way <br>
                    <input type="checkbox" name="pay_for[]" value="Training_Cap_Merchandise"> Training Cap Merchandise <br>
                    <input type="checkbox" name="pay_for[]" value="Buf_Merchandise"> Buf Merchandise <br>
                </div>
            </div>
            
            <h3>Please upload your payment receipt:</h3>
            <input type="file" name="fileToUpload" id="fileToUpload" required>

            <h3>Additional Information</h3>
            <textarea name="additional_info" rows="4" placeholder="Type here..."></textarea><br>
            </div>
            <input type="submit" value="Submit" class="submit">
        </form>
    </div>
</body>
</html>