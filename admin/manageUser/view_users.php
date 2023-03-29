<?php include "../../helper/db.php";

session_start();
if ($_SESSION['user_role'] != 'admin') {
    header("Location:../../index.php");
}

?>

<?php include "../../header.php" ?>

<link href="../../css/styles.css" rel="stylesheet" />
</head>

<body>
    <section id="view-logs">
        <div class="row all-post">
            <div style="margin-top:20px;" class="col-lg-11 col-md-12">

                <form action="" method="post">
                    <label for="first_name"><b>First Name:</b></label>
                    <p><input type="text" name="first_name" class="searchfnameCSS" placeholder="First Name"></p>

                    <label for="last_name"><b>Last Name:</b></label>
                    <p><input type="text" name="last_name" class="searchlnameCSS" placeholder="Last Name"></p>

                    <label for="email"><b>Email:</b></label>
                    <p><input type="search" name="email" class="searchEmail" placeholder="abc@mail.com"></p>

                    <input type="submit" value="Search" name="submit" class="submitBtn">
                </form>
            </div>
        </div>

        <?php

        // SEARCH PARAMETER
        
        include "searchUser.php";


        while ($row = mysqli_fetch_assoc($result)) {

            $userId = $row['user_Id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $role = $row['role'];
            $email = $row['email'];
            $contact = $row['mobile'];
            $password = $row['password'];
            $isDeleted = $row['isDeleted'];

            if ($isDeleted == 0) {
                ?>

                <div class="row all-post">
                    <div style="margin-top:20px;" class="col-lg-11 col-md-12">
                        <div class="update-div">
                            <a href="updateUser.php?updateUserId=<?php echo $userId ?>"><button class="update-report"
                                    name="submit">Edit User</button></a>
                            <a href="deleteUser.php?deleteUserId=<?php echo $userId ?>"><button class="delete-report"
                                    name="deleteUser">Delete User</button></a>
                        </div>

                        <p>Username:-
                            <?php echo $first_name, " ", $last_name ?>
                        </p>
                    </div>
                    <div>
                        <p>Role:-
                            <?php echo $role ?>
                        </p>
                    </div>
                    <br>
                    <div>
                        <p>Email:-
                            <?php echo $email ?>
                        </p>
                    </div>
                    <br>
                    <div>
                        <p>Mobile:-
                            <?php echo $contact ?>
                        </p>
                    </div>
                    <br>
                    <div>
                        <p>Password:-
                            <?php echo $password ?>
                        </p>
                    </div>
                    <br>

                </div>
                </div>
            <?php }
        }
        mysqli_close($conn); ?>
    </section>
</body>

</html>