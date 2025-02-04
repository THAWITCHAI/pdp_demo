<?php
if ($_POST) {
    echo $_POST['username'];
    exit(0);
}else{
    header("Location: login.php");
}
