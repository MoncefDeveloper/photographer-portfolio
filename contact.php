<?php include("./headers/header-1.php") ?>
<title>Contact</title>
<?php include("./headers/navbar.php") ?>
<div class="contact2">
    <div class="left-side">
        <h1>Contact</h1>
        <hr>
        <form action="" method="post">
            <p>Your Name (required)</p>
            <input type="text" name="name" required>

            <p>Your Email Address (required)</p>
            <input type="email" name="email" required>

            <p>Your Number</p>
            <input type="number" name="number">

            <p>Adress</p>
            <input type="text" name="adress">

            <p>Subject (required)</p>
            <input type="text" name="subject" required>

            <p>Your Message</p>
            <textarea name="message" cols="30" rows="10"></textarea>

            <input type="submit" class="btn" name="submit" value="SEND">
        </form>
    </div>
    <?php
    if (isset($_POST["submit"])) {

        // -----------VARIABLES-------------------------

        if (isset($_POST["name"]) and $_POST["name"] != "") {
            $name = filter_var($_POST["name"],  FILTER_FLAG_STRIP_HIGH);
        } else {
            $name = "No Name";
        }

        // -------------------------------------

        if (isset($_POST["email"]) and $_POST["email"] != "") {
            $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_HIGH);
        } else {
            $email = "NO Email";
        }

        // -------------------------------------

        if (isset($_POST["number"]) and $_POST["number"] != "") {
            $number = filter_var($_POST["number"],  FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
        } else {
            $number = "00";
        }

        // -------------------------------------

        if (isset($_POST["adress"]) and $_POST["adress"] != "") {
            $adress = filter_var($_POST["adress"],  FILTER_FLAG_STRIP_HIGH);
        } else {
            $adress = "NO Adress";
        }

        // -------------------------------------

        if (isset($_POST["subject"]) and $_POST["subject"] != "") {
            $subject = filter_var($_POST["subject"],  FILTER_FLAG_STRIP_HIGH);
        } else {
            $subject = "NO Subject";
        }

        // -------------------------------------

        if (isset($_POST["message"]) and $_POST["message"] != "") {
            $message = filter_var($_POST["message"],  FILTER_FLAG_STRIP_HIGH);
        } else {
            $message = "NO Message";
        }

        // -------------------------------------

        $date = date("Y-m-d H:i:s");

        // -------------------------------------

        // echo $name."<br>";
        // echo $email."<br>";
        // echo $number."<br>";
        // echo $adress."<br>";
        // echo $subject."<br>";
        // echo $message."<br>";
        // echo $date."<br>";

        $sql = "INSERT INTO tbl_contact 
                    (`date`, customer_name, `custome_contact`, `customer_email`, customer_adress, customer_subject, customer_message) VALUES
                    ( '$date', '$name', '$number', '$email', '$adress', '$subject', '$message');";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        if ($stmt == true) {
            header("location:". $GLOBALS["url"]."/contact.php");
        } else {
            header("location:". $GLOBALS["url"]."/contact.php");
        }
    }

    ?>
    <div class="right-side">
        <img loading="lazy" alt="img"  src="images/LM-image-3.webp">
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