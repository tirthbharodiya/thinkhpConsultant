
<?php
include "../../helper/db.php";
        // for date
      $searchParameter = "";

      if (isset($_POST['submit'])) {

         $searchCompany = $_POST['searchCompany'];
         $searchRating = $_POST['searchRating'];

         //Title Parameter Logic in where clause
         if ($searchCompany != null) {
            $searchParameter = " feedback.componyName like'%" . $searchCompany . "%'";
            // echo $searchParameter;
         }
         if ($searchRating != null) {
            if ($searchParameter == "") {
               $searchParameter = " feedback.rating like '%" . $searchRating . "%'";
               // echo $searchParameter;
            } elseif ($searchCompany == null) {
               $searchParameter = " AND feedback.rating like '%" . $searchRating . "%'";
            }
         }
      }

      if ($searchParameter == "") {
         $searchParameter = "1";
      }


      $baseQuery = "SELECT * FROM `feedback` WHERE ";

      $baseQuery .= $searchParameter;
      // echo $baseQuery;
      // $baseQuery .= "  ORDER BY feedback.feedbackDate DESC";
      

      $result = mysqli_query($conn, $baseQuery);
      $row = mysqli_num_rows($result);

?>


