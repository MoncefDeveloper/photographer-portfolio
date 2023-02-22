<?php include("header-footer/header.php") ?>

<!----------------------- header-end -------------------->
<div class="msg-err">
    <h1>Manage About</h1>
    <h1 style="color:red;text-align:center;">
        <?php

        if (isset($_SESSION["drop-image-about"])) {
            echo $_SESSION["drop-image-about"];
            unset($_SESSION["drop-image-about"]);
        }
        if (isset($_SESSION["update-section"])) {
            echo $_SESSION["update-section"];
            unset($_SESSION["update-section"]);
        }


        ?>
    </h1>
</div>
<div class="manage manage2  ">



    <?php
    $x = 1;
    $sql = "SELECT * from tbl_about order by id ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row2 = $stmt->fetchAll();

    if ($stmt == true) {
        if (count($row2) > 0) {
            foreach ($row2 as $row) {
                $id = $row["id"];
                $title1 = $row["title1"];
                $title2 = $row["title2"];
                $title3 = $row["title3"];
                $text1 = $row["text1"];
                $text2 = $row["text2"];
                $text3 = $row["text3"];
                $display = $row["display"];
                if ($row["image_name"] == null || $row["image_name"] == "") {
                    $image_name = "../images/about_images/no-image.webp";
                } else {
                    $image_name2 = "../images/about_images/" . $row["image_name"];
                    if (file_exists($image_name2) == true) {
                        $image_name = "../images/about_images/" . $row["image_name"];
                    } else {
                        $image_name = "../images/about_images/no-image.webp";
                    }
                }


                if ($display == "YES") {
                    echo "
                                <a href='update-about-section.php?id=$id' class='box1'>
                                    <div class='h1-2'>Section $id</div>
                                    <div class='img0'><div class='img-2'><img loading='lazy' src='$image_name' alt='img'></div></div>  
                                    <h1 class='h1'>display: $display</h1>
                                    
                                    <h2>1/ $title1</h2>
                                    <h2>2/ $title2</h2>
                                    <h2>3/ $title3</h2>
                                    <p>1/ $text1</p>
                                    <p>2/ $text2</p>
                                    <p>3/ $text3</p>
                                </a>
                                ";
                } else {
                    echo "
                                <a href='update-about-section.php?id=$id' class='box1'>
                                    <div class='h1-2'>Section $id</div>
                                    <div class='img0'><div class='img-2'><img loading='lazy' src='$image_name' alt='img'></div></div>  
                                    <h1 class='h1-2'>display: $display</h1>
                                    
                                    <h2>1/ $title1</h2>
                                    <h2>2/ $title2</h2>
                                    <h2>3/ $title3</h2>
                                    <p>1/ $text1</p>
                                    <p>2/ $text2</p>
                                    <p>3/ $text3</p>
                                </a>
                                ";
                }
            }
        }
    }

    ?>
</div>
<!----------------------- footer-start -------------------->
<?php include("header-footer/footer.php") ?>