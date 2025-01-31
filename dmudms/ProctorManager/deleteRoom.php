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

    // Fetch user data from the Accounts table based on the provided user ID
    $query = "DELETE FROM Room WHERE RoomId = '$userId'";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Error Deleting Room data: " . mysqli_error($connect));
    }
   else {
    ?>
    <script>
        window.alert("Room has been deleted succesfully!")
        </script>
    <?php
   }
    // Check if the user exists
     
} else {
    echo "Room ID not provided.";
}

// Close the database connection
mysqli_close($connect);
?>    <?php include("../footer.php");  ?>