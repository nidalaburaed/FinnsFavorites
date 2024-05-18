<?php
    include 'common/body.php';
    mysql_query("UPDATE customer SET country_id = '".$_GET['country_id']."' WHERE login = '".$_SESSION['login_user']."'", $conn);
    header('Location: '.$_SERVER['HTTP_REFERER']);
?>