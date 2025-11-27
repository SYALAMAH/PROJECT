<?php
$host = 'localhost';
$db   = 'milko_db';
$user = 'root';
$pass = 'Sakurakawaii;0';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = $conn->real_escape_string($_POST['customer_id']);
    $order_id      = intval($_POST['order_id']);
    $total_amount    = floatval($_POST['total_amount']);
    $status   = $conn->real_escape_string($_POST['status']);

    $sql = "INSERT INTO orders (customer_id, order_id, total_amount, status) VALUES ('$customer_id','$order_id','$total_amount','$status')";
    if ($conn->query($sql)) {
        header("Location: MilkoDashboard.php");
        exit;
    } else {
        $error = "Error adding order: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add New Order</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-6">

<h1 class="text-3xl mb-4">Add New Order</h1>

<?php if(isset($error)): ?>
<p class="bg-red-700 p-2 rounded mb-4"><?php echo $error; ?></p>
<?php endif; ?>

<form method="POST" class="space-y-4 max-w-lg">
    <div>
        <label> Name:</label>
        <input type="text" name="customer_id" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required>
    </div>
    <div>
        <label>Quantity:</label>
        <input type="number" name="quantity" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required>
    </div>
    <div>
        <label>Total (RM):</label>
        <input type="number" step="0.01" name="total_amount" class="w-full p-2 rounded bg-gray-800 border border-gray-600" required>
    </div>
    <div>
        <label>Status:</label>
        <select name="status" class="w-full p-2 rounded bg-gray-800 border border-gray-600">
            <option value="pending">Pending</option>
            <option value="shipped">Processing</option>
			<option value="shipped">Shipped</option>
            <option value="completed">Delivered</option>
            <option value="cancelled">Cancelled</option>
        </select>
    </div>
    <div class="space-x-2">
        <button type="submit" class="px-4 py-2 bg-green-600 rounded">Add Order</button>
        <a href="orders_list.php" class="px-4 py-2 bg-gray-600 rounded">Cancel</a>
    </div>
</form>

</body>
</html>
