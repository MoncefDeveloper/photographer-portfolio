    <?php include("header-footer/header.php") ?>
    <?php

    if (isset($_GET["id"])) {
        $id2 = $_GET["id"];
        if (is_numeric($id2)) {
            $sql = "SELECT * from tbl_about where tbl_about.id=$id2";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $row2 = $stmt->fetchAll();
            if (count($row2) == 1) {
                foreach ($row2 as $row) {
                    $new_id = $row["id"];
                    $title1 = $row["title1"];
                    $title2 = $row["title2"];
                    $title3 = $row["title3"];
                    $text1 = $row["text1"];
                    $text2 = $row["text2"];
                    $text3 = $row["text3"];
                    $display = $row["display"];
                    $image_name_before2 = $row["image_name"];
                    if ($row["image_name"] == null || $row["image_name"] == "") {
                        $image_name_before = "../images/about_images/no-image.webp";
                    } else {
                        $image_name2 = "../images/about_images/" . $row["image_name"];
                        if (file_exists($image_name2) == true) {
                            $image_name_before = "../images/about_images/" . $row["image_name"];
                        } else {
                            $image_name_before = "../images/about_images/no-image.webp";
                        }
                    }
                }
            } else {
                header("location:" . $GLOBALS["url"] . "/admin/manage-about.php");
            }
        } else {
            header("location:" . $GLOBALS["url"] . "/admin/manage-about.php");
        }
    } else {
        header("location:" . $GLOBALS["url"] . "/admin/manage-about.php");
    }
    ?>
    <!----------------------- header-end -------------------->

    <div class="add-category">
        <h2>Update Section "<?php echo $new_id; ?>"</h2>
        <h2 style="color:red;text-align:center;">
            <?php
            if (isset($_SESSION["upload_fail_update3"])) {
                echo $_SESSION["upload_fail_update3"];
                unset($_SESSION["upload_fail_update3"]);
            }

            if (isset($_SESSION["update-section"])) {
                echo $_SESSION["update-section"];
                unset($_SESSION["update-section"]);
            }




            ?>
        </h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-box">
                <p>Title1 Before:</p>
                <p class="red">"<?php echo $title1; ?>"</p>
            </div>
            <div class="input-box">
                <p>New Title1:</p>
                <input type="text" class="input" name="title1" placeholder="Section Title">
            </div>

            <!------------------------------------------------------------------->
            <hr>

            <div class="input-box">
                <p>Title2 Before:</p>
                <p class="red">"<?php echo $title2; ?>"</p>
            </div>
            <div class="input-box">
                <p>New Title2:</p>
                <input type="text" class="input" name="title2" placeholder="Section Title">
            </div>

            <!------------------------------------------------------------------->
            <hr>

            <div class="input-box">
                <p>Title3 Before:</p>
                <p class="red">"<?php echo $title3; ?>"</p>
            </div>
            <div class="input-box">
                <p>New Title3:</p>
                <input type="text" class="input" name="title3" placeholder="Section Title">
            </div>

            <!------------------------------------------------------------------->
            <hr>

            <div class="input-box">
                <p>text1:</p>
                <p class="red">"<?php echo $text1; ?>"</p>
            </div>
            <div class="input-box">
                <p>New text1:</p>
                <textarea name="text1" cols="30" rows="7" placeholder="Text For Title1"></textarea>
            </div>

            <!------------------------------------------------------------------->
            <hr>

            <div class="input-box">
                <p>text2:</p>
                <p class="red">"<?php echo $text2; ?>"</p>
            </div>
            <div class="input-box">
                <p>New text2:</p>
                <textarea name="text2" cols="30" rows="7" placeholder="Text For Title2"></textarea>
            </div>

            <!------------------------------------------------------------------->
            <hr>

            <div class="input-box">
                <p>text3:</p>
                <p class="red">"<?php echo $text3; ?>"</p>
            </div>
            <div class="input-box">
                <p>New text3:</p>
                <textarea name="text3" cols="30" rows="7" placeholder="Text For Title3"></textarea>
            </div>

            <!------------------------------------------------------------------->
            <hr>

            <div class="input-box">
                <p>Display Before:</p>
                <p class="red">"<?php echo $display; ?>"</p>
            </div>
            <div class="input-box">
                <p>Display:</p>
                <div class="radio-box">
                    <input type="radio" <?php if ($display == "YES") {
                                            echo "checked";
                                        } ?> class="input" name="display" value="YES"> YES
                    <input type="radio" <?php if ($display == "NO") {
                                            echo "checked";
                                        } ?>class="input" name="display" value="NO"> NO
                </div>
            </div>

            <!------------------------------------------------------------------->
            <hr>

            <div class="input-box">
                <p>Image Before:</p>
                <div class="img"><img loading="lazy" alt="img" src="<?php echo $image_name_before; ?>"></div>
            </div>
            <div class="input-box">
                <p>Select New Image:</p>
                <input type="file" name="image">
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
        if (isset($_POST["title1"]) and $_POST["title1"] != "") {
            $new_title1 = filter_var($_POST["title1"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        } else {
            $new_title1 = filter_var($title1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        }

        if (isset($_POST["title2"]) and $_POST["title2"] != "") {
            $new_title2 = filter_var($_POST["title2"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        } else {
            $new_title2 = filter_var($title2, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        }

        if (isset($_POST["title3"]) and $_POST["title3"] != "") {
            $new_title3 = filter_var($_POST["title3"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        } else {
            $new_title3 = filter_var($title3, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        }

        if (isset($_POST["text1"]) and $_POST["text1"] != "") {
            $new_text1 = filter_var($_POST["text1"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        } else {
            $new_text1 = filter_var($text1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        }

        if (isset($_POST["text2"]) and $_POST["text2"] != "") {
            $new_text2 = filter_var($_POST["text2"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        } else {
            $new_text2 = filter_var($text2, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        }

        if (isset($_POST["text3"]) and $_POST["text3"] != "") {
            $new_text3 = filter_var($_POST["text3"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        } else {
            $new_text3 = filter_var($text3, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        }

        if (isset($_POST["display"])) {
            $new_diplay = $_POST["display"];
        } else {
            $new_diplay = $display;
        }

        if (isset($_FILES["image"]["name"])) {
            $image_path = $_FILES["image"]["tmp_name"];
            $image_name99 = $_FILES["image"]["name"];
            if ($image_name99 == "" || $image_name99 == null) {
                $new_image_name = $image_name_before2;
            } else {
                $image_name99 = explode(".", $image_name99);
                $image_name99 = end($image_name99);
                // echo ($_FILES["image"]["size"])/1024 ."<br>";
                $new_image_name = "image_about_" . rand(0, 10000) . "." . $image_name99;
                $image = "../images/about_images/" . $new_image_name;
                $upload = move_uploaded_file($image_path, $image);
                if ($upload == false) {
                    $_SESSION["upload_fail_update3"] = "Failed To Upload Image";
                    echo "
                    <script> 
                        window.location='" . $GLOBALS["url"] . "/admin/update-about-section.php?id=" . $new_id . "';
                    </script>
                    ";
                    die();
                } else {
                    if (file_exists($image)) {
                        if ($image_name_before != "../images/about_images/no-image.webp") {
                            $remove = unlink($image_name_before);
                            if ($remove == false) {
                                $_SESSION["drop-image-about"] = "Failed To Delete Image";
                                die();
                            }
                        }
                    }
                }
            }
        } else {
            $new_image_name = $image_name_before2;
        }






        // echo $new_title1."<br>";
        // echo $new_title2."<br>";
        // echo $new_title3."<br>";
        // echo $new_text1."<br>";
        // echo $new_text2."<br>";
        // echo $new_text3."<br>";
        // echo $new_image_name."<br>";
        // echo $new_diplay."<br>";


        $sql4 = "UPDATE tbl_about SET
            `title1` = '$new_title1',
            `title2` = '$new_title2',
            `title3` = '$new_title3',
            `text1` = '$new_text1',
            `text2` = '$new_text2',
            `text3` = '$new_text3',
            `display` = '$new_diplay',
            `image_name` = '$new_image_name'

            WHERE tbl_about.id = $new_id;";
        $stmt4 = $db->prepare($sql4);
        $stmt4->execute();
        if ($stmt4 == true) {
            $_SESSION["update-section"] = "Update Section Succefully";
            echo "
                <script> 
                    window.location='" . $GLOBALS["url"] . "/admin/manage-about.php';
                </script>
            ";
        } else {
            $_SESSION["update-section"] = "Failed To Update Section";
            echo "
                <script> 
                    window.location='" . $GLOBALS["url"] . "/admin/update-about-section.php?id=" . $new_id . "';
                </script>
            ";
        }
    }

    ?>