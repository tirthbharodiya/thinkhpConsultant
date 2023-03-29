<?php include "header.php" ?>

<body id="navBody">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" onload="myfunc();" id="mainNav">
        <div style="height:120px" class="container-fluid">
            <a class="navbar-brand" href="#page-top"><img src="../assets/img/logo/Final HP-01.png" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse dropdmenu" id="navbarResponsive">
                <ul class="navbar-nav  ms-auto py-4 py-lg-0">
                    <li class="nav-item" id="serviceLink"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item" id="aboutLink"><a class="nav-link" href="#about">About us</a></li>
                    <li class="nav-item" id="teamLink"><a class="nav-link" href="#team">Team</a></li>
                    <li class="nav-item" id="feedbackLink"><a class="nav-link" href="#feedback">Feedback</a></li>
                    <li class="nav-item" id="viewFeedbackLink"><a class="nav-link" target="_blank" href="feedback/viewFeedback.php">View Feedback</a></li>
                    <li class="nav-item" id="manageUserLink"><a class="nav-link" target="_blank" href="manageUser/view_users.php">Manage User</a></li>
                    <li class="nav-item" id="dailyLink"><a class="nav-link" href="dailyLogs/dailyReport.php" target="_blank">Dailylog</a></li>

                    


                    <form action="" method="post">
                        <button type="submit" name="submit" id="logout" class="btn btn-primary logoutbtn btn-lg">Logout</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>

<?php
if(isset($_SESSION['user_role'])){
$name = $_SESSION['user_role']; 
}
?>

<script>

$service = document.getElementById("serviceLink");
$about = document.getElementById("aboutLink");
$team = document.getElementById("teamLink");
$feedback = document.getElementById("feedbackLink");
$viewFeedback = document.getElementById("viewFeedbackLink");
$manageUser = document.getElementById("manageUserLink");
$daily = document.getElementById("dailyLink");

    //Checking User Role 
    const userRole = "<?php echo $name; ?>";
    switch(userRole) {
        
    case 'admin':
    admin();
    break;

    case 'user':
    user();
    break;

    case 'employee':
    employee();
    break;
    
    default:
    }

    function admin(){

    $service.remove();
    $about.remove(); 
    $team.remove();
    $feedback.remove();   
    }

    function user(){
    $viewFeedback.remove(); 
    $manageUser.remove(); 
    $daily.remove();
    }

    function employee(){
    $team.remove(); 
    $viewFeedback.remove(); 
    $manageUser.remove(); 
    $daily.remove();
    }

</script>