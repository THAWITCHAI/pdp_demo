<?php include('../assets/html/header' . '.php'); ?>

<?php
if (($id = $_GET['nh_lab_id']) != '') {
    $sql = "delete from nh_lab where nh_lab_id='$id'";
    mysqli_query($conn, $sql);
    header(sprintf("Location: %s", $_SERVER['HTTP_REFERER']));
}
?>