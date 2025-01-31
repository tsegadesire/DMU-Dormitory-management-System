<?php
include("header.php");
// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: ../login.php");
    exit;
}  

require("../connect.php");

// Check if the connection was successful
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define variables to store user input
$userId = $first_name = $middleName = $last_name = $email = $phone = $address = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $userId = sanitizeInput($_POST["userId"]);
    $first_name = sanitizeInput($_POST["first_name"]);
    $middleName = sanitizeInput($_POST["middleName"]);
    $last_name = sanitizeInput($_POST["last_name"]);
    $email = sanitizeInput($_POST["email"]);
    $phone = sanitizeInput($_POST["phone"]);
    $address = sanitizeInput($_POST["address"]);
    $sex = sanitizeInput($_POST["sex"]);
    
    // Prepare and execute the SQL statements
    $staffQuery = "INSERT INTO Staff (EmpId, first_name, middleName, last_name, Email, phone, address, Sex) VALUES ('$userId', '$first_name', '$middleName', '$last_name', '$email', '$phone', '$address', '$sex')";
    $accountsQuery = "INSERT INTO accounts (UserName, U_Type, Photo, Status) VALUES ('$userId', 'Emp', '', 'Active')";
    
    // Execute the queries
    if (mysqli_query($connect, $staffQuery) && mysqli_query($connect, $accountsQuery)) {
        $success_message = "User registration successful.";
    } else {
        $error_message = "Error: " . mysqli_error($connect);
    }
}

// Function to sanitize user input
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Employee Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div class="container">
        <div class="form-wrapper">
            <h2>Employee Registration</h2>

            <?php if (isset($success_message)) { ?>
                <p class="success-message">
                    <?php echo $success_message; ?>
                </p>
            <?php } ?>

            <?php if (isset($error_message)) { ?>
                <p class="error-message">
                    <?php echo $error_message; ?>
                </p>
            <?php } ?>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="userId">User ID:</label>
                <input type="text" name="userId" required>

                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" required>

                <label for="middleName">Middle Name:</label>
                <input type="text" name="middleName">

                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" required>

                <label for="email">Email:</label>
                <input type="email" name="email" required>

                <label for="phone">Phone:</label>
                <input type="text" name="phone" required>

                <label for="address">Address:</label>
                <input type="text" name="address" required>

                <label for="sex">Sex:</label>
                <input type="text" name="sex" required>

                <input type="submit" value="Register">
            </form>
        </div>
    </div>
    <footer style="width:100%; background-color: blue; position: sticky; bottom: 0px;">
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>
