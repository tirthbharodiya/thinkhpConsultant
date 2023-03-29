<?php include "../../helper/db.php";

// session_start();
// if ($_SESSION['user_role'] != 'admin') {
//    header("Location:index.php");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include "../../header.php";

   ?>
   <link href="../../css/report.css" rel="stylesheet" />
</head>

<body>

   <section id="view-logs">
      <div class="row all-post">
         <div style="margin-top:20px;" class="col-lg-11 col-md-12">

            <form action="" method="post">
               <p> <b>Company Name:</b><input type="search" name="searchCompany" class="searchCompany"><br></p>
               <select name="searchRating" class="ratingScore">
                  <option>Rating</option>
                  <option value="0">0</option>
                  <option value="0.5">0.5</option>
                  <option value="1">1</option>
                  <option value="1.5">1.5</option>
                  <option value="2">2</option>
                  <option value="2.5">2.5</option>
                  <option value="3">3</option>
                  <option value="3.5">3.5</option>
                  <option value="4">4</option>
                  <option value="4.5">4.5</option>
                  <option value="5">5</option>
               </select>
               <div class="dateAndBtn">

                  <input class="submitBtnOfSearch" value="Search" type="submit" name="submit">
               </div>

            </form>


         </div>
      </div>


      <?php
      include "../feedback/searchFeedback.php";

      // condition for feedback



      



      // echo '<script type="text/javascript">alert("hello world");</script>';
      

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
         $checked = $row['isChecked'];

         if ($deleted == 0) {
            ?>



            <div class="row all-post">

               <?php if($checked == 1) {?>

               <a href="checkFeedback.php?feedbackId=<?php echo $id; ?>"><button class="delete-report" id="checked"
                     name="checked">Remove</button></a>
                 
                     <?php }else{ ?>

                     <a href="checkFeedback.php?feedbackId=<?php echo $id; ?>"><button class="delete-report" id="checked"
                     name="checked">Show on Home</button></a>

                     <?php } ?>

               <div style="margin-top:20px;" class="col-lg-11 col-md-12">
                  <div class="update-div">
                     <a href="deleteFeedback.php?deletePostId=<?php echo $id; ?>"><button class="delete-report"
                           name="delete">Delete Post</button></a>
                  </div>
                  <div>
                     <p>Date:-
                        <?php echo $feedbackDate ?>
                     </p>

                     <br>
                     <p>User:-
                        <?php echo $name ?>
                     </p>

                  </div>
                  <div>
                     <h1>
                        <?php echo $feedbackTitle ?>
                     </h1>
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
      } ?>
   </section>
</body>
</body>

</html>