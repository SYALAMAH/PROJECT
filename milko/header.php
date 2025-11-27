<?php
session_start(); // make sure session is active
// Get current page filename
$current_page = basename($_SERVER['PHP_SELF']); // e.g., MilkoStore.php

$user_logged_in = isset($_SESSION['username']);
$is_admin = $user_logged_in && strtolower($_SESSION['role'] ?? '') === 'admin';
$cartCount = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'qty')) : 0;
?>
<header class="header-bg h-20 shadow-xl sticky top-0 z-50">
  <div class="max-w-7xl mx-auto h-full flex items-center justify-between px-4 sm:px-6 lg:px-8">
    <a href="index.php">
      <img src="imej/Milkologo.png" class="h-10 sm:h-16 w-auto" alt="Logo"/>
    </a>

    <!-- Navigation -->
    <nav class="hidden md:flex space-x-2 lg:space-x-4">
      <a href="index.php" class="menu <?php echo ($current_page == 'index.php') ? 'active-menu' : ''; ?>">Home</a>
      <a href="MilkoNews.php" class="menu <?php echo ($current_page == 'MilkoNews.php') ? 'active-menu' : ''; ?>">News</a>
      <a href="MilkoStore.php" class="menu <?php echo ($current_page == 'MilkoStore.php') ? 'active-menu' : ''; ?>">Store</a>
      <a href="MilkoAboutUs.php" class="menu <?php echo ($current_page == 'MilkoAboutUs.php') ? 'active-menu' : ''; ?>">About Us</a>
    </nav>

    <div class="relative flex items-center space-x-4">
      <!-- Cart -->
      <a href="cart.php" id="cartIconLink" class="relative cart-icon-wrapper p-2 rounded-full hover:bg-white/10 transition duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="cart-icon text-white">
            <circle cx="8" cy="21" r="1"/>
            <circle cx="19" cy="21" r="1"/>
            <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.72a2 2 0 0 0 2-1.58L23 6H6"/>
        </svg>
        <span id="cartCount" class="cart-badge absolute -top-1 -right-1 flex items-center justify-center h-5 w-5 bg-red-600 text-white text-xs font-bold rounded-full border-2 border-gray-900 transform scale-100">
            <?php echo $cartCount; ?>
        </span>
    </a>

      <!-- Login Dropdown -->
      <?php if($user_logged_in): ?>
      <div class="relative">
        <img src="imej/login.png" id="loginIcon" class="w-10 h-10 rounded-full cursor-pointer" alt="User">
        <div id="loginDropdown" class="absolute right-0 mt-2 w-40 bg-[#1e1f2e] border border-gray-600 rounded-md shadow-lg transform scale-95 opacity-0 pointer-events-none transition-all duration-200 origin-top-right">
          <?php if($is_admin): ?>
          <a href="MilkoDashboard.php" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
          <?php endif; ?>
          <a href="logout.php" class="block px-4 py-2 hover:bg-gray-700">Logout</a>
        </div>
      </div>
      <?php else: ?>
      <a href="login.php">
        <img src="imej/login.png" class="w-10 h-10 cursor-pointer" alt="Login">
      </a>
      <?php endif; ?>
    </div>
  </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const loginIcon = document.getElementById('loginIcon');
  const loginDropdown = document.getElementById('loginDropdown');
  if(!loginIcon || !loginDropdown) return;

  loginIcon.addEventListener('click', function(e){
    e.stopPropagation();
    loginDropdown.classList.toggle('opacity-0');
    loginDropdown.classList.toggle('opacity-100');
    loginDropdown.classList.toggle('scale-95');
    loginDropdown.classList.toggle('scale-100');
    loginDropdown.classList.toggle('pointer-events-none');
    loginDropdown.classList.toggle('pointer-events-auto');
  });

  document.addEventListener('click', function(e){
    if(!loginDropdown.contains(e.target) && e.target !== loginIcon){
      loginDropdown.classList.add('opacity-0','scale-95','pointer-events-none');
      loginDropdown.classList.remove('opacity-100','scale-100','pointer-events-auto');
    }
  });
});
</script>
