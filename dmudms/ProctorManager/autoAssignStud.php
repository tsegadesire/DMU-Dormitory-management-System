<?php
// Database connection configuration
require("../connect.php");

// Retrieve a student from the Student table
$num="select StudId FROM Student";
$numResult=mysqli_query($connect,$num);
if(mysqli_num_rows($numResult)>0){
    $StudId=mysqli_fetch_assoc($numResult);
foreach( $StudId as $numResult){
$studentQuery = "SELECT * FROM Student WHERE Status = 'Active' LIMIT 1";
$studentResult = mysqli_query($connect, $studentQuery);
if (!$studentResult) {
    echo "Error: " . mysqli_error($connect);
    exit;
}

if (mysqli_num_rows($studentResult) > 0) {
    $studentRow = mysqli_fetch_assoc($studentResult);
    $studentId = $studentRow['StudId'];
    $fullName = $studentRow['FName'] . ' ' . $studentRow['MName'] . ' ' . $studentRow['LName'];
    $phone = $studentRow['Phone'];
    $email = $studentRow['Email'];

    // Find the next available room with capacity in the next available block
    $nextRoomQuery = "SELECT Room.RoomId, Room.BlockNum, Room.capacity, Block.BlockId AS BlockId, Block.BlockName AS BlockName, Block.capacity AS BlockCapacity
                      FROM Room
                      INNER JOIN Block ON Room.BlockNum = Block.BlockId
                      WHERE Room.capacity < Block.capacity
                      ORDER BY BlockId ASC, Room.capacity ASC
                      LIMIT 1";
    $nextRoomResult = mysqli_query($connect, $nextRoomQuery);
    if (!$nextRoomResult) {
        echo "Error: " . mysqli_error($connect);
        exit;
    }

    if (mysqli_num_rows($nextRoomResult) > 0) {
        $nextRoomRow = mysqli_fetch_assoc($nextRoomResult);
        $roomId = $nextRoomRow['RoomId'];
        $roomNumber = $nextRoomRow['BlockNum'];
        $roomCapacity = $nextRoomRow['capacity'];
        $blockId = $nextRoomRow['BlockId'];
        $blockName = $nextRoomRow['BlockNum'];
        $blockCapacity = $nextRoomRow['BlockCapacity'];
        $academicYear="2015";
        // Update student's room assignment
        $updateStudentQuery="INSERT INTO Studplacement (RoomNo, BlockId, StudId, AcadamicYear) 
        VALUES ('$roomId', '$blockId', '$studentId', '$academicYear')";
        if (!mysqli_query($connect, $updateStudentQuery)) {
            echo "Error: " . mysqli_error($connect);
            exit;
        }

        echo "Student assigned to Room $roomNumber in Block $blockName.";
    } else {
        echo "No available room with higher capacity in any block.";
    }
} else {
    echo "No active students found.";
}

mysqli_close($connect);
}
}
?>