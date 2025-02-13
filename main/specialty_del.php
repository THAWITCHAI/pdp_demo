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
    $rs1 = mysqli_query($conn, "delete from specialty where specialty_id = $_GET[specialty_id]");
    header("Location: ../main/specialty.php");

?>