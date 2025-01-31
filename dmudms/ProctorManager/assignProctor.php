<?php
session_start();
include("header.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: ../login.php");
    exit;
}
// Database connection configuration
require("../connect.php");
// Check connection 
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch blocks from the block table
$blockQuery = "SELECT * FROM Block";
$blockResult = mysqli_query($connect, $blockQuery);

// Fetch the list of proctors from the staff table
$proctorQuery = "SELECT * FROM staff";
$proctorResult = mysqli_query($connect, $proctorQuery);

// Check if there are any blocks available
if (mysqli_num_rows($blockResult) > 0) {
    // Display the block assignments form
    echo '<h2>Proctor Block Assignments</h2>';
    echo '<form method="POST" action="changePA.php" id="assignmentForm">';
    echo '<table>';
    echo '<tr><th>Block</th><th>Proctor</th><th>Year</th><th>Action</th></tr>';

    while ($row = mysqli_fetch_assoc($blockResult)) {
        $blockId = $row['BlockId'];
        $blockName = $row['BlockName'];
        $reservedFor = $row['ReservedFor'];

        echo '<tr>';
        echo '<td>' . $blockName . ' (' . $reservedFor . ')</td>';
        echo '<td><select name="proctor[' . $blockId . '][' . $blockId . ']">';

        // Move the proctor option loop here
        if (mysqli_num_rows($proctorResult) > 0) {
            while ($proctorRow = mysqli_fetch_assoc($proctorResult)) {
                $proctorId = $proctorRow['EmpId'];
                echo '<option value="' . $proctorId . '">' . $proctorId . '</option>';
            }
            // Reset the proctorResult pointer back to the first row
            mysqli_data_seek($proctorResult, 0);
        }

        echo '</select></td>';

        echo '<td><select name="year[' . $blockId . '][' . $blockId . ']">';
        $year = 2015;
        while ($year <= 2480) {
            echo '<option value="' . $year . '">' . $year . '</option>';
            $year++;
        }
        echo '</select></td>';

        echo '<td>';
        echo '<input type="button" name="assign[' . $blockId . ']" value="Assign" style="background-color: greenyellow" onClick="submitRow(' . $blockId . ')">';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</form>';
} else {
    echo "No blocks available.";
}

// Close the database connection
mysqli_close($connect);
include("../footer.php");
?>
<script>
    function submitRow(blockId) {
        document.getElementById('assignmentForm').action = 'changePA.php?blockId=' + blockId;
        document.getElementById('assignmentForm').submit();
    }
</script>
