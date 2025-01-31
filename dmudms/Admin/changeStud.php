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
    $query = "SELECT * FROM student WHERE StudId = '$userId'";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Error Student user data: " . mysqli_error($connect));
    }

    // Check if the user exists
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
             $newUserName = $_POST['newUserName'];
            $newPassword = $_POST['newPassword'];
            $newAttribute = $_POST['newAttribute'];
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname = $_POST['lname'];

            // Update the user's attributes in the database
            $updateQuery = "UPDATE student SET StudId = '$newUserName', FName='$fname', MName='$mname', LName='$lname', password = '$newPassword', Status = '$newAttribute' WHERE StudId = '$userId'";
            $updateResult = mysqli_query($connect, $updateQuery);

            if ($updateResult) {
                echo "Student Information updated successfully.";
                header("ManageStudent.php");
                exit();
            } else {
                echo "Error updating Student Information: " . mysqli_error($connect);
            }
        }
        ?>

        <!DOCTYPE html>
        <html>

        <head>
            <title>Change Student Information </title>
        </head>

        <body>
            <h2>Change Student Information </h2>
            <form method="POST" action="">
                 <label for="newUserName">User Name(Id) :</label>
                <input type="text" id="newUserName" name="newUserName" value="<?php echo $user['StudId']; ?>">  <br><br>
                <label for="fname"> F_Name:</label>
                <input type="text" id="fname" name="fname" value="<?php echo $user['FName']; ?>">         <br><br>
                <label for="mname"> M_Name:</label>
                <input type="text" id="mname" name="mname" value="<?php echo $user['MName']; ?>">         <br><br>
                <label for="lname"> L_Name:</label>
                <input type="text" id="lname" name="lname" value="<?php echo $user['LName']; ?>">         <br><br>
                <label for="newPassword">Password:</label>
                <input type="text" id="newPassword" name="newPassword" value="<?php echo $user['password']; ?>">   <br><br>
                <label for="newAttribute"> Status: </label>
                <input type="text" id="newAttribute" name="newAttribute" value="<?php echo $user['Status']; ?>">    <br><br>
                <input type="submit" value="Update">
            </form>
        </body>

        </html>

        <?php
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID not provided.";
}

// Close the database connection
mysqli_close($connect);
   include("footer.php"); 
?>