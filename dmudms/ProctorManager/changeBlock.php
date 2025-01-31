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
    $query = "SELECT * FROM Block WHERE BlockId = '$userId'";
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
            $newUType = $_POST['BlockName'];
            $newUserName = $_POST['Capacity'];
            $newPassword = $_POST['ReservedFor'];
            $newAttribute = $_POST['Status'];

            // Update the user's attributes in the database
            $updateQuery = "UPDATE Block SET BlockName = '$newUType', Capacity = '$newUserName', ReservedFor = '$newPassword', Status = '$newAttribute' WHERE BlockId = '$userId'";
            $updateResult = mysqli_query($connect, $updateQuery);

            if ($updateResult) {
                echo "Block attributes updated successfully.";
            } else {
                echo "Error updating Block attributes: " . mysqli_error($connect);
            }
        }
        ?>

        <!DOCTYPE html>
        <html>

        <head>
            <title>Change Block Attributes/Information</title>
        </head>

        <body>
            <h2>Change Block Attributes</h2>
            <form method="POST" action="">
                <label for="newUType">Block Name:</label>
                <input type="text" id="newUType" name="BlockName" value="<?php echo $user['BlockName']; ?>"><br><br>
                <label for="newUserName">Capacity :</label>
                <input type="text" id="newUserName" name="Capacity" value="<?php echo $user['Capacity']; ?>"><br><br>
                <label for="newPassword">Reserved For:</label>
                <input type="text" id="newPassword" name="ReservedFor" value="<?php echo $user['ReservedFor']; ?>"><br><br>
                <label for="newAttribute">Status:</label>
                <input type="text" id="newAttribute" name="Status" value="<?php echo $user['Status']; ?>"><br><br>
                <input type="submit" value="Update Attributes">
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
?>    <?php include("../footer.php");  ?>