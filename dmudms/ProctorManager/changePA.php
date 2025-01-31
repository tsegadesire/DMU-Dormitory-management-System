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

if (isset($_GET['blockId'])) {
    $blockId = $_GET['blockId'];
    $proctors = $_POST['proctor'];
    $years = $_POST['year'];

    $year = $years[$blockId][$blockId];
    $proctor = $proctors[$blockId][$blockId];

    // Check if the proctor is already assigned for the selected year
    $checkSql = "SELECT * FROM Proctor WHERE Block_Id='$blockId' AND Year='$year'";
    $checkResult = mysqli_query($connect, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "Proctor is already assigned for the selected year.";
    } else {
        // Check if the proctor exists in the accounts table
        $accountCheckSql = "SELECT * FROM accounts WHERE UserName='$proctor'";
        $accountCheckResult = mysqli_query($connect, $accountCheckSql);

        if (mysqli_num_rows($accountCheckResult) > 0) {
            // Update the U_Type to 'Proctor'
            $updateSql = "UPDATE accounts SET U_Type='Proctor' WHERE UserName='$proctor'";
            $updateResult = mysqli_query($connect, $updateSql);

            if ($updateResult) {
                echo "Proctor account updated successfully.";
            } else {
                echo "Error updating proctor account: " . mysqli_error($connect);
            }
        } else {
            // Display the form to capture additional information
            echo '<h2>Proctor Additional Information</h2>';
            echo '<form method="POST" action="processAdditionalInfo.php" enctype="multipart/form-data">';
            echo '<input type="hidden" name="blockId" value="' . $blockId . '">';
            echo '<input type="hidden" name="proctor" value="' . $proctor . '">';
            echo '<input type="hidden" name="year" value="' . $year . '">';

            echo 'Office Block ID: <input type="text" name="officeBlockId" required><br>';
            echo 'Office Room No: <input type="text" name="officeRoomNo" required><br>';
            echo 'Photo: <input type="file" name="photo" accept="image/*" required><br>';

            echo '<input type="submit" name="submit" value="Submit">';
            echo '</form>';
        }
    }
} 

// Close the database connection
mysqli_close($connect);
include("../footer.php");
?>
