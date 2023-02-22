<?php include("./headers/header-1.php") ?>
<link rel="stylesheet" href="swiper.css">
<title>Categories</title>
<?php include("./headers/navbar.php") ?>
<div class="all-category" style="margin-bottom: 100px;">
    <div class="space"></div>
    <h1 class="category-top">CATEGORIES</h1>


    <div class="search-category">
        <div class="swiper-container mySwiper">
            <div class="swiper-wrapper">

                <?php
                $sql = "SELECT * from tbl_category order by id";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $row2 = $stmt->fetchAll();
                if (count($row2) > 0) {
                    foreach ($row2 as $row) {
                        $id = $row["id"];
                        $title = $row["title"];

                        echo '
                                        <a href="#' . $id . '" class="swiper-slide btn">' . $title . '</a>
                                    ';
                    }
                }
                ?>

            </div>
            <div class="swiper-button-next left"></div>
            <div class="swiper-button-prev right"></div>
        </div>
    </div>

    <?php
    $sql2 = "SELECT * from tbl_category order by rand() ";
    $stmt2 = $db->prepare($sql2);
    $stmt2->execute();
    $row4 = $stmt2->fetchAll();
    if (count($row4) > 0) {
        foreach ($row4 as $row3) {
            $id2 = $row3["id"];
            $title = $row3["title"];
            if ($row3["image_name"] == null || $row3["image_name"] == "") {
                $image_name = "images/category_images/no-image.webp";
            } else {
                $image_name2 = "images/category_images/" . $row3["image_name"];
                if (file_exists($image_name2) == true) {
                    $image_name = "images/category_images/" . $row3["image_name"];
                } else {
                    $image_name = "images/category_images/no-image.webp";
                }
            }

            $sql3 = "SELECT * FROM `tbl_gallery` WHERE tbl_gallery.category_id=$id and tbl_gallery.favories='YES' and tbl_gallery.active='YES' ORDER by id desc limit 3";
            $stmt3 = $db->prepare($sql3);
            $stmt3->execute();
            $row6 = $stmt->fetchAll();
            if (count($row6) > 0) {
                foreach ($row6 as $row5) {
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
                }
            }
    ?>
            <div class="category-box" id="<?php echo $id2 ?>">
                <div class="cicle-1">
                    <img loading="lazy" alt="img" src="./images/LM-svg(2).svg" alt="img">
                </div>
                <div class="big-box">
                    <div class="box1">
                        <img loading="lazy" alt="img" src="<?php echo $image_name ?>" alt="">
                        <div class="more">
                            <h1><?php echo $title ?></h1>
                            <a href="in-category?id=<?php echo $id2 ?>" class="btn-more">MORE</a>
                        </div>
                    </div>
                    <div class="box2">
                        <?php
                        $sql3 = "
                            SELECT * FROM `tbl_gallery` 
                            WHERE tbl_gallery.category_id=$id2 
                            and tbl_gallery.active='YES'
                            ORDER by rand() desc limit 3";
                        $stmt3 = $db->prepare($sql3);
                        $stmt3->execute();
                        $row6 = $stmt3->fetchAll();
                        if (count($row6) > 0) {
                            foreach ($row6 as $row5) {
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
                                                    <img loading="lazy" alt="img" src="' . $image_name3 . '" >
                                                ';
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
    <?php


        }
    } else {
        echo '
                    <div class="category-box">
                        <div class="cicle-1">
                            <img loading="lazy" alt="img" src="./images/LM-svg(2).svg" alt="img">
                        </div>
                        <div class="big-box">
                            <div class="box1">
                                <img loading="lazy" alt="img" src="images/nature (1).webp" alt="">
                                <div class="more">
                                    <h1>Nature</h1>
                                    <a href="#" class="btn-more">MORE</a>
                                </div>
                            </div>
                            <div class="box2">
                                <img loading="lazy" alt="img" src="images/nature (2).webp" alt="">
                                <img loading="lazy" alt="img" src="images/nature (3).webp" alt="">
                                <img loading="lazy" alt="img" src="images/nature (4).webp" alt="">
                            </div>
                        </div>
                    </div>
                    ';
    }

    ?>

</div>

<!---------------------------footer-start----------------------------->
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
<!---------------------------footer-end----------------------------->

</div>
<script src="swiper.js"></script>
<script src="swiper-page.js"></script>
<script src="gsap.min.js"></script>
<script src="main.js"></script>
</body>

</html>