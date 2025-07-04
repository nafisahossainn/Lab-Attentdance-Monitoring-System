<?php

$servername = "localhost"; 
$username = "u729545666_nafisa";        
$password = "Nafisa@99N";            
$dbname = "u729545666_nafisa"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
