<?php
include 'header.php';

// --- 1. DATABASE CONNECTION USING MySQLi ---
$host = 'localhost';
$db   = 'milko_db';
$user = 'root';
$pass = 'Sakurakawaii;0';
$charset = 'utf8mb4';

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// --- 2. GET UPDATE CONTENT ---
$update_result = $mysqli->query("SELECT * FROM updates ORDER BY id DESC");
$updates = [];
if ($update_result) {
    while ($row = $update_result->fetch_assoc()) {
        $updates[] = $row;
    }
}

// --- 3. GET PRODUCT CONTENT ---
$product_result = $mysqli->query("SELECT * FROM merchandise_items ORDER BY item_id ASC");
$products = [];
if ($product_result) {
    while ($row = $product_result->fetch_assoc()) {
        $products[] = $row;
    }
}

// --- 4. USER LOGIN INFO (for dropdown) ---
$user_logged_in = isset($_SESSION['role']); // check if role exists
$is_admin = $user_logged_in && strtolower($_SESSION['role']) === 'admin';


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MilkoGameLab</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
    body { font-family: 'Inter', sans-serif; min-height: 100vh; margin:0; background-color:#030816; color:#F3F6FF; background-image:radial-gradient(at 0% 100%, #1A1A52 0%, transparent 40%), radial-gradient(at 100% 0%, #3B1C5A 0%, transparent 40%); }
    .header-bg { background: linear-gradient(to left, #1a2342, #111c31, #2b3263, #2a3554, #525185); }
    .menu { text-decoration:none; color:#F3F6FF; font-size:18px; font-weight:bold; padding:10px 18px; border-radius:9999px; transition: all 0.4s ease; display:inline-block; }
    .menu:hover { background: linear-gradient(45deg,#7b2ff7,#1e90ff,#ff6ec7); color:#fff; transform: scale(1.05); }
    .active-menu { background: linear-gradient(45deg,#a56eff,#3a0ca3,#00d4ff); color:#fff; }
    .login-icon-img { width:45px; height:45px; border-radius:50%; cursor:pointer; object-fit:cover; border:2px solid transparent; transition: all 0.4s ease; }
    .login-dropdown { display:none; position:absolute; right:0; background:#1e1f2e; border:1px solid #555; border-radius:0.5rem; overflow:hidden; z-index:50; }
    .login-dropdown a { display:block; padding:10px 15px; color:#fff; text-decoration:none; }
    .login-dropdown a:hover { background:#444; }
    .login-wrapper { position:relative; }
    .content-section-wrapper { background-color:#fff; color:#1f2937; padding:2rem; border-radius:1rem; margin-bottom:3rem; }
    .light-card { background:#f7f7f7; border-radius:1rem; padding:1.5rem; transition:0.3s; }
    .light-card:hover { transform:translateY(-4px); box-shadow:0 15px 30px rgba(0,0,0,0.1); }
    .title-gradient { background-image: linear-gradient(45deg,#ff6ec7,#00d4ff); -webkit-background-clip:text; color:transparent; }
</style>
</head>
<body>

<!-- MAIN CONTENT -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-5xl sm:text-6xl font-extrabold text-center mt-4 mb-2 title-gradient">Welcome to MilkoVerse!</h1>
    <p class="text-center text-lg text-gray-400 mb-10">Explore our world of games, news and merchandise.</p>

    <!-- UPDATE SECTION -->
    <div class="content-section-wrapper">
        <h2 class="text-4xl font-bold mb-8 border-b border-purple-500 pb-2">Update</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($updates as $update): ?>
            <div class="light-card">
                <img src="<?php echo $update['image_url']; ?>" onerror="this.src='https://placehold.co/400x200/888/ffffff?text=No+Image';" class="w-full h-48 object-cover rounded-lg mb-4" alt="<?php echo htmlspecialchars($update['title']); ?>">
                <h3 class="text-2xl font-semibold text-purple-600 mb-2"><?php echo htmlspecialchars($update['title']); ?></h3>
                <p class="text-gray-600"><?php echo htmlspecialchars($update['description']); ?></p>
                <a href="<?php echo htmlspecialchars($update['link']); ?>" class="mt-4 block w-full text-center py-2 rounded-lg font-medium text-white transition-colors duration-300" style="background: linear-gradient(45deg, #7b2ff7, #ff6ec7);">More</a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- PRODUCT SECTION -->
    <div class="content-section-wrapper">
        <h2 class="text-4xl font-bold mb-8 pb-2">Our Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($products as $product): ?>
            <div class="light-card">
                <img src="<?php echo $product['image_url']; ?>" onerror="this.src='https://placehold.co/400x200/888/ffffff?text=No+Image';" class="w-full h-48 object-cover rounded-lg mb-4" alt="<?php echo htmlspecialchars($product['item_name']); ?>">
                <h3 class="text-2xl font-semibold text-cyan-600 mb-2"><?php echo htmlspecialchars($product['item_name']); ?></h3>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
	
	 <!-- GAME SECTION -->
	<div class="content-section-wrapper">
		<h2 class="text-4xl font-bold mb-8 pb-2">Our Game</h2>
	    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
		<div class="light-card">
			<img src="imej/bannerHonkaiImpact.jpeg" onerror="this.src='https://placehold.co/400x200/F57C00/ffffff?text=Honkai+Impact+3rd';" alt="Honkai Impact 3rd" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-semibold text-cyan-600 mb-2">Honkai Impact 3rd</h3>
                    <a href="https://honkaiimpact3.hoyoverse.com/global/en-us/fab" class="mt-4 block w-full text-center py-2 rounded-lg font-medium text-white transition-colors duration-300" style="background: linear-gradient(45deg, #ff6ec7, #7b2ff7);">
                        Play Now
                    </a>
			</div>
			<div class="light-card">
			<img src="imej/bannerStarRail.jpeg" onerror="this.src='https://placehold.co/400x200/F57C00/ffffff?text=Honkai+Impact+3rd';" alt="Honkai Impact 3rd" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-semibold text-cyan-600 mb-2">Honkai Star Rail</h3>
                    <a href="https://hsr.hoyoverse.com/en-us/?utm_source=HoYoverse&utm_medium=products" class="mt-4 block w-full text-center py-2 rounded-lg font-medium text-white transition-colors duration-300" style="background: linear-gradient(45deg, #ff6ec7, #7b2ff7);">
                        Play Now
                    </a>
			</div>
			<div class="light-card">
			<img src="imej/BannerT.jpg" onerror="this.src='https://placehold.co/400x200/F57C00/ffffff?text=Honkai+Impact+3rd';" alt="Honkai Impact 3rd" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-semibold text-cyan-600 mb-2">Tears of Themis</h3>
                    <a href="https://tot.hoyoverse.com/en-us?utm_source=HoYoverse&utm_medium=products" class="mt-4 block w-full text-center py-2 rounded-lg font-medium text-white transition-colors duration-300" style="background: linear-gradient(45deg, #ff6ec7, #7b2ff7);">
                        Play Now
                    </a>
			</div>
			<div class="light-card">
			<img src="imej/BannerGenshinImpact.jpeg" onerror="this.src='https://placehold.co/400x200/F57C00/ffffff?text=Honkai+Impact+3rd';" alt="Honkai Impact 3rd" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-semibold text-cyan-600 mb-2">Genshin Impact</h3>
                    <a href="https://genshin.hoyoverse.com/en/home?utm_source=HoYoverse&utm_medium=products" class="mt-4 block w-full text-center py-2 rounded-lg font-medium text-white transition-colors duration-300" style="background: linear-gradient(45deg, #ff6ec7, #7b2ff7);">
                        Play Now
                    </a>
			</div>
			<div class="light-card">
			<img src="imej/bannerZZZ.jpg" onerror="this.src='https://placehold.co/400x200/F57C00/ffffff?text=Honkai+Impact+3rd';" alt="Honkai Impact 3rd" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-semibold text-cyan-600 mb-2">Zenless Zone Zero</h3>
                    <a href="https://zenless.hoyoverse.com/en-us/?utm_source=HoYoverse&utm_medium=products" class="mt-4 block w-full text-center py-2 rounded-lg font-medium text-white transition-colors duration-300" style="background: linear-gradient(45deg, #ff6ec7, #7b2ff7);">
                        Play Now
                    </a>
			</div>
		</div>			
	</div>
</main>

<!-- FOOTER -->
<?php include 'footer.php'; ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const loginIcon = document.querySelector('#loginIcon');
  const loginDropdown = document.querySelector('#loginDropdown');

  if (!loginIcon || !loginDropdown) return;

  loginIcon.addEventListener('click', function(e) {
    e.stopPropagation();
    // Toggle visibility using opacity + scale + pointer-events
    loginDropdown.classList.toggle('opacity-0');
    loginDropdown.classList.toggle('scale-95');
    loginDropdown.classList.toggle('pointer-events-none');
  });

  document.addEventListener('click', function(e) {
    if (!loginDropdown.contains(e.target) && e.target !== loginIcon) {
      loginDropdown.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
    }
  });
});
</script>

</body>
</html>
