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

// Check if the room ID is provided as a query parameter
if (isset($_GET['id'])) {
    $roomId = $_GET['id'];

    // Fetch room data from the Rooms table based on the provided room ID
    $query = "SELECT * FROM Room WHERE RoomId = '$roomId'";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Error retrieving room data: " . mysqli_error($connect));
    }

    // Check if the room exists
    if (mysqli_num_rows($result) > 0) {
        $room = mysqli_fetch_assoc($result);

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $newRoomNumber = $_POST['RoomNumber'];
            $newCapacity = $_POST['Capacity'];
 
            // Update the room's attributes in the database
            $updateQuery = "UPDATE Room SET RoomId = '$newRoomNumber', Capacity = '$newCapacity' WHERE RoomId = '$roomId'";
            $updateResult = mysqli_query($connect, $updateQuery);

            if ($updateResult) {
                echo "Room attributes updated successfully.";
            } else {
                echo "Error updating room attributes: " . mysqli_error($connect);
            }
        }
        ?>

        <!DOCTYPE html>
        <html>

        <head>
            <title>Change Room Attributes/Information</title>
        </head>

        <body>
            <h2>Change Room Attributes</h2>
            <form method="POST" action="">
                <label for="newRoomNumber">Room Number:</label>
                <input type="text" id="newRoomNumber" name="RoomNumber" value="<?php echo $room['RoomId']; ?>"><br><br>
                <label for="newCapacity">Capacity:</label>
                <input type="text" id="newCapacity" name="Capacity" value="<?php echo $room['Capacity']; ?>"><br><br>
                <label for="newBlockId">Block ID:</label>
                <input type="text" id="newBlockId" name="BlockId" value="<?php echo $room['BlockNum']; ?>" readonly/><br><br>
                <input type="submit" value="Update Attributes">
            </form>
        </body>

        </html>

        <?php
    } else {
        echo "Room not found.";
    }
} else {
    echo "Room ID not provided.";
}

// Close the database connection
mysqli_close($connect);
include("../footer.php");
?>
