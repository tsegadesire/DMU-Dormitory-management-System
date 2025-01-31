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
$query = "SELECT * FROM Staff,Proctor,Block WHERE Block_Id=BlockId AND ProID=EmpId";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Error retrieving data: " . mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> Proctor Assignment List </title>
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
    <h2> Proctor Assignment List </h2>
    <table>
        <thead>
            <tr>
                <th>Assignment Year </th>
                <th> Block ID </th>
                <th> Proctor Id </th>
                <th> Proctor Name </th>
                <th> Reserved For </th>
                <th> Proctor Phone </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td> <?php echo $row['Year']; ?>  </td>
                    <td> <?php echo $row['Block_Id']; ?>  </td>
                    <td> <?php echo $row['ProId']; ?> </td>
                    <td> <?php echo $row['first_name']; ?> </td>
                    <td> <?php echo $row['ReservedFor']; ?> </td>
                    <td> <?php echo $row['phone'];  $_SESSION['emp']=$row['ProId']; $_SESSION['year']=$row['Year']; ?> </td>
                    <td> <a href="change.php?id=<?php echo $row['Block_Id']; ?>" style="background-color: greenyellow"> Change </a><a href="delete.php?id=<?php echo $row['Block_Id']; ?>" style="background-color: red;"> Delete </a></td>
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