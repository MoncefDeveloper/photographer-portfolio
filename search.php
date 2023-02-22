<?php include("./headers/header-1.php") ?>
<?php
if (isset($_GET["search"])) {
    $search = $_GET["search"];
} else {
    $search = 00;
    header("location:" . $GLOBALS["url"] . "/galley.php");
}
?>
<title>Search: <?php echo $search ?></title>
<?php include("./headers/navbar.php") ?>
<div class="pic-search">
    <div class="space"></div>
    <div class="img2">
        <div class="div">
            <h1>SEARCH IN => <h2> <?php echo $search; ?></h2>
            </h1>
        </div>
    </div>
    <div class="all-images">
        <?php
        $sql = "SELECT * from tbl_gallery where tbl_gallery.title like '%$search%' or tbl_gallery.key_word like '%$search%' and tbl_gallery.active='YES' order by id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row2 = $stmt->fetchAll();
        if (count($row2) > 0) {
            foreach ($row2 as $row) {
                $title = $row["title"];
                $id = $row["id"];
                if ($row["image_name"] == null || $row["image_name"] == "") {
                    $image_name3 = "images/gallery_images/no-image.webp";
                } else {
                    $image_name4 = "images/gallery_images/" . $row["image_name"];
                    if (file_exists($image_name4) == true) {
                        $image_name3 = "images/gallery_images/" . $row["image_name"];
                    } else {
                        $image_name3 = "images/gallery_images/no-image.webp";
                    }
                }
                echo '
                                <a class="img" href="details.php?id=' . $id . '">
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