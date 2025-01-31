<?php
session_start();
include("header.php");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: ../login.php");
    exit;
}

// Assuming you have a database connection established
include("../connect.php");

$error = ''; // Variable to store error messages

if (isset($_POST["Submit"])) {
    // Retrieve the StudId from the session
    $studId = $_SESSION['username'];
    $fet = "SELECT BlockId, RoomNo FROM studplacement WHERE Stud_Id='$studId'";
    $ex = mysqli_query($connect, $fet);
    $row = mysqli_fetch_assoc($ex);

    if (mysqli_num_rows($ex) > 0) {
        $blockId = $row['BlockId'];
        $roomId = $row['RoomNo'];
        $info = mysqli_real_escape_string($connect, $_POST['Info']);
        $date = $_POST['date'];
        $status = 'inactive'; // Assuming the default status is inactive

        // Insert the maintenance request into the Maintain table
        $query = "INSERT INTO Maintain (StudId, Date, BlockId, RoomId, Status, PostInfo) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connect, $query);
        mysqli_stmt_bind_param($stmt, "ssssss", $studId, $date, $blockId, $roomId, $status, $info);
        $submitted = mysqli_stmt_execute($stmt);

        if ($submitted) {
            echo "You have successfully submitted a Request";
            // header('Location: header.php');
            // exit();
        } else {
            $error = "Error submitting your request: " . mysqli_error($connect);
        }
    } else {
        echo "Please be assigned first!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Submit Maintenance Request</title>
    <link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
    <!-- The HTML form to submit a maintenance request -->
    <div class="form-container">
        <form method="POST" action="">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required><br>

            <label for="Info">Request Data:</label>
            <input type="text" name="Info" id="Info" required><br>

            <input type="submit" name="Submit" value="Submit">
        </form>

        <?php
        if (!empty($error)) {
            echo "<p>Error: $error</p>";
        }
        ?>
    </div>
</body>

</html>
