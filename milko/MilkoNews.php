<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MilkoNews</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            /* Your original table background converted to Tailwind utility classes (using raw style for complex gradient) */
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
<body class="min-h-screen">
    
    
<div class="banner">
  <h1>News</h1> 
	</div>
	 <section class="mt-16">
            
           <!-- === UPDATE SECTION WRAPPER (White background - NOW FIRST SECTION) === -->
        <div class="content-section-wrapper p-8 rounded-xl mb-16">
            <section>
                <!-- Heading is now dark text (text-gray-900) -->
                <h2 class="text-4xl font-bold text-gray-900 mb-8 border-b border-purple-500 pb-2">Update</h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Game 1: Card style (light-card) -->
                    <div class="light-card p-6 rounded-xl shadow-lg hover:shadow-[0_0_20px_rgba(255,110,199,0.2)]">
                        <img src="imej/BannerUpdateImpact.jpg" onerror="this.src='https://placehold.co/400x200/4F46E5/ffffff?text=Milko+Rush';" alt="Milko Rush Banner" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="text-2xl font-semibold text-purple-600 mb-2">Honkai Impact 3rd</h3>
                        <p class="text-gray-600">Honkai Impact 3rd Launching v8.5 [A Lightful Love] on OCT 23</p>
                        <!-- Button is styled for a light background -->
                        <a href="ElysiaNews.php" class="mt-4 block w-full text-center py-2 rounded-lg font-medium text-white transition-colors duration-300" style="background: linear-gradient(45deg, #7b2ff7, #ff6ec7);">
                            More
                        </a>
                    </div>
                    
                    <!-- Game 2: Card style (light-card) -->
                    <div class="light-card p-6 rounded-xl shadow-lg hover:shadow-[0_0_20px_rgba(0,212,255,0.2)]">
                        <img src="imej/bannerUpdateHonkai.jpg" onerror="this.src='https://placehold.co/400x200/06B6D4/ffffff?text=Cosmic+Chess';" alt="Cosmic Chess Banner" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="text-2xl font-semibold text-cyan-600 mb-2">Honkai: Star Rail</h3>
                        <p class="text-gray-600">Honkai: Star Rail Version 3.7 "As Tomorrow Became Yesterday" Arrives on November 5</p>
                        <a href="StarRailNews.php" class="mt-4 block w-full text-center py-2 rounded-lg font-medium text-white transition-colors duration-300" style="background: linear-gradient(45deg, #7b2ff7, #00d4ff);">
                            More
                        </a>
                    </div>

                    <!-- Game 3: Card style (light-card) -->
                    <div class="light-card p-6 rounded-xl shadow-lg hover:shadow-[0_0_20px_rgba(123,47,247,0.2)]">
                        <img src="imej/bannerUpdateGenshin.jpeg" onerror="this.src='https://placehold.co/400x200/EC4899/ffffff?text=Genshin+Impact';" alt="Genshin Impact Banner" class="w-full h-48 object-cover rounded-lg mb-4">
                        <h3 class="text-2xl font-semibold text-pink-600 mb-2">Genshin Impact</h3>
                        <p class="text-gray-600">Genshin Impact "Version Luna II" Officially Debuts UGC system Miliastra Wonderland on October 22!</p>
                        <a href="GINews.php" class="mt-4 block w-full text-center py-2 rounded-lg font-medium text-white transition-colors duration-300" style="background: linear-gradient(45deg, #ff6ec7, #a56eff);">
                            More
                        </a>
                    </div>
                </div>
            </section>
        </div>
        
  
    
   <!-- FOOTER -->
<?php include 'footer.php'; ?>
	
	
</body>
</html>
