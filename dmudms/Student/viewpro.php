<?php
session_start();  include("header.php"); 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: ../login.php");
    exit;
}
// Assuming you have a database connection established
include("../connect.php");
 
    // Retrieve the StudId from the session
      $studId = $_SESSION['username'];

    // Insert the maintenance request into the Maintain table
    $query = "SELECT * FROM Property WHERE Studid='$studId'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>request Id</th>";
        echo "<th> Student ID </th>";
        echo "<th> request Date </th>";
        echo "<th> Property Name </th>";
        echo "<th> Color </th>";
        echo "<th> Number </th>";
        echo "<th> Status </th>";
        echo "</tr>";

        // Display assignment data in the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['reqID'] . "</td>";
            echo "<td>" . $row['Studid'] . "</td>";
            echo "<td>" . $row['reqDate'] . "</td>";
            echo "<td>" . $row['Properties'] . "</td>";
            echo "<td>" . $row['Color'] . "</td>";
            echo "<td>" . $row['Number'] . "</td>";
            echo "<td>" . $row['Status'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No requests found!";
    }
   include("../footer.php");
?> 