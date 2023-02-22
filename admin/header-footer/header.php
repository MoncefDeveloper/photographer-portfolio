<?php include("PDO.php") ?>
<?php
if (!isset($_SESSION["photo_user"])) {
    $_SESSION["not_login"] = "You Must Login To Access Admin Manage";
    header("location:". $GLOBALS["url"]."/admin/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link rel="shortcut icon" type="x-icon" href="../images/admin-logo.webp">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <ul>
                <li><a href="../admin/index.php">Home</a></li>
                <li><a href="../admin/manage-admin.php">Admins</a></li>
                <li><a href="../admin/manage-category.php">Category</a></li>
                <li><a href="../admin/manage-gallery.php">Gallery</a></li>
                <li><a href="../admin/manage-work.php">Recent-Work</a></li>
                <li><a href="../admin/manage-contact.php">Contact</a></li>
                <li><a href="../admin/manage-about.php">About</a></li>
                <li><a href="../admin/logout.php">Logout</a></li>
            </ul>
        </div>