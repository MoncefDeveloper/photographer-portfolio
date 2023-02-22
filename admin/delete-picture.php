<?php include("header-footer/PDO.php") ?>
<?php
    
    if (!isset($_SESSION["photo_user"])) {
        $_SESSION["not_login"] = "You Must Login To Access Admin Manage";
        header("location:". $GLOBALS["url"]."/admin/Login.php");
    } else {
        if (isset($_GET["id"])) {
            $id2=$_GET["id"];
            if (is_numeric($id2)) {
                $sql="SELECT * from tbl_gallery where tbl_gallery.id=$id2";
                $stmt=$db->prepare($sql);
                $stmt->execute();
                $row2=$stmt->fetchAll();
                if (count($row2)==1) {
                    foreach ($row2 as $row) {
                        $image_name0=$row["image_name"];
                        $image_name="../images/gallery_images/".$row["image_name"];
                    }
                    $id=$id2;
                    $sql2="DELETE FROM tbl_gallery WHERE tbl_gallery.id = $id";
                    $stmt2=$db->prepare($sql2);
                    $stmt2->execute();
                    if ($stmt2==true) {
                        if ($image_name0==null || $image_name0=="") {
                            
                        }
                        else {
                            if (file_exists($image_name)) {
                                $remove=unlink($image_name);
                                if ($remove==false) {
                                    $_SESSION["drop-image"]="Failed To Delete Image";
                                    die();
                                }
                            }
                        }
    
                        $_SESSION["fail-delete-picture"]="Delete Picture Succefully";
                        header("location:". $GLOBALS["url"]."/admin/manage-gallery.php");
                        
                    }
                    else {
                        $_SESSION["fail-delete-picture"]="failed To Delete Picture ^^DB";
                        header("location:". $GLOBALS["url"]."/admin/manage-gallery.php");
                        
                    }
                }
                else {
                    $_SESSION["fail-delete-picture"]="failed To Delete Picture ^^DB";
                    header("location:". $GLOBALS["url"]."/admin/manage-gallery.php");
                }
            }
            else{
                $_SESSION["fail-delete-picture"]="failed To Delete Picture ^^NU";
                header("location:". $GLOBALS["url"]."/admin/manage-gallery.php");
            }    
        }
        else{
            $_SESSION["fail-delete-picture"]="failed To Delete Picture ^^EX";
            header("location:". $GLOBALS["url"]."/admin/manage-gallery.php");
        }
    }    
?>