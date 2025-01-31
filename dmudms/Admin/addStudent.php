<?php
session_start();
include("header.php");

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: ../login.php");
    exit;
}

if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $studId = $_POST['username'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST["phone"];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $emergencyNo = $_POST['emergencyNo'];
    $sex = $_POST['sex'];
    $status = "Active";

    // Concatenate the values to set the password
    $pass = $lastName . "ABCD1234$#";
    // $pass = $userId . $usertype . $roomNo;

    // Check if a file is selected for upload
    if (!empty($_FILES['photo']['name'])) {
        $targetDirectory = 'uploads/';
        $targetFile = $targetDirectory . basename($_FILES['photo']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an actual image or a fake image
        $check = getimagesize($_FILES['photo']['tmp_name']);
        if ($check === false) {
            $_SESSION['error'] = 'Error: File is not an image.';
            $uploadOk = 0;
        }

        // Check if the file already exists
        if (file_exists($targetFile)) {
            $_SESSION['error'] = 'Error: File already exists.';
            $uploadOk = 0;
        }

        // Check the file size (adjust the size as per your requirements)
        if ($_FILES['photo']['size'] > 500000) {
            $_SESSION['error'] = 'Error: File size is too large.';
            $uploadOk = 0;
        }

        // Allow only certain file formats (you can modify/add more file formats as needed)
        $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedFormats)) {
            $_SESSION['error'] = 'Error: Only JPG, JPEG, PNG, and GIF files are allowed.';
            $uploadOk = 0;
        }

        // If no errors occurred, try to upload the file
        if ($uploadOk === 1) {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
                // File uploaded successfully, update the database with the photo path
                $path = $targetFile;

                require("../connect.php");

                // Prepare and execute a query to insert the new user into the student table
                $query = "INSERT INTO student (StudId, FName, MName, LName, phone, Email, photo, country, EmergencyNo, Status, Sex, password)
                VALUES ('$studId', '$firstName', '$middleName', '$lastName', '$phone', '$email', '$path', '$country', '$emergencyNo', '$status', '$sex', '$pass')";
                
                 $inserting=mysqli_query($connect, $query);
                if ($inserting) {
                    echo "Student Information Inserted successfully.";
                    header("header.php");
                    exit();
                } else {
                    echo "Error Inserting Student Information: " . mysqli_error($connect);
                }
         
            } else {
                // File upload failed
                 echo 'Error: There was an error uploading your file.';
                ?>
         <script>  window.alert("<?php 'Error: There was an error uploading your file.';  ?>");  </script>
                    <?php
                // header("Location: addStudent.php");
                // exit;
            }
        }
    } else {
        echo 'Error: Please select a photo.';
        ?>
         <script>  window.alert("<?php 'Error: Please select a photo.'; ?>");  </script>
                    <?php
        // header("Location: addStudent.php");
        // exit;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
           
    <!-- HTML form -->
    <form action="addStudent.php" method="POST" enctype="multipart/form-data">
        <label for="username">Student Id :</label>
        <input type="text" name="username" id="username" required><br>

        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" pattern="[A-Za-z].+" id="firstName" required><br>

        <label for="middleName">Middle Name:</label>
        <input type="text" name="middleName" pattern="[A-Za-z].+" id="middleName"><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" pattern="[A-Za-z].+" id="lastName" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" pattern="[0-9_]{10}" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="photo">Photo:</label>
        <input type="file" name="photo" id="photo"><br>

        <label for="country"> Country (Citizenship):</label>
        <input type="text" name="country" pattern="[A-Za-z].+" id="country" required><br>

        <label for="emergencyNo">Emergency Number:</label>
        <input type="text" name="emergencyNo" pattern="[0-9_]{10}" id="emergencyNo" required><br>

        <label for="sex">Sex:</label>
        <select name="sex">
           <option value="Male">Male</option>
           <option value="Female">Female</option>
        </select>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php   include("footer.php"); ?>
</body>

</html>
