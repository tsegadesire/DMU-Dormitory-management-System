<?php // Check if the user is not logged in

include("header.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: ../login.php");
    exit;
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Establish database connection
require("../connect.php");

// Fetch user data from the Accounts table
$query = "SELECT * FROM Maintain";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Error retrieving data: " . mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
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
    </style>
    
</head>

<body>
    <h2>Maintain List</h2>
    <table>
        <thead>
            <tr>
                <th>Post Id</th>
                <th>StudId</th>
                <th>Date</th>
                <th>Block Id</th>
                <th>RoomId</th>
                <th>Status</th>
                <th>Post Info</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <?php echo $row['PostId']; $r=$row["PostId"]; ?>
                    </td>
                    <td>
                        <?php echo $row['StudId']; ?> 
                    </td>
                    
                    <td>
                        <?php echo $row['Date']; ?>
                    </td>
                    <td>
                        <?php echo $row['BlockId']; ?>
                    </td>
                    <td>
                        <?php echo $row['RoomId']; ?>
                    </td>
                    <td>
                        <?php echo $row['Status']; ?>
                    </td>
                    <td>
                        <?php echo $row['PostInfo']; ?>
                    </td>
                     <td>
                        <a href="Approve.php?id=<?php echo $row['PostId']; ?>" style="background-color: yellow; color: black;" onclick="return confirm('Really Do you Want to Approve (<?php echo $r ?>)?');"><img src="../img/edit.png" width="16" id="view" height="16" alt="" /> Approve </a>
                        <a href="DeleteStud.php?id=<?php echo $row['PostId']; ?>" style="background-color: red; color: black;" onclick="return confirm('Really Do you Want to Delete (<?php echo $r ?>)?');"><img src="../img/deluser.jpg" width="26" id="view" height="22" alt="" /> Delete </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>

<?php
// Close the database connection
mysqli_close($connect);
include("../footer.php");
?>