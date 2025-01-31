<?php
include("header.php");
require("connect.php");
if(isset($_POST["submit"])){
    $empId=$_POST["id"];
    $lname=$_POST["lname"];
    $phone=$_POST["phone"];

    $sql="SELECT * FROM accounts,staff WHERE UserName=EmpId AND UserName='$empId' AND last_name='$lname' AND phone='$phone'";
    $excu=mysqli_query($connect,$sql);
    if(mysqli_num_rows($excu)>0){
        $pass=mysqli_fetch_assoc($excu);
        $password=$pass["password"];
        echo "Your password is <span style='color: Black; padding: 3px; font-size: 20px; background-color: gold;'>$password</span> Keep It Secure!";
    }
    else{
        echo "An Error Occured while Forgot Please Insert Valid data To forgot!";
    }
}
?>
<html>
    <head>
        <title> forgot password</title>
</head>
<body>
<h2> Forgot Password </h2>
    <form action="" method="post">
        <label>Emp Id:</label>
        <input type="text" name="id" required><br><br>

        <label>Last Name:</label>
        <input type="text" name="lname" required><br><br>

        <label>Phone:</label>
        <input type="number" name="phone" pattern="[0-9].{10,}" required><br><br>

        <input type="submit" name="submit" value="Forgot">
        <input type="reset" name="clear" value="Cancel">
    </form>
</body>
</html>