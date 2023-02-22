<?php include("header-footer/header.php") ?>
    <!----------------------- header-end -------------------->

    <div class="add-category">
        <h2>Add Category</h2>
        <h2 style="color:red;text-align:center;">
            <?php 
                if (isset($_SESSION["upload_fail_work"])) {
                    echo $_SESSION["upload_fail_work"];
                    unset($_SESSION["upload_fail_work"]);
                }
                if (isset($_SESSION["add-work"])) {
                    echo $_SESSION["add-work"];
                    unset($_SESSION["add-work"]);
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
                <input type="file" name="image" >
            </div>

            <!----------------------------------------------------------->
            
            <div class="input-box">
                <p>Comment:</p>
                <textarea name="text"  cols="30" rows="5" placeholder="Comment About This Work" required></textarea>
            </div>

            <!----------------------------------------------------------->
            
            <div class="input-box">
                <p>active:</p>
                <div class="radio-box">
                    <input type="radio"  class="input" name="active" value="YES"> YES
                    <input checked type="radio" class="input" name="active" value="NO" > NO  
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
            $title = filter_var($_POST["title"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        }
        else {
            $title="IMAGE_UNCKENOW";        
        }
        
        if (isset($_POST["text"]) and $_POST["text"]!="") {
            $text = filter_var($_POST["text"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        }
        else{
            $text="NO COMMENT";
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
                $image_name="image_work_".rand(0,10000).".".$image_name;
                $image="../images/work_images/".$image_name;
                $upload=move_uploaded_file($image_path,$image);
                if ($upload==false) {
                    $_SESSION["upload_fail_work"]="Failed To Upload Image";
                    header("location:". $GLOBALS["url"]."/admin/add-work.php");
                    die();
                }
            }
        }
        else{
            $image_name="";
        }

        $active=$_POST["active"];
        $date=date("Y-m-d");
        // echo $title."<br>";
        // echo $comment."<br>";
        // echo $favories."<br>";
        // echo $image_name."<br>";

        $sql="INSERT INTO tbl_recent_work (title, image_name, `text`, `date`, active) VALUES ( '$title', '$image_name', '$text', '$date','$active');";
        $stmt=$db->prepare($sql);
        $stmt->execute();
        
        if ($stmt==true) {
            $_SESSION["add-work"]="Add Work Succefully" ;
            header("location:". $GLOBALS["url"]."/admin/manage-work.php");
        }
        else{
            if (file_exists($image)) {
                unlink($image);
            }
            $_SESSION["add-work"]="Faile To Add Work";
            header("location:". $GLOBALS["url"]."/admin/add-work.php");

        }
    }

?>