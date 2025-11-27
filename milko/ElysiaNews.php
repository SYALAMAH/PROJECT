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
        
        /* Banner Styles */
        .banner {
            position: relative;
            width: 100%;
            height: 300px;
            background-image:url("imej/banner.jpg"); /* Use placeholder image URL */
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
        
        /* --- BLOG POST SPECIFIC STYLES (HoYoverse Style) --- */
        
        /* White Wrapper for Article Content */
        .content-section-wrapper {
            background-color: #ffffff;
            color: #1f2937; /* Dark text for the white area */
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3); /* Lift the white section off the dark background */
        }
        
        /* The colorful separator line below the date */
        .separator-line {
            height: 2px;
            background: linear-gradient(90deg, #7B68EE, #FF69B4, #3CB371);
            margin-top: 1rem;
            margin-bottom: 2rem;
        }

        /* Style for the "Product" tag */
        .product-tag {
            background-color: #e0e0e0;
            color: #4a4a4a;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px; 
            font-size: 0.875rem; 
            font-weight: 500;
        }
        
        /* Styling for the article body text, making it highly readable */
        .article-body p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
            color: #333;
        }
        .article-body h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-top: 2rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 0.5rem;
        }
        
    </style>

</head>
<body class="min-h-screen">
    
   	
    
    <!-- BANNER SECTION -->
    <div class="banner">
        <h1>News</h1>	
    </div>
    
    <!-- MAIN ARTICLE SECTION -->
    <!-- The new blog post content starts here -->
    <main class="py-12">
        <div class="content-section-wrapper max-w-4xl mx-auto rounded-xl shadow-2xl">
            <div class="p-6 sm:p-10 lg:p-12">

                <!-- ARTICLE HEADER -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#1a1a1a] leading-tight mb-4">
                        Honkai Impact 3rd Launching v8.5 [A Lightful Love] on OCT 23
                    </h1>
                    
                    <!-- Meta Tags: Product & Date -->
                    <div class="flex items-center justify-center space-x-4 text-gray-500 text-sm">
                        <span class="product-tag">Update</span>
                        <span>October 23, 2025</span>
                    </div>
                    
                    <div class="separator-line max-w-xl mx-auto"></div>
                </div>

                <!-- FEATURE IMAGE (Placeholder) -->
                <figure class="mb-8">
                    <img 
                        src="imej/ElysiaNews.png" 
                        onerror="this.src='https://placehold.co/1200x600/FF69B4/ffffff?text=Feature+Image';"
                        alt="Honkai Impact 3rd v8.5 A Lightful Love Key Visual featuring Elysia" 
                        class="w-full h-auto object-cover rounded-lg shadow-lg border border-gray-100"
                    >
                    <figcaption class="text-center text-md text-gray-500 mt-4 italic">
                        Experience new battlesuits, locations, and events for bountiful rewards!
                    </figcaption>
                </figure>


                <!-- ARTICLE BODY -->
                <div class="article-body max-w-3xl mx-auto px-2 sm:px-0 text-lg">
                    <p>
                        October 17, 2025 — The Honkai Impact 3rd team announces that v8.5 "A Lightful Love" will be released on October 23. In this update, Captains will be able to fight as Elysia's new S-rank battlesuit, "Hi♪ Love Elf♥". They will also experience new stories, locations, events, weapons, and outfits, and claim bountiful rewards.
                    </p>
                    
                    <div class="text-center my-8">
                        <a href="https://www.youtube.com/watch?v=36HCgrzsw2o" target="_blank" class="text-xl font-bold text-indigo-600 hover:text-indigo-800 transition duration-200 underline">
                            Click here to view the brand-new trailer
                        </a>
                    </div>

                    <!-- NEW BATTLESUIT SECTION -->
                    <h2>New Battlesuit & Equipment</h2>
                    <p>
                        In the upcoming v8.5, Elysia's new S-rank battlesuit "Hi♪ Love Elf♥" will make her debut. Elysia's "Hi♪ Love Elf♥" is an SD-type battlesuit who repels enemies dancingly with her bow, and can summon little messengers to perform a 4-sequence combo that deals Ice DMG. Her recommended weapon, "Pure Love's Whisper," and stigma set "Blissful Days" will also be released simultaneously. This set depicts the cozy daily life of the beautiful elf who is a resident of the Golden Courtyard. In addition, Herrscher of Rebirth's new Divine Key, "Sea-Cleansing Floret," and its PRI form, "Sea-Cleansing Floret: Reciprocity," will join them after the version update, bringing more strategic options to combat.
                    </p>

                    <!-- NEW STORY/LOCATION SECTION -->
                    <h2>New Story Chapter & Region</h2>
                    <p>
                        The new story chapter "Reunited Under the Light of Faith" introduces a brand-new region, where the new home city of Difeng makes its first appearance. Difeng, a city that blends nature and technology, was built by Senadina and her friends, and was where Leylah grew up. In this chapter, Dreamseeker will first explore the Natural History Memorial Hall in Difeng. As the exploration progresses, surprising events will gradually unfold, leading Captains into a new story arc.
                    </p>

                    <!-- NEW EVENT SECTION -->
                    <h2>Version Event: With You! Youthful Dreams</h2>
                    <p>
                        The version event "With You! Youthful Dreams" will also kick off, with St. Freya High School and the Golden Courtyard jointly hosting a unique team-building session. After the Messenger of Love was born, Kiana made a wish to her and hoped for a carefree campus life without homework and exams. Thus, Ellie specially created a one-day campus experience for Kiana. However, the stresses, worries, and uncertainties lurking within campus have unexpectedly gained sentience and transformed into the Homework Rampagers, now determined to disrupt this celebration. What lies behind this chaos? Captains can uncover the truth in the event. Complete specific missions to obtain tokens and exchange them for Valkyrie Blastmetal's new outfit "Brainiac Dark Lord," Crystals, Source Prisms, and other fabulous rewards in the event shop.
                    </p>

                    <!-- COLLABORATION & CONCLUSION -->
                    <h2>Collaboration and Game Updates</h2>
                    <p>
                        In addition to in-game content, Honkai Impact 3rd will collaborate with ROG Phone 9 to launch a co-branded phone accessory gift box on October 23. With "Your Game, Lit with Love" as the theme, it features an exclusive Ellie design, a custom phone case, and other exclusive accessories. Tune in to the official ROG and Honkai Impact 3rd communities for updates.
                    </p>
                    <p>
                        In February 2024, Honkai Impact 3rd entered Part 2, marking the beginning of a Martian adventure. Ever since its debut, the game has been gaining an international following for bringing exhilarating and immersive experiences to all fans and players. Honkai Impact 3rd will continue to support PC and mobile cross-save in the future, and has been launched on Mac on April 25. For more information on Honkai Impact 3rd, please visit our official site: <a href="https://honkaiimpact3.hoyoverse.com" target="_blank" class="text-indigo-600 hover:text-indigo-800 underline">honkaiimpact3.hoyoverse.com</a>, or follow @HonkaiImpact3rd on X (Twitter), Instagram, and Facebook. Stay tuned for more exciting news!
                    </p>
                </div>
            </div>
        </div>
    </main>
    
    <!-- FOOTER SECTION  -->
   <?php include 'footer.php'; ?>

</body>
</html>