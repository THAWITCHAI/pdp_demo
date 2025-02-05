<?php session_start() ?>

<?php require_once('../Connected/connect.php'); ?>

<?php
if ($_POST) {
    // echo $_POST['username'];
    $data = mysqli_query($conn, "select * from appointments");
    // print_r($data);
    // echo "<br/>";
    $check_username = false;
    while ($row = mysqli_fetch_assoc($data)) {
        if ($_POST['appointment_username'] == $row['appointment_username'] && $_POST['appointment_password'] == $row['appointment_password']) {
            $check_username = true;
            $_SESSION['username'] = $_POST['appointment_username'];
            $_SESSION['password'] = $_POST['appointment_password'];
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

