<?php
    include("./header-footer/PDO.php");

    session_destroy();
    header("location:". $GLOBALS["url"]."/admin/login.php");
?>