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
// GET ORDER ID
// ==============================
if (!isset($_GET['id'])) die("No order ID specified.");
$id = intval($_GET['id']);

// ==============================
// HANDLE FORM SUBMISSION
// ==============================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$order_id = floatval($_POST['order_id']);
	$customer_id = floatval($_POST['customer_id']);
	$total_amount = floatval($_POST['total_amount']);
    $status = $conn->real_escape_string($_POST['status']);
	
	
    $sql = "UPDATE orders SET status='$status' WHERE order_id=$id";
    if ($conn->query($sql)) {
        header("Location: MilkoDashboard.php");
        exit;
    } else {
        $error = "Error updating order: " . $conn->error;
    }
}

// ==============================
// FETCH CURRENT ORDER DATA
// ==============================
$res = $conn->query("SELECT * FROM orders WHERE order_id=$id");
if ($res->num_rows === 0) die("Order not found.");
$order = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Order</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-6">

<h1 class="text-3xl mb-4">Edit Order #<?php echo $order['order_id']; ?></h1>

<?php if(isset($error)): ?>
<p class="bg-red-700 p-2 rounded mb-4"><?php echo $error; ?></p>
<?php endif; ?>

<form method="POST" class="space-y-4 max-w-lg">
    <div>
        <label>Customer Name:</label>
        <input type="text" class="w-full p-2 rounded bg-gray-800 border border-gray-600" value="<?php echo htmlspecialchars($order['customer_id']); ?>" disabled>
    </div>
    <div>
        <label>Item Name:</label>
        <input type="text" class="w-full p-2 rounded bg-gray-800 border border-gray-600" value="<?php echo htmlspecialchars($order['order_id']); ?>" disabled>
    </div>
    <div>
        <label>Status:</label>
        <select name="status" class="w-full p-2 rounded bg-gray-800 border border-gray-600">
            <?php
            $statuses = ['Pending','Processing','Shipped','Delivered','Cancelled'];
			
            foreach($statuses as $s){
                $sel = ($order['status']==$s) ? 'selected' : '';
                echo "<option value='$s' $sel>".ucfirst($s)."</option>";
            }
            ?>
        </select>
    </div>
    <div class="space-x-2">
        <button type="submit" class="px-4 py-2 bg-blue-600 rounded">Update</button>
        <a href="MilkoDashboard.php" class="px-4 py-2 bg-gray-600 rounded">Cancel</a>
    </div>
</form>

</body>
</html>
