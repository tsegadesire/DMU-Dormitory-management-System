<?php
   include 'header.php'; 
  // Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
// Redirect to the login page
header("Location: ../login.php");
exit;
}  

  
// Include the PhpSpreadsheet library
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Database connection configuration
require("../connect.php");
// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Get the uploaded file information
    $file = $_FILES["file"]["tmp_name"];

    // Load the Excel file
    $spreadsheet = IOFactory::load($file);
    $worksheet = $spreadsheet->getActiveSheet();

    // Get the highest row number
    $highestRow = $worksheet->getHighestRow();
echo $highestRow;
    // Iterate through each row in the Excel file
    for ($row = 2; $row <= $highestRow; $row++) {
        // Get the student details from the Excel file
        $studId = $worksheet->getCell('A' . $row)->getValue();
        $firstName = $worksheet->getCell('B' . $row)->getValue();
        $middleName = $worksheet->getCell('C' . $row)->getValue();
        $lastName = $worksheet->getCell('D' . $row)->getValue();
        $phone = $worksheet->getCell('E' . $row)->getValue();
        $email = $worksheet->getCell('F' . $row)->getValue();
        $photo = $worksheet->getCell('G' . $row)->getValue();
        $password = $worksheet->getCell('H' . $row)->getValue();
        $country = $worksheet->getCell('I' . $row)->getValue();
        $emergencyNo = $worksheet->getCell('J' . $row)->getValue();
        $sex = $worksheet->getCell('K' . $row)->getValue();
         // Sanitize and validate input data
        $studId = mysqli_real_escape_string($connect, $studId);
        $firstName = mysqli_real_escape_string($connect, $firstName);
        $middleName = mysqli_real_escape_string($connect, $middleName);
        $lastName = mysqli_real_escape_string($connect, $lastName);
        $phone = mysqli_real_escape_string($connect, $phone);
        $email = mysqli_real_escape_string($connect, $email);
        $photo = mysqli_real_escape_string($connect, $photo);
        $country = mysqli_real_escape_string($connect, $country);
        $emergencyNo = mysqli_real_escape_string($connect, $emergencyNo);
        $sex = mysqli_real_escape_string($connect, $sex);
        $status = "Active"; // Set status as "Active" for all students
// Insert student details into the "Student" table
        $studentInsertSql = "INSERT INTO Student (StudId,FName, MName, LName, phone, Email, photo, , Country, Status, EmergencyNo,Sex) 
VALUES ('$studId','$firstName', '$middleName', '$lastName', '$phone', '$email', '$photo', '$country', '$status', '$emergencyNo','$sex')";
        if (!mysqli_query($connect, $studentInsertSql)) {
            echo "Error: " . mysqli_error($connect);
            continue;
        }
    }

    // Show success message
    echo "Students assigned successfully!";
}

mysqli_close($connect);
?>

<!-- HTML form -->
<!DOCTYPE html>
<html>

<head>
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        } */
    </style> 
</head>

<body>
    <div class="header">
      
    </div>
    <div class="container">
        <h2>Assign Students</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Upload CSV File:</label>
            <input type="file" name="file" required><br><br>
            <input type="submit" name="submit" value="Assign Students">
        </form>
    </div>
</body>

</html>