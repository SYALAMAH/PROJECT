<?php
// ==============================
// DATABASE CONNECTION (MySQLi)
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
// FETCH DASHBOARD STATS
// ==============================
$dashboardData = [
    'totalOrders' => 0,
    'totalCustomers' => 0,
    'totalProducts' => 0,
    'totalCategories' => 0,
    'totalRevenue' => 0.00,
];

// Total Orders
$res = $conn->query("SELECT COUNT(*) AS count FROM Orders");
$dashboardData['totalOrders'] = $res->fetch_assoc()['count'] ?? 0;

// Total Customers
$res = $conn->query("SELECT COUNT(*) AS count FROM Customers");
$dashboardData['totalCustomers'] = $res->fetch_assoc()['count'] ?? 0;

// Total Merchandise Items
$res = $conn->query("SELECT COUNT(*) AS count FROM merchandise_items");
$dashboardData['totalProducts'] = $res->fetch_assoc()['count'] ?? 0;

// Total Categories
$res = $conn->query("SELECT COUNT(DISTINCT category) AS count FROM merchandise_items");
$dashboardData['totalCategories'] = $res->fetch_assoc()['count'] ?? 0;

// Total Revenue
$res = $conn->query("SELECT SUM(total_amount) AS sum FROM Orders");
$dashboardData['totalRevenue'] = $res->fetch_assoc()['sum'] ?? 0.00;

// ==============================
// FETCH UPDATES LIST
// ==============================
$updates = [];
$res = $conn->query("SELECT * FROM updates ORDER BY created_at DESC");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $updates[] = $row;
    }
}

// ==============================
// FETCH MERCHANDISE LIST
// ==============================
$merchandise = [];
$res = $conn->query("SELECT * FROM merchandise_items ORDER BY item_id DESC");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $merchandise[] = $row;
    }
}

// ==============================
// HELPER FUNCTION
// ==============================
function formatCurrency($amount) {
    return 'RM ' . number_format((float)$amount, 2, '.', ',');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Milko - Galaxy Merch Dashboard</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
body { font-family: 'Inter', sans-serif; background-color:#030816;color:#E0E7FF; }
.galaxy-card { background: rgba(14,21,56,0.6); border:1px solid rgba(50,60,100,0.4); backdrop-filter:blur(8px); box-shadow:0 4px 30px rgba(0,0,0,0.5); transition:all 0.3s; padding:1rem; border-radius:1rem; }
.galaxy-card:hover { transform: translateY(-2px); box-shadow:0 6px 35px rgba(0,0,0,0.6); }
.title-gradient { background-image: linear-gradient(90deg,#00d4ff,#ff6ec7); -webkit-background-clip:text; color:transparent; }
</style>
</head>
<body class="min-h-screen">

<header class="flex justify-between items-center p-4 bg-gradient-to-r from-blue-900 via-indigo-900 to-purple-900 sticky top-0 z-10">
<h1 class="text-3xl font-bold title-gradient">Milko Dashboard</h1>
<nav class="flex space-x-4">
<a href="index.php" class="text-white font-medium">Shop Home</a>
<a href="login.php" class="px-4 py-2 rounded-lg text-white font-medium bg-gradient-to-r from-pink-500 to-purple-700">Logout</a>
</nav>
</header>

<main class="max-w-7xl mx-auto p-4 space-y-8">

<!-- KPI Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="galaxy-card">
        <p>Total Orders</p>
        <h3 class="text-3xl font-bold"><?php echo $dashboardData['totalOrders']; ?></h3>
    </div>
    <div class="galaxy-card">
        <p>Total Revenue</p>
        <h3 class="text-3xl font-bold"><?php echo formatCurrency($dashboardData['totalRevenue']); ?></h3>
    </div>
    <div class="galaxy-card">
        <p>Customer Users</p>
        <h3 class="text-3xl font-bold"><?php echo $dashboardData['totalCustomers']; ?></h3>
    </div>

    <div class="galaxy-card">
        <p>Total Merchandise Items</p>
        <h3 class="text-3xl font-bold"><?php echo $dashboardData['totalProducts']; ?></h3>
        <p><?php echo $dashboardData['totalCategories']; ?> Categories</p>
    </div>
</div>
	
	
	<!-- Manage Customer Orders -->
<div class="galaxy-card">
<h2 class="text-2xl font-bold mb-4">
    Manage Customer Orders 
</h2>

<table class="min-w-full bg-gray-800 text-white rounded">
<thead>
<tr class="text-left border-b border-gray-700">
<th class="px-4 py-2">Order ID</th>
<th class="px-4 py-2">Customer</th>
<th class="px-4 py-2">Total</th>
<th class="px-4 py-2">Status</th>
<th class="px-4 py-2">Actions</th>
</tr>
</thead>
<tbody>

<?php 
$orderList = $conn->query("SELECT * FROM orders ORDER BY order_id DESC");
while ($order = $orderList->fetch_assoc()): 
?>
<tr class="border-b border-gray-700">
    <td class="px-4 py-2"><?php echo $order['order_id']; ?></td>
    <td class="px-4 py-2"><?php echo $order['customer_id']; ?></td>
    <td class="px-4 py-2">RM <?php echo number_format($order['total_amount'], 2); ?></td>
    <td class="px-4 py-2"><?php echo $order['status']; ?></td>
    <td class="px-4 py-2">
        <a href="edit_order.php?id=<?php echo $order['order_id']; ?>" class="text-blue-400">Edit</a>
        <a href="delete_order.php?id=<?php echo $order['order_id']; ?>" class="text-red-500">Delete</a>
    </td>
</tr>
<?php endwhile; ?>

</tbody>
</table>
</div>


<!-- Manage Updates -->
<div class="galaxy-card">
<h2 class="text-2xl font-bold mb-4">Manage Updates <a href="add_update.php" class="ml-4 px-3 py-1 text-white bg-green-600 rounded">+ Add</a></h2>
<table class="min-w-full bg-gray-800 text-white rounded">
<thead>
<tr class="text-left border-b border-gray-700">
<th class="px-4 py-2">ID</th>
<th class="px-4 py-2">Title</th>
<th class="px-4 py-2">Description</th>
<th class="px-4 py-2">Link</th>
<th class="px-4 py-2">Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($updates as $u): ?>
<tr class="border-b border-gray-700">
<td class="px-4 py-2"><?php echo $u['id']; ?></td>
<td class="px-4 py-2"><?php echo $u['title']; ?></td>
<td class="px-4 py-2"><?php echo $u['description']; ?></td>
<td class="px-4 py-2"><a href="<?php echo $u['link']; ?>" class="underline" target="_blank">View</a></td>
<td class="px-4 py-2 space-x-2">
<a href="edit_update.php?id=<?php echo $u['id']; ?>" class="text-blue-400">Edit</a>
<a href="delete_update.php?id=<?php echo $u['id']; ?>" class="text-red-500">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

<!-- Manage Merchandise -->
<div class="galaxy-card">
<h2 class="text-2xl font-bold mb-4">Manage Merchandise <a href="add_merch.php" class="ml-4 px-3 py-1 text-white bg-green-600 rounded">+ Add</a></h2>
<table class="min-w-full bg-gray-800 text-white rounded">
<thead>
<tr class="text-left border-b border-gray-700">
<th class="px-4 py-2">ID</th>
<th class="px-4 py-2">Name</th>
<th class="px-4 py-2">Category</th>
<th class="px-4 py-2">Price</th>
<th class="px-4 py-2">Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($merchandise as $m): ?>
<tr class="border-b border-gray-700">
<td class="px-4 py-2"><?php echo $m['item_id']; ?></td>
<td class="px-4 py-2"><?php echo $m['item_name']; ?></td>
<td class="px-4 py-2"><?php echo $m['category']; ?></td>
<td class="px-4 py-2"><?php echo formatCurrency($m['price_rm']); ?></td>
<td class="px-4 py-2 space-x-2">
<a href="edit_merch.php?id=<?php echo $m['item_id']; ?>" class="text-blue-400">Edit</a>
<a href="delete_merch.php?id=<?php echo $m['item_id']; ?>" class="text-red-500">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

</main>
</body>
</html>
