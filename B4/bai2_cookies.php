<?php
   $cookie_Fname = "First_Name";
   $cookie_Fname_value = htmlspecialchars($_POST["firstname"]);
   setcookie($cookie_Fname, $cookie_Fname_value, time()+(86400*30)); // 86400 = 1 day

   $cookie_Lname = "Last_Name";
   $cookie_Lname_value = htmlspecialchars($_POST["lastname"]);
   setcookie($cookie_Lname, $cookie_Lname_value, time()+(86400*30)); // 86400 = 1 day

   $cookie_email = "Email";
   $cookie_email_value = htmlspecialchars($_POST["email"]);
   setcookie($cookie_email, $cookie_email_value, time()+(86400*30)); // 86400 = 1 day

   $cookie_pay_for = "Pay_For";
   $cookie_pay_for_value = serialize($_POST["pay_for"]);
   setcookie($cookie_pay_for, $cookie_pay_for_value, time()+(86400*30)); // 86400 = 1 day

   $cookie_additional_info = "Additional_Info";
   $cookie_additional_info_value = htmlspecialchars($_POST["additional_info"]);
   setcookie($cookie_additional_info, $cookie_additional_info_value, time()+(86400*30)); // 86400 = 1 day

?>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Thông Tin Người Dùng Lấy Từ Cookies</h1>
        <div class="container1">
        <?php
            if(!isset($_COOKIE[$cookie_Fname])){
                echo "<p>Cookie First Name is not set!</p>";
            }else {
                echo "<p>First Name: ".$_COOKIE[$cookie_Fname]."</p>";
            }

            if(!isset($_COOKIE[$cookie_Lname])){
                echo "<p>Cookie Last Name is not set!</p>";
            }else {
                echo "<p>Last Name: ".$_COOKIE[$cookie_Lname]."</p>";
            }

            if(!isset($_COOKIE[$cookie_email])){
                echo "<p>Cookie Email is not set!</p>";
            }else {
                echo "<p>Email: ".$_COOKIE[$cookie_email]."</p>";
            }

            if(!isset($_COOKIE[$cookie_pay_for])){
                echo "<p>Cookie Pay For is not set!</p>";
            }else {
                echo "<p>Pay For: </p><ul>";
                $pay_for_items = unserialize($_COOKIE[$cookie_pay_for]);
                foreach($pay_for_items as $item){
                    echo "<li>" . htmlspecialchars($item) . "</li>";
                }
                echo "</ul>";
            }

            if(!isset($_COOKIE[$cookie_additional_info])){
                echo "<p>Cookie Additional Info is not set!</p>";
            }else {
                echo "<p>Additional Info: ".$_COOKIE[$cookie_additional_info]."</p>";
            }
        ?>
        </div>
    </div>
</body>
</html>
