<?php include "helper/db.php";

// session_start();
// if ($_SESSION['user_role'] != 'admin') {
//    header("Location:index.php");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php";

    ?>
    <link href="css/report.css" rel="stylesheet" />
</head>

<body>
    <section class="openfeedback">

        <h1 class="text-center">REVIEW</h1>
        <?php
        $baseQuery = "SELECT * FROM `feedback`";
        $result = mysqli_query($conn, $baseQuery);
        $row = mysqli_num_rows($result);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $designation = $row['designation'];
            $companyName = $row['componyName'];
            $feedbackTitle = $row['feedbackTitle'];
            $feedback = $row['feedback'];
            $feedbackDate = $row['feedbackDate'];
            $rating = $row['rating'];
            $deleted = $row['isDeleted'];

            if ($deleted == 0) { ?>

                <div class="row all-post">
                    <div style="margin-top:20px;" class="col-lg-11 col-md-12">

                        <div>
                            <p>User:-
                                <?php echo $name ?>
                            </p>
                        </div>
                        <div>
                            <h3>
                                <?php echo $feedbackTitle ?>
                            </h3>
                        </div>
                        <div>
                            <p>
                                <?php echo $feedback ?>
                            </p>
                        </div>
                        <div>
                            <p>companyname :-
                                <?php echo $companyName ?>
                            </p>
                        </div>
                        <div>
                            <p>Rating:-
                                <?php echo $rating ?>
                            </p>
                        </div>
                        <div>

                        </div>

                    </div>
                </div>
            <?php }
        }
        ?>
    </section>

</body>