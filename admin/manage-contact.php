
<?php include("header-footer/header.php") ?>

<!----------------------- header-end -------------------->
    <div class="manage ">
        <h1>Manage Contact</h1>

        <table class="content content2">
            <tr>
                <th>S.N</th>
                <th>name</th>
                <th>Number</th>
                <th>Email</th>
                <th>Adress</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Message</th>
            </tr>
            
            <?php 
                $x=1;
                $sql="SELECT * from tbl_contact order by id ";
                $stmt=$db->prepare($sql);
                $stmt->execute();
                $row2=$stmt->fetchAll();

                if ($stmt==true) {
                    if (count($row2)>0) {
                        foreach ($row2 as $row) {
                            $name=$row["customer_name"];
                            $number=$row["custome_contact"];
                            $email=$row["customer_email"];
                            $adress=$row["customer_adress"];
                            $subject=$row["customer_subject"];
                            $message=$row["customer_message"];

                            $date=$row["date"];
                            
                            echo "
                            <tr>
                                <td>".$x++.".</td>
                                <td>$name</td>
                                <td>$number</td>
                                <td>$email</td>
                                <td>$adress</td>
                                <td>$subject</td>
                                <td>$date</td>
                                <td>$message</td>
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
