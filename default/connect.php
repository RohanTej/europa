<?php
$servername = "localhost";  //leave it default
$username = "admin";  //check your c_panel for SQL user data and password
$password = "password";
$dbname = "user_accounts"; //create your own database and change the name here

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?> 