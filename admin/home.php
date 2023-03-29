<?php include "../header.php"; ?>

<link href="../css/styles.css" rel="stylesheet" />
<script src ="../js/scripts.js"></script>
</head>
<?php 
session_start();

if( $_SESSION['user_role'] != 'admin'){
    
    header("Location:../index.php");
    } ?>

<body id="page-top">

<?php
function func1()
{
    session_destroy();
    echo "<script type='text/javascript'>alert('Logged Out');location='../index.php';</script>";
}

if (isset($_POST['submit'])) {
    func1();
}
?>
<!-- Navigation-->
<?php include "../navigation.php" ?>


<!-- Masthead-->
<header class="masthead home">
    <div class="container-fluid row">
        <div class="col-lg-6 para-content">
            <!-- <div class="masthead-subheading">For All IT Solutions</div>
        <div class="masthead-heading text-uppercase">think hp</div>
        <div class="masthead-subheading text-uppercase">Consultant</div> -->

            <!-- <h4 class="masthead-subheading">For All IT Solutions...</h4> -->
            <h1 class="head-heading" style="color:#ffc800;">
                <?php echo "Welcome on Admin Panel"?>
            </h1>
            <h1 class="head-heading" style="color:#ffc800;">Business with us</h1><br>
            <!-- <a class="btn btn-primary button-style btn-xl text-uppercase" href="#services">Tell Me More</a> -->
            <p style="text-align:justify;">ThinkHP consultant is a leading web development company delivering
                the best services to the clients. like web development, web design, web security. Our team works
                closely with our clients to understand their business needs and objectives, and to develop a
                tailored strategy to achieve their goals. </p>

        </div>


    </div>

</header>

    <?php include "../footer.php"; ?>