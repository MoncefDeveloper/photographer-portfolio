<?php include("header-footer/header.php") ?>
    <!----------------------- header-end -------------------->


    <div class="menu">
        <h1>DASHBOARD</h1>
        <section>
            <a href="manage-category" class="box">
                <h2><span>
                    <?php
                        $i=0;
                        $sql="SELECT * from tbl_category";
                        $stmt=$db->prepare($sql);
                        $stmt->execute();
                        $row2=$stmt->fetchAll();
                        if (count($row2)>0) {
                            foreach ($row2 as $row) {
                                $i++;        
                            }        
                            if (isset($i)) {
                                echo $i;
                            }                    
                        }
                        else {
                            echo "0";
                        }
                        
                    ?>
                </span></h2>
                    <p>Categories</p>
            </a>

            <a href="manage-gallery" class="box">
                <h2><span>
                    <?php
                        $i=0;
                        $sql="SELECT * from tbl_gallery";
                        $stmt=$db->prepare($sql);
                        $stmt->execute();
                        $row2=$stmt->fetchAll();
                        if (count($row2)>0) {
                            foreach ($row2 as $row) {
                                $i++;        
                            }        
                            if (isset($i)) {
                                echo $i;
                            }                    
                        }
                        else {
                            echo "0";
                        }
                        
                    ?>
                </span></h2>
                <p>Photos</p>
            </a>

            <a href="manage-work" class="box">
                <h2><span>
                    <?php
                        $i=0;
                        $sql="SELECT * from tbl_recent_work";
                        $stmt=$db->prepare($sql);
                        $stmt->execute();
                        $row2=$stmt->fetchAll();
                        if (count($row2)>0) {
                            foreach ($row2 as $row) {
                                $i++;        
                            }        
                            if (isset($i)) {
                                echo $i;
                            }                    
                        }
                        else {
                            echo "0";
                        }
                        
                    ?>
                </span></h2>
                <p>Work</p>
            </a>
            
            <a href="manage-contact" class="box">
                <h2><span>
                    <?php
                        $i=0;
                        $sql="SELECT * from tbl_contact";
                        $stmt=$db->prepare($sql);
                        $stmt->execute();
                        $row2=$stmt->fetchAll();
                        if (count($row2)>0) {
                            foreach ($row2 as $row) {
                                $i++;        
                            }        
                            if (isset($i)) {
                                echo $i;
                            }                    
                        }
                        else {
                            echo "0";
                        }
                        
                    ?>
                </span></h2>
                <p>Contact</p>
            </a>
        </section>
    </div>

    <!----------------------- footer-start -------------------->

<?php include("header-footer/footer.php") ?>
