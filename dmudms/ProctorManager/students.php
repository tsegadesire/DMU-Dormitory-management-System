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
$query = "SELECT * FROM Student";
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
    <h2>Students List</h2>
    <table>
        <thead>
            <tr>
                <th>Student Id</th>
                <th>F_Name</th>
                <th>L_Name</th>
                <th>M_Name</th>
                <th>phone</th>
                <th>Email</th>
                <th>photo</th>
                <th>citizenship</th>
                <th>Status</th>
                <th>Emergency No</th>
                <th>Sex</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <?php echo $row['StudId']; $r=$row["StudId"]; ?> 
                    </td>
                    <td>
                        <?php echo $row['FName']; ?>
                    </td>
                    <td>
                        <?php echo $row['MName']; ?>
                    </td>
                    <td>
                        <?php echo $row['LName']; ?>
                    </td>
                    <td>
                        <?php echo $row['Phone']; ?>
                    </td>
                    <td>
                        <?php echo $row['Email']; ?>
                    </td>
                    <td>
                        <img src="<?php $pre="../Admin/"; echo $pre.$row['Photo']; ?>" width="40px" alt="NotFound!"/>
                    </td>
                   <td>
                        <?php echo $row['Country']; ?>
                    </td>
                    <td>
                        <?php echo $row['Status']; ?>
                    </td>
                    <td>
                        <?php echo $row['EmergencyNo']; ?>
                    </td>
                    <td>
                        <?php echo $row['Sex']; ?>
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