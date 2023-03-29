<?php include "../../helper/db.php"; ?>

<?php
session_start();
if( $_SESSION['user_role'] != 'admin'){
header("Location:view_users.php");
}

//Getting the user id from the get request from view_users.php

if (isset($_GET['updateUserId'])) {
    $user_id = $_GET['updateUserId'];


    $query = "SELECT * FROM `user` WHERE user_Id = $user_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_num_rows($result);

    while ($row = mysqli_fetch_assoc($result)) {
        $urid = $row['user_Id'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $role = $row['role'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $password = $row['password'];
    }
}

//After the form Updated

if (isset($_POST['submit'])) {

    //Capture data from controls

    $newUserId = $_POST['newUserId'];
    $updateFirstName = $_POST['firstName'];
    $updateLastName = $_POST['lastName'];
    $updateRole = $_POST['role'];
    $updateEmail = $_POST['email'];
    $updateMobile = $_POST['mobile'];
    $updatePassword = $_POST['password'];
    
    $updateQuery = "UPDATE user SET first_name = '{$updateFirstName}', last_name = '{$updateLastName}', role = '{$updateRole}', email = '{$updateEmail}', mobile = '{$updateMobile}', password = '{$updatePassword}' WHERE user_Id = $newUserId";
    $updateResult = mysqli_query($conn, $updateQuery);

    echo "<script>alert('User Updated');location='view_users.php';</script>";
}
?>

<?php include "../../header.php"; ?>

<link href="../../css/styles.css" rel="stylesheet" />
</head>

<body>

    <section class="register-login">

        <div class="container-fluid">

            <h1 class="header-h1">Update User</h1>
            
            <div class="align">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">

                            <div class="form-group" hidden='true'>
                                <label for="userId">User ID:</label>
                                <input type="text" value="<?php echo $urid; ?>" class="form-control" name="newUserId">
                            </div>

                            <div class="form-group">
                                <label for="firstname">First Name:</label>
                                <input type="text" value="<?php echo $fname; ?>" class="form-control" name="firstName" placeholder="Update Your First name" required>
                            </div>

                            <div class="form-group">
                                <label for="lastName">Last Name:</label>
                                <input type="text" class="form-control" name="lastName" value="<?php echo $lname; ?>" placeholder="Update Your Last name" required>
                            </div>

                            <div class="form-group drop">
                                <label for="userName">Update your role:-</label>
                                <br>
                                <select class="form-group" name="role" id="select" required>
                                    <option value="" hidden>
                                        <?php echo $role; ?>
                                    </option>
                                    <option value="Employee">Employee</option>
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email">Update Your Email:</label>
                                <input type="email" id="user" value="<?php echo $email; ?>" class="form-control" name="email" placeholder="Update Your Email" required>
                            </div>

                            <div class="form-group">
                                <label for="mobile">Update Your Mobile Number:</label>
                                <input type="number" class="form-control" value="<?php echo $mobile; ?>" name="mobile"
                                    placeholder="Update Your Mobile Number" min="10" required>
                            </div>

                            <div class="form-group">
                                <label for="username">Update Your Password:</label>
                                <input type="password" id="pass" class="form-control" value="<?php echo $password; ?>"
                                    name="password" placeholder="Update Your Password" required>
                                <input type="checkbox" onclick="myFunction()"> Show Password

                                <script>
                                    function myFunction() {
                                        var x = document.getElementById('pass');
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                </script>
                            </div>

                            <div class="form-group">
                                <button class="report-submit" type="submit" name="submit">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include "../../footer.php"; ?>