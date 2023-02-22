<?php include("header-footer/header.php") ?>
<?php
if (isset($_GET["id"])) {
    $id2 = $_GET["id"];
    if (is_numeric($id2)) {
        $id = $id2;
        $sql = "SELECT * from `tbl_admin` where `tbl_admin`.`id`= $id ";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row2 = $stmt->fetchAll();
        if (count($row2) == 1) {
            foreach ($row2 as $row) {
                $password = $row["password"];
            }
        } else {
            $_SESSION["user-not_found"] = "User Not Found-3";
            header("location:". $GLOBALS["url"]."/admin/manage-admin.php");
        }
    } else {
        $_SESSION["user-not_found"] = "User Not Found-2";
        header("location:". $GLOBALS["url"]."/admin/manage-admin.php");
    }
} else {
    $_SESSION["user-not_found"] = "User Not Found-1";
    header("location:". $GLOBALS["url"]."/admin/manage-admin.php");
}

?>
<!------------------------------------------------------->

<div class="add-category">
    <h2 style="margin:1% 0;">Change Password</h2>
    <h2 style="color:red;text-align:center;">

        <?php
        if (isset($_SESSION["not_found"])) {
            echo $_SESSION["not_found"];
            unset($_SESSION["not_found"]);
        }
        ?>
    </h2>
    <form action="" method="post">
        <table width="65%">

            <div class="input-box">
                <p>Current Password:</p>
                <input type="text" class="input" name="old_password" placeholder="Current Password">
                <div class="error">
                    <?php
                    if (isset($_SESSION["not_same"])) {
                        echo $_SESSION["not_same"];
                        unset($_SESSION["not_same"]);
                    }
                    ?>
                </div>
            </div>

            <!----------------------------------------------------------->


            <div class="input-box">
                <p>New Password:</p>
                <input type="text" class="input" name="new_password" placeholder="New Password">
                <div class="error">
                    <?php
                    if (isset($_SESSION["more"])) {
                        echo $_SESSION["more"];
                        unset($_SESSION["more"]);
                    }
                    ?>
                </div>
            </div>


            <!----------------------------------------------------------->

            <div class="input-box">
                <p>Confirm Password:</p>
                <input type="text" class="input" name="confirm_password" placeholder="Confirm Password">
                <div class="error">
                    <?php
                    if (isset($_SESSION["not_same2"])) {
                        echo $_SESSION["not_same2"];
                        unset($_SESSION["not_same2"]);
                    }
                    ?>
                </div>
            </div>

            <!----------------------------------------------------------->

            <div class="input-box">
                <input type="submit" class="btn1" name="submit" value="Change Paswword">
            </div>
        </table>
    </form>
</div>

<!------------------------------------------------------->
<?php include("header-footer/footer.php") ?>
<?php
if (isset($_POST["submit"])) {
    $new_password2 = $_POST["new_password"];
    $confirm_password2 = $_POST["confirm_password"];
    $new_password = sha1($_POST["new_password"]);
    $confirm_password = sha1($_POST["confirm_password"]);
    $new_password2 = $_POST["new_password"];
    $confirm_password2 = $_POST["confirm_password"];
    $old_password = sha1($_POST["old_password"]);
    if ($old_password == $password) {
        if (strlen($new_password2) > 7) {
            if ($confirm_password == $new_password) {
                $sql = "UPDATE tbl_admin set `password`='$new_password' where tbl_admin.id=$id";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                if ($stmt == true) {
                    $_SESSION["update_password"] = "Password Update Succefully";
                    header("location:". $GLOBALS["url"]."/admin/manage-admin.php");
                } else {
                    $_SESSION["update_password"] = "Faile To Update Password";
                    header("location:". $GLOBALS["url"]."/admin/manage-admin.php");
                }
            } else {
                $_SESSION["not_same2"] = "Not The Same";
                header("location:". $GLOBALS["url"]."/admin/Change-Password.php?id=$id");
            }
        } else {
            $_SESSION["more"] = "Password Must Be More Than 7 Shifre";
            header("location:". $GLOBALS["url"]."/admin/Change-Password.php?id=$id");
        }
    } else {
        $_SESSION["not_same"] = "Not The Same Password";
        header("location:". $GLOBALS["url"]."/admin/Change-Password.php?id=$id");
    }
}
?>