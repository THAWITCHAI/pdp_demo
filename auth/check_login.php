<? require_once('../Connected/connect.php') ?>
<?php
if ($_POST) {
    // echo $_POST['username'];
    $data = mysqli_query($conn, "select * from data");
    // print_r($data);
    // echo "<br/>";
    $check_username = false;
    while ($row = mysqli_fetch_assoc($data)) {
        if ($_POST['username'] == $row['fname']) {
            $check_username = true;
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
