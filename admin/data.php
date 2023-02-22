<?php include("header-footer/header.php") ?>
<div style="font-family:cursive;">
    <?php 
            $object='{"name":"moncef","lastname":"Lak","age":36,"active":true,"colors":["red","blue","green"]}';
            $phpdecode= json_decode($object);
            echo "<pre>";
            print_r($phpdecode);
            echo "</pre>";
            // $php2=json_encode($phpdecode);
            // echo "<pre>";
            // print_r($php2);
            // echo "</pre>";
            echo $phpdecode->colors[0];
            $sql="SELECT * from tbl_category order by id";
            $stmt=$db->prepare($sql);
            $stmt->execute();
            $row2=$stmt->fetchAll();
            if (count($row2)>0) {
                foreach ($row2 as $row) {
                    $id=$row["id"];
                    $title=$row["title"];
                    $fav=$row["favories"];
                    $img_name=$row["image_name"];
                    $myObjct='{"id":"'.$id.'","title":"'.$title.'","favories":"'.$fav.'","img_url":"images/category_images/'.$img_name.'"}';
                    $json_object=json_decode($myObjct);
                    echo "<pre>";
                    print_r($json_object);
                    echo "</pre>";
                    
                }
            }
            $js_file=json_encode($json_object);
            echo $js_file;

    ?>
</div>
<script>
    const json=<?= $js_file?>;
    console.log(json);
</script>
<?php include("header-footer/footer.php") ?>
