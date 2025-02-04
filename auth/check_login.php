<? require_once('../Connected/connect.php') ?>
<?php
if ($_POST) {
    echo $_POST['username'];
    $data = mysqli_query($conn,"select * from data");
    print_r($data);
    echo "<br/>";
    while($row = mysqli_fetch_assoc($data)){
        echo $row['fname'],'<br/>';
    }
    exit(0);
}else{
    header("Location: login.php");
}
