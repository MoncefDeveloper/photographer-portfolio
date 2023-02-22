<?php include("header-footer/header.php") ?>
    <!----------------------- header-end -------------------->

    <div class="add-category">
        <h2>Add Category</h2>
        <h2 style="color:red;text-align:center;">
            <?php 
                if (isset($_SESSION["upload_fail"])) {
                    echo $_SESSION["upload_fail"];
                    unset($_SESSION["upload_fail"]);
                }
                
                if (isset($_SESSION["add-category"])) {
                    echo $_SESSION["add-category"];
                    unset($_SESSION["add-category"]);
                }
            ?>
        </h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-box">
                <p>Title:</p>
                <input type="text" class="input" name="title" placeholder="Categoey Title" required>
            </div>

            <!----------------------------------------------------------->
            
            <div class="input-box">
                <p>Select Image:</p>
                <input type="file" name="image">
            </div>

            <!----------------------------------------------------------->
            
            <div class="input-box">
                <p>Comment:</p>
                <textarea name="comment"  cols="30" rows="5" placeholder="Comment About This Category"></textarea>
            </div>

            <!----------------------------------------------------------->
            
            <div class="input-box">
                <p>Favories:</p>
                <div class="radio-box">
                    <input type="radio"  class="input" name="favories" value="YES"> YES
                    <input checked type="radio" class="input" name="favories" value="NO" > NO  
                </div>
            </div>

            <!----------------------------------------------------------->
            
            <div class="input-box">
                <input type="submit" class="submit-btn" name="submit" value="Add">                
            </div>
        </form>
    </div>

    <!----------------------- footer-start -------------------->
<?php include("header-footer/footer.php") ?>    
<?php 
    if (isset($_POST["submit"])) {

        // -----------VARIABLES-------------------------
        if (isset($_POST["title"]) and $_POST["title"]!="") {
            $title=$_POST["title"];
        }
        else{
            $title="IMAGE_UNCKENOW";
        }
        
        if (isset($_POST["comment"]) and $_POST["comment"]!="") {
            $comment=$_POST["comment"];
        }
        else{
            $comment="NO COMMENT";
        }       
        
        if (isset($_FILES["image"]["name"])) {
            $image_path=$_FILES["image"]["tmp_name"];
            $image_name=$_FILES["image"]["name"];
            if ($image_name=="" || $image_name==null  ) {
                $image_name="";
            }
            else{
                $image_name=explode(".",$image_name);
                $image_name=end($image_name);
                // echo ($_FILES["image"]["size"])/1024 ."<br>";
                $image_name="image_category_".rand(0,10000).".".$image_name;
                $image="../images/category_images/".$image_name;
                $upload=move_uploaded_file($image_path,$image);
                if ($upload==false) {
                    $_SESSION["upload_fail"]="Failed To Upload Image";
                    header("location:". $GLOBALS["url"]."/admin/add-category.php");
                    die();
                }
            }
        }
        else{
            $image_name="";
        }

        $favories=$_POST["favories"];
        
        // echo $title."<br>";
        // echo $comment."<br>";
        // echo $favories."<br>";
        // echo $image_name."<br>";

        $sql="INSERT INTO tbl_category (title, image_name, comment, favories) VALUES ( '$title', '$image_name', '$comment', '$favories');";
        $stmt=$db->prepare($sql);
        $stmt->execute();
        
        if ($stmt==true) {
            $_SESSION["add-category"]="Add Category Succefully" ;
            header("location:". $GLOBALS["url"]."/admin/manage-category.php");
        }
        else{
            if (file_exists($image)) {
                unlink($image);
            }
            $_SESSION["add-category"]="Faile To Add Category";
            header("location:". $GLOBALS["url"]."/admin/add-category.php");

        }
    }

?>