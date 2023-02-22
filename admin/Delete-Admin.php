
<?php
include("./header-footer/PDO.php");

if (!isset($_SESSION["photo_user"])) {
    $_SESSION["not_login"] = "You Must Login To Access Admin Manage";
    header("location:". $GLOBALS["url"]."/admin/Login.php");
} else {

    $id = $_GET["id"];
    $sql = "DELETE FROM `tbl_admin` WHERE `tbl_admin`.`id` = $id";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    if ($stmt == true) {
        header("location:". $GLOBALS["url"]."/admin/manage-admin.php");
        $_SESSION["drop"] = "Drop Admin Succefully";
    } else {
        header("location:". $GLOBALS["url"]."/admin/manage-admin.php");
        $_SESSION["drop"] = "Faile To Drop Admin";
    }
}



?>
