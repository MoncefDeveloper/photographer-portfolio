<?php include("header-footer/header.php") ?>
<!----------------------- header-end -------------------->
<div class="add-category">
    <h2>Add Admin</h2>
    <form action="" method="post">
        <div class="input-box">
            <p>Full Name: </p>
            <input type="text" class="input" maxlength="50" name="full-name" placeholder="Enter Your Name">
        </div>

        <!----------------------------------------------------------->

        <div class="input-box">
            <p> UserName: </p>
            <input type="text" class="input" maxlength="50" name="username" placeholder="Your UserName">
        </div>

        <!----------------------------------------------------------->

        <div class="input-box">
            <p> Password: </p>
            <input class="input" type="password" name="password" placeholder="Your Password">
        </div>

        <!----------------------------------------------------------->

        <div class="input-box">
            <input type="submit"  name="submit" value="Add Admin" class="submit-btn">
        </div>
    </form>
</div>
<!----------------------- footer-start -------------------->
<?php include("header-footer/footer.php") ?>

<?php
if (isset($_POST["submit"])) {
    $full_name = $_POST["full-name"];
    $userName = $_POST["username"];
    $password = sha1($_POST["password"]);
    $sql = "INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES (Null, '$full_name', '$userName', '$password');";
    echo $sql;



    $stmt = $db->prepare($sql);
    $stmt->execute();

    if ($stmt == true) {
        $_SESSION["add"] = "Admin Add Succefully";
        header("location:". $GLOBALS["url"]."/admin/manage-admin.php");
        echo "DATA INSERTED";
    } else {
        $_SESSION["add"] = "Faile To Add Admin";
        header("location:". $GLOBALS["url"]."/admin/add-admin.php");
        echo "DATA INSERTED";
        echo "Errer";
    }
}


?>