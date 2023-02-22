<?php include("./headers/header-1.php") ?>
<link rel="stylesheet" href="swiper.css">
<title>Menu</title>
<?php include("./headers/navbar.php") ?>
<div class="all-category">

    <div class="khtot-1">
        <img loading="lazy" alt="img" src="https://static.tildacdn.com/tild3265-6238-4732-b037-393239613064/Vector_5.svg" alt="img">
    </div>

    <div class="khtot-2">
        <img loading="lazy" alt="img" src="https://static.tildacdn.com/tild3265-6238-4732-b037-393239613064/Vector_5.svg" alt="img">
    </div>

    <div class="cicle-1">
        <img loading="lazy" alt="img" src="./images/LM-svg(2).svg" alt="img">
    </div>



    <div class="catgory-swipe">
        <div class="swiper-container swiper-container-category mySwiperCategory">
            <div class="swiper-wrapper">
                <?php
                $sql = "SELECT * from tbl_category where tbl_category.favories='Yes' order by rand() desc limit 5";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $row2 = $stmt->fetchAll();
                if (count($row2) > 0) {
                    foreach ($row2 as $row) {
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
                        echo '
                                        <div class="swiper-slide"><img loading="lazy" alt="img" src="' . $image_name . '" ></div>
                                    ';
                    }
                } else {
                    echo '
                                    <div class="swiper-slide"><img loading="lazy" alt="img" src="images/back (2).webp" ></div>
                                    <div class="swiper-slide"><img loading="lazy" alt="img" src="images/back (1).webp" ></div>
                                    <div class="swiper-slide"><img loading="lazy" alt="img" src="images/back (4).webp" ></div>
                                ';
                }
                ?>

            </div>
            <div class="swiper-button-next left"></div>
            <div class="swiper-button-prev right"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="select-category">
        <h1>Categories</h1>

        <!-- <select name="category" >
                    <option value="">Animals</option>
                    <option value="">Portrais</option>
                    <option value="">Food</option>
                    <option value="">Black & White</option>
                    <option value="">Work Time</option>
                </select> -->
    </div>

    <!-- <div class="select-category0">
                <div class="right" id="right">s</div>
                <div class="select-category2">
                    <div class="category-all" id="category">
                        <h1><a href="#animals">animals </a></h1>
                        <h1><a href="#animals">animals </a></h1>
                        <h1><a href="#animals">animals </a></h1>
                        <h1><a href="#animals">animals </a></h1>
                        <h1><a href="#animals">animals </a></h1>
                        <h1><a href="#animals">animals </a></h1>
                        <h1><a href="#animals">animals </a></h1>
                    </div>
                </div>
                <div class="right" id="left">></div>
            </div> -->



    <?php
    $sql2 = "SELECT * from tbl_category where tbl_category.favories='Yes' order by rand() desc limit 3";
    $stmt2 = $db->prepare($sql2);
    $stmt2->execute();
    $row4 = $stmt2->fetchAll();
    if (count($row4) > 0) {
        foreach ($row4 as $row3) {
            $id = $row3["id"];
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

            $sql3 = "SELECT * FROM `tbl_gallery` WHERE tbl_gallery.category_id=$id and tbl_gallery.favories='YES' and tbl_gallery.active='YES' ORDER by rand() limit 3";
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
            <div class="category-box">
                <div class="big-box">
                    <div class="box1">
                        <img loading="lazy" alt="img" src="<?php echo $image_name ?>" alt="">
                        <div class="more">
                            <h1><?php echo $title ?></h1>
                            <a href="in-category?id=<?php echo $id ?>" class="btn-more">MORE</a>
                        </div>
                    </div>
                    <div class="box2">
                        <?php
                        $sql3 = "SELECT * FROM `tbl_gallery` WHERE tbl_gallery.category_id=$id and  tbl_gallery.active='YES' ORDER by rand() desc limit 3";
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

    <div class="category-for-more">
        <a href="categories-2.php">SEE ALL CATEGORIES</a>
    </div>
</div>



<div class="for-pub">
    <div class="cicle-2">
        <img loading="lazy" alt="img" src="./images/LM-svg(2).svg" alt="img">
    </div>
    <div class="text">
        <h1>EDITORIAL PHOTOGRAPHY</h1>
        <p>We believe in a simple and timeless design</p>
        <a href="contact.php">CONTACT ME</a>
    </div>
    <div class="profile-img">
        <div class="img">
            <div></div>
        </div>
    </div>
</div>
<div class="gallery-ex">
    <div class="gallery-title">
        <h1>GALLERY</h1>
    </div>
    <div class="all-images">
        <?php
        $sql4 = "SELECT * FROM `tbl_gallery` WHERE tbl_gallery.favories='YES' and tbl_gallery.active='YES' ORDER by rand()";
        $stmt4 = $db->prepare($sql4);
        $stmt4->execute();
        $row8 = $stmt4->fetchAll();
        if (count($row8) > 0) {
            foreach ($row8 as $row7) {
                $id = $row7["id"];
                $title = $row7["title"];
                if ($row7["image_name"] == null || $row7["image_name"] == "") {
                    $image_name3 = "images/gallery_images/no-image.webp";
                } else {
                    $image_name4 = "images/gallery_images/" . $row7["image_name"];
                    if (file_exists($image_name4) == true) {
                        $image_name3 = "images/gallery_images/" . $row7["image_name"];
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
    <div class="gallery-title">
        <a class="to-all-images" href="galley.php">SEE ALL IMAGES</a>
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
<script src="swiper.js"></script>
<script src="swiper-page.js"></script>
<script src="gsap.min.js"></script>
<script src="main.js"></script>
</body>

</html>