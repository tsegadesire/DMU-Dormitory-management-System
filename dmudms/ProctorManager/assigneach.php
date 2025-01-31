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
// Check if the user ID is provided as a query parameter
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user data from the Accounts table based on the provided user ID
    $query = "SELECT * FROM Student WHERE StudId = '$userId'";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Error retrieving user data: " . mysqli_error($connect));
    }

    // Check if the user exists
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
         $sex=$user["Sex"];
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $block = $_POST['block'];
            $room = $_POST['room'];
            $year = $_POST['year'];
            $stud = $_POST['stud'];

            $bl="SELECT ReservedFor From Block WHERE BlockId='$block'";
            $blk=mysqli_query($connect,$bl);
            while($row1=mysqli_fetch_array($blk)){
                $reservedfor=$row1["ReservedFor"];
            }
            if($sex==$reservedfor){
            // insert the user's attributes in the database
            $updateQuery = "INSERT INTO Studplacement(Stud_Id,BlockId,RoomNo,AcadamicYear) 
        VALUES('$stud', '$block', '$room','$year')";
        $updateResult = mysqli_query($connect, $updateQuery);

        if ($updateResult) {
            echo "Student assigned successfully.";
        } else {
            echo "Error assigning student: " . mysqli_error($connect);
        }
        }else{
            echo "Sorry It is Reserved Only For ".$reservedfor;
        }
    }
        ?>

        <!DOCTYPE html>
        <html>

        <head>
            <title>Assign student </title>
        </head>

        <body>
            <h2>fill Assign Informations </h2>
            <form method="POST" action="">
                <label for="stud">Student Id:</label>
                <input type="text" id="stud" name="stud" value="<?php echo $user['StudId']; ?>" readonly><br><br>
                <label for="block">Block Id :</label>
                <input type="text" id="block" name="block"/><br><br>
                <label for="room">Room No :</label>
                <input type="number" id="room" name="room"/><br><br>
                <label for="year">Status:</label>
                <input type="number" id="year" name="year"/><br><br>
                <input type="submit" value="Assign">
            </form>
        </body>

        </html>

        <?php
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID not provided.";
}

// Close the database connection
mysqli_close($connect);
?>    <?php include("../footer.php");  ?>