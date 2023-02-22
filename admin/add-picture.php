<?php include("header-footer/header.php") ?>
    <!----------------------- header-end -------------------->
    <div class="add-category">
        <h2>Add Category</h2>
        <h2 style="color:red;text-align:center;">
            <?php 
                if (isset($_SESSION["upload_fail2"])) {
                    echo $_SESSION["upload_fail2"];
                    unset($_SESSION["upload_fail2"]);
                }
                if (isset($_SESSION["add-picture"])) {
                    echo $_SESSION["add-picture"];
                    unset($_SESSION["add-picture"]);
                }
            ?>
        </h2>
        <form action="" method="POST" enctype="multipart/form-data">

                <div class="input-box">
                    <p>Title:</p>
                    <input type="text" class="input" name="title" placeholder="Picture Title" required>
                </div>

             <!----------------------------------------------------------->

             <div class="input-box">
                <p>Category:</p>
                <select name="category_id" value="category_id">
                    <?php
                        $sql="SELECT * from tbl_category order by title";
                        $stmt=$db->prepare($sql);
                        $stmt->execute();
                        $row2=$stmt->fetchALL();
                        if (count($row2)>0) {
                            foreach ($row2 as $row) {
                                $id=$row["id"];
                                $title2=$row["title"];
                                echo "
                                    <option value='$id'>$title2</option>            
                                ";
                            }
                        }
                        else {
                            echo "
                                <option value=''>Other</option>
                            ";            
                        }
                    ?>
                </select>
                
            </div>

            <!----------------------------------------------------------->
            
            <div class="input-box">
                <p>Select Image:</p>
                <input type="file" name="image">
            </div>
    
            <!----------------------------------------------------------->
    
            <div class="input-box">
                <p>Description:</p>
                <textarea name="description"  cols="30" rows="5" placeholder="description About This Picure"></textarea>
            </div>
    
            <!----------------------------------------------------------->

            <div class="input-box">
                <p>Key Words:</p>
                <textarea name="key_word"  cols="30" rows="3" placeholder="Betw Word & Word Make A '/' Without Space " required></textarea>
            </div>
    
            <!----------------------------------------------------------->
    
            <div class="input-box">
                <p>sex:</p>
                <div class="radio-box">
                    <input type="radio"  class="input" name="sex" value="MEN"> MEN
                    <input type="radio" class="input" name="sex" value="WOMEN" > WOMEN  
                    <input checked type="radio" class="input" name="sex" value="BOTH" > BOTH  
                </div>
            </div>
            <!----------------------------------------------------------->
    
            <div class="input-box">
                <p>Vertica or Horiz:</p>
                <div class="radio-box">
                    <input type="radio"  class="input" name="vertica_or_horiz" value="Verticalement">Vertical
                    <input checked type="radio" class="input" name="vertica_or_horiz" value="Horizontale" >Horizon
                </div>
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
                <p>Active:</p>
                <div class="radio-box">
                    <input type="radio"  class="input" name="active" value="YES"> YES
                    <input checked type="radio" class="input" name="active" value="NO" > NO  
                </div>
            </div>

            <!----------------------------------------------------------->

            <div class="input-box">
                <p>Year:</p>
                <select name="year" value="year">
                    <?php
                        for ($i=2010; $i <=date("Y") ; $i++) { 
                            echo "
                                <option value='$i'>$i</option>            
                            ";
                        }
                    ?>
                </select>
                
            </div>
            
            <!----------------------------------------------------------->

            <div class="input-box">
                <p>Price:</p>
                <input type="number" class="input" name="price" placeholder="Picture Title" required>
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
            $title="IMAGE_UNCKENOWN";
        }

        if (isset($_POST["price"]) and $_POST["price"]!="") {
            $price=$_POST["price"];
        }
        else{
            $price=0;
        }
        
        if (isset($_POST["description"]) and $_POST["description"]!="") {
            $description=$_POST["description"];
        }
        else{
            $description="NO COMMENT";
        }       
        
        if (isset($_POST["key_word"]) and $_POST["key_word"]!="") {
            $key_word=$_POST["key_word"];
        }
        else{
            $key_word="Without Key Word ";
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
                $image_name="image_gallery_".rand(0,10000).".".$image_name;
                $image="../images/gallery_images/".$image_name;
                $upload=move_uploaded_file($image_path,$image);
                if ($upload==false) {
                    $_SESSION["upload_fail2"]="Failed To Upload Image";
                    header("location:". $GLOBALS["url"]."/admin/add-picture.php");
                    die();
                }
            }
        }
        else{
            $image_name="";
        }

        $sex=$_POST["sex"];
        $category_id=$_POST["category_id"];
        $vertica_or_horiz=$_POST["vertica_or_horiz"];
        $favories=$_POST["favories"];
        $active=$_POST["active"];
        $year=$_POST["year"];

        // echo $title."<br>";
        // echo $category_id."<br>";
        // echo $price."<br>";
        // echo $description."<br>";
        // echo $key_word."<br>";
        // echo $vertica_or_horiz."<br>";
        // echo $sex."<br>";
        // echo $image_name."<br>";
        // echo $favories."<br>";
        // echo $year."<br>";



        $sql2="INSERT INTO `tbl_gallery` 
        (`id`, `title`, `image_name`, `category_id`, `price`, `description`, `key_word`, `Verticalement_or_Horizontale`, `sex`, `year`, `favories`, `active`) VALUES 
        (NULL, '$title', '$image_name', '$category_id', '$price', '$description', '$key_word', '$vertica_or_horiz', '$sex', '$year', '$favories', '$active');";
        $stmt2=$db->prepare($sql2);
        $stmt2->execute();
        
        if ($stmt2==true) {
            $_SESSION["add-picture"]="Add Picture Succefully" ;
            echo "
                    <script> 
                        window.location='". $GLOBALS["url"]."/admin/manage-gallery.php';
                    </script>
                ";
        }
        else{
            if (file_exists($image)) {
                unlink($image);
            }
            $_SESSION["add-picture"]="Faile To Add Picture";
            echo "
            <script> 
                window.location='". $GLOBALS["url"]."/admin/add-picture.php';
            </script>
        ";
        }
    }

?>