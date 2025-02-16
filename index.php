<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ./auth/login.php");
    exit();
}else{
    header("Location: ./main/patient_add_universal.php");
    exit();
}
?>