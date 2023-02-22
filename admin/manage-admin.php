<?php include("header-footer/header.php") ?>

<!------------------------------------------------------->
<div class="manage">
    <h1>Manage Admin</h1>
    <h1 style="color:red;text-align:center;font-size:50px;">
        <?php
        if (isset($_SESSION["add"])) {
            echo $_SESSION["add"];
            unset($_SESSION["add"]);
        }
        if (isset($_SESSION["drop"])) {
            echo $_SESSION["drop"];
            unset($_SESSION["drop"]);
        }
        if (isset($_SESSION["update"])) {
            echo $_SESSION["update"];
            unset($_SESSION["update"]);
        }
        if (isset($_SESSION["update_password"])) {
            echo $_SESSION["update_password"];
            unset($_SESSION["update_password"]);
        }
        if (isset($_SESSION["not-found"])) {
            echo $_SESSION["not-found"];
            unset($_SESSION["not-found"]);
        }
        if (isset($_SESSION["user-not_found"])) {
            echo $_SESSION["user-not_found"];
            unset($_SESSION["user-not_found"]);
        }

        ?>
    </h1>

    <a class="btn1-2 btn1" href="add-admin.php">
        Add Admin
    </a>
    <table class="content">
        <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>UserName</th>
            <th>Actions</th>
        </tr>



        <?php
        $X = 1;
        $sql = "SELECT * FROM `tbl_admin` ORDER BY id ";
        $stmt = $db->query($sql);
        if ($stmt == true) {
            foreach ($stmt as $row) {
                $id = $row['id'];
                $username = $row['username'];
                $full_name = $row['full_name'];
                echo "
                            <tr>
                                <td>" . $X++ . '.' . "</td>
                                <td>$full_name</td>
                                <td>$username</td>
                                <td>
                                    <a href='Change-Password.php?id=" . $id . "' class='btn1'>Change Password</a>
                                    <a href='Update-Admin.php?id=" . $id . "' class='btn2'>Update Admin</a>
                                    <a href='Delete-Admin.php?id=" . $id . "' class='btn3'>Delete Admin</a>
                                </td>
                            </tr>
                            ";
            }
        }
        ?>

    </table>
</div>

<!----------------------- footer-start -------------------->
<?php include("header-footer/footer.php") ?>