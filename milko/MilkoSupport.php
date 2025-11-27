<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HoYoverse Help Center Clone</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <!-- Load Lucide Icons for aesthetic visual elements -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* Configure colors and font */
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#2563EB', /* Tailwind blue-600 for primary elements */
                        'light-bg': '#F9FAFB', /* Very light gray background */
                        'card-white': '#FFFFFF',
                        'accent-gradient-start': '#845EF7', /* Purple */
                        'accent-gradient-end': '#5C7CFA', /* Blue */
                        'text-dark': '#1F2937',
                        'text-gray': '#6B7280',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
        .nav-link:hover {
            color: #2563EB;
        }
        
        /* Custom styles for the rounded, abstract background effects (as seen in the image) */
        .abstract-gradient-bg {
            background: linear-gradient(135deg, #A78BFA 0%, #3B82F6 100%);
            opacity: 0.1;
            filter: blur(50px);
            border-radius: 50%;
            position: absolute;
            z-index: 0;
        }
        .self-service-card {
            background-color: #F3F4F6;
            transition: all 0.2s;
        }
        .self-service-card:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            background-color: #E5E7EB;
        }
    </style>
</head>
<body class="bg-light-bg min-h-screen text-text-dark font-sans relative overflow-x-hidden">

    <!-- Navbar Simulation (Top Bar) -->
    <header class="bg-card-white shadow-sm sticky top-0 z-10 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <span class="text-2xl font-black text-primary-blue">HOYOVERSE</span>
                <span class="text-xl font-medium text-text-gray ml-4">Help Center</span>
            </div>
            <div class="flex items-center space-x-6 text-sm">
                <div class="flex items-center space-x-1 text-text-gray hover:text-primary-blue cursor-pointer">
                    <i data-lucide="globe" class="w-4 h-4"></i>
                    <span>English</span>
                    <i data-lucide="chevron-down" class="w-4 h-4"></i>
                </div>
                <div class="flex items-center space-x-2 text-text-dark hover:text-primary-blue cursor-pointer">
                    <i data-lucide="user" class="w-5 h-5"></i>
                    <span class="text-sm">Please verify</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16 relative z-1">
        
        <!-- Abstract background elements -->
        <div class="abstract-gradient-bg w-48 h-48 -top-10 left-1/3"></div>
        <div class="abstract-gradient-bg w-36 h-36 top-1/2 right-0"></div>

        <div class="grid lg:grid-cols-3 gap-8">
            
            <!-- LEFT COLUMN: Self-Service & Main Content -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- 1. Self-Service Section -->
                <section>
                    <h2 class="text-2xl font-bold text-text-dark mb-4">Self-Service</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        
                        <!-- Issue Feedback Card -->
                        <div class="self-service-card flex items-center p-4 rounded-xl cursor-pointer shadow-md">
                            <i data-lucide="notebook-pen" class="w-6 h-6 text-red-500 mr-3"></i>
                            <span class="text-lg font-medium text-text-dark">Issue Feedback</span>
                        </div>
                        
                        <!-- Account Issues Form Card -->
                        <div class="self-service-card flex items-center p-4 rounded-xl cursor-pointer shadow-md">
                            <i data-lucide="clipboard-list" class="w-6 h-6 text-green-500 mr-3"></i>
                            <span class="text-lg font-medium text-text-dark">HoYoverse Account Issues Application Form</span>
                        </div>
                    </div>
                </section>
                
                <!-- 2. Help Center & Search -->
                <section class="space-y-6">
                    <h2 class="text-2xl font-bold text-text-dark">Help Center</h2>
                    
                    <!-- Search Input -->
                    <div class="relative">
                        <input type="text" placeholder="Please enter issue keywords"
                               class="w-full p-3 pl-4 pr-12 border border-gray-300 rounded-xl focus:border-primary-blue focus:ring-1 focus:ring-primary-blue">
                        <i data-lucide="search" class="absolute right-4 top-1/2 -translate-y-1/2 w-5 h-5 text-text-gray cursor-pointer"></i>
                    </div>

                    <!-- FAQ Categories Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        
                        <!-- Recommended Section -->
                        <div class="p-6 bg-card-white rounded-xl shadow border border-gray-100">
                            <h3 class="flex items-center text-xl font-semibold mb-4 text-primary-blue">
                                <i data-lucide="bookmark" class="w-5 h-5 mr-2"></i>
                                Recommended for You
                            </h3>
                            <ul class="space-y-3 text-sm">
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="flame" class="w-4 h-4 text-orange-500 mr-2 flex-shrink-0 mt-0.5"></i> How do I unlink my Microsoft Account? I've linked the ...</a></li>
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="flame" class="w-4 h-4 text-orange-500 mr-2 flex-shrink-0 mt-0.5"></i> How do I resolve the "Error" notification when I launch...</a></li>
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="help-circle" class="w-4 h-4 text-text-gray mr-2 flex-shrink-0 mt-0.5"></i> What should I do if I forgot my password?</a></li>
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="help-circle" class="w-4 h-4 text-text-gray mr-2 flex-shrink-0 mt-0.5"></i> My top-up did not go through, what should I do?</a></li>
                            </ul>
                            <a href="#" class="block mt-4 text-sm font-medium text-primary-blue hover:underline">View All &gt;</a>
                        </div>

                        <!-- HoYoverse Account Issues Section -->
                        <div class="p-6 bg-card-white rounded-xl shadow border border-gray-100">
                            <h3 class="flex items-center text-xl font-semibold mb-4 text-primary-blue">
                                <i data-lucide="key" class="w-5 h-5 mr-2"></i>
                                HoYoverse Account Issues
                            </h3>
                            <ul class="space-y-3 text-sm">
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="help-circle" class="w-4 h-4 text-text-gray mr-2 flex-shrink-0 mt-0.5"></i> How do I change my account password?</a></li>
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="help-circle" class="w-4 h-4 text-text-gray mr-2 flex-shrink-0 mt-0.5"></i> How do I unlink my account of PSN? What should I do...</a></li>
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="help-circle" class="w-4 h-4 text-text-gray mr-2 flex-shrink-0 mt-0.5"></i> What should I do if I receive an error message when I...</a></li>
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="help-circle" class="w-4 h-4 text-text-gray mr-2 flex-shrink-0 mt-0.5"></i> How do I register for a HoYoverse Account?</a></li>
                            </ul>
                            <a href="#" class="block mt-4 text-sm font-medium text-primary-blue hover:underline">View All &gt;</a>
                        </div>
                        
                        <!-- Account Security Issues Section -->
                        <div class="p-6 bg-card-white rounded-xl shadow border border-gray-100">
                            <h3 class="flex items-center text-xl font-semibold mb-4 text-primary-blue">
                                <i data-lucide="shield-check" class="w-5 h-5 mr-2"></i>
                                Account Security Issues
                            </h3>
                            <ul class="space-y-3 text-sm">
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="help-circle" class="w-4 h-4 text-text-gray mr-2 flex-shrink-0 mt-0.5"></i> What information will be collected by my HoYoverse A...</a></li>
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="help-circle" class="w-4 h-4 text-text-gray mr-2 flex-shrink-0 mt-0.5"></i> How do I retrieve my account?</a></li>
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="help-circle" class="w-4 h-4 text-text-gray mr-2 flex-shrink-0 mt-0.5"></i> How can I strengthen the security of my account?</a></li>
                            </ul>
                            <a href="#" class="block mt-4 text-sm font-medium text-primary-blue hover:underline">View All &gt;</a>
                        </div>
                        
                        <!-- Payment Issues Section -->
                        <div class="p-6 bg-card-white rounded-xl shadow border border-gray-100">
                            <h3 class="flex items-center text-xl font-semibold mb-4 text-primary-blue">
                                <i data-lucide="wallet" class="w-5 h-5 mr-2"></i>
                                Payment Issues
                            </h3>
                            <ul class="space-y-3 text-sm">
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="help-circle" class="w-4 h-4 text-text-gray mr-2 flex-shrink-0 mt-0.5"></i> How should I top up my game account on the website?</a></li>
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="help-circle" class="w-4 h-4 text-text-gray mr-2 flex-shrink-0 mt-0.5"></i> My top-up did not go through, what should I do?</a></li>
                                <li><a href="#" class="flex items-start text-text-dark hover:text-primary-blue"><i data-lucide="help-circle" class="w-4 h-4 text-text-gray mr-2 flex-shrink-0 mt-0.5"></i> Why can't I load products in the game?</a></li>
                            </ul>
                            <a href="#" class="block mt-4 text-sm font-medium text-primary-blue hover:underline">View All &gt;</a>
                        </div>

                    </div>
                </section>

            </div>
            
            <!-- RIGHT COLUMN: Verification & Contact Us -->
            <div class="lg:col-span-1 space-y-8">
                
                <!-- Welcome/Verification Card -->
                <div class="bg-card-white rounded-xl shadow-xl overflow-hidden">
                    <!-- Gradient Top Header -->
                    <div class="p-6 text-white" style="background: linear-gradient(135deg, var(--accent-gradient-start), var(--accent-gradient-end))">
                        <h3 class="text-xl font-bold">Welcome to the Help Center</h3>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <p class="text-sm text-text-gray">You haven't verified your identity yet. You can view the latest service progress once you've verified your identity.</p>
                        <button class="w-full py-2 rounded-full font-semibold text-white bg-primary-blue hover:bg-blue-700 transition">
                            Verify
                        </button>
                    </div>
                </div>

                <!-- Contact Us Card -->
                <div class="bg-card-white p-6 rounded-xl shadow-md border border-gray-100 space-y-4">
                    <h3 class="text-xl font-bold text-text-dark">Contact Us</h3>
                    
                    <!-- Issue Feedback Button -->
                    <div class="flex items-center p-3 bg-light-bg rounded-lg cursor-pointer hover:bg-gray-200 transition">
                        <i data-lucide="mail-plus" class="w-5 h-5 text-text-gray mr-3"></i>
                        <span class="font-medium text-text-dark">Issue Feedback</span>
                    </div>
                    
                    <!-- Contact Email Button -->
                    <div class="flex items-center p-3 bg-light-bg rounded-lg cursor-pointer hover:bg-gray-200 transition">
                        <i data-lucide="mail" class="w-5 h-5 text-text-gray mr-3"></i>
                        <span class="font-medium text-text-dark">Contact Email</span>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <!-- Initialize Lucide Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Replaces all <i> tags with SVG icons
            lucide.createIcons();
        });
    </script>

</body>
</html>