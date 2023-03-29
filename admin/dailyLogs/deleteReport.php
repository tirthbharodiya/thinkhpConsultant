<?php
include "../../helper/db.php";

if(isset($_GET['deletePostId'])){
    $postId = $_GET['deletePostId'];

    echo $postId;
   $query = "SELECT * FROM dailyLogs WHERE report_id = $postId";
   $result = mysqli_query($conn , $query); 
   $row = mysqli_num_rows($result);
   while($row = mysqli_fetch_assoc($result)){
    $delete = $row['isDeleted'];
   }

    if($delete == 0){ 
    $updateQuery = "UPDATE dailyLogs SET isDeleted = 1 WHERE report_id = $postId";
    $updateResult = mysqli_query($conn , $updateQuery);
    if($updateResult){
        echo "<script>alert('Data deleted Successfully');location='view_dailyLogs.php';</script>";
    }else{
       echo "Failed", mysqli_error($conn);
    }
   }
   
}
?>
 


