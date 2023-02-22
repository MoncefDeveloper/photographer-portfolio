<?php include("header-footer/header.php") ?>

<!----------------------- header-end -------------------->
<div class="manage">
    <h1>Manage Category</h1>
    <h1 style="color:red;text-align:center;font-size:50px;">
        <?php

        if (isset($_SESSION["add-category"])) {
            echo $_SESSION["add-category"];
            unset($_SESSION["add-category"]);
        }

        if (isset($_SESSION["update-category"])) {
            echo $_SESSION["update-category"];
            unset($_SESSION["update-category"]);
        }

        if (isset($_SESSION["fail-delete-category"])) {
            echo $_SESSION["fail-delete-category"];
            unset($_SESSION["fail-delete-category"]);
        }

        if (isset($_SESSION["drop-image"])) {
            echo $_SESSION["drop-image"];
            unset($_SESSION["drop-image"]);
        }

        if (isset($_SESSION["drop-image-category"])) {
            echo $_SESSION["drop-image-category"];
            unset($_SESSION["drop-image-category"]);
        }
        ?>
    </h1>
    <a class="btn1-2 btn1" href="add-category.php">
        Add Category
    </a>
    <table class="content">
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Image</th>
            <th>Comment</th>
            <th>Favories</th>
            <th>Actions</th>
        </tr>

        <?php
        $x = 1;
        $sql = "SELECT * from tbl_category order by id desc";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row2 = $stmt->fetchAll();

        if ($stmt == true) {
            if (count($row2) > 0) {
                foreach ($row2 as $row) {
                    $id = $row["id"];
                    $title = $row["title"];
                    $comment = $row["comment"];
                    if ($row["image_name"] == null || $row["image_name"] == "") {
                        $image_name = "../images/category_images/no-image.webp";
                    } else {
                        $image_name2 = "../images/category_images/" . $row["image_name"];
                        if (file_exists($image_name2) == true) {
                            $image_name = "../images/category_images/" . $row["image_name"];
                        } else {
                            $image_name = "../images/category_images/no-image.webp";
                        }
                    }
                    $favories = $row["favories"];

                    echo "
                                <tr>
                                    <td>" . $x++ . ".</td>
                                    <td>$title</td>
                                    <td><div  class='cneter-element'><img loading='lazy' alt='img' src='$image_name'></div></td>
                                    <td>$comment</td>
                                    <td>$favories</td>
                                    <td class='for-btn'>
                                        <a href='update-category.php?id=$id' class='btn2'>Update</a>
                                        <a href='delete-category.php?id=$id' class='btn3'>Delete</a>
                                    </td>
                                </tr>
                                ";
                }
            }
        }

        ?>


    </table>
</div>
<!----------------------- footer-start -------------------->
<?php include("header-footer/footer.php") ?>