<?php include "../header.php"; ?>>
<?php include "../helper/db.php"; ?>

<?php


if (isset($_POST['username']) and isset($_POST['password'])) { //isset function checks if the variable is set or not.

    $username = $_POST['username']; //login.php form Post request  
    $password = $_POST['password'];

    if ($username == null || $password == null) {
        $message = "Missing Credentials!";
        echo "<script type='text/javascript'>alert('$message');location='../index.php';</script>";
        echo "Empty Login Credentials<p></p>";
        echo ("Missing Username or Password!");
    }





    $query = "SELECT * FROM user WHERE email = '$username' and PASSWORD = '$password'";

    $result = mysqli_query($conn, $query);

    $row = mysqli_num_rows($result);
    if ($row) { //number of rows available in databse as per the query
        session_start(); //Starting a session
        while ($row = mysqli_fetch_assoc($result)) { //while row is not equal to null loop this


            $_SESSION['user_role'] = $row['role'];
            $_SESSION['user_id'] = $row['user_Id'];

        }

        if ($_SESSION['user_role'] == 'admin') {
            header("Location:../admin/home.php");
        } else {
            header("Location:../user/home.php");
        }


    } else {
        echo "<script type='text/javascript'>alert('User not found with this uname and pass');location='../index.php';</script>";
    }
}
?>
<script type="text/javascript">
    alert("LoginUser");
</script>
<?php include "../footer.php"; ?>