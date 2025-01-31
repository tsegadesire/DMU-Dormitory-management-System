<?php

  include 'header.php'; 
// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
// Redirect to the login page
header("Location: ../login.php");
exit;
}  


// Establish database connection
require("../connect.php");
// Check if the user ID is provided as a query parameter
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $user=$_SESSION["emp"];  $year=$_SESSION["year"];

    $sql="SELECT * FROM Proctor WHERE Block_Id='$userId' AND Year='$year' AND ProId='$user'";
    $proc=mysqli_query($connect,$sql);
    $procts=mysqli_fetch_assoc($proc);
    // Fetch user data from the Accounts table based on the provided user ID
    if (isset($_POST['update'])) {
    $us=$_POST["blockid"]; $pr=$_POST["proctor"]; $yr=$_POST["year"];
    $query = "UPDATE Proctor SET Block_Id = '$us', ProId='$pr', Year='$yr' WHERE Block_Id='$userId' AND Year='$year' AND ProId='$user'";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Error Deleting Proctor Assignment data: " . mysqli_error($connect));
    }
   else {
    ?>
    <script>
        window.alert("Assigned Proctor info has been Updated succesfully!")
        </script>
    <?php
   }
    // Check if the user exists
     
}
 ?>
<html>
    <head>
        <title> Modifying Proctor Assignment </title>
</head>
</body>
<form method="post" action="">
        <label> Block Id: </label>
        <input type="text" name="blockid" value="<?php echo $procts['Block_Id']; ?>"><br><br>

        <label> Proctor: </label>
        <input type="text" name="proctor" value="<?php echo $procts['ProId']; ?>"><br><br>

        <label> Year: </label>
        <input type="number" name="year" value="<?php echo $procts['Year']; ?>"><br><br>

        <input type="submit" name="update" value="Update">
</form>
<?php
} else {
    echo "Proctor or Block ID (or Both) has not provided.";
}

// Close the database connection
mysqli_close($connect);
?>
</body>    <?php include("../footer.php");  ?>
</html>