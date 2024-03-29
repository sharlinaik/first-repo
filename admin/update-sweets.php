<?php
    include('partials/menu.php');
?>

<?php
            //check whether the id is set or not
            if(isset($_GET['id']))
            {
                //get the id and add other details
                $id = $_GET['id'];
                //create sql query to get the selected sweet
                $sql2 = "SELECT * FROM  tbl_sweets  WHERE id=$id ";

                //execute query
                $res2 = mysqli_query($conn, $sql2);

                //get the value based on query executed
                $row2 = mysqli_fetch_assoc($res2);


                //get the individual values of selected sweet
                $title = $row2['title'];
                $description = $row2['description'];
                $price = $row2['price'];
                $current_image = $row2['image_name'];
                $current_category  = $row2['category_id'];
                $featured  = $row2['featured'];
                $active  = $row2['active'];
                
               
                
                    
            }
            else
            {
                //redirect to manage sweets
                header("location:".SITEURL.'admin/manage-sweets.php');
            }
        
        
        
        ?>


  <div class="main-content">
    <div class="wrapper">
        <h1>Update Sweet</h1>
        <br><br>

        
        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
              <td>Title: </td>
              <td>
                    <input type="text" name="title" value="<?php echo $title; ?>"  >
              </td>
            </tr>

            <tr>
              <td>Description: </td>
                <td>
                    <textarea name="description"  cols="30" rows="5"><?php echo $description; ?> </textarea>
                </td>
            </tr>

            <tr>
              <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>"  >
                </td>
            </tr>

            <tr>
                <td>Current Image: </td>
                <td>
                    <?php  
                        if($current_image == "")
                        {
                            // img not availlable
                            echo "<div class='error'>Image Not Available.</div>";
                        }
                        else
                        {
                            //display img
                            
                            ?>
                            <img src="<?php echo SITEURL; ?>images/sweets/<?php echo $current_image; ?>" width="100px">
                            <?php
                        }
                    ?>
                    
                </td>
            </tr>

            <tr>
                <td> Select New Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>


            <tr>
              <td>Category: </td>
              <td>
                <select name="category" > 
                    <?php  
                            //query to get active categories
                            $sql = "SELECT * FROM tbl_category WHERE active = 'Yes' ";

                            //execute the query
                            $res = mysqli_query($conn, $sql);

                            //count rows
                            $count = mysqli_num_rows($res);


                            //check whether category available or not
                            if($count>0)
                            {
                                //category available
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                    
                                    //echo "<option value='$category_id '>$category_title</option>";
                                    ?>
                                    <option <?php if($current_category==$category_id){ echo "selected";} ?> value="<?php echo $category_id; ?> "><?php echo $category_title; ?></option>
                                    
                                    <?php
                                }
                            }
                            else
                            {
                                //category not available
                                echo "<option value='0'>category Not Available.</option>";
                            }

                            
                        ?>
                    
                   
                    </select>
                </td>
            </tr>


            <tr>
                <td>Featured: </td>
                <td>
                    <input <?php if( $featured=="Yes") {echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes

                    <input <?php if( $featured=="No") {echo "checked";} ?> type="radio" name="featured" value="No"> No
                </td>
            </tr>

          

           <tr>
                <td>Active: </td>
                <td>
                    <input <?php if( $active=="Yes") {echo "checked";} ?>  type="radio" name="active" value="Yes">Yes

                    <input <?php if( $active=="No") {echo "checked";} ?>  type="radio" name="active" value="No">No
                </td>
           </tr>
                        
          <tr>
                <td>
                    <input type="hidden" name="id" value=" <?php echo $id;?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image;?>">

                    <input type="submit" name="submit" value="Update Sweet" class="btn-secondary">
                </td>
          </tr>

        </table>
        </form>
        <?php
            if(isset($_POST['submit']))
            {
                //echo "clicked";
                //1.get all the values from form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];



                //2.upload new image if selected
                //check whether upload button is clicked or not
                if(isset($_FILES['image']['name']))
                {
                    //upload button clicked
                    $image_name = $_FILES['image']['name']; //new image name

                    //check whether the file is availlable or not
                    if($image_name != "")
                    {
                                    //img availlable
                                    //A. upload  the new img
                                    //Autorename our image
                                    //get the extension of our image(jpg,png,gif) e.g. "sweet1.jpg"
                                    $ext = end(explode('.',$image_name));

                                    //Rename the image name
                                    $image_name = "sweet-name-".rand(000,999).'.'.$ext; //new image name wiil be e.g. sweet_Category_843.jpg

                                    //get the source path and destination path
                                    $src_path = $_FILES['image']['tmp_name']; //source path

                                    $dest_path = "../images/sweets/". $image_name; //destination path

                                    //finally upload the img
                                    $upload = move_uploaded_file( $src_path, $dest_path);

                                    //check whether the image is uploaded or not
                                    //if the image is not uploaded then we will stop the process and redirect with error message
                                    if( $upload==FALSE)
                                    {
                                        //failed to upload
                                        $_SESSION['upload']= "<div class='error'>Failed to Upload New Image.</div>";
                                        //redirect to manage sweets page
                                        header("location:".SITEURL.'admin/manage-sweets.php');
                                        //stop the process
                                        die();

                                    }

                                    //B. remove the current img if availlable
                                    if($current_image!= "")
                                    {
                                        $remove_path ="../images/sweets/".$current_image;

                                        $remove = unlink($remove_path);

                                        //check whether img remove or not
                                        //if fail to remove disply msg stop process
                                        if($remove==FALSE)
                                        {
                                            //img not removed
                                            $_SESSION["remove-failed"] = "<div class='error'>Failed To Remove Current Image.</div>";
                                            //redirect to manage sweet
                                            header("location:".SITEURL.'admin/manage-sweets.php');
                                            die(); //stop the process
                                        }

                                    }
                                
                                    
                    }
                    else
                    {
                        $image_name = $current_image;//default image when image is not selected
                    }
                }
                else
                {
                    $image_name = $current_image; //default image when button is not clicked
                }



                    //3.update the db
                    $sql3 = "UPDATE tbl_sweets SET
                            title = '$title',
                            description = '$description',
                            price = $price ,
                            image_name = '$image_name',
                            category_id = '$category' ,
                            featured = '$featured',
                            active = '$active'
                            WHERE id=$id
                    ";
                    //execute the query
                    $res3 = mysqli_query($conn, $sql3);

                    //4.redirect to manage category
                    //check whether query is executed or not
                    if($res3==TRUE)
                    {
                        //query executed and sweet updated
                        $_SESSION['update'] = "<div class='success'>Sweet Updated Successfully.</div>";
                        header("location:".SITEURL.'admin/manage-sweets.php');
                    }
                    else
                    {
                        //failed to update sweet
                        $_SESSION['update'] = "<div class='error'>Failed to Update Sweet.</div>";
                        header("location:".SITEURL.'admin/manage-sweets.php');
                    }


            }
        ?>
    </div>
  </div>
                                

<?php
    include('partials/footer.php');
?>