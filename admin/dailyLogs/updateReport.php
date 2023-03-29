<?php include "../../helper/db.php"; 

session_start();
if( $_SESSION['user_role'] != 'admin'){
header("Location:../../index.php");
}
?>
<?php


 //Getting the report id from the get request from view_dailyLogs.php

if (isset($_GET['postId'])) {
    $reportId = $_GET['postId'];


    $query = "SELECT * FROM `dailyLogs` WHERE report_id = $reportId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        $description = $row['description'];
        $employeeId = $row['emp_id'];


    }
}


//After the form submission

if (isset($_POST['submit'])) {


    $newTitle = $_POST['title']; //Store the form data in variable
    $newDescription = $_POST['description'];
    $passcode = $_POST['passcode'];
    $date = $_POST['date'];

    //Checking Employee id
    $query = "SELECT * FROM `thpEmployee` WHERE emp_id = $employeeId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);


    while ($row = mysqli_fetch_assoc($result)) {
        $empId = $row['emp_id'];
        $pass = $row['passcode'];
    }


    if($passcode == $pass) { //Check Employee passcode
        $updateQuery = "UPDATE dailyLogs SET title = '{$newTitle}', description = '{$newDescription}', modifyDate = '{$date}' WHERE report_id = $reportId";
        $updateResult = mysqli_query($conn , $updateQuery);
        if($updateQuery){

            echo "<script>alert('Record Updated Successfully');location='view_dailyLogs.php';</script>";
            

        }
        else{
            echo mysqli_error($conn);
        }
    }else{
        echo "<script>alert('Invalid Credentials');location='updateReport.php?postId=$reportId';</script>";
    }
}

?>

<?php include "../../header.php"; ?>
<link href="../../css/report.css" rel="stylesheet" />
</head>
<body>
    <section id="bg">
        <div class="container main-content">

            <div class="heading">
                <h1>Daily Logs</h1>
            </div>
            <div class="rehome">
                <p class="backhome-p"><a href="index.php" class="backhome">
                        Home</a>
                </p>
            </div>
            <div class="view-log">
                <a href="view_dailyLogs.php" target="_blank"> <button class="view-log-a">View Logs</button> </a>
            </div>


            <form action="" id="myform" method="post">
                <div class="form">


                    <div>
                        <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" id="date">
                    </div>


                    

                    <input class="report-title" type="text" id="title" value="<?php echo $title; ?>" name="title"
                        placeholder="Enter Your Title" required>

                    <textarea name="description" class="report-detail" id="description" cols="30" rows="10"
                        placeholder="Add Description Here" required><?php echo $description; ?></textarea>

                    <input type="password" class="report-pass" id="passcode" name="passcode"
                        placeholder="Enter Your Passcode" required>


                </div>

                <div class="footer">

                    <button class="report-submit" type="submit" name="submit">Update</button>
                    

                </div>
            </form>
           
        </div>
    </section>
</body>

</html>