<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

// Create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch blocks from the block table
$blockQuery = "SELECT * FROM block";
$blockResult = mysqli_query($conn, $blockQuery);

// Check if there are any blocks available
if (mysqli_num_rows($blockResult) > 0) {
    // Display the block assignments form
    echo '<h2>Proctor Block Assignments</h2>';
    echo '<form action="" method="post">';
    echo '<table>';
    echo '<tr><th>Block</th><th>Proctor</th></tr>';

    while ($row = mysqli_fetch_assoc($blockResult)) {
        $blockId = $row['Id'];
        $blockName = $row['Name'];
        $blockLocation = $row['Location'];

        // Get the assigned proctor for the current block
        $proctorQuery = "SELECT proctor FROM block_assignments WHERE block_id = $blockId";
        $proctorResult = mysqli_query($conn, $proctorQuery);
        $assignedProctor = mysqli_fetch_assoc($proctorResult)['proctor'];

        // Display the block details and proctor selection
        echo '<tr>';
        echo '<td>' . $blockName . ' (' . $blockLocation . ')</td>';
        echo '<td><select name="proctor_' . $blockId . '">';
        echo '<option value="">-- Select Proctor --</option>';

        // Fetch the list of proctors
        $proctorQuery = "SELECT * FROM proctors";
        $proctorResult = mysqli_query($conn, $proctorQuery);

        while ($proctorRow = mysqli_fetch_assoc($proctorResult)) {
            $proctorId = $proctorRow['id'];
            $proctorName = $proctorRow['name'];

            // Check if the proctor is assigned to the current block
            $selected = ($assignedProctor == $proctorId) ? 'selected' : '';

            echo '<option value="' . $proctorId . '" ' . $selected . '>' . $proctorName . '</option>';
        }

        echo '</select></td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '<input type="submit" name="assign" value="Assign Proctors">';
    echo '</form>';
} else {
    echo "No blocks available.";
}

// Check if the form is submitted
if (isset($_POST['assign'])) {
    // Process the submitted form data
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'proctor_') !== false) {
            $blockId = str_replace('proctor_', '', $key);
            $proctorId = $value;

            // Update the block assignment in the database
            $updateQuery = "UPDATE block_assignments SET proctor = '$proctorId' WHERE block_id = $blockId";
            mysqli_query($conn, $updateQuery);
        }
    }

    echo "Proctors assigned successfully!";
}

// Close the database connection
mysqli_close($conn);
?>
