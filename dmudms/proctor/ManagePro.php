<?php
session_start();  include("header.php"); 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: ../login.php");
    exit;
}
// Assuming you have a database connection established
include("../connect.php");
 
    // Insert the maintenance request into the Maintain table
    $query = "SELECT * FROM Property";
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
        echo "<th> Action </th>";
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
            echo "<td>" . $row['Status'] . "</td>";  ?>
            <td>
                        <a href="ApprovePro.php?id=<?php echo $row['reqID']; ?>" style="background-color: yellow; color: black;" onclick="return confirm('Really Do you Want to Approve (<?php echo $r ?>)?');"><img src="../img/edit.png" width="16" id="view" height="16" alt="" /> Approve </a>
                        <a href="deletePro.php?id=<?php echo $row['reqID']; ?>" style="background-color: red; color: black;" onclick="return confirm('Really Do you Want to Delete (<?php echo $r ?>)?');"><img src="../img/deluser.jpg" width="26" id="view" height="22" alt="" /> Delete </a>
                    </td>
            <?php
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No requests found!";
    }
   include("../footer.php");
?> 