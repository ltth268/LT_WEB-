<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
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
    <table class="bang">
        <tr>
            <td>First Name:</td>
            <td><?php echo htmlspecialchars($_POST["firstname"]); ?></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><?php echo htmlspecialchars($_POST["lastname"]); ?></td>
        </tr>
        <tr> 
            <td>Email:</td>
            <td><?php echo htmlspecialchars($_POST["email"]); ?></td>
        </tr>
        <tr>
            <td>Invoice Id:</td>
            <td><?php echo htmlspecialchars($_POST["invoiceid"]); ?></td>
        </tr>
        <tr>
            <td>Pay For:</td>
            <td><?php echo implode(", ", $_POST["pay_for"]); ?></td>
        </tr>
    </table>
    </div>
</body>
</html>