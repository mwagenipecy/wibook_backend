<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wibook App</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' https://cdn.tailwindcss.com; style-src 'self' 'unsafe-inline'; img-src 'self' data:;">
  <meta http-equiv="X-Content-Type-Options" content="nosniff">
  <meta http-equiv="X-Frame-Options" content="DENY">
  <meta http-equiv="Referrer-Policy" content="no-referrer">
  <meta http-equiv="Permissions-Policy" content="geolocation=(), microphone=(), camera=()">
  
  <link rel="icon" href="{{ asset('/img/icon.png') }}" type="image/png">

  <meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains; preload">


  <style>
    /* Enhanced gradient background */
    .bg-custom-gradient {
      background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 25%, #24593f 100%);
    }

    /* Smooth bounce animation */
    @keyframes bounce {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-15px);
      }
    }

    #bouncingImage {
      animation: bounce 4s ease-in-out infinite;
    }

    /* Fade in animation for sections */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .fade-in-up {
      animation: fadeInUp 0.8s ease-out;
    }

    /* Hover effects */
    .hover-scale {
      transition: transform 0.3s ease;
    }

    .hover-scale:hover {
      transform: scale(1.05);
    }

    /* Gradient text */
    .gradient-text {
      background: linear-gradient(45deg, #24593f, #059669);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    /* Card shadows */
    .card-shadow {
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease;
    }

    .card-shadow:hover {
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }
  </style>
</head>
<body class="bg-custom-gradient min-h-screen text-gray-800">

  <!-- Top Navigation Bar -->


  <div class="w-full py-4">
    <div class="container mx-auto flex items-center justify-between px-6">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img src="{{ asset('/img/imgg2.png') }}" alt="Logo" class="w-12 h-12">
            <span class="text-2xl font-bold text-[#24593f]">Wibook</span>
        </div>

        <!-- Mobile menu button (Hamburger) -->
        <div class="lg:hidden flex items-center">
            <button id="menuToggle" class="text-gray-800 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation Links -->
        <div id="navLinks" class="hidden lg:flex space-x-8">
            <a href="#home" class="text-green-800 hover:text-green-200 font-semibold transition-colors duration-300">Home</a>
            <a href="#features" class="text-green-800 hover:text-green-200 font-semibold transition-colors duration-300">Features</a>
            <a href="#about" class="text-green-800 hover:text-green-200 font-semibold transition-colors duration-300">About</a>
            <a href="#contact" class="text-green-800 hover:text-green-200 font-semibold transition-colors duration-300">Contact</a>
        </div>
    </div>

    <!-- Mobile Menu Links (hidden by default) -->
    <div id="mobileMenu" class="lg:hidden hidden mt-4 space-y-4 px-6 bg-white/95 backdrop-blur-sm rounded-lg shadow-lg">
        <a href="#home" class="block text-green-800 hover:text-green-600 font-semibold py-2 transition-colors duration-300">Home</a>
        <a href="#features" class="block text-green-800 hover:text-green-600 font-semibold py-2 transition-colors duration-300">Features</a>
        <a href="#about" class="block text-green-800 hover:text-green-600 font-semibold py-2 transition-colors duration-300">About</a>
        <a href="#contact" class="block text-green-800 hover:text-green-600 font-semibold py-2 transition-colors duration-300">Contact</a>
    </div>
</div>






  <!-- Main Content -->
  <div id="home" class="container mx-auto flex flex-wrap md:flex-nowrap items-center justify-between px-6 md:px-12 py-12 min-h-screen">
    <!-- Left Text Section -->
    <div class="w-full md:w-1/2 space-y-8 fade-in-up">
      <h1 class="text-6xl md:text-7xl font-extrabold mx-4 md:mx-12 leading-tight">
        <span class="block text-gray-800">Wibook</span>
        <span class="gradient-text">Financial App</span>
      </h1>
      
      <p class="text-xl md:text-2xl text-gray-700 mx-4 md:mx-12 font-light leading-relaxed">
        Take control of your finances with our powerful, intuitive expense tracking and project management platform.
      </p>
      
      <div class="flex flex-col sm:flex-row gap-4 mx-4 md:mx-12">
        <div class="flex items-center space-x-2">
          <div class="w-3 h-3 bg-green-500 rounded-full"></div>
          <span class="text-gray-600">Collaborative Projects</span>
        </div>
        <div class="flex items-center space-x-2">
          <div class="w-3 h-3 bg-green-500 rounded-full"></div>
          <span class="text-gray-600">Real-time Tracking</span>
        </div>
        <div class="flex items-center space-x-2">
          <div class="w-3 h-3 bg-green-500 rounded-full"></div>
          <span class="text-gray-600">Smart Analytics</span>
        </div>
      </div>

      <div class="flex flex-col sm:flex-row items-center justify-start space-y-4 sm:space-y-0 sm:space-x-6 mx-4 md:mx-12 mt-8">
        <a href="#features" class="w-full sm:w-auto bg-gradient-to-r from-green-700 to-green-600 hover:from-green-800 hover:to-green-700 text-white font-semibold py-4 px-8 rounded-xl shadow-lg hover-scale transition-all duration-300">
          Explore Features
        </a>
        
        <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3">
          <a href="#" class="bg-gray-900 hover:bg-gray-800 text-white rounded-xl inline-flex items-center justify-center px-4 py-3 hover-scale transition-all duration-300">
              <svg class="me-3 w-6 h-6" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path></svg>
              <div class="text-left">
                  <div class="text-xs">Download on</div>
                  <div class="text-sm font-semibold">App Store</div>
              </div>
          </a>
          
          <a href="{{ route('download.apk') }}" class="bg-gray-900 hover:bg-gray-800 text-white rounded-xl inline-flex items-center justify-center px-4 py-3 hover-scale transition-all duration-300">
              <svg class="me-3 w-6 h-6" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z"></path></svg>
              <div class="text-left">
                  <div class="text-xs">Get it on</div>
                  <div class="text-sm font-semibold">Google Play</div>
              </div>
          </a>
        </div>
      </div>

    </div>

    <!-- Right Image Section -->
    <div class="w-full md:w-1/2 flex justify-center items-center mt-8 md:mt-0">
      <div class="relative">
        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-green-600 rounded-full blur-3xl opacity-20 animate-pulse"></div>
        <img id="bouncingImage" src="{{ asset("/img/imgg1.png") }}" alt="Wibook App Preview" class="w-full max-w-lg relative z-10 drop-shadow-2xl">
      </div>
    </div>


  </div>

  <section id="about" class="min-h-screen flex items-center justify-center p-10 bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="max-w-7xl mx-auto">
      <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
        <!-- Left Side: Image -->
        <div class="w-full lg:w-1/2 flex justify-center items-center fade-in-up">
            <div class="relative">
              <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-blue-500 rounded-2xl blur-2xl opacity-20"></div>
              <img src="{{ asset('/img/img2223.png') }}" alt="Wibook Financial Management" class="relative z-10 w-full max-w-md h-auto object-cover rounded-2xl shadow-2xl hover-scale" />
            </div>
        </div>

        <!-- Right Side: Title and Description -->
        <div class="w-full lg:w-1/2 text-center lg:text-left fade-in-up">
          <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6">
            Welcome to <span class="gradient-text">Wibook</span>
          </h2>
          <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-green-400 mb-8 mx-auto lg:mx-0 rounded-full"></div>

          <div class="space-y-6">
            <p class="text-lg lg:text-xl text-gray-700 leading-relaxed">
                Wibook is a comprehensive financial management platform designed to revolutionize how you handle your income and expenditures. Whether you're managing personal finances or coordinating shared financial projects, our intuitive interface keeps everything organized and accessible.
            </p>

            <p class="text-lg lg:text-xl text-gray-700 leading-relaxed">
                Experience seamless income and expense tracking, real-time cash flow monitoring, and powerful analytics that provide valuable insights into your financial health. Our collaborative features enable multiple users to work together on financial projects with complete transparency and accountability.
            </p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
              <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                  <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <span class="text-gray-700 font-medium">Smart Analytics</span>
              </div>
              <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                  <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <span class="text-gray-700 font-medium">Team Collaboration</span>
              </div>
              <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                  <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <span class="text-gray-700 font-medium">Real-time Tracking</span>
              </div>
              <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                  <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <span class="text-gray-700 font-medium">Secure & Private</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>




</div>
  </section>





  <section id="features" class="min-h-screen flex items-center justify-center p-10 bg-white">
    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-12">
      <!-- Left Side: Advantages List -->
      <div class="w-full lg:w-1/2 fade-in-up">
        <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-8">
          Application <span class="gradient-text">Advantages</span>
        </h2>
        <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-green-400 mb-10 rounded-full"></div>
        <div class="space-y-8">
          <div class="card-shadow bg-white p-6 rounded-2xl border border-gray-100">
              <div class="flex items-start space-x-4">
                  <div class="bg-gradient-to-r from-green-600 to-green-500 text-white font-bold w-16 h-8 flex items-center justify-center rounded-full shadow-lg">
                      01
                  </div>
                  <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Project Management</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Organize and manage financial projects collaboratively with advanced tools for seamless income and expenditure tracking across teams.
                    </p>
                  </div>
              </div>
          </div>
          <div class="card-shadow bg-white p-6 rounded-2xl border border-gray-100">
              <div class="flex items-start space-x-4">
                  <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold w-16 h-8 flex items-center justify-center rounded-2xl shadow-lg">
                      02
                  </div>
                  <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Smart Transactions</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Record and categorize financial transactions with intelligent automation, keeping perfect track of cash flow with minimal effort.
                    </p>
                  </div>
              </div>
          </div>
          <div class="card-shadow bg-white p-6 rounded-2xl border border-gray-100">
              <div class="flex items-start space-x-4">
                  <div class="bg-gradient-to-r from-purple-600 to-purple-500 text-white font-bold w-16 h-8 flex items-center justify-center rounded-2xl shadow-lg">
                      03
                  </div>
                  <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Real-time Notifications</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Stay informed with instant alerts for transactions, project activities, and collaborative financial updates delivered in real-time.
                    </p>
                  </div>
              </div>
          </div>
          <div class="card-shadow bg-white p-6 rounded-2xl border border-gray-100">
              <div class="flex items-start space-x-4">
                  <div class="bg-gradient-to-r from-orange-600 to-orange-500 text-white font-bold w-16 h-8 flex items-center justify-center rounded-2xl shadow-lg">
                      04
                  </div>
                  <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Profile & Analytics</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Customize your profile, manage preferences, and access powerful analytics to track personal and collaborative financial performance.
                    </p>
                  </div>
              </div>
          </div>
          <div class="card-shadow bg-white p-6 rounded-2xl border border-gray-100">
              <div class="flex items-start space-x-4">
                  <div class="bg-gradient-to-r from-teal-600 to-teal-500 text-white font-bold w-16 h-8 flex items-center justify-center rounded-2xl shadow-lg">
                      05
                  </div>
                  <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Unified Dashboard</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Access a comprehensive overview of all financial activities, projects, and recent transactions in one beautifully designed interface.
                    </p>
                  </div>
              </div>
          </div>
          <div class="card-shadow bg-white p-6 rounded-2xl border border-gray-100">
              <div class="flex items-start space-x-4">
                  <div class="bg-gradient-to-r from-pink-600 to-pink-500 text-white font-bold w-16 h-8 flex items-center justify-center rounded-2xl shadow-lg">
                      06
                  </div>
                  <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Team Collaboration</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Share projects seamlessly with team members, enabling transparent financial management with advanced permission controls.
                    </p>
                  </div>
              </div>
          </div>
        </div>
      </div>


      <!-- Right Side: Mobile Screen Mockup -->
      <div class="w-full lg:w-1/2 flex justify-center mt-12 lg:mt-0 fade-in-up">
        <div class="relative">
          <div class="absolute inset-0 bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 rounded-3xl blur-3xl opacity-30 animate-pulse"></div>
          <img
            src="{{ asset('/img/aa1.png') }}"
            alt="Wibook Mobile Application Features"
            class="relative z-10 max-w-sm lg:max-w-md hover-scale drop-shadow-2xl"
          />
        </div>
      </div>
    </div>
  </section>








  <section class="py-20 min-h-screen flex items-center justify-center px-8 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-7xl mx-auto text-center fade-in-up">
        <!-- Section Title -->
        <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6">
          Core <span class="gradient-text">Features</span>
        </h2>
        <p class="text-xl text-gray-600 mb-12 max-w-3xl mx-auto">
          Discover the powerful features that make Wibook the ultimate financial management companion
        </p>
        <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-green-400 mx-auto mb-16 rounded-full"></div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1: Project Management -->
            <div class="flex flex-col items-center p-6 bg-white rounded-2xl shadow-lg hover-scale card-shadow">
                <div class="bg-gradient-to-r from-green-600 to-green-500 text-white font-bold w-16 h-16 flex items-center justify-center rounded-2xl mb-6 shadow-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Project Management</h3>
                <p class="text-gray-600 text-center leading-relaxed">
                    Create and manage financial projects with collaborative access for seamless income and expense tracking.
                </p>
            </div>

            <!-- Feature 2: Transactions -->
            <div class="flex flex-col items-center p-6 bg-white rounded-2xl shadow-lg hover-scale card-shadow">
                <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold w-16 h-16 flex items-center justify-center rounded-2xl mb-6 shadow-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Smart Transactions</h3>
                <p class="text-gray-600 text-center leading-relaxed">
                    Effortlessly log, categorize, and monitor financial transactions with intelligent automation.
                </p>
            </div>

            <!-- Feature 3: Notifications -->
            <div class="flex flex-col items-center p-6 bg-white rounded-2xl shadow-lg hover-scale card-shadow">
                <div class="bg-gradient-to-r from-purple-600 to-purple-500 text-white font-bold w-16 h-16 flex items-center justify-center rounded-2xl mb-6 shadow-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Live Notifications</h3>
                <p class="text-gray-600 text-center leading-relaxed">
                    Receive instant alerts for all financial activities and collaborative project updates.
                </p>
            </div>

            <!-- Feature 4: User Profile & Dashboard -->
            <div class="flex flex-col items-center p-6 bg-white rounded-2xl shadow-lg hover-scale card-shadow">
                <div class="bg-gradient-to-r from-orange-600 to-orange-500 text-white font-bold w-16 h-16 flex items-center justify-center rounded-2xl mb-6 shadow-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Smart Dashboard</h3>
                <p class="text-gray-600 text-center leading-relaxed">
                    Comprehensive dashboard with personalized insights and powerful financial analytics.
                </p>
            </div>
        </div>
    </div>
</section>









  <section id="contact" class="min-h-screen flex items-center justify-center px-12 bg-gradient-to-br from-gray-50 to-white">
    <div class="w-full max-w-7xl grid grid-cols-1 lg:grid-cols-2 gap-12">
      <!-- Contact Us Section -->
      <div class="flex justify-center items-center fade-in-up">
        <div>
          <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-8">
            Get in <span class="gradient-text">Touch</span>
          </h2>
          <div class="w-24 h-1 bg-gradient-to-r from-green-600 to-green-400 mb-10 rounded-full"></div>

          <div class="space-y-6">
            <!-- Phone -->
            <div class="flex items-center space-x-4 p-4 bg-white rounded-2xl -lg card-shadow">
             
              <div>
                <h4 class="font-semibold text-gray-800">Phone</h4>
                <p class="text-lg text-gray-600">+255 767 582 837</p>
              </div>
            </div>
            <!-- Website -->
            <div class="flex items-center space-x-4 p-4 bg-white rounded-2xl -lg card-shadow">
            
              <div>
                <h4 class="font-semibold text-gray-800">Website</h4>
                <p class="text-lg text-gray-600">www.wibook.com</p>
              </div>
            </div>
            <!-- Email -->
            <div class="flex items-center space-x-4 p-4 bg-white rounded-2xl  card-shadow">
           
              <div>
                <h4 class="font-semibold text-gray-800">Email</h4>
                <p class="text-lg text-gray-600">Coming Soon</p>
              </div>
            </div>
            <!-- Address -->
            <div class="flex items-center space-x-4 p-4 bg-white rounded-2xl  card-shadow">
              
              <div>
                <h4 class="font-semibold text-gray-800">Location</h4>
                <p class="text-lg text-gray-600">Dar Es Salaam, Tanzania</p>
              </div>
            </div>


        



@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



        </div>


          </div>
        </div>
      </div>

      <!-- Image Section -->
      <div class="relative fade-in-up">
        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-blue-500 rounded-3xl blur-2xl opacity-30"></div>
        <img src="{{ asset('/img/zz1.png') }}" alt="Wibook Contact" class="relative z-10 w-full rounded-2xl shadow-2xl hover-scale">
      </div>
    </div>


  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Logo and Description -->
        <div class="md:col-span-2">
          <div class="flex items-center space-x-3 mb-4">
            <img src="{{ asset('/img/imgg2.png') }}" alt="Wibook Logo" class="w-10 h-10">
            <span class="text-2xl font-bold">Wibook</span>
          </div>
          <p class="text-gray-400 leading-relaxed mb-4">
            Wibook is the ultimate financial management platform that empowers individuals and teams to take control of their finances with collaborative project management and intelligent transaction tracking.
          </p>
          <div class="flex space-x-4">
            <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd"></path>
              </svg>
            </a>
            <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
              </svg>
            </a>
            <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors duration-300">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z" clip-rule="evenodd"></path>
              </svg>
            </a>
          </div>
        </div>
        
        <!-- Quick Links -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="#home" class="text-gray-400 hover:text-white transition-colors duration-300">Home</a></li>
            <li><a href="#features" class="text-gray-400 hover:text-white transition-colors duration-300">Features</a></li>
            <li><a href="#about" class="text-gray-400 hover:text-white transition-colors duration-300">About</a></li>
            <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors duration-300">Contact</a></li>
          </ul>
        </div>
        
        <!-- App Download -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Download App</h3>
          <div class="space-y-3">
            <a href="#" class="block bg-gray-800 hover:bg-gray-700 text-white rounded-lg p-3 transition-colors duration-300">
              <div class="flex items-center space-x-3">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 384 512"><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path></svg>
                <div>
                  <div class="text-xs">Download on</div>
                  <div class="text-sm font-semibold">App Store</div>
                </div>
              </div>
            </a>
            <a href="{{ route('download.apk') }}" class="block bg-gray-800 hover:bg-gray-700 text-white rounded-lg p-3 transition-colors duration-300">
              <div class="flex items-center space-x-3">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 512 512"><path d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z"></path></svg>
                <div>
                  <div class="text-xs">Get it on</div>
                  <div class="text-sm font-semibold">Google Play</div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      
      <div class="border-t border-gray-800 mt-8 pt-8 text-center">
        <p class="text-gray-400">&copy; {{ date('Y') }} Wibook. All rights reserved. Empowering financial management worldwide.</p>
      </div>
    </div>
  </footer>

  <script>
    // Smooth scrolling for navigation links
    document.addEventListener('DOMContentLoaded', function() {
      // Add smooth scrolling to all links
      const links = document.querySelectorAll('a[href^="#"]');
      
      links.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          
          const targetId = this.getAttribute('href');
          const targetSection = document.querySelector(targetId);
          
          if (targetSection) {
            targetSection.scrollIntoView({
              behavior: 'smooth',
              block: 'start'
            });
            
            // Close mobile menu if open
            const mobileMenu = document.getElementById('mobileMenu');
            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
              mobileMenu.classList.add('hidden');
            }
          }
        });
      });
      
      // Intersection Observer for fade-in animations
      const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
      };
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('fade-in-up');
          }
        });
      }, observerOptions);
      
      // Observe all sections
      const sections = document.querySelectorAll('section');
      sections.forEach(section => {
        observer.observe(section);
      });
    });
    
    // Mobile menu toggle
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    
    if (menuToggle && mobileMenu) {
      menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
      });
    }
    
    // Scroll to top button
    const scrollToTopBtn = document.createElement('button');
    scrollToTopBtn.innerHTML = `
      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
      </svg>
    `;
    scrollToTopBtn.className = 'fixed bottom-8 right-8 bg-green-600 hover:bg-green-700 text-white p-3 rounded-full shadow-lg transition-all duration-300 opacity-0 invisible z-50 hover-scale';
    scrollToTopBtn.setAttribute('aria-label', 'Scroll to top');
    document.body.appendChild(scrollToTopBtn);
    
    // Show/hide scroll to top button
    window.addEventListener('scroll', () => {
      if (window.pageYOffset > 300) {
        scrollToTopBtn.classList.remove('opacity-0', 'invisible');
        scrollToTopBtn.classList.add('opacity-100', 'visible');
      } else {
        scrollToTopBtn.classList.add('opacity-0', 'invisible');
        scrollToTopBtn.classList.remove('opacity-100', 'visible');
      }
    });
    
    // Scroll to top on click
    scrollToTopBtn.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  </script>



</body>
</html>
