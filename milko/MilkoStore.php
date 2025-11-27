<?php
include 'header.php';
// =========================================================================
// 1. DATABASE CONFIGURATION AND CONNECTION
// =========================================================================
$host = 'localhost';
$db   = 'milko_db';
$user = 'root';
$pass = 'Sakurakawaii;0';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES    => false,
];

$connectionError = null; 
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     $connectionError = "Database connection failed! PDO Error: " . htmlspecialchars($e->getMessage());
     $pdo = null;
}

// =========================================================================
// 2. DATA FETCHING FUNCTION
// =========================================================================
function getMerchandiseItems($pdo) {
    if (!$pdo) return [];
    try {
        $stmt = $pdo->query('SELECT * FROM merchandise_items');
        return $stmt->fetchAll();
    } catch (\PDOException $e) {
        error_log("Error fetching merchandise: " . $e->getMessage());
        return [];
    }
}

$merchItems = getMerchandiseItems($pdo);

// =========================================================================
// 3. HANDLE ADD TO CART
// =========================================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $id = $_POST['item_id'];
    $name = $_POST['item_name'];
    $price = $_POST['price'];

    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += 1;
    } else {
        $_SESSION['cart'][$id] = ['name'=>$name, 'price'=>$price, 'qty'=>1];
    }

    header("Location: MilkoStore.php");
    exit;
}

// =========================================================================
// 4. CART COUNT
// =========================================================================
$cartCount = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'qty')) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MilkoStore</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                'accent-1': '#7b2ff7',
                'accent-2': '#1e90ff',
                'accent-3': '#ff6ec7',
            }
        }
    }
}
</script>
<style>
body {
    font-family: 'Inter', sans-serif;
    min-height: 100vh;
    margin: 0;
    background-color: #030816;
    color: #F3F6FF;
    background-image:
        radial-gradient(at 0% 100%, #1A1A52 0%, transparent 40%),
        radial-gradient(at 100% 0%, #3B1C5A 0%, transparent 40%);
    background-attachment: fixed;
    overflow-x: hidden;
}
.header-bg {
    background: linear-gradient(to left, #1a2342, #111c31, #2b3263, #2a3554, #525185);
}
.menu { text-decoration: none; color: #F3F6FF; font-size: 18px; font-weight: bold; letter-spacing: 0.5px; padding: 10px 18px; border-radius: 9999px; transition: all 0.4s ease; display: inline-block; }
.menu:hover { background: linear-gradient(45deg, #7b2ff7, #1e90ff, #ff6ec7); color: #fff; box-shadow: 0 0 15px #7b2ff7, 0 0 30px #1e90ff, 0 0 45px #ff6ec7; transform: scale(1.05); }
.active-menu { background: linear-gradient(45deg, #a56eff, #3a0ca3, #00d4ff); color: #fff; box-shadow: 0 0 20px #a56eff, 0 0 35px #00d4ff; }
.login-icon-img { width: 45px; height: 45px; border-radius: 50%; box-shadow: 0 0 15px #a86df7, 0 0 25px #feca57; transition: all 0.4s ease; cursor: pointer; object-fit: cover; border: 2px solid transparent; }
.login-icon-img:hover { transform: scale(1.1); box-shadow: 0 0 25px #ff80ff, 0 0 40px #feca57; border-color: #ff6ec7; }
.banner { position: relative; width: 100%; height: 300px; background-image:url("imej/banner.jpg"); background-size: cover; background-position: center; display: flex; justify-content: center; align-items: center; color: #ffffff; text-align: center; font-family: 'Segoe UI', sans-serif; letter-spacing: 2px; }
.banner::after { content: ""; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.45); }
.banner h1 { position: relative; font-size: 50px; z-index: 2; text-shadow: 0 0 15px #a56eff, 0 0 30px #00d4ff; }
</style>
</head>
<body class="min-h-screen">



<div class="banner">
<h1>Official Merchandise Store</h1>
</div>

<!-- MERCH LIST -->
<div class="container mx-auto p-4 md:p-8 lg:p-12">
<h2 class="text-3xl font-extrabold text-center text-white mb-8 md:mb-12">Merchandise</h2>
<div id="merch-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

<?php if ($connectionError): ?>
<p class="text-center text-red-400 col-span-full py-10 border border-red-500 p-4 rounded-lg bg-red-900/30">
    <?php echo $connectionError; ?>
</p>
<?php elseif (empty($merchItems)): ?>
<p class="text-center text-gray-500 col-span-full py-4">No merchandise found.</p>
<?php else: ?>
<?php foreach ($merchItems as $item): 
$itemName = htmlspecialchars($item['item_name']);
$gameTitle = htmlspecialchars($item['game_title']);
$character = htmlspecialchars($item['character_featured']);
$category = htmlspecialchars($item['category']);
$imageUrl = htmlspecialchars($item['image_url']);
$price = number_format((float)$item['price_rm'], 2);
$stock = (int)$item['stock_quantity'];
$inStock = $stock > 0;
$stockClass = $inStock ? 'bg-green-600/20 text-green-300' : 'bg-red-600/20 text-red-300';
$buttonClass = $inStock ? 'bg-accent-1 hover:bg-accent-2 transform hover:scale-105' : 'bg-gray-600 cursor-not-allowed';
$buttonText = $inStock ? 'Add to Cart' : 'Notify Me';
$buttonDisabled = $inStock ? '' : 'disabled';
?>
<div class="bg-gray-800/50 backdrop-blur-sm p-4 rounded-xl shadow-2xl transition-all duration-300 hover:shadow-[0_0_30px_#1e90ff] flex flex-col space-y-3 transform hover:scale-[1.02] border border-gray-700/50">
<img src="<?php echo $imageUrl; ?>" alt="<?php echo $itemName; ?>" class="w-full h-48 object-cover rounded-lg mb-2 border-2 border-transparent hover:border-accent-2 transition-colors" onerror="this.onerror=null;this.src='https://placehold.co/400x400/3B1C5A/F3F6FF?text=No+Image'" />
<h3 class="text-xl font-bold text-white leading-tight"><?php echo $itemName; ?></h3>
<p class="text-sm text-gray-400">
    <span class="font-semibold text-accent-3"><?php echo $gameTitle; ?></span> • <?php echo $character; ?> • <?php echo $category; ?>
</p>
<div class="flex justify-between items-center pt-2 border-t border-gray-700 mt-2">
    <span class="text-2xl font-extrabold text-green-400">RM<?php echo $price; ?></span>
    <span class="text-xs font-semibold px-2 py-1 rounded-full <?php echo $stockClass; ?>">
        <?php echo $inStock ? "In Stock ($stock)" : 'Sold Out'; ?>
    </span>
</div>

<!-- ADD TO CART FORM -->
<form method="POST" action="MilkoStore.php">
    <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
    <input type="hidden" name="item_name" value="<?php echo $itemName; ?>">
    <input type="hidden" name="price" value="<?php echo $price; ?>">
    <button type="submit" name="add_to_cart" class="w-full py-2 rounded-lg font-bold text-white mt-3 shadow-lg transition-transform duration-200 <?php echo $buttonClass; ?>" <?php echo $buttonDisabled; ?>>
        <?php echo $buttonText; ?>
    </button>
</form>
</div>
<?php endforeach; ?>
<?php endif; ?>

</div>
</div>


<?php include 'footer.php'; ?>
</body>

</html>
