<?php include("header-footer/header.php") ?>

<!----------------------- header-end -------------------->
<div class="manage">
    <h1>Manage Recent Work</h1>
    <h1 style="color:red;text-align:center;font-size:50px;">
        <?php

        if (isset($_SESSION["upload_fail_work"])) {
            echo $_SESSION["upload_fail_work"];
            unset($_SESSION["upload_fail_work"]);
        }
        if (isset($_SESSION["add-work"])) {
            echo $_SESSION["add-work"];
            unset($_SESSION["add-work"]);
        }
        if (isset($_SESSION["drop-image-work"])) {
            echo $_SESSION["drop-image-work"];
            unset($_SESSION["drop-image-work"]);
        }
        if (isset($_SESSION["fail-delete-work"])) {
            echo $_SESSION["fail-delete-work"];
            unset($_SESSION["fail-delete-work"]);
        }
        if (isset($_SESSION["update-work"])) {
            echo $_SESSION["update-work"];
            unset($_SESSION["update-work"]);
        }


        ?>
    </h1>
    <a class="btn1-2 btn1" href="add-Work.php">
        Add Work
    </a>
    <table class="content content2">
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Image</th>
            <th>Comment</th>
            <th>date</th>
            <th>active</th>
            <th>Actions</th>
        </tr>

        <?php
        $x = 1;
        $sql = "SELECT * from tbl_recent_work order by `date` desc ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row2 = $stmt->fetchAll();

        if ($stmt == true) {
            if (count($row2) > 0) {
                foreach ($row2 as $row) {
                    $id = $row["id"];
                    $title = $row["title"];
                    $text = $row["text"];
                    $date = $row["date"];
                    $active = $row["active"];

                    if ($row["image_name"] == null || $row["image_name"] == "") {
                        $image_name = "../images/work_images/no-image.webp";
                    } else {
                        $image_name2 = "../images/work_images/" . $row["image_name"];
                        if (file_exists($image_name2) == true) {
                            $image_name = "../images/work_images/" . $row["image_name"];
                        } else {
                            $image_name = "../images/work_images/no-image.webp";
                        }
                    }

                    echo "
                            <tr>
                                <td>" . $x++ . ".</td>
                                <td>$title</td>
                                <td><div  class='cneter-element'><img loading='lazy' alt='img' src='$image_name'></div></td>
                                <td>$text</td>
                                <td>$date</td>
                                <td>$active</td>
                                <td class='for-btn'>
                                    <a href='update-work.php?id=$id' class='btn2'>Update</a>
                                    <a href='delete-work.php?id=$id' class='btn3'>Delete</a>
                                </td>
                            </tr>
                            ";
                }
            }
        }

        ?>


    </table>
</div>
<!----------------------- footer-start -------------------->
<?php include("header-footer/footer.php") ?>