<?php include("header-footer/header.php") ?>
<?php

if (isset($_GET["id"])) {
    $id2 = $_GET["id"];
    if (is_numeric($id2)) {
        $sql = "SELECT * from tbl_recent_work where tbl_recent_work.id=$id2  ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row2 = $stmt->fetchAll();

        if ($stmt == true) {
            if (count($row2) == 1) {
                foreach ($row2 as $row) {
                    $new_id = $row["id"];
                    $title = $row["title"];
                    $text = $row["text"];
                    $date = $row["date"];
                    $active = $row["active"];
                    $image_name_before2 = $row["image_name"];

                    if ($row["image_name"] == null || $row["image_name"] == "") {
                        $image_name_before = "../images/work_images/no-image.webp";
                    } else {
                        $image_name2 = "../images/work_images/" . $row["image_name"];
                        if (file_exists($image_name2) == true) {
                            $image_name_before = "../images/work_images/" . $row["image_name"];
                        } else {
                            $image_name_before = "../images/work_images/no-image.webp";
                        }
                    }
                }
            } else {
                header("location:" . $GLOBALS["url"] . "/admin/manage-work.php");
            }
        } else {
            header("location:" . $GLOBALS["url"] . "/admin/manage-work.php");
        }
    } else {
        header("location:" . $GLOBALS["url"] . "/admin/manage-work.php");
    }
} else {
    header("location:" . $GLOBALS["url"] . "/admin/manage-work.php");
}

?>
<!----------------------- header-end -------------------->

<div class="add-category">
    <h2>Update Work "<?php echo $title; ?>"</h2>
    <h2 style="color:red;text-align:center;">
        <?php
        if (isset($_SESSION["upload_fail_update5"])) {
            echo $_SESSION["upload_fail_update5"];
            unset($_SESSION["upload_fail_update5"]);
        }
        if (isset($_SESSION["update-category"])) {
            echo $_SESSION["update-category"];
            unset($_SESSION["update-category"]);
        }


        ?>
    </h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-box">
            <p>Title Before:</p>
            <p class="red">"<?php echo $title; ?>"</p>
        </div>
        <div class="input-box">
            <p>New Title:</p>
            <input type="text" class="input" name="title" placeholder="Categoey Title">
        </div>

        <hr>

        <div class="input-box">
            <p>Image Before:</p>
            <div class="img"><img loading='lazy' alt="img" src="<?php echo $image_name_before; ?>"></div>
        </div>
        <div class="input-box">
            <p>Select New Image:</p>
            <input type="file" name="image">
        </div>

        <hr>

        <div class="input-box">
            <p>Comment Before:</p>
            <p class="red">"<?php echo $text; ?>"</p>
        </div>
        <div class="input-box">
            <p>New Comment:</p>
            <textarea name="text" cols="30" rows="5" placeholder="Comment About This Work"></textarea>
        </div>

        <hr>

        <div class="input-box">
            <p>Date Before:</p>
            <p class="red">"<?php echo $date; ?>"</p>
        </div>
        <div class="input-box">
            <p>New Date:</p>
            <input type="date" name="date">
        </div>

        <hr>

        <div class="input-box">
            <p>Active Before:</p>
            <p class="red">"<?php echo $active; ?>"</p>
        </div>
        <div class="input-box">
            <p>active:</p>
            <div class="radio-box">
                <input <?php if ($active == "YES") {
                            echo "checked";
                        } ?> type="radio" class="input" name="active" value="YES"> YES
                <input <?php if ($active == "NO") {
                            echo "checked";
                        } ?> type="radio" class="input" name="active" value="NO"> NO
            </div>
        </div>

        <div class="input-box">
            <input type="submit" class="submit-btn" name="submit" value="Update">
        </div>
    </form>
</div>

<!----------------------- footer-start -------------------->
<?php include("header-footer/footer.php") ?>
<?php
if (isset($_POST["submit"])) {
    if (isset($_POST["title"]) and $_POST["title"] != "") {
        $new_title = filter_var($_POST["title"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    } else {
        $new_title = $title;
    }

    if (isset($_POST["text"]) and $_POST["text"] != "") {
        $new_text = filter_var($_POST["text"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    } else {
        $new_text = $text;
    }

    if (isset($_POST["date"]) and $_POST["date"] != "") {
        $new_date = $_POST["date"];
    } else {
        $new_date = $date;
    }

    $new_active = $_POST["active"];

    if (isset($_FILES["image"]["name"])) {
        $image_path = $_FILES["image"]["tmp_name"];
        $image_name99 = $_FILES["image"]["name"];
        if ($image_name99 == "" || $image_name99 == null) {
            $image_name0 = $image_name_before2;
        } else {
            $image_name99 = explode(".", $image_name99);
            $image_name99 = end($image_name99);
            // echo ($_FILES["image"]["size"])/1024 ."<br>";
            $image_name0 = "image_work_" . rand(0, 10000) . "." . $image_name99;
            $image = "../images/work_images/" . $image_name0;
            $upload = move_uploaded_file($image_path, $image);
            if ($upload == false) {
                $_SESSION["upload_fail_update5"] = "Failed To Upload Image";
                header("location:" . $GLOBALS["url"] . "/admin/update-work.php?id=" . $new_id);
                die();
            } else {
                if (file_exists($image)) {
                    if ($image_name_before != "../images/category_images/no-image.webp") {
                        $remove = unlink($image_name_before);
                        if ($remove == false) {
                            $_SESSION["drop-image_work"] = "Failed To Delete Image";
                            die();
                        }
                    }
                }
            }
        }
    } else {
        $image_name0 = $image_name_before2;
    }



    $sql = "UPDATE tbl_recent_work SET
            title = '$new_title',
            image_name = '$image_name0',
            `text` = '$new_text',
            `date` = '$new_date',
            active = '$new_active'
            WHERE tbl_recent_work.id = $new_id;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    if ($stmt == true) {
        $_SESSION["update-work"] = "Update Work Succefully";
        header("location:" . $GLOBALS["url"] . "/admin/manage-work.php");
    } else {
        $_SESSION["update-work"] = "Failed To Update Work";
        header("location:" . $GLOBALS["url"] . "/admin/manage-work.php");
    }
}

?>