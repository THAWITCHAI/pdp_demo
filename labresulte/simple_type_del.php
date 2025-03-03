<?php include('../assets/html/header' . '.php'); ?>

<?php
if (($id = $_GET['lab_sample_type_id']) != '') {
    $sql = "delete from lab_sample_type where lab_sample_type_id='$id'";
    mysqli_query($conn, $sql);
    header(sprintf("Location: %s", $_SERVER['HTTP_REFERER']));
}
?>