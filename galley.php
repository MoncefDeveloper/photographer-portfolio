<?php include("./headers/header-1.php") ?>
<title>Gallery</title>
<?php include("./headers/navbar.php") ?>
<div class="gallery">
    <div class="space"></div>
    <div class="all-images">

        <?php
        $sql4 = "SELECT * FROM `tbl_gallery` WHERE tbl_gallery.active='YES' ORDER by rand()";
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

<script src="gsap.min.js"></script>
<script src="main.js"></script>
</body>

</html>