<?php
  include("header.php"); 
require("../connect.php");

// Fetch available blocks from the "block" table
$blockQuery = "SELECT BlockId, Capacity FROM block";
$blockResult = mysqli_query($connect, $blockQuery);

// Fetch available rooms from the "room" table
$roomQuery = "SELECT RoomId, Capacity, BlockNum FROM room";
$roomResult = mysqli_query($connect, $roomQuery);

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Get room details from the form
    $roomNo = $_POST["roomNo"];
    $blockId = $_POST["blockId"];
    $studId = $_POST["studId"];
    $academicYear = $_POST["academicYear"];

    // Fetch the sex of the student
    $sexQuery = "SELECT sex FROM student WHERE StudId='$studId'";
    $sexResult = mysqli_query($connect, $sexQuery);
    $sexRow = mysqli_fetch_assoc($sexResult);
    $studentSex = $sexRow["sex"];

    // Fetch the reservedFor value from the block table
    $reservedForQuery = "SELECT reservedFor FROM block WHERE BlockId='$blockId'";
    $reservedForResult = mysqli_query($connect, $reservedForQuery);
    $reservedForRow = mysqli_fetch_assoc($reservedForResult);
    $reservedFor = $reservedForRow["reservedFor"];

    if ($reservedFor === $studentSex) {
        // Check if the room is already at maximum capacity
        $roomCapacityQuery = "SELECT COUNT(*) AS AssignedStudents, Capacity FROM Room WHERE RoomId='$roomNo' AND BlockNum='$blockId'";
        $roomCapacityResult = mysqli_query($connect, $roomCapacityQuery);
        $roomCapacityRow = mysqli_fetch_assoc($roomCapacityResult);
        $assignedStudents = $roomCapacityRow["AssignedStudents"];
        $roomCapacity = $roomCapacityRow["Capacity"];

        if ($assignedStudents >= $roomCapacity) {            
                // No available room with higher capacity, show error message
                echo "This Room is assigned please select another room!";
                exit;
            }

        // Insert room details into the "Studplacement" table
        $roomInsertSql = "INSERT INTO Studplacement (RoomNo, BlockId, Stud_Id, AcadamicYear) 
                            VALUES ('$roomNo', '$blockId', '$studId', '$academicYear')";
          $inserting=mysqli_query($connect, $roomInsertSql);
          if($inserting){
        // Show success message
          echo "Room assigned successfully!";  
          }else{
            echo "An Error occured:";
          }    
} else {
        // Display error message
         echo "This room is reserved for only $reservedFor!";  
        
    }
}

mysqli_close($connect);
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            margin: 0 auto;
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
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
        }
    </style>
</head>

<body>
    
    <h2>Assign Students</h2>
    <form action="" method="post">
        <label>Block ID:</label>
        <select name="blockId" required>
            <?php
            // Display available blocks
            while ($row = mysqli_fetch_assoc($blockResult)) {
                echo "<option value='" . $row['BlockId'] . "'>" . $row['BlockId'] . "</option>";
            }
            ?>
        </select>
        <label>Room No:</label>
        <select type="number" name="roomNo" required>
        <?php
            // Display available blocks
            while ($row = mysqli_fetch_assoc($roomResult)) {
                echo "<option value='" . $row['RoomId'] . "'>" . $row['RoomId'] . "</option>";
            }
            ?>
        </select>
        <label>Student ID:</label>
        <input type="text" name="studId" required>
        
        <label>Academic Year:</label>
        <select name="academicYear" required>
        <?php   $year=2015;
        while($year<=2480)
        { 
            echo "<option value=$year>$year</option>";
        $year++; 
        } ?>
        </select>

        <input type="submit" name="submit" value="Assign Room">
    </form>
    <?php   include("../footer.php"); ?>
</body>

</html>