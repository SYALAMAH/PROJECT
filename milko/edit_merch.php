<?php
// ==============================
// DATABASE CONNECTION
// ==============================
$host = 'localhost';
$db   = 'milko_db';
$user = 'root';
$pass = 'Sakurakawaii;0';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ==============================
// GET THE ITEM ID
// ==============================
if (!isset($_GET['id'])) {
    die("No merchandise ID specified.");
}
$id = intval($_GET['id']);

// ==============================
// HANDLE FORM SUBMISSION
// ==============================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_name = $conn->real_escape_string($_POST['item_name']);
	$game_title = $conn->real_escape_string($_POST['game_title']);
	$character_featured = $conn->real_escape_string($_POST['character_featured']);
    $category = $conn->real_escape_string($_POST['category']);
    $price_rm = floatval($_POST['price_rm']);
	$image_url = $conn->real_escape_string($_POST['image_url']);
    $stock_quantity = intval($_POST['stock_quantity']);

    $sql = "UPDATE merchandise_items 
            SET item_name='$item_name', game_title='$game_title', character_featured='$character_featured', category='$category', price_rm=$price_rm, stock_quantity=$stock_quantity, image_url='$image_url' 
            WHERE item_id=$id";
    if ($conn->query($sql)) {
        header("Location: MilkoDashboard.php");
        exit;
    } else {
        $error = "Error updating record: " . $conn->error;
    }
}

// ==============================
// FETCH CURRENT DATA
// ==============================
$res = $conn->query("SELECT * FROM merchandise_items WHERE item_id=$id");
if ($res->num_rows === 0) {
    die("Merchandise item not found.");
}
$item = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Merchandise</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-6">

<h1 class="text-3xl mb-4">Edit Merchandise Item</h1>

<?php if (isset($error)): ?>
<p class="bg-red-700 p-2 rounded mb-4"><?php echo $error; ?></p>
<?php endif; ?>

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

</body>
</html>
