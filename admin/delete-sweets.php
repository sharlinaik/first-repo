<?php
     include('../config/constraints.php');
    //echo "delete page"
    //check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name'])) //either use '&&' or 'AND'
    {
        //delete img
        //echo "get value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the physial img file if avaiiable
        if($image_name != "")
        {
            //remove img
            $path = "../images/sweets/".$image_name;

            //remove image file from folder
            $remove = unlink($path);
            
            //check whether the image is removed or not
            if($remove==FALSE)
            {
                //failed to remove image
                $_SESSION['upload']="<div class='error'>Failed to Remove Image File.</div>";
                //redirect to manage sweets
                header("location:".SITEURL.'admin/manage-sweets.php');

                die(); //to stop the process
            }
        } 

        //delete sweets from database
        $sql = "DELETE FROM tbl_sweets WHERE id=$id";
        
        //execute the querry
        $res = mysqli_query($conn, $sql);

        //check whether the query executed or not and set the session message respectively
        //redirect to manage sweets with session message
        if($res==TRUE)
        {
            //sweets deleted
            $_SESSION['delete'] = "<div class='success'>Sweet Deleted Successfully.</div>";
            header("location:".SITEURL.'admin/manage-sweets.php');

        }
        else
        {
            //faild to delete sweets
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Sweet. </div>";
            header("location:".SITEURL.'admin/manage-sweets.php');

        }

        
    }
    else
    {
        //redirect to manage sweets page
        $_SESSION['unauthorised'] = "<div class='error'>Unauthorised Access</div>";
        header("location:".SITEURL.'admin/manage-sweets.php');
    }

?> 
