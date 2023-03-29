<?php include "../header.php"; ?>

<link href="../css/styles.css" rel="stylesheet" />
</head>


<body>
    
<section class="register-login">
        

            <div class="container-fluid">
                <h1 class="header-h1">Signup</h1>
                <div class="align">
                    <div class="card">
                        <div class="card-body">
                            <form action="adduser.php" method="post">
                                

                                <div class="form-group">
                                    <label for="name">Enter Your First Name:</label>
                                    <input type="text" class="form-control" name="fname" placeholder="Enter Your First name"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Enter Your Last Name:</label>
                                    <input type="text" class="form-control" name="lname" placeholder="Enter Your Last name"
                                        required>
                                </div>

                                <div class="form-group drop">
                                    <label for="username">Select your role:-</label>
                                    <br>
                                    <select class="form-group" name="role" id="select" required>
                                        <option value="" hidden>Select Your Role:</option>
                                        <option value="employee">Employee</option>
                                        <option value="mentor">Mentor</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">Enter Your Email:</label>
                                    <input type="email" id="user" class="form-control" name="email"
                                        placeholder="Enter Your Email" required>
                                </div>

                                <div class="form-group">
                                    <label for="alternate_email">Enter Your Alternate Email:</label>
                                    <input type="email" id="user" class="form-control" name="alternate_email"
                                        placeholder="Enter Your Alternate Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Enter Your Mobile Number:</label>
                                    <input type="number" class="form-control" name="mobile" placeholder="Enter Your Mobile Number"
                                      min="10" required>
                                </div>

                                <div class="form-group">
                                    <label for="username">Enter Your Password:</label>
                                    <input type="password" id="pass" class="form-control" name="password"
                                        placeholder="Enter Your Password" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" onclick=verify() class="btn btn-primary btn-lg btn-block">Sign
                                        Up</button>
                                </div>
                                <div class="form-group">
                                    <p class="text-center text-muted mt-4 mb-4">Already have an account? <a
                                            href="../index.php" class=""><u>Login here</u></a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
       
</section>

   

    <?php include "../footer.php"; ?>