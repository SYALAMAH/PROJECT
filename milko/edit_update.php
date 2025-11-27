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
// GET THE UPDATE ID
// ==============================
if (!isset($_GET['id'])) {
    die("No update ID specified.");
}
$id = intval($_GET['id']);

// ==============================
// HANDLE FORM SUBMISSION
// ==============================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
	$image_url = $conn->real_escape_string($_POST['image_url']);
    $link = $conn->real_escape_string($_POST['link']);

    $sql = "UPDATE updates SET title='$title', description='$description', image_url='$link', link='$link' WHERE id=$id";
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
$res = $conn->query("SELECT * FROM updates WHERE id=$id");
if ($res->num_rows === 0) {
    die("Update not found.");
}
$update = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Update</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-6">

<h1 class="text-3xl mb-4">Edit Update</h1>

<?php if (isset($error)): ?>
<p class="bg-red-700 p-2 rounded mb-4"><?php echo $error; ?></p>
<?php endif; ?>

<form method="POST" class="space-y-4 max-w-lg">
    <div>
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($update['title']); ?>" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required>
    </div>
    <div>
        <label>Description:</label>
        <textarea name="description" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required><?php echo htmlspecialchars($update['description']); ?></textarea>
    </div>
	<div>
        <label>Image URL:</label>
        <textarea name="image_url" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required><?php echo htmlspecialchars($update['image_url']); ?></textarea>
    </div>
    <div>
        <label>Link:</label>
        <input type="text" name="link" value="<?php echo htmlspecialchars($update['link']); ?>" class="w-full p-2 rounded bg-gray-800 border border-gray-600">
    </div>
    <div class="space-x-2">
        <button type="submit" class="px-4 py-2 bg-blue-600 rounded">Update</button>
        <a href="MilkoDashboard.php" class="px-4 py-2 bg-gray-600 rounded">Cancel</a>
    </div>
</form>

</body>
</html>
