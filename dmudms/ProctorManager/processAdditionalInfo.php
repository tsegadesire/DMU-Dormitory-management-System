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

if (isset($_POST['submit'])) {
    $blockId = $_POST['blockId'];
    $proctor = $_POST['proctor'];
    $year = $_POST['year'];
    $officeBlockId = $_POST['officeBlockId'];
    $officeRoomNo = $_POST['officeRoomNo'];

    // Process the uploaded photo
    if (isset($_FILES['photo'])) {
        $file = $_FILES['photo'];
        $fileName = $file['name'];
        $fileTmp = $file['tmp_name'];

        // Specify the destination directory
        $destinationDir = 'photos/';

        // Create the destination directory if it doesn't exist
        if (!is_dir($destinationDir)) {
            mkdir($destinationDir, 0777, true);
        }

        // Specify the destination path
        $destination = $destinationDir . $fileName;

        // Copy the uploaded photo to the destination path
        if (copy($fileTmp, $destination)) {
            $pass = $proctor . "ABCD1234#";
            $state = "Active";
            // Insert the proctor into the accounts table with additional information
            $insertAccountSql = "INSERT INTO accounts (UserName, U_Type, OfficeBlockId, OfficeRoomNo, Photo, password, Status) VALUES ('$proctor', 'Proctor', '$officeBlockId', '$officeRoomNo', '$destination', '$pass', '$state')";
            $insertAccountResult = mysqli_query($connect, $insertAccountSql);

            if ($insertAccountResult) {
                // Insert proctor into the Proctor table
                $insertProctorSql = "INSERT INTO Proctor(Block_Id, ProId, Year) VALUES ('$blockId', '$proctor', '$year')";
                $insertProctorResult = mysqli_query($connect, $insertProctorSql);

                if ($insertProctorResult) {
                    echo "Proctor assigned successfully.";
                } else {
                    echo "Error assigning proctor: " . mysqli_error($connect);
                }
            } else {
                echo "Error inserting proctor account: " . mysqli_error($connect);
            }
        } else {
            echo "Error copying uploaded photo.";
        }
    }
}

// Close the database connection
mysqli_close($connect);
include("../footer.php");
?>
