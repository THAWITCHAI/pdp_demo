<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>
<?php require_once('../Connected/connect.php'); ?>
<?php
    mysqli_set_charset($conn, "utf8mb4");
    $rs1 = mysqli_query($conn, "delete from appointment_type where appointment_type_id = $_GET[appointment_type_id]");
    header("Location: ../main/appointment_type.php");

?>