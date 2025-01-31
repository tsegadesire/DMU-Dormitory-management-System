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
$query = "SELECT * FROM student";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Error retrieving data: " . mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Students List</title>
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
    <h2>Student List</h2>
    <table>
        <thead>
            <tr>
                <th>Student Id</th> <th> F_Name</th> <th> M_Name</th> <th> L_Name</th>
                <th> phone</th> <th> Email <th>
                <th> Photo<th> <th> Citizenship <th>
                <th>Status</th> <th> Emergency No<th> <th> sex </th> <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td>  <?php echo $row['StudId']; ?>  </td>
                    <td> <?php echo $row['FName']; ?>  </td>
                    <td> <?php echo $row['MName']; ?> </td>
                    <td> <?php echo $row['LName']; ?> </td>
                    <td> <?php echo $row['Phone']; ?> </td>
                    <td> <?php echo $row['Email']; ?> </td>
                    <td> <img src="<?php echo $row['Photo']; ?>" width="30px" alt="photo not found!"/> </td>
                    <td> <?php echo $row['Country']; ?> </td>
                    <td> <?php echo $row['Status']; ?> </td>
                    <td> <?php echo $row['EmergencyNo']; ?> </td> 
                    <td> <?php echo $row['Sex']; ?> </td>
                    <td> <a href="change.php?id=<?php echo $row['StudId']; ?>">Change</a><a href="delete.php?id=<?php echo $row['StudId']; ?>" style="background-color: red;">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

<?php
// Close the database connection
mysqli_close($connect);
?>    <?php include("../footer.php");  ?>