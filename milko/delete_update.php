<?php
$host = 'localhost'; $db = 'milko_db'; $user='root'; $pass='Sakurakawaii;0';
$conn = new mysqli($host,$user,$pass,$db);
if($conn->connect_error) die("Connection failed");

if(!isset($_GET['id'])) die("No ID specified");
$id = intval($_GET['id']);

$conn->query("DELETE FROM updates WHERE id=$id");
header("Location: MilkoDashboard.php");
exit;
