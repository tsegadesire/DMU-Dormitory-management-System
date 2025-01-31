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

    // Fetch user data from the Accounts table based on the provided user ID
    // $query = "SELECT * FROM Maintain WHERE PostId = '$postId'";
    // $result = mysqli_query($connect, $query);

    // if (!$result) {
    //     die("Error retrieving user data: " . mysqli_error($connect));
    // }

    // // Check if the user exists
    // if (mysqli_num_rows($result) > 0) {
    //     $user = mysqli_fetch_assoc($result);

    //     // Check if the form is submitted
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         // Retrieve form data
    //         $newUType = $_POST['newUType'];
    //         $newUserName = $_POST['newUserName'];
    //         $newPassword = $_POST['newPassword'];
    //         $newAttribute = $_POST['newAttribute'];
    $status="Active";
            // Update the user's attributes in the database
            $updateQuery = "UPDATE Maintain SET Status = '$status' WHERE PostId = '$postId'";
            $updateResult = mysqli_query($connect, $updateQuery);

            if ($updateResult) {
                echo "Request Approved successfully.";
            } else {
                echo "Error Approving request: " . mysqli_error($connect);
            }
        }
        ?>

        <!-- <!DOCTYPE html>
        <html>

        <head>
            <title>Change User Attributes</title>
        </head>

        <body>
            <h2>Change User Attributes</h2>
            <form method="POST" action="">
                 <label for="newUserName">Post Id:</label>
                <input type="text" id="newUserName" name="newUserName" value="<?php echo $user['UserName']; ?>">  <br><br>
                <label for="newUType">User Type:</label>
                <input type="text" id="newUType" name="newUType" value="<?php echo $user['U_Type']; ?>">         <br><br>
                 <label for="newPassword">Password:</label>
                <input type="text" id="newPassword" name="newPassword" value="<?php echo $user['password']; ?>">   <br><br>
                <label for="newAttribute">Attribute:</label>
                <input type="text" id="newAttribute" name="newAttribute" value="<?php echo $user['Status']; ?>">    <br><br>
                <input type="submit" value="Update">
            </form>
        </body>

        </html> -->

        <?php
//     } else {
//         echo "User not found.";
//     }
// } else {
//     echo "User ID not provided.";
// }

// Close the database connection
mysqli_close($connect);
include("../footer.php");
?>