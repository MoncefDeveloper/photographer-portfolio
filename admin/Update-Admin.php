<?php include("header-footer/header.php") ?>
<?php
if (isset($_GET["id"])) {
    $id2 = $_GET["id"];
    if (is_numeric($id2)) {
        $sql = "SELECT * FROM `tbl_admin` WHERE `tbl_admin`.`id` =$id2 ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row2 = $stmt->fetchAll();
        if (count($row2) == 1) {
            foreach ($row2 as $row) {
                $new_id = $row["id"];
                $username_before = $row['username'];
                $full_name_before = $row['full_name'];
            }
        } else {
            header("location:". $GLOBALS["url"]."/admin/manage-category.php");
        }
    } else {
        header("location:". $GLOBALS["url"]."/admin/manage-category.php");
    }
} else {
    header("location:". $GLOBALS["url"]."/admin/manage-category.php");
}


?>
<!------------------------------------------------------->
<div class="add-category">
    <h2>Update Admin "<?php echo $full_name_before ?>"</h2>
    <h2 style="color:red;text-align:center;">
        <?php

        if (isset($_SESSION["error"])) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        }
        ?>
    </h2>
    <form action="" method="post">

        <div class="input-box">
            <p>Full Name Before:</p>
            <p class="red">"<?php echo $full_name_before; ?>"</p>
        </div>
        <div class="input-box">
            <p>Full Name:</p>
            <input type="text" class="input" name="full-name" placeholder="Update The Full-Name">
        </div>

        <!----------------------------------------------------------->

        <div class="input-box">
            <p>Username Before:</p>
            <p class="red">"<?php echo $username_before; ?>"</p>
        </div>
        <div class="input-box">
            <p>Username:</p>
            <input type="text" class="input" name="username" placeholder="Update The UserName">
        </div>

        <!----------------------------------------------------------->

        <div class="input-box">
            <input type="submit" style="cursor:pointer;padding:1% 4%;" name="submit" value="Update Admin" class="btn1">

        </div>
    </form>
</div>

<!----------------------- footer-start -------------------->
<?php include("header-footer/footer.php") ?>

<?php
if (isset($_POST["submit"])) {
    $full_name = $_POST["full-name"];
    $userName = $_POST["username"];

    if (isset($_POST["full-name"]) and $_POST["full-name"] != "") {
        $full_name = $_POST["full-name"];
    } else {
        $full_name = $full_name_before;
    }

    if (isset($_POST["userName"]) and $_POST["userName"] != "") {
        $userName = $_POST["userName"];
    } else {
        $userName = $username_before;
    }

    $sql = "UPDATE `tbl_admin` SET `full_name` = '$full_name', `username` = '$userName' WHERE `tbl_admin`.`id` = $new_id";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    if ($stmt == true) {
        $_SESSION["update"] = "Admin Update Succefully";
        header("location:". $GLOBALS["url"]."/admin/manage-admin.php");
    } else {
        $_SESSION["update"] = "Faile To Update Admin";
        header("location:". $GLOBALS["url"]."/admin/add-admin.php");
    }
}


?>