<?php include("header-footer/header.php") ?>
<?php

if (isset($_GET["id"])) {
    $id2 = $_GET["id"];
    if (is_numeric($id2)) {
        $sql = "SELECT * from tbl_gallery where tbl_gallery.id=$id2";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row2 = $stmt->fetchAll();
        if (count($row2) == 1) {
            foreach ($row2 as $row) {
                $new_id = $row["id"];
                $title = $row["title"];
                $price = $row["price"];
                $active = $row["active"];
                $image_name_before2 = $row["image_name"];
                $description = $row["description"];
                $key_word = $row["key_word"];
                if ($row["image_name"] == null || $row["image_name"] == "") {
                    $image_name_before = "../images/gallery_images/no-image.webp";
                } else {
                    $image_name2 = "../images/gallery_images/" . $row["image_name"];
                    if (file_exists($image_name2) == true) {
                        $image_name_before = "../images/gallery_images/" . $row["image_name"];
                    } else {
                        $image_name_before = "../images/gallery_images/no-image.webp";
                    }
                }
                $sex = $row["sex"];

                $category_id = $row["category_id"];
                $sql2 = "SELECT * from tbl_category where tbl_category.id=$category_id ";
                $stmt2 = $db->prepare($sql2);
                $stmt2->execute();
                $row4 = $stmt2->fetchAll();
                if (count($row4) == 1) {
                    foreach ($row4 as $row3) {
                        $category_name = $row3["title"];
                    }
                } else {
                    $category_name = "No Category";
                }

                $vert = $row["Verticalement_or_Horizontale"];
                $year = $row["year"];
                $favories = $row["favories"];
            }
        } else {
            header("location:" . $GLOBALS["url"] . "/admin/manage-gallery.php");
        }
    } else {
        header("location:" . $GLOBALS["url"] . "/admin/manage-gallery.php");
    }
} else {
    header("location:" . $GLOBALS["url"] . "/admin/manage-gallery.php");
}
?>
<!----------------------- header-end -------------------->

<div class="add-category">
    <h2>Update Picture "<?php echo $title; ?>"</h2>
    <h2 style="color:red;text-align:center;">
        <?php
        if (isset($_SESSION["upload_fail_update2"])) {
            echo $_SESSION["upload_fail_update2"];
            unset($_SESSION["upload_fail_update2"]);
        }

        if (isset($_SESSION["drop-image-gallery"])) {
            echo $_SESSION["drop-image-gallery"];
            unset($_SESSION["drop-image-gallery"]);
        }

        if (isset($_SESSION["update-picture"])) {
            echo $_SESSION["update-picture"];
            unset($_SESSION["update-picture"]);
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

        <!------------------------------------------------------------------->
        <hr>

        <div class="input-box">
            <p>Category Before:</p>
            <p class="red"><?php echo $category_name; ?></p>
        </div>
        <div class="input-box">
            <p>Select New Category:</p>
            <select name="category_id" value="category_id">
                <?php
                $sql3 = "SELECT * from tbl_category order by title";
                $stmt3 = $db->prepare($sql3);
                $stmt3->execute();
                $row6 = $stmt3->fetchALL();
                if (count($row6) > 0) {
                    foreach ($row6 as $row5) {
                        $id = $row5["id"];
                        $title2 = $row5["title"];
                        if ($category_name == $title2) {
                            echo "
                                        <option selected value='$id'>$title2</option>            
                                    ";
                        } else {
                            echo "
                                        <option  value='$id'>$title2</option>            
                                    ";
                        }
                    }
                } else {
                    echo "
                                <option value=''>Other</option>
                            ";
                }
                ?>
            </select>
        </div>

        <!------------------------------------------------------------------->
        <hr>

        <div class="input-box">
            <p>Image Before:</p>
            <div class="img"><img loading='lazy' alt="img" src="<?php echo $image_name_before; ?>"></div>
        </div>
        <div class="input-box">
            <p>Select New Image:</p>
            <input type="file" name="image">
        </div>

        <!------------------------------------------------------------------->
        <hr>

        <div class="input-box">
            <p>Description Before:</p>
            <p class="red">"<?php echo $description; ?>"</p>
        </div>
        <div class="input-box">
            <p>New Description:</p>
            <textarea name="comment" cols="30" rows="5" placeholder="Comment About This Category"></textarea>
        </div>

        <!------------------------------------------------------------------->
        <hr>

        <div class="input-box">
            <p>Key Word(s) Before:</p>
            <p class="red">"<?php echo $key_word; ?>"</p>
        </div>
        <div class="input-box">
            <p>New Key Word(s):</p>
            <textarea name="key_word" cols="30" rows="3" placeholder="Betw Word & Word Make A '/' Without Space "></textarea>
        </div>

        <!------------------------------------------------------------------->
        <hr>

        <div class="input-box">
            <p>Sex Before:</p>
            <p class="red">"<?php echo $sex; ?>"</p>
        </div>
        <div class="input-box">
            <p>Sex:</p>
            <div class="radio-box">
                <input type="radio" <?php if ($sex == "MEN") {
                                        echo "checked";
                                    } ?> class="input" name="sex" value="MEN"> MEN
                <input type="radio" <?php if ($sex == "WOMEN") {
                                        echo "checked";
                                    } ?>class="input" name="sex" value="WOMEN"> WOMEN
                <input type="radio" <?php if ($sex == "BOTH") {
                                        echo "checked";
                                    } ?> class="input" name="sex" value="BOTH"> BOTH
            </div>
        </div>
        <!------------------------------------------------------------------->
        <hr>

        <div class="input-box">
            <p>V or H Before:</p>
            <p class="red">"<?php echo $vert; ?>"</p>
        </div>
        <div class="input-box">
            <p>Vertica or Horiz:</p>
            <div class="radio-box">
                <input type="radio" <?php if ($vert == "Verticalement") {
                                        echo "checked";
                                    } ?> class="input" name="vertica_or_horiz" value="Verticalement">Vertical
                <input type="radio" <?php if ($vert == "Horizontale") {
                                        echo "checked";
                                    } ?> class="input" name="vertica_or_horiz" value="Horizontale">Horizon
            </div>
        </div>
        <!------------------------------------------------------------------->
        <hr>

        <div class="input-box">
            <p>year Before:</p>
            <p class="red">"<?php echo $year; ?>"</p>
        </div>
        <div class="input-box">
            <p>The new Year:</p>
            <select name="year" value="year">
                <?php
                for ($i = 2010; $i <= date("Y"); $i++) {
                    if ($year == $i) {
                        echo "
                                    <option selected value='$i'>$i</option>            
                                ";
                    } else {
                        echo "
                                    <option s value='$i'>$i</option>            
                                ";
                    }
                }
                ?>
            </select>
        </div>

        <!------------------------------------------------------------------->
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

        <!------------------------------------------------------------------->
        <hr>

        <div class="input-box">
            <p>Active Before:</p>
            <p class="red">"<?php echo $active; ?>"</p>
        </div>
        <div class="input-box">
            <p>Active:</p>
            <div class="radio-box">
                <input type="radio" <?php if ($active == "YES") {
                                        echo "checked";
                                    } ?> class="input" name="active" value="YES"> YES
                <input type="radio" <?php if ($active == "NO") {
                                        echo "checked";
                                    } ?> class="input" name="active" value="NO"> NO
            </div>
        </div>

        <!------------------------------------------------------------------->
        <hr>

        <div class="input-box">
            <p>Price Before:</p>
            <p class="red">"<?php echo $price; ?>"</p>
        </div>
        <div class="input-box">
            <p>New Price:</p>
            <input type="number" class="input" name="price" placeholder="Price">
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
    if (isset($_POST["price"]) and $_POST["price"] != "") {
        $new_price = $_POST["price"];
    } else {
        $new_price = $price;
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
            $new_image_name = "image_gallery_" . rand(0, 10000) . "." . $image_name99;
            $image = "../images/gallery_images/" . $new_image_name;
            $upload = move_uploaded_file($image_path, $image);
            if ($upload == false) {
                $_SESSION["upload_fail_update2"] = "Failed To Upload Image";
                echo "
                    <script> 
                        window.location='" . $GLOBALS["url"] . "/admin/update-picture.php?id=" . $new_id . "';
                    </script>
                    ";
                die();
            } else {
                if (file_exists($image)) {
                    if ($image_name_before != "../images/gallery_images/no-image.webp") {
                        $remove = unlink($image_name_before);
                        if ($remove == false) {
                            $_SESSION["drop-image-gallery"] = "Failed To Delete Image";
                            die();
                        }
                    }
                }
            }
        }
    } else {
        $new_image_name = $image_name_before2;
    }

    if (isset($_POST["comment"]) and $_POST["comment"] != "") {
        $new_description = $_POST["comment"];
    } else {
        $new_description = $description;
    }

    if (isset($_POST["key_word"]) and $_POST["key_word"] != "") {
        $new_key_word = $_POST["key_word"];
    } else {
        $new_key_word = $key_word;
    }

    $new_category_id = $_POST["category_id"];
    $new_sex = $_POST["sex"];
    $new_vert = $_POST["vertica_or_horiz"];
    $new_year = $_POST["year"];
    $new_favories = $_POST["favories"];
    $new_active = $_POST["active"];


    // echo $new_title."<br>";
    // echo $new_image_name."<br>";
    // echo $new_category_id."<br>";
    // echo $new_description."<br>";
    // echo $new_key_word."<br>";
    // echo $new_sex."<br>";
    // echo $new_vert."<br>";
    // echo $new_year."<br>";
    // echo $new_favories."<br>";
    // echo $new_price."<br>";

    $sql4 = "UPDATE tbl_gallery SET
            `title` = '$new_title',
            `price` = '$new_price',
            `image_name` = '$new_image_name',
            `category_id` = '$new_category_id',
            `description` = '$new_description',
            `key_word` = '$new_key_word',
            `sex` = '$new_sex',
            `Verticalement_or_Horizontale` = '$new_vert',
            `year` = '$new_year',
            `favories` = '$new_favories',
            `active` = '$new_active'
            WHERE tbl_gallery.id = $new_id;";
    $stmt4 = $db->prepare($sql4);
    $stmt4->execute();
    if ($stmt4 == true) {
        $_SESSION["update-picture"] = "Update Picture Succefully";
        echo "
                <script> 
                    window.location='" . $GLOBALS["url"] . "/admin/manage-gallery.php';
                </script>
            ";
    } else {
        $_SESSION["update-picture"] = "Failed To Update Picture ";
        echo "
                <script> 
                    window.location='" . $GLOBALS["url"] . "/admin/update-picture.php?id=" . $new_id . "';
                </script>
            ";
    }
}

?>