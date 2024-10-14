<?php
require 'employee.php';
$roles = get_all_role();

$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
$role_data = null;

if ($id) {
    $role_data = get_role($id);
    if ($role_data) {
        foreach ($role_data as $row) {
            $role_id = $row['role_id'];
            $role_name = $row['role_name'];
        }
    }
}

if (!$role_data) {
    header("location: roles_list.php");
    exit();
}

if (!empty($_POST['edit_role'])) {
    $role_data['role_id'] = isset($_POST['role_id']) ? $_POST['role_id'] : '';
    $role_data['role_name'] = isset($_POST['role_name']) ? $_POST['role_name'] : '';

    $errors = array();
    if (empty($role_data['role_id'])) {
        $errors['role_id'] = 'Role ID không bỏ trống';
    }

    if (empty($role_data['role_name'])) {
        $errors['role_name'] = 'Role name không bỏ trống';
    }

    if (empty($errors)) {
        edit_role($role_data['role_id'], $role_data['role_name']);
        header("location: roles_list.php");
        exit();
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa thông tin chức vụ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Sửa thông tin chức vụ</h1>
    <a href="roles_list.php">Trở về</a><br/><br/>
    <form method="post" action="roles_edit.php?id=<?php echo $id; ?>">
        <table width="50%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>Role ID</td>
                <td>
                    <input type="number" name="role_id" value="<?php echo htmlspecialchars($role_id); ?>" readonly/>
                    <?php if (!empty($errors['role_id'])) echo $errors['role_id']; ?>
                </td>
            </tr>
            <tr>
                <td>Role Name</td>
                <td>
                    <input type="text" name="role_name" value="<?php echo htmlspecialchars($role_name); ?>"/>
                    <?php if (!empty($errors['role_name'])) echo $errors['role_name']; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="edit_role" value="Lưu"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
