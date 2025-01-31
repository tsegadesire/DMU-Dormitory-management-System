<?php
include("header.php");
require("../connect.php");

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}


 // Check if the form is submitted
if (isset($_POST["submit"])) {
    // Get block details from the form
  
    $bname = $_POST["Bname"];
    $capacity = $_POST["capacity"];
    $reservedFor = $_POST["reservedFor"];
    $status = "Active";
    
    // Insert block details into the "block" table
    $blockInsertSql = "INSERT INTO block (BlockName, Capacity, ReservedFor, Status) 
                        VALUES ('$bname', '$capacity', '$reservedFor', '$status')";
    mysqli_query($connect, $blockInsertSql);

    // Show success message
    echo "Block added successfully!";
}
mysqli_close($connect);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <h2>Add Block</h2>
    <form action="" method="post">

        <label>BlockName:</label>
        <input type="text" name="Bname" required><br><br>

        <label>Capacity:</label>
        <input type="number" name="capacity" required><br><br>

        <label>Reserved For:</label>
        <select name="reservedFor" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>

        <input type="submit" name="submit" value="Add Block">
        <input type="reset" name="clear" value="Cancel">
    </form>
</body>
<?php include("../footer.php");  ?>
</html>
