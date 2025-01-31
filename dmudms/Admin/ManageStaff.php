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
$query = "SELECT * FROM staff";
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
    <h2>Employee List</h2>
    <table>
        <thead>
            <tr>
                <th>Emp Id</th>
                <th>First Name </th>
                <th>Second Name </th>
                <th>Last Name </th>
                <th>Phone</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td>
                        <?php echo $row['EmpId'];
                        $r = $row["EmpId"]; ?>
                    </td>
                    <td>
                        <?php echo $row['first_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['middleName']; ?>
                    </td>
                    <td>
                        <?php echo $row['last_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['Email']; ?>
                    </td>
                    <td>
                        <?php echo $row['phone']; ?>
                    </td>
                    <td>
                        <?php echo $row['address']; ?>
                    </td>
                    <td>
                        <?php echo $row['Sex']; ?>
                    </td>
                    <!-- <td>
                        <a href="changeAcc.php?id=<?php echo $row['UserName']; ?>" style="background-color: yellow; color: black;" onclick="return confirm('Really Do you Want to Modify (<?php echo $r ?>)?');">
											<img src="../img/edit.png" width="16" id="view" height="16" alt="" /> Change</a>
                        <a href="deleteAccount.php?id=<?php echo $row['UserName']; ?>" style="background-color: red; color: black;" onclick="return confirm('Really Do you Want to Delete (<?php echo $r ?>)?');">
											<img src="../img/deluser.jpg" width="26" id="view" height="22" alt="" />Delete</a>
                    </td> -->
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