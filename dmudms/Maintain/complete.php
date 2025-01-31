<?php

  include 'header.php'; 
// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
// Redirect to the login page
header("Location: ../login.php");
exit;
}  


// Establish database connection
require("../connect.php");
// Check if the user ID is provided as a query parameter
if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    $status="Complete";
            // Update the user's attributes in the database
            $updateQuery = "UPDATE Maintain SET State = '$status' WHERE PostId = '$postId'";
            $updateResult = mysqli_query($connect, $updateQuery);

            if ($updateResult) {
                echo "Mark as Completed successfully.";
            } else {
                echo "Error Marking request: " . mysqli_error($connect);
            }
        }
      
 mysqli_close($connect);
?>