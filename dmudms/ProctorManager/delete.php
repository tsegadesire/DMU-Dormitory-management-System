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
    $userId = $_GET['id'];
    $user=$_SESSION["emp"];  $year=$_SESSION["year"];
    // Fetch user data from the Accounts table based on the provided user ID
    $query = "DELETE FROM Proctor WHERE Block_Id = '$userId' AND ProId='$user' AND Year='$year'";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Error Deleting Proctor Assignment data: " . mysqli_error($connect));
    }
   else {
    ?>
    <script>
        window.alert("Assigned Proctor has been deleted(Unassigned) succesfully!")
        </script>
    <?php
   }
    // Check if the user exists
     
} else {
    echo "Proctor or Block ID (or Both) has not provided.";
}

// Close the database connection
mysqli_close($connect);
?>    <?php include("../footer.php");  ?>