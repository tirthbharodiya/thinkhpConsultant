<?php include "../../helper/db.php"; ?>

<?php

$searchParameter = "";

        if (isset($_POST['submit'])) {

            $searchfname = $_POST['first_name'];
            $searchlname = $_POST['last_name'];
            $searchemail = $_POST['email'];

            //Title Parameter Logic in where clause
            if ($searchfname != null) {
                $searchParameter = " user.first_name like'%" . $searchfname . "%' ";
            }

            // Date Parameter Logic in where clause
            if ($searchlname != null) {
                if ($searchParameter == "") {
                    $searchParameter = " user.last_name like'%" . $searchlname . "%' ";
                } else {
                    $searchParameter .= " AND user.first_name ='" . $searchfname . "'";
                }
            }

            if ($searchemail != null) {
                if ($searchParameter == "") {
                    $searchParameter = " user.email like'%" . $searchemail . "%' ";
                } else {
                    $searchParameter .= " AND user.first_name ='" . $searchfname . "'";
                    $searchParameter .= " AND user.last_name ='" . $searchlname . "'";
                }
            }

        }

        if ($searchParameter == "") {
            $searchParameter = "1";
        }

        $baseQuery = "SELECT * FROM `user` WHERE";
        $baseQuery .= $searchParameter;

        $result = mysqli_query($conn, $baseQuery);
        $row = mysqli_num_rows($result);

?>

      