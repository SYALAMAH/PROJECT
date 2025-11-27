<?php
$host = 'localhost';
$db   = 'milko_db';
$user = 'root';
$pass = 'Sakurakawaii;0';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
	$image_url = $conn->real_escape_string($_POST['image_url']);
    $link = $conn->real_escape_string($_POST['link']);

    $sql = "INSERT INTO updates (title, description, link) VALUES ('$title', '$description', '$image_url', '$link')";
    if ($conn->query($sql)) header("Location: MilkoDashboard.php");
    else $error = "Error adding update: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Update</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-6">
<h1 class="text-3xl mb-4">Add New Update</h1>

<?php if (isset($error)) echo "<p class='bg-red-700 p-2 rounded mb-4'>$error</p>"; ?>

<form method="POST" class="space-y-4 max-w-lg">
    <div>
        <label>Title:</label>
        <input type="text" name="title" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required>
    </div>
    <div>
        <label>Description:</label>
        <textarea name="description" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required></textarea>
    </div>
	<div>
        <label>Image URL:</label>
        <input type="text" name="image_url" class="w-full p-2 rounded bg-gray-800 border border-gray-600">
    </div>
    <div>
        <label>Link:</label>
        <input type="text" name="link" class="w-full p-2 rounded bg-gray-800 border border-gray-600">
    </div>
    <div class="space-x-2">
        <button type="submit" class="px-4 py-2 bg-green-600 rounded">Add</button>
        <a href="MilkoDashboard.php" class="px-4 py-2 bg-gray-600 rounded">Cancel</a>
    </div>
</form>
</body>
</html>
