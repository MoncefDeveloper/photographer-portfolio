<?php include("header-footer/header.php") ?>

<!----------------------- header-end -------------------->
<div class="manage manage1-2">
    <h1>Manage Gallery</h1>
    <h1 style="color:red;">As Gallery</h1>
    <h1 style="color:red;text-align:center;">
        <?php

        if (isset($_SESSION["add-picture"])) {
            echo $_SESSION["add-picture"];
            unset($_SESSION["add-picture"]);
        }

        if (isset($_SESSION["update-picture"])) {
            echo $_SESSION["update-picture"];
            unset($_SESSION["update-picture"]);
        }

        if (isset($_SESSION["fail-delete-picture"])) {
            echo $_SESSION["fail-delete-picture"];
            unset($_SESSION["fail-delete-picture"]);
        }

        if (isset($_SESSION["drop-image"])) {
            echo $_SESSION["drop-image"];
            unset($_SESSION["drop-image"]);
        }

        ?>
    </h1>
    <div class="chose">
        <a href="manage-gallery.php">All Picture</a>
        <a href="as-category.php">As Category</a>
    </div>


    <div class="category-section">
        <?php
        $x = 1;
        $sql = "SELECT * from tbl_category order by id ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row2 = $stmt->fetchAll();

        if ($stmt == true) {
            if (count($row2) > 0) {
                foreach ($row2 as $row) {
                    $id = $row["id"];
                    $title = $row["title"];
                    if ($row["image_name"] == null || $row["image_name"] == "") {
                        $image_name = "../images/category_images/no-image.webp";
                    } else {
                        $image_name2 = "../images/category_images/" . $row["image_name"];
                        if (file_exists($image_name2) == true) {
                            $image_name = "../images/category_images/" . $row["image_name"];
                        } else {
                            $image_name = "../images/category_images/no-image.webp";
                        }
                    }

                    echo '
                                <a  href="in-category.php?id=' . $id . '" class="category-box">
                                    <div class="inside"><h1>' . $title . '</h1></div>
                                    <img loading="lazy" src="' . $image_name . '"  alt="img">
                    
                                </a>
                            ';
                }
            }
        }

        ?>
    </div>

</div>
<!----------------------- footer-start -------------------->
<?php include("header-footer/footer.php") ?>