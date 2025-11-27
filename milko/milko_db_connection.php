
<?php

$host = 'localhost';
$db   = 'milko_db';  
$user = 'root';
$pass = 'Sakurakawaii;0';
$charset = 'utf8mb4';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

