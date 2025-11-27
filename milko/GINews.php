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
            /* Placeholder banner image for Genshin Impact theme */
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
        
      
        
        /* White Wrapper for Article Content */
        .content-section-wrapper {
            background-color: #ffffff;
            color: #1f2937; /* Dark text for the white area */
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3); /* Lift the white section off the dark background */
        }
        
        /* The colorful separator line below the date */
        .separator-line {
            height: 2px;
            background: linear-gradient(90deg, #1E90FF, #FF6EC7, #20B2AA);
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
    
    <!-- MAIN ARTICLE SECTION: GENSHIN IMPACT V "LUNA II" ANNOUNCEMENT -->
    <main class="py-12">
        <div class="content-section-wrapper max-w-4xl mx-auto rounded-xl shadow-2xl">
            <div class="p-6 sm:p-10 lg:p-12">

                <!-- ARTICLE HEADER -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#1a1a1a] leading-tight mb-4">
                        Genshin Impact Version "Luna II" Officially Debuts UGC System Miliastra Wonderland on October 22!
                    </h1>
                    
                    <!-- Meta Tags: Product & Date -->
                    <div class="flex items-center justify-center space-x-4 text-gray-500 text-sm">
                        <span class="product-tag"> Update</span>
                        <span>October 22, 2025</span>
                    </div>
                    
                    <div class="separator-line max-w-xl mx-auto"></div>
                </div>

                <!-- FEATURE IMAGE (Placeholder) -->
                <figure class="mb-8">
                    <img 
                        src="imej/bannerUpdateGenshin.jpeg" 
                        onerror="this.src='https://placehold.co/1200x600/4B0082/ffffff?text=Feature+Image';"
                        alt="Genshin Impact Version Luna II Key Visual with new characters" 
                        class="w-full h-auto object-cover rounded-lg shadow-lg border border-gray-100"
                    >
                    <figcaption class="text-center text-md text-gray-500 mt-4 italic">
                        New UGC system, Archon Quest, and the debut of the Dendro catalyst wielder, Nefer.
                    </figcaption>
                </figure>


                <!-- ARTICLE BODY -->
                <div class="article-body max-w-3xl mx-auto px-2 sm:px-0 text-lg">
                    <p>
                        Global interactive entertainment brand HoYoverse has announced that Genshin Impact Version "Luna II" ("Song of the Welkin Moon: Reprise — An Elegy for Faded Moonlight") will officially launch on October 22. The long-awaited UGC system Miliastra Wonderland is also ready for adventure, featuring hundreds of Stages that encourage creativity and exploration. The update also brings back familiar faces like Varka and Arlecchino, who join forces against the threats in Nod-Krai. Meanwhile, Nefer debuts as a playable character, offering exciting new possibilities for unleashing Lunar-Bloom damage.
                    </p>
                    
                    <div class="text-center my-8">
                        <a href="https://www.youtube.com/watch?v=w50jW_iEXns&t=4s" target="_blank" class="text-xl font-bold text-indigo-600 hover:text-indigo-800 transition duration-200 underline">
                            Check out Genshin Impact Version Luna II trailer here:
                        </a>
                    </div>

                    <!-- MILIASTRA WONDERLAND SYSTEM -->
                    <h2>Miliastra Wonderland: The New UGC System</h2>
                    <p>
                        The brand new Miliastra Wonderland system has officially launched. The premier will offer hundreds of diverse Stages for players to explore. Players who have completed Act I of the Archon Quest Prologue, "The Outlander Who Caught the Wind," can explore this magical world freely and immerse themselves in a wide range of gameplay experiences, including sims management, party games, PvP battles, adventure challenges, and more. They can meet new friends or reconnect with other players to enjoy both the thrill of teamwork and competition, or choose to play solo and savor the satisfaction of solving intricate puzzles. Many Stages also feature achievements, ranking systems, and leaderboards, inspiring players to sharpen their skills and pursue new winning strategies.
                    </p>
                    
                    <h3>Customize Your Manekin</h3>
                    <p>
                        Manekins, as the players' avatars, can be customized to match individual preferences, allowing players to show off their unique styles both in the Wonderland and in Teyvat. From hair and facial features to accessories and outfits, their appearance can be freely customized. Outfit Components can be mixed and matched to create a unique look. Alternatively, players can opt for a preset outfit set with a single click. More rewards await players in Miliastra Wonderland through events and activities, including trial vouchers for outfits, outfit sets, and more.
                    </p>
                    
                    <h3>Unleash Your Inner Craftsperson</h3>
                    <p>
                        Everyone can step into the role of Craftsperson with the Miliastra Sandbox and unleash their creativity. This editing tool enables users to design their own Stages and experiences, utilizing a wide array of gameplay features and resources that Genshin Impact has built up. To create their own Stages, Craftspeople can first edit various components and modules, such as terrains, item components and even character skills, and then link different elements together with logic flows while flexibly configuring various Stage types and game modes. Comprehensive support tools and services will make the creative process smoother and more rewarding, offering official tutorials, a dedicated forum, opportunities for Stage recommendations, and additional incentive programs, etc.
                    </p>

                    <!-- NEW ARCHON QUEST & CHARACTERS -->
                    <h2>Archon Quest, Returning Allies, and Nefer's Debut</h2>
                    <p>
                        Apart from the UGC system, this new update also introduces a compelling Archon Quest with many old friends returning. Following the previous Archon Quest, players will continue to face the threat posed by the “Rächer of Solnari," Rerir. However, the unyielding Grand Master Varka will finally make an appearance to lend a hand. At the same time, unexpected allies including “The Knave,” and “The Marionette” from the Fatui Harbingers will also join the fight. Under the guidance of The Damselette, Nefer from the Curatorium of Secrets will provide further intel on Rerir, possibly uncovering his obsessions and unveiling new ways to confront him. The players' fierce battle with Rerir will yield rewards, as they can claim an extra 560 Primogems upon completing the Archon Quest in Version "Luna II."
                    </p>
                    <p>
                        Nefer becomes playable as a 5-star Dendro catalyst wielder, introducing new ways to unleash Lunar-Bloom damage. She can harness Verdant Dew to trigger powerful Lunar-Bloom damage. By using her Elemental Skill, she can absorb Verdant Dew, transforming her Charged Attacks into special Charged Attacks that consume no Stamina and deal Lunar-Bloom damage. Additionally, once the party enters Ascendant Gleam state, Nefer can convert Dendro Cores on the field into Seeds of Deceit, which can be used to further enhance the damage of her special Charged Attacks. What's more, as the head of the Curatorium of Secrets, she possesses an uncanny ability to sense when even the most unassuming people are hiding something. Players can trade all the intel she collects at the Adventurers' Guild in exchange for access to fun side stories.
                    </p>

                    <!-- EVENT WISHES AND REWARDS -->
                    <h2>Event Wishes, Commissions, and Seasonal Events</h2>
                    <p>
                        In the first half of Version "Luna II," Event Wishes feature **Nefer** alongside the rerun of Furina, while the second half brings back both Arlecchino and Zhongli.
                    </p>
                    <p>
                        The adventures continue in various events and activities, offering an abundance of rewards. Players can assist The Damselette with Commissions in exchange for rewards, including the Ascendant Gleam state and exclusive namecards. In addition, by uncovering new secrets in the Seasonal Event in Sumeru, players can get Primogem rewards and invite **Collei** to join their party for free.
                    </p>
                    
                    <!-- CONCLUSION -->
                    <p>
                        Genshin Impact Version "Luna II" invites players to explore the Miliastra Wonderland starting **October 22!** With cross-progression and Co-Op functions, players can enjoy their adventure across PlayStation®, Xbox, PC, Android, and iOS. The game has been rated T for Teen by ESRB on PS5, Xbox, PC, and Google Play, and 12+ on iOS. For more information, please visit Genshin Impact's official website (genshin.hoyoverse.com) or follow @GenshinImpact on X, Instagram, and Facebook.
                    </p>
                </div>
            </div>
        </div>
    </main>
    
    <!-- FOOTER SECTION  -->
    <?php include 'footer.php'; ?>

</body>
</html>