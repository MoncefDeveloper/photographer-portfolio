<?php include("./headers/header-1.php") ?>
<title>About</title>
<?php include("./headers/navbar.php") ?>

<div class="about">
    <?php
    $sql = "SELECT * from tbl_about where tbl_about.id=1 and tbl_about.display='Yes'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row2 = $stmt->fetchAll();
    if (count($row2) == 1) {
        foreach ($row2 as $row) {
            $title1 = $row["title1"];
            $title2 = $row["title2"];
            $text1 = $row["text1"];
            $display = $row["display"];

            if ($row["image_name"] == null || $row["image_name"] == "") {
                $image_name = "images/about_images/no-image.webp";
            } else {
                $image_name2 = "images/about_images/" . $row["image_name"];
                if (file_exists($image_name2) == true) {
                    $image_name = "images/about_images/" . $row["image_name"];
                } else {
                    $image_name = "images/about_images/no-image.webp";
                }
            }
            if ($display == "YES") {
                echo '
                            <div class="section1">
                                <div class="img">
                                    <img loading="lazy" alt="img" src="' . $image_name . '">
                                </div>
                                <h1>' . $title1 . '</h1>
                                <h2>' . $title2 . '</h2>
                                <p>
                                    ' . $text1 . '
                                </p>
                            </div>

                        ';
            }
        }
    }
    ?>


    <?php
    $sql = "SELECT * from tbl_about where tbl_about.id=2 and tbl_about.display='Yes'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row2 = $stmt->fetchAll();
    if (count($row2) == 1) {
        foreach ($row2 as $row) {
            $title1 = $row["title1"];
            $title2 = $row["title2"];
            $text1 = $row["text1"];
            $display = $row["display"];


            if ($display == "YES") {
                echo '
                            <div class="section2">
                                <div class="box1">
                                    <h1>' . $title1 . '</h1>
                                </div>
                                <div class="box2">
                                    <h1>' . $title2 . '</h1>
                                    <p>
                                        ' . $text1 . '
                                    </p>
                                </div>
                            </div>

                        ';
            }
        }
    }
    ?>

    <?php
    $sql = "SELECT * from tbl_about where tbl_about.id=3 and tbl_about.display='Yes'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row2 = $stmt->fetchAll();
    if (count($row2) == 1) {
        foreach ($row2 as $row) {
            $title1 = $row["title1"];
            $title2 = $row["title2"];
            $title3 = $row["title3"];
            $text1 = $row["text1"];
            $text2 = $row["text2"];
            $text3 = $row["text3"];
            $display = $row["display"];


            if ($display == "YES") {
                echo '
                            <div class="section3">
                                <div class="box1 box">
                                    <h1>01.' . $title1 . '</h1>
                                    <p>
                                        ' . $text1 . '
                                    </p>
                                </div>
                                <div class="box2 box">
                                    <h1>02.' . $title2 . '</h1>
                                    <p>
                                        ' . $text2 . '
                                    </p>
                                </div>
                                <div class="box3 box">
                                    <h1>03.' . $title3 . '</h1>
                                    <p>
                                        ' . $text3 . '
                                    </p>
                                </div>
                            </div>

                        ';
            }
        }
    }
    ?>

    <?php
    $sql = "SELECT * from tbl_about where tbl_about.id=4 and tbl_about.display='Yes'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row2 = $stmt->fetchAll();
    if (count($row2) == 1) {
        foreach ($row2 as $row) {
            $title1 = $row["title1"];
            $title2 = $row["title2"];
            $title3 = $row["title3"];
            $text1 = $row["text1"];
            $text2 = $row["text2"];
            $text3 = $row["text3"];
            $display = $row["display"];
            if ($row["image_name"] == null || $row["image_name"] == "") {
                $image_name = "images/about_images/no-image.webp";
            } else {
                $image_name2 = "images/about_images/" . $row["image_name"];
                if (file_exists($image_name2) == true) {
                    $image_name = "images/about_images/" . $row["image_name"];
                } else {
                    $image_name = "images/about_images/no-image.webp";
                }
            }

            if ($display == "YES") {
                echo '
                            <div class="section4">
                                <div class="box1">
                                    <div class="section-title">
                                        ' . $title1 . '
                                    </div> 
                                    <div class="section-text">
                                        ' . $text1 . '                                        
                                    </div>                                    
                                </div>
                                <div class="box2">
                                    <div class="jsTilt">
                                        <img loading="lazy" alt="img" src="' . $image_name . '">
                                    </div>
                                </div>
                            </div>

                        ';
            }
        }
    }
    ?>

    <?php
    $sql = "SELECT * from tbl_about where tbl_about.id=5 and tbl_about.display='Yes'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row2 = $stmt->fetchAll();
    if (count($row2) == 1) {
        foreach ($row2 as $row) {
            $title1 = $row["title1"];
            $title2 = $row["title2"];
            $title3 = $row["title3"];
            $text1 = $row["text1"];
            $text2 = $row["text2"];
            $text3 = $row["text3"];
            $display = $row["display"];
            if ($row["image_name"] == null || $row["image_name"] == "") {
                $image_name = "images/about_images/no-image.webp";
            } else {
                $image_name2 = "images/about_images/" . $row["image_name"];
                if (file_exists($image_name2) == true) {
                    $image_name = "images/about_images/" . $row["image_name"];
                } else {
                    $image_name = "images/about_images/no-image.webp";
                }
            }

            if ($display == "YES") {
                echo '
                            <div class="section5">
                                <div class="box1">
                                    <div class="jsTilt2">
                                        <img loading="lazy" alt="img" src="' . $image_name . '">
                                    </div>
                                </div>
                                <div class="box2">
                                    <div class="section-title">
                                        ' . $title1 . '
                                    </div> 
                                    <div class="section-text">
                                        ' . $text1 . '                                        
                                    </div>            
                                </div>
                            </div>

                        ';
            }
        }
    }
    ?>

    <?php
    $sql = "SELECT * from tbl_about where tbl_about.id=6 and tbl_about.display='Yes'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row2 = $stmt->fetchAll();
    if (count($row2) == 1) {
        foreach ($row2 as $row) {
            $title1 = $row["title1"];
            $title2 = $row["title2"];
            $title3 = $row["title3"];
            $text1 = $row["text1"];
            $text2 = $row["text2"];
            $text3 = $row["text3"];
            $display = $row["display"];
            if ($row["image_name"] == null || $row["image_name"] == "") {
                $image_name = "images/about_images/no-image.webp";
            } else {
                $image_name2 = "images/about_images/" . $row["image_name"];
                if (file_exists($image_name2) == true) {
                    $image_name = "images/about_images/" . $row["image_name"];
                } else {
                    $image_name = "images/about_images/no-image.webp";
                }
            }

            if ($display == "YES") {
                echo '
                            <div class="section6">
                                <div class="box1">
                                    <div class="section-title">
                                        ' . $title1 . '
                                    </div> 
                                    <div class="section-text">
                                        ' . $text1 . '                                        
                                    </div>            
                                </div>
                                <div class="box2">
                                    <img loading="lazy" alt="img" src="' . $image_name . '" >
                                </div>
                            </div>

                        ';
            }
        }
    }
    ?>

    <?php
    $sql = "SELECT * from tbl_about where tbl_about.id=7 and tbl_about.display='Yes'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row2 = $stmt->fetchAll();
    if (count($row2) == 1) {
        foreach ($row2 as $row) {
            $title1 = $row["title1"];
            $text1 = $row["text1"];
            $display = $row["display"];


            if ($display == "YES") {
                echo '
                            <div class="section8">
                                <h1>' . $title1   . '</h1>
                                <p>
                                    ' . $text1 . '
                                </p>
                            </div>

                        ';
            }
        }
    }
    ?>

    <div class="section7">
        <div class="box">
            <a href="#"><img loading="lazy" alt="img" src="images/facebook.png"></a>
        </div>
        <div class="box">
            <a href="#"><img loading="lazy" alt="img" src="images/instagram.png"></a>
        </div>
        <div class="box">
            <a href="#"><img loading="lazy" alt="img" src="images/twitter.png"></a>
        </div>
    </div>

    <?php
    $sql = "SELECT * from tbl_about where tbl_about.id=8 and tbl_about.display='Yes'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row2 = $stmt->fetchAll();
    if (count($row2) == 1) {
        foreach ($row2 as $row) {
            $title1 = $row["title1"];
            $title2 = $row["title2"];
            $display = $row["display"];


            if ($display == "YES") {
                echo '
                            <div class="section9">
                                <p>' . $title1 . '</p>
                                <p>' . $title2 . '</p>
                            </div>

                        ';
            }
        }
    }
    ?>
</div>

<!---------------------------footer-start----------------------------->
<div class="footer">
    <div class="designed-by">
        <h1>All rights reserved. Designed By-<h2>LM</h2>
        </h1>
    </div>
</div>
<!---------------------------footer-end----------------------------->

</div>
<script src="vanilla_tilt.js"></script>
<script type="text/javascript">
    VanillaTilt.init(document.querySelector(".jsTilt"), {
        max: 15,
        scale: 1.1,
        speed: 1500,
        reverse: true,
        glare: true,
        "max-glare": .4,
    });

    //It also supports NodeList
    VanillaTilt.init(document.querySelectorAll(".jsTilt"));

    VanillaTilt.init(document.querySelector(".jsTilt2"), {
        max: 15,
        scale: 1.1,
        speed: 1500,
        reverse: true,
        glare: true,
        "max-glare": .4,
    });

    //It also supports NodeList
    VanillaTilt.init(document.querySelectorAll(".jsTilt2"));
</script>
<script src="gsap.min.js"></script>
<script src="main.js"></script>
<script src="titlt.js"></script>

</body>

</html>