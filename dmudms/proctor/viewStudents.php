<?php
// Database connection configuration
require("../connect.php");
// Fetch student profile details from the database
$sql = "SELECT AssignmentId,StudId,BlockId, RoomNo, AcadamicYear,FName, MName, LName, Phone, Email, photo, Country, Status,EmergencyNo,Sex, password 
        FROM studPlacement,student where studplacement.Stud_Id=student.StudId";
$result = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Profiles</title>
     <link rel="stylesheet" type="text/css" href="../style.css"/>
    <style>
    table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    padding: 5px;
}

th{
    background-color: rgb(27, 185, 185);
}

tr:nth-child(even) {
    background-color: rgb(120, 86, 153);
}

tr:nth-child(odd) {
    background-color: rgb(214, 171, 54);
}

tr:hover {
    background-color: rgb(126, 118, 160);
}
    </style>
</head>

<body>
    <?php include("header.php"); ?>
    <h2>Student Profiles</h2>
    <table>
        <tr>
            <th>Assignment ID</th>  
            <th>Student ID</th>
            <th>Block ID</th>
            <th>Room ID</th>
            <th>Academic Year ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>photo </th>
            <th>Country</th>
            <th>Status</th>
            <th>Emergency No</th>
            <th>Sex </th>
             <!-- <th>Action</th> -->
        </tr>
        <?php
        // Display student profile details
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['AssignmentId'] . "</td>";
            echo "<td>" . $row['StudId'] . "</td>";
            echo "<td>" . $row['BlockId'] . "</td>";
            echo "<td>" . $row['RoomNo'] . "</td>";
            echo "<td>" . $row['AcadamicYear'] . "</td>";
            echo "<td>" . $row['FName'] . "</td>";
            echo "<td>" . $row['MName'] . "</td>";
            echo "<td>" . $row['LName'] . "</td>";
            echo "<td>" . $row['Phone'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";  ?>
           <td><img src="<?php echo  $row['photo']; ?>"/> </td> <?php
            echo "<td>" . $row['Country'] . "</td>";
            echo "<td>" . $row['Status'] . "</td>";
            echo "<td>" . $row['EmergencyNo'] . "</td>";
            echo "<td>" . $row['Sex'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>

<?php
mysqli_close($connect);
include("../footer.php");
?>