<?
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
    $user = $_SESSION["emp"];
    $year = $_SESSION["year"];

    // Check if the proctor is already assigned
    $checkSql = "SELECT * FROM Proctor WHERE Block_Id='$userId' AND ProId='$user' AND Year='$year'";
    $checkResult = mysqli_query($connect, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "Proctor is already assigned.";
    } else {
        // Check if the user exists in the accounts table
        $userSql = "SELECT * FROM accounts WHERE UserName='$user'";
        $userResult = mysqli_query($connect, $userSql);

        if (mysqli_num_rows($userResult) > 0) {
            // User already exists, update the U_Type to "Proctor"
            $updateSql = "UPDATE accounts SET U_Type='Proctor' WHERE UserName='$user'";
            $updateResult = mysqli_query($connect, $updateSql);

            if ($updateResult) {
                echo "Proctor assigned successfully!";
            } else {
                echo "Error updating account type: " . mysqli_error($connect);
            }
        } else {
            // User doesn't exist, insert a new row with U_Type as "Proctor"
            
            echo "<form method='POST' action=''>";
            echo "<label> Office Block </label>";
            echo "<input type='text' name='block' required pattern/>";

            echo "<label> Office Room </label>";
            echo " <input type='text' name='room' required pattern/>";

            echo "<input type='submit' name='submit'/>";
            echo "</form>";
            
            if(isset($POST["submit"])){
                $status="Active";
                $pass=$user."ABCD";
                $block=$_POST["block"];
                $room=$_POST["room"];
                $type="Proctor";
              $insertSql = "INSERT INTO accounts (UserName, U_Type,Status,password,OfficeBlockId,OfficeBlockNo) VALUES ('$user', '$type','$status','$pass','$block','$room')";
              $insertResult = mysqli_query($connect, $insertSql);

            if ($insertResult) {
                echo "Proctor account created successfully.";
            } else {
                echo "Error creating proctor account: " . mysqli_error($connect);
            }   
            }
           
        }
        // Insert proctor into the Proctor table
        $insertSql = "INSERT INTO Proctor(Block_Id, ProId, Year) VALUES ('$userId', '$user', '$year')";
        $insertResult = mysqli_query($connect, $insertSql);

        if (!$insertResult) {
            echo "Error assigning proctor: " . mysqli_error($connect);
        }
    }
} else {
    echo "Proctor or Block ID (or both) has not been provided.";
}

// Close the database connection
mysqli_close($connect);
?>
</body>
<?php include("../footer.php");  ?>
</html>
