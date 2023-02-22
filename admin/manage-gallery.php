<?php include("header-footer/header.php") ?>

<!----------------------- header-end -------------------->
<div class="manage manage1-2">
    <h1>Manage Gallery</h1>
    <h1 style="color:red;">All Picture</h1>
    <div class="chose" style="margin:15px 0;">
        <a href="manage-gallery.php">All Picture</a>
        <a href="as-category.php">As Category</a>
    </div>
    <h1 style="color:red;text-align:center;">
        <?php

        if (isset($_SESSION["add-picture"])) {
            echo $_SESSION["add-picture"];
            unset($_SESSION["add-picture"]);
        }

        if (isset($_SESSION["update-picture"])) {
            echo $_SESSION["update-picture"];
            unset($_SESSION["update-picture"]);
        }

        if (isset($_SESSION["fail-delete-picture"])) {
            echo $_SESSION["fail-delete-picture"];
            unset($_SESSION["fail-delete-picture"]);
        }

        if (isset($_SESSION["drop-image"])) {
            echo $_SESSION["drop-image"];
            unset($_SESSION["drop-image"]);
        }

        ?>
    </h1>
    <a class="btn1-2 btn1" href="add-picture.php">
        Add Picture
    </a>
    <table class="content content2">
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Category_id</th>
            <th>Image</th>
            <th>description</th>
            <th>key_word</th>
            <th>Vertica or Horiz </th>
            <th>sex</th>
            <th>year</th>
            <th>Favories</th>
            <th>Active</th>
            <th>price</th>
            <th>Actions</th>
        </tr>

        <?php

        $x = 1;
        $sql = "SELECT * from tbl_gallery order by id desc ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row2 = $stmt->fetchAll();

        if ($stmt == true) {
            if (count($row2) > 0) {
                foreach ($row2 as $row) {
                    $id = $row["id"];
                    $title = $row["title"];
                    $price = $row["price"];
                    $description = $row["description"];
                    $key_word = $row["key_word"];
                    if ($row["image_name"] == null || $row["image_name"] == "") {
                        $image_name = "../images/gallery_images/no-image.webp";
                    } else {
                        $image_name2 = "../images/gallery_images/" . $row["image_name"];
                        if (file_exists($image_name2) == true) {
                            $image_name = "../images/gallery_images/" . $row["image_name"];
                        } else {
                            $image_name = "../images/gallery_images/no-image.webp";
                        }
                    }
                    $sex = $row["sex"];
                    $active = $row["active"];

                    $category_id = $row["category_id"];
                    $sql2 = "SELECT * from tbl_category where tbl_category.id=$category_id ";
                    $stmt2 = $db->prepare($sql2);
                    $stmt2->execute();
                    $row4 = $stmt2->fetchAll();
                    if (count($row4) == 1) {
                        foreach ($row4 as $row3) {
                            $category_name = $row3["title"];
                        }
                    } else {
                        $category_name = "No Category";
                    }

                    $vert = $row["Verticalement_or_Horizontale"];
                    $year = $row["year"];
                    $favories = $row["favories"];

                    echo "
                            <tr>
                                <td>" . $x++ . ".</td>
                                <td>$title</td>
                                <td>$category_name</td>
                                <td><div  class='cneter-element'><img loading='lazy' alt='img' src='$image_name'></div></td>
                                <td>$description</td>
                                <td>$key_word</td>
                                <td>$vert</td>
                                <td>$sex</td>
                                <td>$year</td>
                                <td>$favories</td>
                                <td>$active</td>
                                <td>$price</td>
                                <td class='for-btn for-btn2'>
                                    <a href='update-picture.php?id=$id' class='btn2 no-margin'>Update</a>
                                    <a href='delete-picture.php?id=$id' class='btn3 no-margin  '>Delete</a>
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