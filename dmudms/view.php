<?php
 
// Start a session (if not already started)
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: login.php");
    exit;
}

require("connect.php");

// Check if the connection was successful
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Define user ID (assuming it's already available)
$user_id = $_POST["userid"];

// Fetch user data from the database
$stmt = mysqli_prepare($connect, "SELECT first_name, last_name, user_type, age, address, resource, phone, email, password FROM adduser WHERE UserId = ?");
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $first_name, $last_name, $user_type, $age, $address, $resource, $phone, $email, $password);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($connect);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <style>
        .user-attribute {
            margin-bottom: 10px;
        }
        .attribute-label {
            font-weight: bold;
        }
        .attribute-value {
            margin-left: 10px;
        }
    </style>
</head>
<body>
  
    <h2>User Details</h2>

    <div class="user-attribute">
        <span class="attribute-label">First Name:</span>
        <span class="attribute-value"><?php echo $first_name; ?></span>
    </div>

    <div class="user-attribute">
        <span class="attribute-label">Last Name:</span>
        <span class="attribute-value"><?php echo $last_name; ?></span>
    </div>

    <div class="user-attribute">
        <span class="attribute-label">User Type:</span>
        <span class="attribute-value"><?php echo $user_type; ?></span>
    </div>

    <div class="user-attribute">
        <span class="attribute-label">Age:</span>
        <span class="attribute-value"><?php echo $age; ?></span>
    </div>

    <div class="user-attribute">
        <span class="attribute-label">Address:</span>
        <span class="attribute-value"><?php echo $address; ?></span>
    </div>

    <div class="user-attribute">
        <span class="attribute-label">Resource:</span>
        <span class="attribute-value"><?php echo $resource; ?></span>
    </div>

    <div class="user-attribute">
        <span class="attribute-label">Phone:</span>
        <span class="attribute-value"><?php echo $phone; ?></span>
    </div>

    <div class="user-attribute">
        <span class="attribute-label">Email:</span>
        <span class="attribute-value"><?php echo $email; ?></span>
    </div>

    <div class="user-attribute">
        <span class="attribute-label">Password:</span>
        <span class="attribute-value"><?php echo $password; ?></span>
    </div>
    <?php } else{ ?>
          <form method="post" action="view.php">
          <input type="text" name="userid"/>
          <input type="submit" value="search"/>
      </form>
    <?php
    }
    ?>
</body>
</html>
