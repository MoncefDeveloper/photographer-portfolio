<?php include("./headers/header-1.php") ?>
<?php
if (isset($_GET["id"])) {
    $id2 = $_GET["id"];
    if (is_numeric($id2)) {
        $sql = "SELECT * from tbl_gallery where tbl_gallery.id='$id2'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row2 = $stmt->fetchAll();
        if (count($row2) == 1) {
            foreach ($row2 as $row) {
                $new_id = $row["id"];
                $title = $row["title"];
                $price = $row["price"];
                $description = $row["description"];
                $key_word = $row["key_word"];
                $year = $row["year"];
                if ($row["image_name"] == null || $row["image_name"] == "") {
                    $image_name = "images/gallery_images/no-image.webp";
                } else {
                    $image_name2 = "images/gallery_images/" . $row["image_name"];
                    if (file_exists($image_name2) == true) {
                        $image_name = "images/gallery_images/" . $row["image_name"];
                    } else {
                        $image_name = "images/gallery_images/no-image.webp";
                    }
                }
            }
        } else {
            header("location:". $GLOBALS["url"]."/galley.php");
        }
    } else {
        header("location:". $GLOBALS["url"]."/galley.php");
    }
} else {
    header("location:". $GLOBALS["url"]."/galley.php");
}

?>
<title><?php echo $title ?> </title>
<?php include("./headers/navbar.php") ?>
<div class="cart-template">
    <!-- <div class="space"></div> -->

    <?php
    echo '
    <div class="section-cart1">
        <div class="img">
            <img loading="lazy" alt="img" src="' . $image_name . '" >
        </div>
    </div>
    <div class="section-cart2">
        <div class="img">
            <img loading="lazy" alt="img" src="' . $image_name . '" >
        </div>
    </div>
    <div class="section-cart3">
        <div class="img">
            <img loading="lazy" alt="img" src="' . $image_name . '">
        </div>
        <div class="form">
            <h1>' . $title . '</h1>
            <p>
                Taille disponible: <br>
                - 80x50cm <br>
                - 100x60cm <br>
                - 135x80cm <br>
            </p>
            <p>
                ' . $description . '
            </p>
            
            <p>© ' . $year . ' Image protected by copyright</p>
            <h1>' . $price . '£</h1>
            <p>
                KeyWords:' . $key_word . '
            </p>
            <a href="". $GLOBALS["url"]."/contact.php">
                Contact me
            </a>
        </div>
    </div>
    ';
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
<script src="gsap.min.js"></script>
<script src="main.js"></script>

</body>

</html>