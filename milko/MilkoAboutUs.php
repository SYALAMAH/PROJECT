<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MilkoAboutUs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* BASE STYLES & BACKGROUND */
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
        
        .banner {
		  position: relative;
		  width: 100%;
		  height: 300px;
		  background-image:url("imej/banner.jpg");
		  background-size: cover;
		  background-position: center;
		  display: flex;
		  justify-content: center;
		  align-items: center;
		  color: #ffffff;
		  text-align: center;
		  font-family: 'Segoe UI', sans-serif;
		  letter-spacing: 2px;
	}

        .banner::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.45);
        }

        .banner h1 {
            position: relative;
            font-size: 50px;
            z-index: 2;
            text-shadow: 0 0 15px #a56eff, 0 0 30px #00d4ff;
        }
    </style>

</head>
<body class="min-h-screen">
    
 
		
</table>
	<div class="banner">
  <h1>About Us</h1> 
</div>
	<main class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8 mt-12 mb-12">
        <div class="content-card rounded-xl p-8 lg:p-12">
            <!-- Content from MilkoVerse Official Hub Statement -->
            <h2 class="text-4xl font-extrabold mb-6">About MilkoVerse</h2>
            
            <div class="space-y-6 text-lg text-gray-200 leading-relaxed">
                <p>
                    <strong>MilkoVerse</strong> serves as the official extension of HoYoverse, dedicated to delivering essential updates, exclusive merchandise, and comprehensive support to our global community of players. Our primary mission is to connect fans directly with the worlds they love, including top-tier immersive experiences like Genshin Impact, Honkai: Star Rail, Honkai Impact 3rd, Tears of Themis, and Zenless Zone Zero.
                </p>
                <p>
                    We are the definitive source for all official product releases. MilkoVerse manages the retail and distribution of high-quality, licensed merchandise, allowing fans to bring home pieces of the vibrant virtual worlds created by HoYoverse.
                </p>
                <p>
                    Furthermore, we are committed to keeping the community fully informed. MilkoVerse is responsible for aggregating and distributing the latest official news, event details, patch notes, and development insights across all HoYoverse titles.
                </p>
                <p>
                    As an internal component of HoYoverse, we leverage the company's leading technical capabilities in game development, cel shading, and cloud technology to ensure our news distribution and e-commerce platforms are seamless and efficient.
                </p>
                <p>
                    In the future, MilkoVerse will continue to expand its global reach and content offerings, working in tandem with HoYoverse's worldwide offices in Singapore, Montreal, Los Angeles, Tokyo, Seoul, and other regions to provide unparalleled service and official content access.
                </p>
            </div>
            
            <!-- Game Icons Section -->
            <div class="mt-12 pt-8 border-t border-gray-700/50">
                <h3 class="text-xl font-bold text-gray-400 mb-6">Game</h3>
                <div class="grid grid-cols-2 sm:grid-cols-5 gap-6 justify-items-center">
                    <!-- Note: Using placeholders for the game icons, similar to the reference image -->
                    <div class="text-center">
                        <img src="imej/LogoHonkai.jpg" onerror="this.src='https://placehold.co/100x100/3b1c5a/ffffff?text=HI3';" alt="Honkai Impact 3rd" class="w-20 h-20 rounded-full mx-auto shadow-lg shadow-purple-500/50">
                        <p class="mt-2 text-sm text-gray-300">Honkai Impact 3rd</p>
                    </div>
                    <div class="text-center">
                        <img src="imej/LogoGenshin.jpg" onerror="this.src='https://placehold.co/100x100/3b1c5a/ffffff?text=GI';" alt="Genshin Impact" class="w-20 h-20 rounded-full mx-auto shadow-lg shadow-blue-500/50">
                        <p class="mt-2 text-sm text-gray-300">Genshin Impact</p>
                    </div>
                    <div class="text-center">
                        <img src="imej/LogoT.png" onerror="this.src='https://placehold.co/100x100/3b1c5a/ffffff?text=ToT';" alt="Tears of Themis" class="w-20 h-20 rounded-full mx-auto shadow-lg shadow-red-500/50">
                        <p class="mt-2 text-sm text-gray-300">Tears of Themis</p>
                    </div>
                    <div class="text-center">
                        <img src="imej/logoStarRail.jpg" onerror="this.src='https://placehold.co/100x100/3b1c5a/ffffff?text=HSR';" alt="Honkai: Star Rail" class="w-20 h-20 rounded-full mx-auto shadow-lg shadow-pink-500/50">
                        <p class="mt-2 text-sm text-gray-300">Honkai: Star Rail</p>
                    </div>
                    <div class="text-center">
                        <img src="imej/LogoZZZ.jpg" onerror="this.src='https://placehold.co/100x100/3b1c5a/ffffff?text=ZZZ';" alt="Zenless Zone Zero" class="w-20 h-20 rounded-full mx-auto shadow-lg shadow-yellow-500/50">
                        <p class="mt-2 text-sm text-gray-300">Zenless Zone Zero</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
 <!-- FOOTER SECTION  -->
    <?php include 'footer.php'; ?>
</body>
</html>
