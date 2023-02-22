<?php include("header-footer/header.php") ?>
<?php

if (isset($_GET["id"])) {
    $id2 = $_GET["id"];
    if (is_numeric($id2)) {
        $sql = "SELECT * from tbl_category where tbl_category.id=$id2";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row2 = $stmt->fetchAll();
        if (count($row2) == 1) {
            foreach ($row2 as $row) {
                $new_id = $row["id"];
                $title = $row["title"];
                $comment = $row["comment"];
                $image_name999 = $row["image_name"];
                // $image_name="../images/category_images/".$row["image_name"];
                if ($row["image_name"] == null || $row["image_name"] == "") {
                    $image_name_before = "../images/category_images/no-image.webp";
                } else {
                    $image_name2 = "../images/category_images/" . $row["image_name"];
                    if (file_exists($image_name2) == true) {
                        $image_name_before = "../images/category_images/" . $row["image_name"];
                    } else {
                        $image_name_before = "../images/category_images/no-image.webp";
                    }
                }
                $favories = $row["favories"];
            }
        } else {
            header("location:" . $GLOBALS["url"] . "/admin/manage-category.php");
        }
    } else {
        header("location:" . $GLOBALS["url"] . "/admin/manage-category.php");
    }
} else {
    header("location:" . $GLOBALS["url"] . "/admin/manage-category.php");
}
?>
<!----------------------- header-end -------------------->

<div class="add-category">
    <h2>Update Category "<?php echo $title; ?>"</h2>
    <h2 style="color:red;text-align:center;">
        <?php
        if (isset($_SESSION["upload_fail_update"])) {
            echo $_SESSION["upload_fail_update"];
            unset($_SESSION["upload_fail_update"]);
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
            <p class="red">"<?php echo $comment; ?>"</p>
        </div>
        <div class="input-box">
            <p>New Comment:</p>
            <textarea name="comment" cols="30" rows="5" placeholder="Comment About This Category"></textarea>
        </div>

        <hr>

        <div class="input-box">
            <p>Favories Before:</p>
            <p class="red">"<?php echo $favories; ?>"</p>
        </div>
        <div class="input-box">
            <p>Favories:</p>
            <div class="radio-box">
                <input type="radio" <?php if ($favories == "YES") {
                                        echo "checked";
                                    } ?> class="input" name="favories" value="YES"> YES
                <input type="radio" <?php if ($favories == "NO") {
                                        echo "checked";
                                    } ?> class="input" name="favories" value="NO"> NO
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
        $new_title = $_POST["title"];
    } else {
        $new_title = $title;
    }

    if (isset($_POST["comment"]) and $_POST["comment"] != "") {
        $new_comment = $_POST["comment"];
    } else {
        $new_comment = $comment;
    }

    if (isset($_FILES["image"]["name"])) {
        $image_path = $_FILES["image"]["tmp_name"];
        $image_name99 = $_FILES["image"]["name"];
        if ($image_name99 == "" || $image_name99 == null) {
            $image_name0 = $image_name999;
        } else {
            $image_name99 = explode(".", $image_name99);
            $image_name99 = end($image_name99);
            // echo ($_FILES["image"]["size"])/1024 ."<br>";
            $image_name0 = "image_category_" . rand(0, 10000) . "." . $image_name99;
            $image = "../images/category_images/" . $image_name0;
            $upload = move_uploaded_file($image_path, $image);
            if ($upload == false) {
                $_SESSION["upload_fail_update"] = "Failed To Upload Image";
                header("location:" . $GLOBALS["url"] . "/admin/update-category.php?id=" . $new_id);
                die();
            } else {
                if (file_exists($image)) {
                    if ($image_name_before != "../images/category_images/no-image.webp") {
                        $remove = unlink($image_name_before);
                        if ($remove == false) {
                            $_SESSION["drop-image-category"] = "Failed To Delete Image";
                            die();
                        }
                    }
                }
            }
        }
    } else {
        $image_name0 = $image_name999;
    }

    if (isset($_POST["favories"]) and $_POST["favories"] != "") {
        $new_favories = $_POST["favories"];
    } else {
        $new_favories = $favories;
    }

    $sql = "UPDATE tbl_category SET
            title = '$new_title',
            image_name = '$image_name0',
            comment = '$new_comment',
            favories = '$new_favories'
            WHERE tbl_category.id = $new_id;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    if ($stmt == true) {
        $_SESSION["update-category"] = "Update Category Succefully";
        header("location:" . $GLOBALS["url"] . "/admin/manage-category.php");
    } else {
        $_SESSION["update-category"] = "Failed To Update Category";
        header("location:" . $GLOBALS["url"] . "/admin/manage-category.php");
    }
}

?>