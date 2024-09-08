<?php
    session_start();

    $cookie_Fname = "First_Name";
    $cookie_Fname_value = htmlspecialchars($_POST["firstname"]);
    setcookie($cookie_Fname, $cookie_Fname_value, time() + (86400 * 30)); // 86400 = 1 day

    $cookie_Lname = "Last_Name";
    $cookie_Lname_value = htmlspecialchars($_POST["lastname"]);
    setcookie($cookie_Lname, $cookie_Lname_value, time() + (86400 * 30)); // 86400 = 1 day

    $cookie_email = "Email";
    $cookie_email_value = htmlspecialchars($_POST["email"]);
    setcookie($cookie_email, $cookie_email_value, time() + (86400 * 30)); // 86400 = 1 day

    $cookie_payfor = "Pay_For";
    $cookie_payfor_value = implode(", ", $_POST["pay_for"]);
    setcookie($cookie_payfor, $cookie_payfor_value, time() + (86400 * 30));

    $cookie_file = "File";
    $cookie_file_value = htmlspecialchars($_FILES["fileToUpload"]["name"]);
    setcookie($cookie_file, $cookie_file_value, time() + (86400 * 30));

    $cookie_info = "Additional_Info";
    $cookie_info_value = htmlspecialchars($_POST["additional_info"]);
    setcookie($cookie_info, $cookie_info_value, time() + (86400 * 30));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
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
<h1>Thông Tin Người Dùng Lấy Từ Session</h1>
    <div class='container1'>
        <?php
           $_SESSION["firstname"] = htmlspecialchars($_POST["firstname"]);
           $_SESSION["lastname"] = htmlspecialchars($_POST["lastname"]);
           $_SESSION["email"] = htmlspecialchars($_POST["email"]);
           $_SESSION["pay_for"] = implode(", ", $_POST["pay_for"]);
           $_SESSION["additional_info"] = htmlspecialchars($_POST["additional_info"]);

           echo "First Name is: " . $_SESSION["firstname"] . "<br>";
           echo "Last Name is: " . $_SESSION["lastname"] . "<br>";
           echo "Email is: " . $_SESSION["email"] . "<br>";
           echo "Pay For is: " . $_SESSION["pay_for"] . "<br>";
           echo "Additional Info is: " . $_SESSION["additional_info"] . "<br>";
        ?>
    </div>
</div>
</body>
</html>
