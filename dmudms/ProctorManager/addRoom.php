<?php

include("header.php");
require("../connect.php");

// Fetch available blocks from the "block" table
$blockQuery = "SELECT BlockId, Capacity FROM block";
$blockResult = mysqli_query($connect, $blockQuery);

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Get room details from the form
    $roomNo = $_POST["roomNo"];
    $capacity = $_POST["capacity"];
    $blockId = $_POST["blockId"];
    $status = "Active";
    $bquery="SELECT Capacity FROM block WHERE BlockId='$blockId'";
    $blocResult = mysqli_query($connect, $bquery);
    $row = mysqli_fetch_assoc($blocResult);
    $bCapacity=$row["Capacity"];
   
    $sql="SELECT * FROM Room WHERE BlockNum='$blockId'";
    $RoomNoResult = mysqli_query($connect, $sql);
    $Rooms = mysqli_num_rows($RoomNoResult);
  
    if($Rooms<$bCapacity){
            // Insert room details into the "room" table
            $roomInsertSql = "INSERT INTO room (RoomId, Capacity, BlockNum, Status) 
                              VALUES ('$roomNo', '$capacity', '$blockId', '$status')";
            mysqli_query($connect, $roomInsertSql);

            // Show success message
            echo "Room added successfully!";
        } else {
          
            // Show opition message 
            echo " select another Room to add successfully!";
        }
 
 }

mysqli_close($connect);
?>

<!DOCTYPE html>
<html>

<body>
    <h2>Add Room</h2>
    <form action="" method="post">
        <label>Room No:</label>
        <input type="text" name="roomNo" required><br><br>

        <label>Capacity:</label>
        <input type="number" name="capacity" required><br><br>

        <label>Block ID:</label>
        <select name="blockId" required>
            <?php
            // Display available blocks
            while ($row = mysqli_fetch_assoc($blockResult)) {
                echo "<option value='" . $row['BlockId'] . "'>" . $row['BlockId'] . "</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" name="submit" value="Add Room">
    </form>
</body>
<?php include("../footer.php");  ?>
</html>