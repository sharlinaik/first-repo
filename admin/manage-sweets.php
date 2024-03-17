<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
       <h1>Manage Sweets</h1>

       <br /> <br />

               <!-- button to add admin-->
               <a href ="<?php echo SITEURL; ?>admin/add-sweets.php" class="btn-primary">Add Sweets</a>

               <br /> <br /> <br />

               <?php
                    if(isset($_SESSION['add']))
                    {
                      echo $_SESSION['add'];
                      unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                      echo $_SESSION['delete'];
                      unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                      echo $_SESSION['upload'];
                      unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unauthorised']))
                    {
                      echo $_SESSION['unauthorised'];
                      unset($_SESSION['unauthorised']);
                    }

                    if(isset($_SESSION['update']))
                    {
                      echo $_SESSION['update'];
                      unset($_SESSION['update']);
                    }



               
               
               ?>

               <table class="tbl-full">
                    <tr>
                        <th>Sr.No.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th> 
                        <th>Actions</th> 
                    </tr>

                    <?php
                        //create sql query to get all the sweets
                        $sql = "SELECT * FROM tbl_sweets";

                        //execute the query
                        $res = mysqli_query($conn, $sql);

                        //count rows to check whether we have sweets or not
                        $count = mysqli_num_rows($res);

                        //create serial number variable and set default value as 1
                        $sn=1;

                        if($count>0)
                        {
                            //we have sweets in database
                            //get the sweets from database and display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //get the values from individual columns
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured= $row['featured'];
                                $active = $row['active'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td>Rs.<?php echo $price; ?></td>
                                    <td>
                                        <?php 
                                            //check whether we have image or not
                                            if($image_name=="")
                                            {
                                                //we do not have image, display error message
                                                echo "<div class='error'>Image not Added.</div>";
                                            }
                                            else
                                            {
                                                //we have image, display image
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/sweets/<?php echo $image_name; ?>" width="100px" >
                                                <?php
                                            }
                                         ?>

                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-sweets.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Sweet</a>                           
                                        <a href="<?php echo SITEURL;?>admin/delete-sweets.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger" class="btn-danger"> Delete Sweet</a>     
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //sweets not added in database
                            echo "<tr><td colspan='7' class='error'> Sweets not Added Yet. </tr>";
                        }
                    ?>

                    

                    
               </table>

    </div>
    
</div>

<?php include('partials/footer.php');?>