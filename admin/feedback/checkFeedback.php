<?php include "../../helper/db.php";






if (isset($_GET['feedbackId'])) {
    $feedbackId = $_GET['feedbackId'];
    $checked=$_GET['checkedId'];
    echo $checked;

    $query = "SELECT * FROM feedback WHERE id = $feedbackId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

  
    // fihauifahf 
    $checkQuery = "SELECT * FROM feedback WHERE isChecked = 1 ";
    $checkResult = mysqli_query($conn, $checkQuery);
    $checkRow = mysqli_num_rows($checkResult);


    


    while ($row = mysqli_fetch_assoc($result)) {
        $isChecked = $row['isChecked'];
    }

    $updateQuery = "";
    if ($isChecked == 0 && $checkRow <= 4 ) {
        $updateQuery = "UPDATE feedback SET isChecked = 1 WHERE id = $feedbackId";
        $updateResult = mysqli_query($conn, $updateQuery);
        header("Location:viewFeedback.php");
    } else if($isChecked == 1){
        $updateQuery = "UPDATE feedback SET isChecked = 0 WHERE id = $feedbackId";
        $updateResult = mysqli_query($conn, $updateQuery);
        header("Location:viewFeedback.php");
    }
    else{
        echo "<script type='text/javascript'>alert('You Reached Maximum Limit');location='viewFeedback.php';</script>";
    }
    

}



?>