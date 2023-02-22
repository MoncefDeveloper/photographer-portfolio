<?php include("admin/header-footer/PDO.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" type="x-icon" href="./images/LM-photo-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Photographer Lakehal Moncef From Algeria</title>
</head>

<body>
    <div class="container">
        <div class="red-point">
            <div class="red" id="red-point"></div>
        </div>
        <div class="menu-items" id="menu-items">
            <div class="in-menu">
                <div>
                    <div class="hidden"><a href="index.php">Portflio</a></div>
                </div>
                <div>
                    <div class="hidden"><a href="menu.php">Menu</a></div>
                </div>
                <div>
                    <div class="hidden"><a href="galley.php">Gallery</a></div>
                </div>
                <div>
                    <div class="hidden"><a href="categories-2.php">Categories</a></div>
                </div>
                <div>
                    <div class="hidden"><a href="contact.php">Contact</a></div>
                </div>
                <div>
                    <div class="hidden"><a href="about.php">About</a></div>
                </div>
            </div>
            <div class="out-menu">
                <div class="contact" id="contact">
                    moncef.lakehal@outlook.com <br>
                    Number: +213656711226
                </div>
                <div class="sociale" id="sociale">
                    <a class="img" href="#"><img loading="lazy" alt="img" src="images/instagram.png"></a>
                    <a class="img" href="#"><img loading="lazy" alt="img" src="images/facebook.png"></a>
                    <a class="img" href="#"><img loading="lazy" alt="img" src="images/twitter.png"></a>
                </div>
            </div>
        </div>
        <div class="navbar navbar-open2" id="navbar">
            <a href="index.php" class="logo">
                <img loading="lazy" alt="img" src="images/LM-logo.png">
            </a>

            <div class="humberger" id="humberger">
                <div class="khat"></div>
            </div>

        </div>

        <div class="intro">
            <div class="camera" id="camera">
                <div class="camera-logo">
                    <div class="head"></div>
                    <div class="footer">
                        <div class="big-point">
                            <div class="point"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="khtot-1">
                <img loading="lazy" alt="img" src="https://static.tildacdn.com/tild3265-6238-4732-b037-393239613064/Vector_5.svg" alt="img">
            </div>

            <div class="cicle-1">
                <img loading="lazy" alt="img" src="./images/LM-svg(1).svg" alt="img">

            </div>

            <div class="khtot-2">
                <img loading="lazy" alt="img" src="https://static.tildacdn.com/tild3265-6238-4732-b037-393239613064/Vector_5.svg" alt="img">
            </div>
            <div class="center" id="center">
                <div class="img">
                    <img loading="lazy" alt="img" src="images/LM-image-4.webp" alt="">
                </div>
                <div class="text">
                    <h2 class="front-1">Lakehal <div class="in-front-mini-1 ">based in Algeria</div>
                    </h2>
                    <h2 class="front-2">
                        <div class="in-front-mini-2">I SHOW REALITY FROM IT’S BETTER SIDE</div>
                        Moncef
                    </h2>
                    <h2 class="front-3">
                        Photographer
                    </h2>
                </div>

            </div>
        </div>

        <div class="intro2-2">
            <div class="khtot-2">
                <img loading="lazy" alt="img" src="https://static.tildacdn.com/tild3265-6238-4732-b037-393239613064/Vector_5.svg" alt="img">
            </div>

            <div class="top">
                <h1 class="mini-title">
                    My Recently Work
                </h1>
            </div>
            <div class="bottom">

                <?php
                $x = 1;
                $sql2 = "SELECT * from tbl_recent_work where tbl_recent_work.active='YES' order by `date` desc limit 6 ";
                $stmt2 = $db->prepare($sql2);
                $stmt2->execute();
                $row4 = $stmt2->fetchAll();

                if ($stmt2 == true) {
                    if (count($row4) > 0) {
                        foreach ($row4 as $key => $row3) {
                            $id = $row3["id"];
                            $title = $row3["title"];
                            $text = $row3["text"];
                            if ($row3["image_name"] == null || $row3["image_name"] == "") {
                                $image_name = "images/work_images/no-image.webp";
                            } else {
                                $image_name2 = "images/work_images/" . $row3["image_name"];
                                if (file_exists($image_name2) == true) {
                                    $image_name = "images/work_images/" . $row3["image_name"];
                                } else {
                                    $image_name = "images/work_images/no-image.webp";
                                }
                            }

                            if ($key % 2 !== 0) {
                                $class = 'recently-work-box-2';
                            } else {
                                $class = "";
                            }
                            echo '                                
                                <div class="recently-work-box ' . $class . '">
                                    <div class="img">
                                        <img loading="lazy" alt="img" src="' . $image_name . '" alt="img" >                                 
                                    </div>
                                    <div class="title">
                                        ' . $title . ' 
                                    </div>
                                    <div class="descrption">
                                    ' . $text . '
                                    </div>
                                </div>
                                ';
                        }
                    }
                }
                ?>
            </div>

            <div class="intro5">
                <div class="qst">
                    <div class="contact">
                        <a href="contact.php" class="contact-title">
                            <h3>Interested?</h3>
                            <h1>CONTACT ME</h1>
                        </a>
                    </div>
                    <div class="about">
                        <a href="about.php" class="about-title">
                            <h3>Continue Expoloring?</h3>
                            <h1>ABOUT ME</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script src="gsap.min.js"></script>
        <script src="main-index.js"></script>
</body>

</html>