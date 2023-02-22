<?php include("./headers/header-1.php") ?>
<?php
if (isset($_GET["id"])) {
    $id2 = $_GET["id"];
    if (is_numeric($id2)) {
        $sql = "SELECT * from tbl_category where tbl_category.id='$id2'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll();
        if (count($row) == 1) {
            foreach ($row as $row) {
                $new_id = $row["id"];
                $title = $row["title"];
                if ($row["image_name"] == null || $row["image_name"] == "") {
                    $image_name = "images/category_images/no-image.webp";
                } else {
                    $image_name2 = "images/category_images/" . $row["image_name"];
                    if (file_exists($image_name2) == true) {
                        $image_name = "images/category_images/" . $row["image_name"];
                    } else {
                        $image_name = "images/category_images/no-image.webp";
                    }
                }

            }
        } else {
            header("location:". $GLOBALS["url"]."/categories-2.php");
        }
    } else {
        header("location:". $GLOBALS["url"]."/categories-2.php");
    }
} else {
    header("location:". $GLOBALS["url"]."/categories-2.php");
}

?>
<title><?php echo $title ?></title>
<?php include("./headers/navbar.php") ?>
<div class="category-image">
    <div class="space"></div>
    <div class="category-one-title">
        <h1><?php echo $title ?> </h1>
    </div>
    <div class="img">
        <img loading="lazy" alt="img" src=" <?php echo $image_name ?> " alt="img">
    </div>
</div>
<div class="all-category">
    <div class="gallery-ex">
        <div class="gallery-title">
            <h1>GALLERY</h1>
        </div>
        <div class="all-images">
            <?php
            $sql3 = "SELECT * FROM `tbl_gallery` WHERE tbl_gallery.category_id=$new_id and tbl_gallery.active='YES' ORDER by id";
            $stmt3 = $db->prepare($sql3);
            $stmt3->execute();
            $row6 = $stmt3->fetchAll();
            if (count($row6) > 0) {
                foreach ($row6 as $row5) {
                    $title = $row5["title"];
                    $id = $row5["id"];
                    if ($row5["image_name"] == null || $row5["image_name"] == "") {
                        $image_name3 = "images/gallery_images/no-image.webp";
                    } else {
                        $image_name4 = "images/gallery_images/" . $row5["image_name"];
                        if (file_exists($image_name4) == true) {
                            $image_name3 = "images/gallery_images/" . $row5["image_name"];
                        } else {
                            $image_name3 = "images/gallery_images/no-image.webp";
                        }
                    }
                    echo '
                                <a class="img" href="details?id=' . $id . '">
                                    <img loading="lazy" alt="img" src="' . $image_name3 . '" >
                                    <div class="show"><div class="title">' . $title . '</div></div>
                                </a>
                                ';
                }
            }
            ?>


        </div>
        <!-- <div class="gallery-title">
                    <a href="#">SEE ALL IMAGES</a>
                </div> -->
    </div>
</div>
<div class="footer">
    <div class="the-name">
        <div class="sociale">
            <a href="#"><img loading="lazy" alt="img" src="images/facebook-logo.png"></a>
            <a href="#"><img loading="lazy" alt="img" src="images/instagram-social-network-logo-of-photo-camera.png"></a>
            <a href="#"><img loading="lazy" alt="img" src="images/placeholder-filled-point.png"></a>
        </div>
        <h1>LM-PHOTOGRAPHY</h1>
    </div>
    <div class="designed-by">
        <h1>All rights reserved. Designed By-<h2>LM</h2>
        </h1>
    </div>
</div>
</div>
<script src="gsap.min.js"></script>
<script src="main.js"></script>
</body>

</html>