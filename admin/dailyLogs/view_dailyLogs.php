<?php include "../../helper/db.php";
session_start();
if ($_SESSION['user_role'] != 'admin') {
   header("Location:../../index.php");
}
?>

<?php include "../../header.php"; ?>
<link href="../../css/styles.css" rel="stylesheet" />
</head>

<body>
   <section id="view-logs">
      <div class="row all-post background ">
         <div style="margin-top:20px;" class="col-lg-11 col-md-12">

            <form action="" method="post">
               <nav class="navOfLogs"><b>Search Data</b></nav>
               <p><b>Topic: </b><input type="search" name="searchTitle" placeholder="Enter Topic... "
                     class="searchTitleCSS"><br></p>
               <p><b>Author: </b><input type="search" name="searchAuthor" placeholder="Enter Author... "
                     class="searchAuthorCSS"><br></p>
               <div class="dateAndBtn">
                  <p><b>Date:</b><input type="date" name="searchDate" class="searchDateCSS"></p>
                  <input type="submit" value="Search" name="submit" class="submitBtn">
               </div>
            </form>
         </div>
      </div>
      <?php
      // for date
      $searchParameter = "";

      if (isset($_POST['submit'])) {

         $searchTitle = $_POST['searchTitle'];
         $searchAuthor = $_POST['searchAuthor'];
         $searchDate = $_POST['searchDate'];

         //Title Parameter Logic in where clause
         if ($searchTitle != null) {
            $searchParameter = " dailyLogs.title like'%" . $searchTitle . "%' or dailyLogs.description like'%" . $searchTitle . "%'";
         }
         //search funtion for author 
         if ($searchAuthor != null) {
            if ($searchParameter == "") {
               $searchParameter = " thpEmployee.first_name like'%" . $searchAuthor . "%' or thpEmployee.last_name like'%" . $searchAuthor . "%' ";
            } else {
               $searchParameter .= " AND dailyLogs.author ='" . $searchAuthor . "'";
            }
         }

         // Date Parameter Logic in where clause
         if ($searchDate != null) {
            if ($searchParameter == "") {
               $searchParameter = " dailyLogs.date like'%" . $searchDate . "%' ";
            } else {
               $searchParameter .= " AND dailyLogs.date ='" . $searchDate . "'";
            }
         }


      }


      if ($searchParameter == "") {
         $searchParameter = "1";
      }

      $baseQuery = "SELECT * FROM `thpEmployee` JOIN `dailyLogs` ON thpEmployee.emp_id = dailyLogs.Emp_id  WHERE ";

      $baseQuery .= $searchParameter;

      $baseQuery .= "  ORDER BY dailyLogs.date DESC";


      $result = mysqli_query($conn, $baseQuery);
      $row = mysqli_num_rows($result);

      if ($row == null) {
         echo "<h1>Data not found</h1>";
      }


      while ($row = mysqli_fetch_assoc($result)) {
         $empId = $row['emp_id'];
         $reportId = $row['report_id'];
         $authorFname = $row['first_name'];
         $authorLname = $row['last_name'];
         $reportTitle = $row['title'];
         $reportDescription = $row['description'];
         $reportDate = $row['date'];
         $modifyDate = $row['modifyDate'];
         $deleted = $row['isDeleted'];

         if ($deleted == 0) {
            ?>




            <div class="row all-post    ">
               <div style="margin-top:20px;" class="col-lg-11 col-md-12">
                  <div class="update-div">
                     <a href="updateReport.php?postId=<?php echo $reportId ?>"><button class="update-report"
                           name="update">Edit
                           Post</button></a>
                     <a href="deleteReport.php?deletePostId=<?php echo $reportId ?>"><button class="delete-report"
                           name="delete">Delete Post</button></a>
                  </div>
                  <div>
                     <p>Date:-
                        <?php echo $reportDate ?>
                     </p>
                     <p>Last Modified On:-
                        <?php if ($modifyDate != '0000-00-00') {
                           echo $modifyDate;
                        } else {
                           echo "Not Modified";
                        } ?>
                     </p>
                     <br>
                     <p>Author:-
                        <?php echo $authorFname, " ", $authorLname ?>
                     </p>
                     <br>
                  </div>
                  <div>
                     <h1>
                        <?php echo $reportTitle ?>
                     </h1>
                  </div><br>
                  <div>
                     <p>
                        <?php echo $reportDescription ?>
                     </p>
                  </div>

               </div>
            </div>
         <?php }
      } ?>
   </section>
</body>
</body>

</html>