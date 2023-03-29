<?php
include "../../helper/db.php";

if(isset($_GET['deleteUserId'])){
    $userId = $_GET['deleteUserId'];

   $query = "SELECT * FROM user WHERE user_Id = $userId";
   $result = mysqli_query($conn , $query); 
   $row = mysqli_num_rows($result);
   while($row = mysqli_fetch_assoc($result)){
    $delete = $row['isDeleted'];
   }

    if($delete == 0){ 
    $updateQuery = "UPDATE user SET isDeleted = 1 WHERE user_Id = $userId";
    $updateResult = mysqli_query($conn , $updateQuery);
    if($updateResult){
        echo "<script>alert('Data deleted Successfully');location='view_users.php';</script>";
    }else{
       echo "Failed", mysqli_error($conn);
    }
   }
   
}
?>
 


