<?php
// Define your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dmudorm";

// Create a database connection
$connect = mysqli_connect($servername, $username, $password, $dbname);
if (!$connect) {
    ?>
    <script>  window.alert("   <?php echo 'couldn\'t connect'; ?>  ");</script>
    <?php
} else { ?>
    <script>
        window.alert(" <?php echo 'connected succesfully'; ?> ");
    </script>
    <?php
}
?>