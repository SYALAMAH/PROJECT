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
    
    <!-- MAIN ARTICLE SECTION: HONKAI: STAR RAIL V3.7 ANNOUNCEMENT -->
    <main class="py-12">
        <div class="content-section-wrapper max-w-4xl mx-auto rounded-xl shadow-2xl">
            <div class="p-6 sm:p-10 lg:p-12">

                <!-- ARTICLE HEADER -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#1a1a1a] leading-tight mb-4">
                        Honkai: Star Rail Version 3.7 "As Tomorrow Became Yesterday" Arrives on November 5
                    </h1>
                    
                    <!-- Meta Tags: Product & Date -->
                    <div class="flex items-center justify-center space-x-4 text-gray-500 text-sm">
                        <span class="product-tag">Update</span>
                        <span>October 24, 2025</span>
                    </div>
                    
                    <div class="separator-line max-w-xl mx-auto"></div>
                </div>

                <!-- FEATURE IMAGE (Placeholder) -->
                <figure class="mb-8">
                    <img 
                        src="imej/StarRailNews.png" 
                        onerror="this.src='https://placehold.co/1200x600/6A5ACD/ffffff?text=Feature+Image';"
                        alt="Honkai: Star Rail Version 3.7 As Tomorrow Became Yesterday Key Visual featuring Cyrene" 
                        class="w-full h-auto object-cover rounded-lg shadow-lg border border-gray-100"
                    >
                    <figcaption class="text-center text-md text-gray-500 mt-4 italic">
                        The grand finale of the Amphoreous adventure, featuring Cyrene as a new playable character.
                    </figcaption>
                </figure>


                <!-- ARTICLE BODY -->
                <div class="article-body max-w-3xl mx-auto px-2 sm:px-0 text-lg">
                    <p>
                        SINGAPORE, October 24, 2025 — The global interactive entertainment brand HoYoverse announced today that Honkai: Star Rail's new Version 3.7 update, "As Tomorrow Became Yesterday," will be released on November 5. This update marks the climactic finale of the Amphoreous saga. As Trailblazers brace for their final challenge, Cyrene joins the ranks as a new playable character. Alongside her debut, powerful enemies and exciting limited-time events await, inviting players to embark on the adventure across a world brimming with danger and rewards.
                    </p>
                    
                    <div class="text-center my-8">
                        <a href="https://www.youtube.com/watch?v=cnlQktCRPv4" target="_blank" class="text-xl font-bold text-indigo-600 hover:text-indigo-800 transition duration-200 underline">
                            Click here to view the brand-new trailer
                        </a>
                    </div>

                    <!-- STORY FINALE SECTION -->
                    <h2>The Amphoreous Saga Conclusion</h2>
                    <p>
                        Over the course of the Amphoreous saga, the Astral Express trio inherited the Titan Coreflames, gaining newfound strength and becoming inextricably bound to Amphoreous’s destiny. Now, the Astral Express crew stands shoulder to shoulder with the Chrysos Heirs, confronting "Irontomb" — the most formidable foe to time itself, in a battle whose weight surpasses anything Amphoreous has ever faced. Yet the conflict extends beyond the paths of Destruction and Erudition, as the forces of Remembrance stir in the dark. With the cosmos on the brink, no great power can afford to remain silent. Through the resolve of the Trailblazers and the wisdom of the geniuses, a Cosmic Alliance begins to rise.
                    </p>
                    <p>
                        The final battlefield lies within the "Ruins of Time", a barren realm where gravel drifts through the air and the horizon fades into an endless wilderness. When Irontomb's power once stirred prematurely, Phainon poured all his strength into sealing it away—the Trailblazer can see a giant sword piercing into the earth's core, and a statue that resembles Phainon. He left behind three layers of seals, waiting for the day his companions would return to break them, and together, bring Irontomb to its end.
                    </p>

                    <!-- NEW CHARACTER SECTION -->
                    <h2>New Character: Cyrene (5-star Ice/Remembrance)</h2>
                    <p>
                        As the final battle unfolds, Cyrene joins the roster of playable characters. From the very beginning of the Amphoreous journey, she has accompanied the Trailblazers in many different forms. In Version 3.7, Cyrene will finally open up to the Trailblazer she trusts the most, revealing her long-hidden past and the answers behind her mysteries. Cyrene is a **5-star Ice-Type character on the Path of the Remembrance**. When she is on the team, the DMG dealt by all allies is increased.
                    </p>
                    <p>
                        Cyrene's Skill deploys a Zone. While it is active, any damage dealt by an ally to an enemy will trigger an additional instance of True DMG. Meanwhile, every action a teammate takes stacks "Recollection" for Cyrene. When "Recollection" is fully stacked, Cyrene can activate her Ultimate, reaching her most powerful state. When Cyrene uses her Ultimate for the first time, it will instantly activate the Ultimates of all teammates and make her Zone permanent. At this point, she also summons **Cyrene in her memosprite form**. This "memosprite Cyrene" can choose to enhance any teammate, and if the target is a Chrysos Heir character, they will be granted an exclusive special effect. Furthermore, when memosprite Cyrene takes action, it can either buff teammates or deal damage to all enemies, helping lead the team to victory.
                    </p>

                    <!-- NEW PERMANENT MODE -->
                    <h2>New Permanent Gameplay: Currency Wars</h2>
                    <p>
                        Meanwhile, in the new version, a large-scale permanent gameplay mode, "Currency Wars," will make its debut. Trailblazers can form teams of up to ten characters, divided into "on-field" and "off-field" areas that work together in combat. When characters of the same combat type or belonging to the same faction fight side by side, they will trigger special "Bond" effects, unleashing greater power as a team. At launch, "Currency Wars" will feature 61 participating characters, all of whom will be available for free trial. As a major permanent mode, in addition to challenge rewards, it also features a periodic reward system similar to "Divergent Universe," and will introduce new challenges and growth experiences through updates.
                    </p>
                    
                    <!-- EVENTS AND MEDIA -->
                    <h2>Events, Customization, and New Media</h2>
                    <p>
                        There's still plenty for Trailblazers to look forward to in this update. The new event, "Snack Dash," is on its way, inviting Trailblazers to take part in a lighthearted competition full of creativity and fun. Madam Ruan Mei's delightful creations will race across obstacle-filled tracks, striving for the finish line and higher rankings. Version 3.7 will also implement the "Trailblaze Fashion" system, giving players more fun cosmetic customization options, including the limited headwear "Deliverer's Wreath" available for free after completing the version's Main Missions. Finally, a new animated short, "Hello, World," and the song "Ripples of Past Reverie," among other new content, will be released to accompany players as they reflect on the journey across the past seven versions and witness the perfect conclusion to the Amphoreus saga.
                    </p>
                    
                    <!-- GAME ACHIEVEMENTS & FOOTER LINKS -->
                    <h2>Availability and Recognition</h2>
                    <p>
                        Honkai: Star Rail is now available on PC, iOS, Android, Epic Games Store, and PS5**, and has exceeded 150 million total downloads across all platforms. In 2023, the game won Apple's App Store iPhone Game of the Year, Google Play's Best Game, and BEST MOBILE GAME by The Game Awards. In 2024, it received the Golden Joystick Awards Still Playing Award (Mobile) and PlayStation® Partner Awards 2024 PARTNER AWARD among other honors. The game has been rated Teen by the ESRB and is also classified as PEGI 12.
                    </p>
                    <p>
                        If you wish to learn more details, please visit <a href="https://hoyo.link/18zDCBAd" target="_blank" class="text-indigo-600 hover:text-indigo-800 underline">https://hoyo.link/18zDCBAd</a> or follow @HonkaiStarRail on Twitter (X), Instagram, and Facebook.
                    </p>
                </div>
            </div>
        </div>
    </main>
    
     <!-- FOOTER SECTION -->
   <?php include 'footer.php'; ?>

</body>
</html>