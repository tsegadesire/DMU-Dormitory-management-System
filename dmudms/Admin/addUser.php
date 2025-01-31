<?php
include 'header.php';
// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: ../login.php");
    exit;
}

require("../connect.php");

// Fetch the EmpId values from the Staff table
$empQuery = "SELECT EmpId FROM Staff";
$empResult = mysqli_query($connect, $empQuery);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Assign User</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
        input[type="file"],
        select {
            width: 60%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: #f8f8f8;
        }

        select:hover {
            border-color: #999;
        }

        select:focus {
            outline: none;
            border-color: #555;
            box-shadow: 0 0 5px #aaa;
        }
    </style>
</head>

<body>
    <h2>Assign User</h2>
    <?php
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $userId = $_POST['userId'];
        $usertype = $_POST['usertype'];
        $officeNo = $_POST['officeno'];
        $roomNo = $_POST['roomno'];
        $status = "Active";

        // Concatenate the values to set the password
        $pass = $userId . $usertype . $roomNo;

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

                    // Connect to the database (replace with your own database connection code)
                    require("../connect.php");

                    // Prepare and execute a query to insert the new user into the Accounts table
                    $query = "INSERT INTO accounts (UserName, photo, U_type, password, Status, OfficeBlockId, OfficeRoomNo) VALUES ('$userId', '$path', '$usertype', '$pass', '$status', '$officeNo', '$roomNo')";
                    $result = mysqli_query($connect, $query);

                    if ($result) {
                        // User added successfully
                        $_SESSION['message'] = "User added successfully.";
                        mysqli_close($connect);
                        header("Location: addUser.php");
                        exit;
                    } else {
                        // User addition failed
                        $_SESSION['error'] = "Error adding user: " . mysqli_error($connect);
                        mysqli_close($connect);
                        header("Location: addUser.php");
                        exit;
                    }
                } else {
                    // File upload failed
                    $_SESSION['error'] = 'Error: There was an error uploading your file.';
                }
            }
        } else {
            $_SESSION['error'] = 'Error: Please select a photo.';
        }
    }
    ?>

    <?php
    // Display error message if set
    if (isset($_SESSION['error'])) {
        echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }
    ?>

    <form method="POST" enctype="multipart/form-data" action="addUser.php">
        <label for="userId">User Name:</label>
        <select id="userId" name="userId" required>
            <?php
            while ($row = mysqli_fetch_assoc($empResult)) {
                $empId = $row['EmpId'];
                echo '<option value="' . $empId . '">' . $empId . '</option>';
            }
            ?>
        </select><br><br>
        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" required><br><br>
        <label for="usertype">User Type:</label>
        <select id="usertype" name="usertype" required>
            <option value="Admin">Admin</option>
            <option value="ProctorManager">Proctor Manager</option>
            <option value="Maintainer">Maintenance</option>
            <option value="Proctor">Proctor</option>
        </select><br><br>
        <label for="officeno">Office Number:</label>
        <input type="text" id="officeno" name="officeno" required><br><br>
        <label for="roomno">Room Number:</label>
        <input type="text" id="roomno" name="roomno" required><br><br>
        <input type="submit" value="Add User">
    </form>
</body>
<?php include("../footer.php"); ?>

</html>