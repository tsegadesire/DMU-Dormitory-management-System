<?php
// Assuming you have a database connection established
require("../connect.php");
include("header.php");
// Fetch data from the Maintain table
$query = "SELECT * FROM Maintain";
$result = mysqli_query($connect, $query);

// Check if there are any maintenance requests
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Action</th>";
    echo "<th>Post ID</th>";
    echo "<th>Student ID</th>";
    echo "<th>Date</th>";
    echo "<th>Block ID</th>";
    echo "<th>Room ID</th>";
    echo "<th>Status</th>";
    echo "<th>Information</th>";
    echo "</tr>";
    // Loop through each row of data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";   // Display the table header 
        if ($row['Status'] === "Active")            // Display the action column
        {  ?>
            <td> <a href="complete.php?id=<?php echo $row['PostId'];
                                            $r = $row['PostId']; ?>" style="background-color: aqua; color: black;" onclick="return confirm('Really Have You Complete(<?php echo $r ?>)?');"><img src="../img/edit.png" width="16" id="view" height="16" alt="" /> Mark </a>
            </td>
        <?php
            echo "<td>" . $row['PostId'] . "</td>";
            echo "<td>" . $row['StudId'] . "</td>";
            echo "<td>" . $row['Date'] . "</td>";
            echo "<td>" . $row['BlockId'] . "</td>";
            echo "<td>" . $row['RoomId'] . "</td>";
            echo "<td>" . $row['Status'] . "</td>";
            echo "<td>" . $row['PostInfo'] . "</td>";
            echo "<td>" . $row['State'] . "</td>";
        } else { ?>
            <script>
                window.alert(" <?php echo " There is  Unapproved Maintenance Request!"; ?> ");
            </script>
<?php   }
        echo "</tr>";
        continue;
    }
    echo "</table>";
} else {
    // No maintenance requests found
    echo "There isn't any Maintenance Request!";
}

// Close the database connection
mysqli_close($connect);
?>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px;
            padding: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        h1 {
            padding-left: 20px;
        }
    </style>
</head>

<body>

    <h1> Well Come To Maintainer Page </h1>
</body>

</html>