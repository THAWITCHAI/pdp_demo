<?php session_start() ?>

<?php require_once('../Connected/connect.php'); ?>

<?php
if ($_POST) {
    // echo $_POST['username'];
    $data = mysqli_query($conn, "select * from appuser");
    // print_r($data);
    // echo "<br/>";
    $check_username = false;
    while ($row = mysqli_fetch_assoc($data)) {
        if ($_POST['appuser_username'] == $row['appuser_username'] && $_POST['appuser_password'] == $row['appuser_password']) {
            $check_username = true;
            $_SESSION['username'] = strip_tags($row['appuser_name']);
            header("Location: ../reg/appointments.php");
            break;
        }
    }

    if ($check_username == false) {
        header("Location: login.php");
    }

    echo "Ok";
    exit(0);
} else {
    header("Location: login.php");
}
?>

