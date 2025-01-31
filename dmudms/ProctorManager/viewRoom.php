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
$query = "SELECT * FROM Room";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Error retrieving data: " . mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Room List</title>
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
    <h2>Room information</h2>
    <table>
        <thead>
            <tr>
                <th>Room No </th>
                <th> Block Name</th>
                <th> Capacity </th>
                <th> Status</th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td>  <?php echo $row['RoomId']; ?>  </td>
                    <td> <?php echo $row['BlockNum']; ?>  </td>
                    <td> <?php echo $row['Capacity']; ?> </td>
                    <td> <?php echo $row['status']; ?> </td>
                    <td> <a href="changeRoom.php?id=<?php echo $row['RoomId']; ?>" style="background-color: greenyellow"> Change </a><a href="deleteRoom.php?id=<?php echo $row['RoomId']; ?>" style="background-color: red;"> Delete </a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

<?php
// Close the database connection
mysqli_close($connect);
?>