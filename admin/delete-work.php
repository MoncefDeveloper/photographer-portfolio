<?php include("header-footer/PDO.php") ?>
<?php
    
    if (!isset($_SESSION["photo_user"])) {
        $_SESSION["not_login"] = "You Must Login To Access Admin Manage";
        header("location:". $GLOBALS["url"]."/admin/Login.php");
    } else {
        if (isset($_GET["id"])) {
            $id2=$_GET["id"];
            if (is_numeric($id2)) {
                $sql="SELECT * from tbl_recent_work where tbl_recent_work.id=$id2";
                $stmt=$db->prepare($sql);
                $stmt->execute();
                $row2=$stmt->fetchAll();
                if (count($row2)==1) {
                    foreach ($row2 as $row) {
                        $image_name0=$row["image_name"];
                        $image_name="../images/work_images/".$row["image_name"];
                    }
                    $id=$id2;
                    $sql2="DELETE FROM tbl_recent_work WHERE tbl_recent_work.id = $id";
                    $stmt2=$db->prepare($sql2);
                    $stmt2->execute();
                    if ($stmt2==true) {
                        if ($image_name0==null || $image_name0=="") {
                            
                        }
                        else {
                            if (file_exists($image_name)) {
                                $remove=unlink($image_name);
                                if ($remove==false) {
                                    $_SESSION["drop-image-work"]="Failed To Delete Image";
                                    die();
                                }
                            }
                        }
    
                        $_SESSION["fail-delete-work"]="Delete Work Succefully";
                        header("location:". $GLOBALS["url"]."/admin/manage-work.php");
                        
                    }
                    else {
                        $_SESSION["fail-delete-work"]="failed To Delete Work ^^DB";
                        header("location:". $GLOBALS["url"]."/admin/manage-work.php");
                        
                    }
                }
                else {
                    $_SESSION["fail-delete-work"]="failed To Delete Work ^^DB";
                    header("location:". $GLOBALS["url"]."/admin/manage-work.php");
                }
            }
            else{
                $_SESSION["fail-delete-work"]="failed To Delete Work ^^NU";
                header("location:". $GLOBALS["url"]."/admin/manage-work.php");
            }    
        }
        else{
            $_SESSION["fail-delete-work"]="failed To Delete Work ^^EX";
            header("location:". $GLOBALS["url"]."/admin/manage-work.php");
        }    
    }
?>