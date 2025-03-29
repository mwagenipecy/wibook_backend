<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wibook App</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Custom gradient background */
    .bg-custom-gradient {
      background: linear-gradient(to right, #e5e7eb, #24593f);
    }

    .bounce-zoom {
      transition: transform 10.3s ease-in-out;
    }

    @keyframes bounce {
    0%, 100% {
      transform: translateY(0); /* Start and end at the original position */
    }
    50% {
      transform: translateY(-20px); /* Move the image up */
    }
  }

  #bouncingImage {
    animation: bounce 10s infinite; /* Apply the bouncing animation */
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
            <a href="#" class="text-white hover:text-gray-600 font-semibold">Home</a>
            <a href="#" class="text-white hover:text-gray-600 font-semibold">Service</a>
            <a href="#" class="text-white  hover:text-gray-600 font-semibold">About Us</a>
            <a href="#" class="text-white  hover:text-gray-600 font-semibold">Contact</a>
        </div>
    </div>

    <!-- Mobile Menu Links (hidden by default) -->
    <div id="mobileMenu" class="lg:hidden hidden mt-4 space-y-4 px-6  ">
        <a href="#" class="text-gray-800 hover:text-gray-600 font-semibold">Home</a>
        <a href="#" class="text-gray-800 hover:text-gray-600 font-semibold">Service</a>
        <a href="#" class="text-gray-800 hover:text-gray-600 font-semibold">About Us</a>
        <a href="#" class="text-gray-800 hover:text-gray-600 font-semibold">Contact</a>
    </div>
</div>

<script>
    // Toggle the mobile menu
    const menuToggle = document.getElementById('menuToggle');
    const navLinks = document.getElementById('navLinks');
    const mobileMenu = document.getElementById('mobileMenu');

    menuToggle.addEventListener('click', () => {
        // Toggle visibility of the menu for small screens
        mobileMenu.classList.toggle('hidden');
    });
</script>




  <!-- Main Content -->
  <div class="container mx-auto flex flex-wrap md:flex-nowrap items-center  justify-between px-12 py-12">
    <!-- Left Text Section -->
    <div class="w-full md:w-1/2 space-y-6 ">
      <h1 class="text-6xl font-extrabold  mx-12 text-gray-800 leading-tight">
        <span class="block">Wibook</span>
        <span class="text-[#24593f] ">App</span>
      </h1>

      <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
        <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
            <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path></svg>
            <div class="text-left rtl:text-right">
                <div class="mb-1 text-xs">Download on the</div>
                <div class="-mt-1 font-sans text-sm font-semibold">Mac App Store</div>
            </div>
        </a>
        <a href="{{ route('download.apk') }}" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
            <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z"></path></svg>
            <div class="text-left rtl:text-right">
                <div class="mb-1 text-xs">Get in on</div>
                <div class="-mt-1 font-sans text-sm font-semibold">Google Play</div>
            </div>
        </a>
    </div>

    </div>

    <!-- Right Image Section -->
    <div class="w-full md:w-1/2 flex justify-center">
      <img  id="bouncingImage"  src="{{ asset("/img/imgg1.png") }}" alt="Wibook App Preview" class="w-full max-w-lg ">
    </div>


  </div>

  <section class="min-h-screen  flex items-center justify-center  p-10">

  <div class="flex flex-col md:flex-row items-center justify-between py-12 px-6">
    <!-- Left Side: Image -->
    <div class="w-full md:w-1/2 flex justify-center items-center mb-6 md:mb-0">
        <img src="{{ asset('/img/img2223.png') }}" alt="App Image" class="w-full md:w-1/2 h-auto object-cover rounded-lg" />
    </div>

    <!-- Right Side: Title and Description -->
    <div class="w-full md:w-1/2 md:pl-12 text-center md:text-left">
    <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Welcome to Wibook</h1>
    <div class="w-20 h-1 bg-green-900 mt-2 mb-6 mx-auto md:mx-0"></div>

    <p class="text-base md:text-lg text-white mb-6">
        Wibook is a powerful financial management application designed to help you manage your income and expenditures efficiently. Whether you're tracking personal finances or collaborating with others on shared financial projects, Wibook provides an intuitive platform to keep everything organized.
    </p>

    <p class="text-base md:text-lg text-white">
        With Wibook, you can register incomes and expenses, monitor cash flow, and gain valuable insights into your financial health. Our shared features allow multiple users to collaborate on financial projects, ensuring transparency and accountability. Stay in control of your finances with Wibook and track every transaction with ease.
    </p>
</div>




</div>
  </section>





  <section class="min-h-screen  flex items-center justify-center  p-10">
    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center">
      <!-- Left Side: Advantages List -->
      <div class="w-full lg:w-1/2">
    <h2 class="text-3xl font-bold mb-6">Application Advantages</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
        <div>
            <div class="flex items-center space-x-4">
                <div class="bg-green-700 text-white font-bold w-24 h-10 flex items-center justify-center rounded-full">
                    01
                </div>
                <p class="text-gray-700">
                    <strong>Project Section:</strong> Organize and manage financial projects collaboratively, ensuring seamless income and expenditure tracking.
                </p>
            </div>
        </div>
        <div>
            <div class="flex items-center space-x-4">
                <div class="bg-green-700 text-white font-bold w-24 h-10 flex items-center justify-center rounded-full">
                    02
                </div>
                <p class="text-gray-700">
                    <strong>Transaction Section:</strong> Record and categorize all financial transactions efficiently, keeping track of cash flow with ease.
                </p>
            </div>
        </div>
        <div>
            <div class="flex items-center space-x-4">
                <div class="bg-green-700 text-white font-bold w-24 h-10 flex items-center justify-center rounded-full">
                    03
                </div>
                <p class="text-gray-700">
                    <strong>Notification Section:</strong> Stay updated with real-time alerts on transactions, project activities, and shared financial updates.
                </p>
            </div>
        </div>
        <div>
            <div class="flex items-center space-x-4">
                <div class="bg-green-700 text-white font-bold w-24 h-10 flex items-center justify-center rounded-full">
                    04
                </div>
                <p class="text-gray-700">
                    <strong>Profile Management:</strong> Customize your profile, manage preferences, and track your personal financial activities.
                </p>
            </div>
        </div>
        <div>
            <div class="flex items-center space-x-4">
                <div class="bg-green-700 text-white font-bold w-24 h-10 flex items-center justify-center rounded-full">
                    05
                </div>
                <p class="text-gray-700">
                    <strong>Home Dashboard:</strong> Get an overview of all your financial activities, projects, and recent transactions in one place.
                </p>
            </div>
        </div>
        <div>
            <div class="flex items-center space-x-4">
                <div class="bg-green-700 text-white font-bold w-24 h-10 flex items-center justify-center rounded-full">
                    06
                </div>
                <p class="text-gray-700">
                    <strong>Collaborative Features:</strong> Share projects with other users, allowing for transparent financial management and tracking.
                </p>
            </div>
        </div>
    </div>
</div>


      <!-- Right Side: Mobile Screen Mockup -->
      <div class="w-full lg:w-1/2 flex justify-center mt-10 lg:mt-0">
        <div class="relative w-64 h-auto">
          <img
            src="{{ asset('/img/aa1.png') }}"
            alt="Mobile Mockup"
            class=""
          />
        </div>
      </div>
    </div>
  </section>





  <section class=" min-h-screen  flex items-center justify-center  p-10">
    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center">
      <!-- Left Side: Mobile Screen Mockup -->
      <div class="w-full lg:w-3/5 flex justify-center gap-6 mt-10 lg:mt-0">
        <div class="relative  h-auto ">
          <img
            src="{{ asset('/img/xx.png') }}"
            alt="Mobile Mockup 1"
            class=""
          />
        </div>


      </div>

   <!-- Right Side: Description Content -->
<div class="w-full lg:w-2/5 mt-10 lg:mt-0 lg:ml-10">
    <h2 class="text-3xl font-bold mb-6">Menu Display</h2>
    <div class="space-y-6">
        <div class="flex items-center space-x-4">
            <div class="bg-green-700 text-white font-bold w-16 h-10 flex items-center justify-center rounded-full">
                01
            </div>
            <p class="text-gray-700">
                <strong>Home:</strong> Get a quick overview of your financial activities, transactions, and project summaries.
            </p>
        </div>
        <div class="flex items-center space-x-4">
            <div class="bg-green-700 text-white font-bold w-16 h-10 flex items-center justify-center rounded-full">
                02
            </div>
            <p class="text-gray-700">
                <strong>Projects:</strong> Manage shared financial projects, track income and expenses, and collaborate with team members.
            </p>
        </div>
        <div class="flex items-center space-x-4">
            <div class="bg-green-700 text-white font-bold w-16 h-10 flex items-center justify-center rounded-full">
                03
            </div>
            <p class="text-gray-700">
                <strong>Transactions:</strong> Record, categorize, and analyze all financial transactions in a simple and structured way.
            </p>
        </div>
        <div class="flex items-center space-x-4">
            <div class="bg-green-700 text-white font-bold w-16 h-10 flex items-center justify-center rounded-full">
                04
            </div>
            <p class="text-gray-700">
                <strong>Notifications:</strong> Stay informed with real-time alerts for project updates, transactions, and financial changes.
            </p>
        </div>
        <div class="flex items-center space-x-4">
            <div class="bg-green-700 text-white font-bold w-16 h-10 flex items-center justify-center rounded-full">
                05
            </div>
            <p class="text-gray-700">
                <strong>Profile:</strong> Customize your profile, manage personal details, and adjust settings for a better user experience.
            </p>
        </div>
    </div>
</div>



    </div>
  </section>




  <section class="py-10 min-h-screen flex items-center justify-center px-8">
    <div class="max-w-7xl mx-auto text-center">
        <!-- Section Title -->
        <h2 class="text-3xl font-bold text-green-900 mb-10 mt-10">Application Features</h2>
        <div class="h-1 w-16 bg-green-900 mx-auto mb-8"></div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Feature 1: Project Management -->
            <div class="flex flex-col items-center">
                <div class="bg-green-800 text-white font-bold w-12 h-12 flex items-center justify-center rounded-full mb-4">
                    01
                </div>
                <p class="text-gray-700 text-center">
                    <strong>Project Management:</strong> Create and manage financial projects with shared access to track income and expenses.
                </p>
            </div>

            <!-- Feature 2: Transactions -->
            <div class="flex flex-col items-center">
                <div class="bg-green-800 text-white font-bold w-12 h-12 flex items-center justify-center rounded-full mb-4">
                    02
                </div>
                <p class="text-gray-700 text-center">
                    <strong>Transaction Tracking:</strong> Easily log, categorize, and monitor your financial transactions for better budgeting.
                </p>
            </div>

            <!-- Feature 3: Notifications -->
            <div class="flex flex-col items-center">
                <div class="bg-green-800 text-white font-bold w-12 h-12 flex items-center justify-center rounded-full mb-4">
                    03
                </div>
                <p class="text-gray-700 text-center">
                    <strong>Real-time Notifications:</strong> Stay updated with instant alerts for financial activities and project updates.
                </p>
            </div>

            <!-- Feature 4: User Profile & Dashboard -->
            <div class="flex flex-col items-center">
                <div class="bg-green-800 text-white font-bold w-12 h-12 flex items-center justify-center rounded-full mb-4">
                    04
                </div>
                <p class="text-gray-700 text-center">
                    <strong>User Dashboard & Profile:</strong> Customize your profile, manage personal details, and track overall financial insights.
                </p>
            </div>
        </div>
    </div>
</section>






<section class="min-h-screen flex items-center justify-center px-6">
    <div class="w-full max-w-7xl grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Mobile App Section -->
        <div class="flex items-center justify-center">
            <img src="{{ asset('/img/vvc.png') }}" alt="Mobile App Mockup" class="max-w-full">
        </div>

        <!-- News Update Section -->
        <div class="p-8">
            <h2 class="text-3xl font-bold text-green-900 mb-6">Latest News & Updates</h2>
            <div class="grid grid-cols-3 gap-6">
                <!-- Update 01 -->
                <div class="flex flex-col items-center">
                    <div class="relative w-20 h-20">
                        <svg class="w-full h-full text-gray-300" viewBox="0 0 36 36">
                            <circle class="stroke-current text-gray-300" stroke-width="3" fill="none" cx="18" cy="18" r="15"></circle>
                            <circle
                                class="stroke-current text-green-800"
                                stroke-width="3"
                                fill="none"
                                cx="18"
                                cy="18"
                                r="15"
                                stroke-dasharray="94.2"
                                stroke-dashoffset="12"
                                stroke-linecap="round"
                            ></circle>
                        </svg>
                        <span class="absolute inset-0 flex items-center justify-center font-bold text-lg text-green-900">87%</span>
                    </div>
                    <p class="mt-3 text-center font-medium text-gray-700">Feature Enhancement</p>
                </div>

                <!-- Update 02 -->
                <div class="flex flex-col items-center">
                    <div class="relative w-20 h-20">
                        <svg class="w-full h-full text-gray-300" viewBox="0 0 36 36">
                            <circle class="stroke-current text-gray-300" stroke-width="3" fill="none" cx="18" cy="18" r="15"></circle>
                            <circle
                                class="stroke-current text-green-800"
                                stroke-width="3"
                                fill="none"
                                cx="18"
                                cy="18"
                                r="15"
                                stroke-dasharray="94.2"
                                stroke-dashoffset="28"
                                stroke-linecap="round"
                            ></circle>
                        </svg>
                        <span class="absolute inset-0 flex items-center justify-center font-bold text-lg text-green-900">70%</span>
                    </div>
                    <p class="mt-3 text-center font-medium text-gray-700">Security Update</p>
                </div>

                <!-- Update 03 -->
                <div class="flex flex-col items-center">
                    <div class="relative w-20 h-20">
                        <svg class="w-full h-full text-gray-300" viewBox="0 0 36 36">
                            <circle class="stroke-current text-gray-300" stroke-width="3" fill="none" cx="18" cy="18" r="15"></circle>
                            <circle
                                class="stroke-current text-green-800"
                                stroke-width="3"
                                fill="none"
                                cx="18"
                                cy="18"
                                r="15"
                                stroke-dasharray="94.2"
                                stroke-dashoffset="17"
                                stroke-linecap="round"
                            ></circle>
                        </svg>
                        <span class="absolute inset-0 flex items-center justify-center font-bold text-lg text-green-900">82%</span>
                    </div>
                    <p class="mt-3 text-center font-medium text-gray-700">New Integration</p>
                </div>
            </div>

            <p class="mt-6 text-center text-gray-600 text-sm leading-relaxed">
                Stay up to date with the latest enhancements and security patches. We continuously improve to provide a seamless experience. Explore the latest updates to ensure you get the best out of our platform.
            </p>
        </div>
    </div>
</section>




  <section class="min-h-screen flex items-center justify-center px-12">
    <div class="w-full max-w-7xl grid grid-cols-1 lg:grid-cols-2 gap-8">
      <!-- Contact Us Section -->
      <div class=" flex justify-center item-center  ">
        <div>
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Our Contact</h2>

        <ul class="space-y-4">
          <!-- Phone -->
          <li class="flex items-center space-x-4">
            <span class="w-10 h-10 bg-green-800 text-white rounded-full flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11m-6-7h4a2 2 0 012 2v16a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4a2 2 0 00-2-2h-1a2 2 0 00-2 2v4a2 2 0 002 2h2a2 2 0 012 2v2a2 2 0 01-2 2h-1a2 2 0 01-2-2v-8a2 2 0 00-2-2h-1a2 2 0 00-2 2v8a2 2 0 01-2 2H3z" />
              </svg>
            </span>
            <p class="text-lg text-gray-600">+255767582837</p>
          </li>
          <!-- Website -->
          <li class="flex items-center space-x-4">
            <span class="w-10 h-10 bg-green-800 text-white rounded-full flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
              </svg>
            </span>
            <p class="text-lg text-gray-600">www.wibook.com</p>
          </li>
          <!-- Email -->
          <li class="flex items-center space-x-4">
            <span class="w-10 h-10 bg-green-800 text-white rounded-full flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-18 8V6a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
              </svg>
            </span>
            <p class="text-lg text-gray-600"> N/A</p>
          </li>
          <!-- Address -->
          <li class="flex items-center space-x-4">
            <span class="w-10 h-10 bg-green-800 text-white rounded-full flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A15.978 15.978 0 0112 19c3.866 0 7.366-1.418 10.121-3.804A4 4 0 0016.242 13H7.758a4 4 0 00-2.637 1.804z" />
              </svg>
            </span>
            <p class="text-lg text-gray-600"> Dar Es Salaam - Tanzania</p>
          </li>


          <div class="max-w-lg mx-auto p-6  ">
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-2">Contact Us</h2>


            @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        {{ session('success') }}
    </div>
@endif



@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



            <!-- Form -->
            <form action="{{ route('register.comment') }}" method="POST">
              @csrf
                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-600 font-semibold ">Your Name</label>
                    <input type="text" id="name"  required name="name" class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 font-semibold 2">Your Email</label>
                    <input type="email" required  id="email" name="email" class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Message Field -->
                <div class="mb-4">
                    <label for="message" class="block text-gray-600 font-semibold 2">Your Message</label>
                    <textarea required  id="message" name="message" rows="4" class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="w-full py-3 bg-green-800 text-white font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-700">Send Message</button>
                </div>
            </form>
        </div>


        </ul>

        </div>


      </div>

      <!-- Image Section -->
      <div class="relative">
        <img src="{{ asset('/img/zz1.png') }}" alt="Mobile App" class="w-full rounded-lg shadow-lg">
      </div>
    </div>


  </section>



  <script>
    // Select the image element
    const bouncingImage = document.getElementById('bouncingImage');

    // Optionally, you can control the speed and intensity of the bounce
    const bounceDuration = 2; // Duration of one bounce cycle (in seconds)
    const bounceDistance = '20px'; // Distance the image will move up/down
  </script>



</body>
</html>
