<?php
// --- START THE SESSION ---
session_start();

// --- DATABASE CREDENTIALS ---
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

// --- LOGIN LOGIC ---
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error_message = 'Username and password are required.';
    } else {
        try {
            $pdo = new PDO($dsn, $user, $pass, $options);

            // 1. Find the user by their username
            $stmt = $pdo->prepare("select * from users where username = ?");
            $stmt->execute([$username]);
            
            // We'll call this $db_user to avoid confusion with the $user (reen) variable
            $db_user = $stmt->fetch(); 

            // 2. Verify the user exists AND the password is correct
            if ($db_user && password_verify($password, $db_user['password'])) {
                
                // SUCCESS! Store user info in the session
                $_SESSION['user_id'] = $db_user['user_id'];
                $_SESSION['username'] = $db_user['username'];
                $_SESSION['role'] = $db_user['role'];

                // 3. Redirect based on their role
                if ($db_user['role'] === 'admin') {
                    header("Location: MilkoDashboard.php");
                    exit();
                } else {
                    header("Location: index.php");
                    exit();
                }

            } else {
                // Failed login: Show error message
                $error_message = 'Invalid username or password. Please try again.';
            }

        } catch (\PDOException $e) {
            // Database connection error
            $error_message = 'Database error. Please try again later.';
            // For debugging (don't show in production):
            // $error_message = 'Error: ' . $e->getMessage();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MilkoVerse - Star-Gazer Snuggle Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'deep-midnight': '#0B0223', // Very dark purple/blue base
                        'nebula-pink': '#FFC0CB', // Soft Pink (cute highlight)
                        'nebula-blue': '#B0E0E6', // Powder Blue (cute highlight)
                        'nebula-violet': '#5D3FD3', // Medium Violet for depth
                        'star-white': '#F0F0FF',
                        'star-yellow': '#FFD700',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        /* Base Styles: Deep Space Nebula */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0B0223; /* deep-midnight base */
            background-image: 
                radial-gradient(circle at 10% 90%, rgba(93, 63, 211, 0.4) 0%, transparent 20%), 
                radial-gradient(circle at 80% 20%, rgba(255, 192, 203, 0.3) 0%, transparent 15%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden; 
            color: #333; 
        }

        /* Animated Star Field (More Galaxy Feel) */
        .star-field {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                /* Tiny, far away stars */
                radial-gradient(circle, #F0F0FF 0.5px, transparent 1px) 0 0 / 100px 100px,
                /* Closer, brighter stars */
                radial-gradient(circle, #B0E0E6 1px, transparent 2px) 50px 50px / 100px 100px;
            animation: moveStars 100s linear infinite;
        }
        
        @keyframes moveStars {
            0% { background-position: 0 0, 50px 50px; }
            100% { background-position: 1000px 1000px, 1050px 1050px; }
        }

        /* The Cute Cloud Card (Slightly Transparent) */
        .cosmic-cuddle-card {
            /* Blending the cute card with the dark background */
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(5px); /* Soft blur */
            border-radius: 2rem; 
            /* Soft, diffused shadow for the "cloud" effect, highlighted with nebula colors */
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.3), 
                        0 0 30px #FFC0CB, /* Pink nebula glow */
                        0 0 20px #B0E0E6; /* Blue nebula glow */
            position: relative;
            z-index: 10;
            border: 1px solid rgba(255, 255, 255, 0.5); 
        }
        
        /* Title Style: Friendly and Warm */
        .cuddle-title {
            color: #5D3FD3; /* Violet for stability */
            text-shadow: 1px 1px 0 #FFC0CB; /* Pink outline for cuteness */
        }

        /* Input Field Style: Soft Pill Shape */
        .cuddle-input {
            background-color: #F8F8FF; 
            border: 2px solid #B0E0E6; 
            border-radius: 9999px; 
            transition: all 0.3s ease;
            color: #4A4A4A;
        }
        .cuddle-input:focus {
            outline: none;
            border-color: #FFC0CB; 
            box-shadow: 0 0 10px rgba(255, 192, 203, 0.8);
        }

        /* Button Style: Pop of Cheer */
        .cuddle-button {
            transition: all 0.3s ease;
            background-color: #FFC0CB; /* Soft Pink Button */
            color: #5D3FD3; /* Violet text for contrast */
            font-weight: 800;
            border-radius: 9999px; 
            text-transform: uppercase;
        }
        .cuddle-button:hover {
            background-color: #B0E0E6; /* Blue hover */
            box-shadow: 0 5px 20px rgba(176, 224, 230, 0.9);
            transform: scale(1.03);
        }
    </style>
</head>
<body class="p-4">

    <!-- Deep Space Star Field Layer -->
    <div class="star-field"></div>

    <!-- Login Container - Cosmic Cuddle Card -->
    <div class="w-full max-w-sm p-8 sm:p-10 cosmic-cuddle-card mx-auto">
        <div class="text-center mb-10">
            <!-- Cute Moon/Star Icon -->
           
                <!-- Moon outline (darker part) -->
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.86-7-7.93h14c0 4.07-3.05 7.44-7 7.93zM12 4c4.07 0 7.44 3.05 7.93 7H4.07c.49-3.95 3.86-7 7.93-7z"/>
                <!-- Cute Star overlay (pastel pink) -->
                <path fill="#FFC0CB" d="M12 5.5l1.5 3 3 .4-2.1 2.2.5 3.2-3.2-1.7-3.2 1.7.5-3.2-2.1-2.2 3-.4 1.5-3z"/>
            </svg>
            
            <!-- Title -->
            <h1 class="text-4xl font-extrabold cuddle-title mb-2">
                MILKOVERSE
            </h1>
     
        </div>

        
        <?php if ($error_message): ?>
            <div class="bg-red-100 border border-red-300 text-red-700 p-3 rounded-lg mb-4 text-sm text-center">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php" class="space-y-6">
            
            <!-- Star Sailor ID Input -->
            <div>
                <label for="username" class="block text-sm font-semibold text-nebula-violet mb-2 ml-4">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    required 
                    class="w-full px-5 py-3 cuddle-input"
                    placeholder="Enter User name"
                >
            </div>

            <!-- Secret Sparkle Key Input -->
            <div>
                <label for="password" class="block text-sm font-semibold text-nebula-violet mb-2 ml-4">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    class="w-full px-5 py-3 cuddle-input"
                    placeholder="Enter Your Password"
                >
            </div>

            <!-- Error/Message Display -->
            <div id="messageBox" class="text-center text-sm font-bold h-6 pt-1 text-red-500">
                <!-- Status messages here -->
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="cuddle-button w-full flex justify-center items-center py-3 px-4 text-xl shadow-lg focus:outline-none"
            >
                Log In
            </button>
        </form>

        <div class="mt-6 text-center text-xs">
            <a href="#" class="font-bold text-nebula-violet hover:text-nebula-pink transition duration-200">
                Did you forget your password?
            </a>
        </div>
    </div>

</body>
</html>