<?php
  include("header.php");
  // Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: ../login.php");
    exit;
}   
require("../connect.php");

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

    <h2> Assigned Students </h2>
    <?php
    // Check if there are any assignments
    // Fetch assignments from the "room" table
    // if (isset($_POST["submit"])) {
    $assignmentQuery = "SELECT * FROM Studplacement";
    $assignmentResult = mysqli_query($connect, $assignmentQuery);
    if (mysqli_num_rows($assignmentResult) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>AssignmentId</th>";
        echo "<th>Block </th>";
        echo "<th>Room </th>";
        echo "<th>Student ID</th>";
        echo "<th>Academic Year</th>";
        echo "</tr>";

        // Display assignment data in the table
        while ($row = mysqli_fetch_assoc($assignmentResult)) {
            echo "<tr>";
            echo "<td>" . $row['AssignmentId'] . "</td>";
            echo "<td>" . $row['BlockId'] . "</td>";
            echo "<td>" . $row['RoomNo'] . "</td>";
            echo "<td>" . $row['Stud_Id'] . "</td>";
            echo "<td>" . $row['AcadamicYear'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    // } else {
        // echo "No assignments found!";
    // }
}
else{
    ?>
    <form method="post" action="viewAssignment.php">
    
     <input type="text" name="StudId"/>
     <input type="submit" value="View"/>

    </form>
    <?php
}
    ?>
</body>

</html>