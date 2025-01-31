<?php
  include 'header.php';
   // Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: ../login.php");
    exit;
}  

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
// Redirect to the login page
header("Location: ../login.php");
exit;
}  


// Establish database connection
require("../connect.php");
// Check if the user ID is provided as a query parameter
 
    $userId = $_SESSION['username'];

    // Fetch user data from the Accounts table based on the provided user ID
    $query = "SELECT * FROM Student WHERE StudId = '$userId'";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Error retrieving user data: " . mysqli_error($connect));
    }

    // Check if the user exists
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
             $newPassword = $_POST['newPassword'];
             $newAttribute = $_POST['nPassword'];
             if($newAttribute==$newPassword){
            // Update the user's attributes in the database
            $updateQuery = "UPDATE Student SET password = '$newPassword' WHERE StudId = '$userId'";
            $updateResult = mysqli_query($connect, $updateQuery);

            if ($updateResult) {
                echo "Congratulations! You Have Changed Your Password successfully.";
            } else {
                echo "Error updating your password: " . mysqli_error($connect);
            }     
         }
         else {
            echo "password Confirmation Error (Password must match)!";
         }
           
        }
        ?>

        <!DOCTYPE html>
        <html>

        <head>
            <title>manage password </title>
        </head>

        <body>
            <h2> Change Passwowd Only </h2>
            <form method="POST" action="">
                 <label for="newUserName">User Name:</label>
                <input type="text" id="newUserName" name="newUserName" value="<?php echo $user['StudId']; ?>" readonly>  <br><br>
                <label for="newUType">F_Name :</label>
                <input type="text" id="newUType" name="newUType" value="<?php echo $user['FName']; ?>" readonly>         <br><br>
                 <label for="newPassword">Password:</label>
                <input type="text" id="newPassword" name="newPassword" value="<?php echo $user['password']; ?>">   <br><br>
                <label for="nPassword">confirm Password:</label>
                <input type="text" id="nPassword" name="nPassword" value="<?php echo $user['password']; ?>">    <br><br>
                <input type="submit" value="Update">
            </form>
        </body>

        </html>

        <?php
    } else {
        echo "User not found.";
    }

// Close the database connection
mysqli_close($connect);
?>