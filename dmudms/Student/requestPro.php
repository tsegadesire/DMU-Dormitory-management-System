<?php
session_start();  include("header.php"); 
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header("Location: ../login.php");
    exit;
}
// Assuming you have a database connection established
include("../connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the StudId from the session
      $studId = $_SESSION['username'];
      $info1 = $_POST["Info1"];
      $info2 = $_POST["Info2"];
      $info3 = $_POST["Info3"];
      $color1 = $_POST['color1'];
      $color2 = $_POST['color2'];
      $color3 = $_POST['color3'];
      $type1 = $_POST['type1'];
      $type2 = $_POST['type2'];
      $type3 = $_POST['type3'];
      $date = $_POST['date'];
      $status = 'inactive'; // Assuming the default status is inactive
      $sep=",";
    $information=$info1.$sep.$info2.$sep.$info3; 
    $color=$color1.$sep.$color2.$sep.$color3; 
    $type=$type1.$sep.$type2.$sep.$type3;  
?>
<script> window.alert("Is Those yours( <?php  echo $information.$sep.$color.$sep.$type;  ?>)?");  </script>
<?php
    // Insert the maintenance request into the Maintain table
    $query = "INSERT INTO Property (Studid, reqDate, Properties, Color,Number, Status) VALUES ('$studId', '$date', '$type', '$color', '$information', '$status')";
    $result = mysqli_query($connect, $query);
    // Redirect to a success page or display a success message
    if($result){
       echo "You have successfully ask a Request";
    header('Location: header.php');
    exit();  
    }
    else {
        echo "An Error occured!";
    }
   
}
?>
<!DOCTYPE html>

<head>
    <title> Submit Property Ownering REquest </title>
    <link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
    <!-- The HTML form to submit a maintenance request -->
    <div class="form-container">
        <form method="POST" action="">
            <label for="date"> Request Date:</label>
            <input type="date" name="date" id="date" required><br>
            <table>
                <tr>
                    <th> Name </th>
                    <th> Color </th>
                    <th> Number </th>  
                </tr> 
                <tr>
                   <td><input type="text" name="type1" id="type1" required></td> 
                    <td><input type="text" name="color1" id="color1" required></td>
                    <td><input type="number" name="Info1" id="Info1" required></td>
                </tr>
                    <td><input type="text" name="type2" id="type2"></td> 
                    <td><input type="text" name="color2" id="color2"></td>
                    <td><input type="number" name="Info2" id="Info2"></td>
                </tr>
                <tr> 
                    <td><input type="text" name="type3" id="type3"></td> 
                    <td><input type="text" name="color3" id="color3"></td>
                    <td><input type="number" name="Info3" id="Info3"></td>
                </tr>
            </table>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>