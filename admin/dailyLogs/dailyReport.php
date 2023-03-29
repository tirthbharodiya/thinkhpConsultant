<?php include "../../helper/db.php"; 
 include "../../header.php"; 

 session_start();

 if( $_SESSION['user_role'] != 'admin'){
     
     header("Location:../../index.php");
     } 

?>


<?php
if (isset($_POST['submit'])) {
    session_start();

    $date = $_POST['date'];
    $code = $_POST['passcode'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $technicalExperience = isset($_POST['technicalExperience']);
    $personalExperience = isset($_POST['personalExperience']);
    $success = '';


    $query = "SELECT * FROM `thpEmployee` WHERE passcode = $code";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

    if ($row != null) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['id'] = $row['emp_id'];
            $id = $row['emp_id'];
        }

        if ($_SESSION['id'] == $id) {
            $query = "INSERT INTO `dailyLogs` (`title`, `description`, `technicalExperience`,`personalExperience`, `date`,`emp_id`) VALUES ('$title', '$description','$technicalExperience','$personalExperience','$date','$id')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<script>alert('Report Inserted Successfully');</script>";
                $success = 'success';
            }
        } else {
            echo "User Not Exixt with this id";
            $success = '';
        }

    } else {
        echo "<script>alert('Invalid Credentials');</script>";
    }
}
?>

<?php include "../../header.php"; ?>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../css/report.css" rel="stylesheet" />
</head>

<body>
    <section id="bg">
        <div class="container main-content">

            <!-- PAGE TITLE -->

            <div class="heading">
                <h1>Daily Logs</h1>
            </div>

            <!-- Home Button -->

            <div class="rehome">
                <p class="backhome-p"><a href="index.php" class="backhome">
                        Home</a>
                </p>
            </div>

            <!-- View Log Button -->

            <div class="view-log">
                <a href="view_dailyLogs.php" target="_blank"> <button class="view-log-a">View Logs</button> </a>
            </div>


            <form action="" id="myform" method="post">
                <div class="form">

                    <!-- CheckBox -->

                    <input type="checkbox" name="technicalExperience" class="technicalDetails" value="">
                    <label for="technicalExperience" class="technicalDetails-label"> Technical Experience</label>

                    <input type="checkbox" name="personalExperience" class="personalDetails" value="">
                    <label for="personalExperience" class="personalDetails-label"> Personal Experience</label>

                    <!-- Title and Date -->

                    <div class="report">
                        <input class="report-title" type="text" id="title" value="<?php if (isset($title) && $success == '') {echo $title;} ?>" name="title" placeholder="Enter Your Title" required>

                        <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" id="date">
                    </div>

                    <!-- Discription -->

                    <textarea name="description" class="report-detail" id="description" cols="30" rows="10" placeholder="Add Description Here" required><?php if (isset($description) && $success == '') {echo $description;} ?></textarea>

                    <!-- Passcode -->

                    <input type="password" class="report-pass" id="passcode" name="passcode"
                        placeholder="Enter Your Passcode" required>
                </div>

                <!-- SUBMIT -->

                <div class="footer">
                    <button class="report-submit" type="submit" name="submit">Submit</button>
                </div>

            </form>
        </div>
    </section>
</body>

</html>