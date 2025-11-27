<?php

include 'header.php';

// --- 1. DATABASE CONNECTION ---
$host = 'localhost';
$db   = 'milko_db';
$user = 'root';
$pass = 'Sakurakawaii;0';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// --- 2. INITIALIZE CART ---
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// --- 3. HANDLE CART ACTIONS ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $item_id = filter_input(INPUT_POST, 'item_id', FILTER_SANITIZE_NUMBER_INT);
    $action = $_POST['action'];

    if ($item_id && isset($_SESSION['cart'][$item_id])) {
        if ($action === 'update' && isset($_POST['quantity'])) {
            $quantity = max(0, (int)$_POST['quantity']);
            if ($quantity > 0) {
                $_SESSION['cart'][$item_id]['qty'] = $quantity;
            } else {
                unset($_SESSION['cart'][$item_id]);
            }
        } elseif ($action === 'remove') {
            unset($_SESSION['cart'][$item_id]);
        }
        header('Location: cart.php');
        exit();
    }
}

// --- 4. FETCH CART ITEMS FROM DATABASE ---
$cart_items = [];
$subtotal = 0;
$cart_count = 0;

if (!empty($_SESSION['cart'])) {
    $ids = array_keys($_SESSION['cart']);
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $stmt = $pdo->prepare("SELECT item_id, item_name, price_rm, image_url FROM merchandise_items WHERE item_id IN ($placeholders)");
    $stmt->execute($ids);
    $items_from_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($items_from_db as $item) {
        $id = $item['item_id'];
        $qty = $_SESSION['cart'][$id]['qty'] ?? 1;
        $cart_items[$id] = [
            'item_id' => $id,
            'item_name' => $item['item_name'],
            'price_rm' => $item['price_rm'],
            'image_url' => $item['image_url'],
            'qty' => $qty
        ];
        $subtotal += $item['price_rm'] * $qty;
        $cart_count += $qty;
    }
}

// --- 5. CALCULATE TAX, SHIPPING, GRAND TOTAL ---
$tax_rate = 0.06;
$shipping_cost = (!empty($cart_items)) ? 15.00 : 0.00;
$tax = $subtotal * $tax_rate;
$grand_total = $subtotal + $tax + $shipping_cost;

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MilkoStore | Cart</title>
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                'accent-1': '#7b2ff7',
                'accent-2': '#1e90ff',
                'accent-3': '#ff6ec7',
                'dark-bg': '#030816',
                'dark-card': '#1e1f2e',
            },
        }
    }
}
</script>
	<style>
        /* BASE STYLES & BACKGROUND */
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            margin: 0;
            background-color: #030816; /* Deep dark blue */
            color: #F3F6FF;
            background-image:
                radial-gradient(at 0% 100%, #1A1A52 0%, transparent 40%),
                radial-gradient(at 100% 0%, #3B1C5A 0%, transparent 40%);
            background-attachment: fixed;
            overflow-x: hidden;
        }

        /* CUSTOM NAVIGATION STYLES */
        .header-bg {
           
            background: linear-gradient(to left, #1a2342, #111c31, #2b3263, #2a3554, #525185);
        }
        
        /* Menu Links */
        .menu {
            text-decoration: none;
            color: #F3F6FF;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 0.5px;
            padding: 10px 18px;
            border-radius: 9999px; /* Full circle/pill */
            transition: all 0.4s ease;
            display: inline-block;
        }
        .menu:hover {
            background: linear-gradient(45deg, #7b2ff7, #1e90ff, #ff6ec7);
            color: #fff;
            box-shadow: 0 0 15px #7b2ff7, 0 0 30px #1e90ff, 0 0 45px #ff6ec7;
            transform: scale(1.05);
        }
        .active-menu {
            background: linear-gradient(45deg, #a56eff, #3a0ca3, #00d4ff);
            color: #fff;
            box-shadow: 0 0 20px #a56eff, 0 0 35px #00d4ff;
        }

        /* Login Icon */
        .login-icon-img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            box-shadow: 0 0 15px #a86df7, 0 0 25px #feca57;
            transition: all 0.4s ease;
            cursor: pointer;
            object-fit: cover;
            border: 2px solid transparent;
        }
        .login-icon-img:hover {
            transform: scale(1.1);
            box-shadow: 0 0 25px #ff80ff, 0 0 40px #feca57;
            border-color: #ff6ec7;
        }
        
        /* White Wrapper for Sections */
        .content-section-wrapper {
            background-color: #ffffff;
            color: #1f2937; /* Dark text for the white area */
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3); /* Lift the white section off the dark background */
        }

        /* Styles for cards inside the white wrapper (used by both Products and Update) */
        .light-card {
            background-color: #f7f7f7; /* Slight off-white for depth */
            border: 1px solid #e5e7eb;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        .light-card:hover {
              transform: translateY(-4px);
              box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        /* Title Gradient */
        .title-gradient {
            background-image: linear-gradient(45deg, #ff6ec7, #00d4ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        
    </style>
</head>
<body class="bg-dark-bg text-white font-sans min-h-screen flex flex-col">

<!-- HEADER -->


<!-- MAIN CONTENT -->
<main class="max-w-7xl mx-auto p-4 lg:p-8 flex-grow w-full">
<h1 class="text-3xl font-extrabold mb-8 text-center text-accent-1">Your Cart</h1>

<?php if(empty($cart_items)): ?>
    <div class="text-center text-gray-400">Your cart is empty. Add some items to see them here!</div>
<?php else: ?>
<div class="flex flex-col lg:flex-row gap-8">

    <!-- LEFT: CART ITEMS -->
    <div class="w-full lg:w-2/3 space-y-4">
        <?php foreach($cart_items as $id => $item): ?>
        <div class="flex items-center bg-dark-card rounded-xl p-4 gap-4 border border-gray-700">
            <img src="<?php echo htmlspecialchars($item['image_url'] ?? 'https://placehold.co/100x100/1e1f2e/ffffff?text=Img'); ?>" 
                 alt="<?php echo htmlspecialchars($item['item_name']); ?>" 
                 class="w-24 h-24 object-cover rounded-lg">
            <div class="flex-1">
                <h3 class="text-lg font-bold text-accent-1"><?php echo htmlspecialchars($item['item_name']); ?></h3>
                <p class="text-gray-400">Unit Price: RM <?php echo number_format($item['price_rm'],2); ?></p>
            </div>

            <!-- QUANTITY CONTROLS -->
            <div class="flex items-center border border-gray-600 rounded-lg overflow-hidden">
                <form method="POST" action="cart.php">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="item_id" value="<?php echo $id; ?>">
                    <button type="submit" name="quantity" value="<?php echo $item['qty'] - 1; ?>" class="px-3 py-1 bg-gray-700 hover:bg-gray-600 transition text-lg">-</button>
                </form>
                <span class="px-4 py-1 bg-gray-800 font-bold"><?php echo $item['qty']; ?></span>
                <form method="POST" action="cart.php">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="item_id" value="<?php echo $id; ?>">
                    <button type="submit" name="quantity" value="<?php echo $item['qty'] + 1; ?>" class="px-3 py-1 bg-gray-700 hover:bg-gray-600 transition text-lg">+</button>
                </form>
            </div>

            <!-- TOTAL & REMOVE -->
            <div class="flex flex-col items-end gap-2">
                <span class="font-bold text-lg">RM <?php echo number_format($item['price_rm'] * $item['qty'],2); ?></span>
                <form method="POST" action="cart.php">
                    <input type="hidden" name="action" value="remove">
                    <input type="hidden" name="item_id" value="<?php echo $id; ?>">
                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Remove</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- RIGHT: ORDER SUMMARY -->
    <div class="w-full lg:w-1/3 bg-dark-card rounded-xl p-6 border border-gray-700 sticky top-28 h-max">
        <h2 class="text-xl font-bold text-accent-1 mb-6 border-b border-gray-600 pb-2">Order Summary</h2>
        <div class="space-y-3 text-gray-400 mb-6">
            <div class="flex justify-between"><span>Subtotal</span><span>RM <?php echo number_format($subtotal,2); ?></span></div>
            <div class="flex justify-between"><span>Shipping</span><span>RM <?php echo number_format($shipping_cost,2); ?></span></div>
            <div class="flex justify-between"><span>Tax (6%)</span><span>RM <?php echo number_format($tax,2); ?></span></div>
        </div>

        <div class="flex justify-between font-bold text-lg border-t border-gray-600 pt-2 mb-6">
            <span>Grand Total</span>
            <span>RM <?php echo number_format($grand_total,2); ?></span>
        </div>

        <button onclick="alert('Proceed to checkout!')" class="w-full py-3 bg-accent-1 hover:bg-accent-2 rounded-lg font-bold text-black transition-all">Checkout</button>
    </div>

</div>
<?php endif; ?>
</main>

<!-- FOOTER -->
<?php include 'footer.php'; ?>
</body>
</html>
