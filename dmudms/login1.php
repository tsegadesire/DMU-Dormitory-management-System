<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("connect.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = getUserType($connect, $username, $password);

    
    // Display the entered username and password
    echo "Entered username: " . $username . "<br>";
    echo "Entered password: " . $password . "<br>";
    if($userType!="false"){
    // Fetch the user type from the database
    echo "User type from database: " . $userType . "<br>";


    if ($userType === 'Admin') {
        // Redirect to addUser.php for admin user
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('Location: Admin/AddStaff.php');
        exit();
    } else if ($userType === 'Maintainer') {
        // Redirect to view.php for customer user
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('Location: Maintain/viewRequest.php');
        exit();
    } else if ($userType === 'ProctorManager') {
        // Redirect to view.php for customer user
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('Location: ProctorManager/proctorManager.php');
        exit();
    }else if ($userType === 'Proctor') {
        // Redirect to view.php for customer user
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('Location: proctor/viewStudents.php');
        exit();
    }else {
        // Invalid credentials or user type not found
        echo '<p class="error-message">Invalid redirection.</p>';
    }
} else {
    echo "Invalid username or password!";
}
}

function getUserType($conn, $username, $password)
{
    // Prepare the query
    $stmt = mysqli_prepare($conn, "SELECT U_Type FROM Accounts WHERE UserName = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Bind the result
    mysqli_stmt_bind_result($stmt, $uType);

    // Fetch the result
    if (mysqli_stmt_fetch($stmt)) {
        // Return the user type fetched from the database
        return $uType;
    } else {
        $uType="false";
        // Invalid credentials
        return $uType;
    }
}
if (isset($_POST['loginS'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Display the entered username and password
    echo "Entered username: " . $username . "<br>";
    echo "Entered password: " . $password . "<br>";
   
    $sql = "SELECT * FROM student WHERE StudId='$username' AND password='$password'";
    $result = mysqli_query($connect,$sql);
    // TO check that at least one row was returned 
    $rowCheck = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    $pass=$row["password"]; $user=$row["StudId"];
    echo $pass." ".$user;
    if($pass==$password && $user==$username){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('Location: Student/header.php');
        exit();   
    }
    else {
        echo "Invalid userName or password!";  }
    
}
mysqli_close($connect);
?>
<head>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <h2>Login</h2>

    <form method="post" action="login.php">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <input type="submit" name="login" value="Login As Employee "><br/><input type="submit" name="loginS" value="Login As a Student">
        </div>
    </form>
</body>

</html>