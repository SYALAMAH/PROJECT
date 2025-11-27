<?php
$host = 'localhost';
$db   = 'milko_db';
$user = 'root';
$pass = 'Sakurakawaii;0';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['item_name']);
	$game_title = $conn->real_escape_string($_POST['game_title']);
	$character_featured = $conn->real_escape_string($_POST['character_featured']);
    $category = $conn->real_escape_string($_POST['category']);
    $price_rm = floatval($_POST['price_rm']);
	$image_url = $conn->real_escape_string($_POST['image_url']);
    $stock_quantity = intval($_POST['stock_quantity']);

    $sql = "INSERT INTO merchandise_items (item_name,game_title, character_featured, category, price_rm,image_url, stock_quantity) 
            VALUES ('$name','$game_title','$character_featured', '$category', $price_rm,'$image_url', $stock_quantity)";
    if ($conn->query($sql)) header("Location: MilkoDashboard.php");
    else $error = "Error adding merchandise: " . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Merchandise Item</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-6">
<h1 class="text-3xl mb-4">Add Merchandise Item</h1>

<?php if (isset($error)) echo "<p class='bg-red-700 p-2 rounded mb-4'>$error</p>"; ?>

<form method="POST" class="space-y-4 max-w-lg">
    <div>
        <label>Name:</label>
        <input type="text" name="item_name" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required>
    </div>
	<label>Game Title:</label>
        <input type="text" name="game_title" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required>
    </div>
	<label>Character:</label>
        <input type="text" name="character_featured" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required>
    </div>
    <div>
        <label>Category:</label>
        <input type="text" name="category" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required>
    </div>
	 <div>
        <label>Image:</label>
        <input type="text" name="image_url" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required>
    </div>
    <div>
        <label>Price (RM):</label>
        <input type="number" step="0.01" name="price_rm" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required>
    </div>
    <div>
        <label>Stock:</label>
        <input type="number" name="stock_quantity" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required>
    </div>
    <div class="space-x-2">
        <button type="submit" class="px-4 py-2 bg-green-600 rounded">Add</button>
        <a href="MilkoDashboard.php" class="px-4 py-2 bg-gray-600 rounded">Cancel</a>
    </div>
</form>
</body>
</html>
