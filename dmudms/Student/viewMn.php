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
$user=$_SESSION["username"];
// Fetch user data from the Accounts table
$query = "SELECT * FROM Maintain WHERE StudId='$user'";
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