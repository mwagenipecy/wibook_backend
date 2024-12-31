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
            <a href="#" class="text-gray-800 hover:text-gray-600 font-semibold">Home</a>
            <a href="#" class="text-gray-800 hover:text-gray-600 font-semibold">Service</a>
            <a href="#" class="text-gray-800 hover:text-gray-600 font-semibold">About Us</a>
            <a href="#" class="text-gray-800 hover:text-gray-600 font-semibold">Contact</a>
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
        <span class="text-[#24593f] ">Apps</span>
      </h1>

      <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
        <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
            <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path></svg>
            <div class="text-left rtl:text-right">
                <div class="mb-1 text-xs">Download on the</div>
                <div class="-mt-1 font-sans text-sm font-semibold">Mac App Store</div>
            </div>
        </a>
        <a href="#" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
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
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Welcome To Our Application</h1>
        <div class="w-20 h-1 bg-green-900 mt-2 mb-6 mx-auto md:mx-0"></div>
        <p class="text-base md:text-lg text-white mb-6">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
        </p>

        <p class="text-base md:text-lg text-white">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
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
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam.
              </p>
            </div>
          </div>
          <div>
            <div class="flex items-center space-x-4">
              <div class="bg-green-700 text-white font-bold w-24 h-10 flex items-center justify-center rounded-full">
                02
              </div>
              <p class="text-gray-700">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam.
              </p>
            </div>
          </div>
          <div>
            <div class="flex items-center space-x-4">
              <div class="bg-green-700 text-white font-bold w-24 h-10 flex items-center justify-center rounded-full">
                03
              </div>
              <p class="text-gray-700">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam.
              </p>
            </div>
          </div>
          <div>
            <div class="flex items-center space-x-4">
              <div class="bg-green-700 text-white font-bold w-24 h-10 flex items-center justify-center rounded-full">
                04
              </div>
              <p class="text-gray-700">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam.
              </p>
            </div>
          </div>
          <div>
            <div class="flex items-center space-x-4">
              <div class="bg-green-700 text-white font-bold w-24 h-10 flex items-center justify-center rounded-full">
                05
              </div>
              <p class="text-gray-700">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam.
              </p>
            </div>
          </div>
          <div>
            <div class="flex items-center space-x-4">
              <div class="bg-green-700 text-white font-bold w-24 h-10 flex items-center justify-center rounded-full">
                06
              </div>
              <p class="text-gray-700">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam.
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
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam.
            </p>
          </div>
          <div class="flex items-center space-x-4">
            <div class="bg-green-700 text-white font-bold w-16 h-10 flex items-center justify-center rounded-full">
              02
            </div>
            <p class="text-gray-700">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam.
            </p>
          </div>
          <div class="flex items-center space-x-4">
            <div class="bg-green-700 text-white font-bold w-16 h-10 flex items-center justify-center rounded-full">
              03
            </div>
            <p class="text-gray-700">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>




  <section class=" py-10 min-h-screen  flex items-center justify-center px-8">
    <div class="max-w-7xl mx-auto text-center">
      <!-- Section Title -->
      <h2 class="text-3xl font-bold text-green-900 mb-10 mt-10">Application Features</h2>
      <div class="h-1 w-16 bg-green-900 mx-auto mb-8"></div>

      <!-- Features Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Feature 1 -->
        <div class="flex flex-col items-center">
          <div class="bg-green-800 text-white font-bold w-12 h-12 flex items-center justify-center rounded-full mb-4">
            01
          </div>
          <p class="text-gray-700 text-center">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
          </p>
        </div>

        <!-- Feature 2 -->
        <div class="flex flex-col items-center">
          <div class="bg-green-800 text-white font-bold w-12 h-12 flex items-center justify-center rounded-full mb-4">
            02
          </div>
          <p class="text-gray-700 text-center">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
          </p>
        </div>

        <!-- Feature 3 -->
        <div class="flex flex-col items-center">
          <div class="bg-green-800 text-white font-bold w-12 h-12 flex items-center justify-center rounded-full mb-4">
            03
          </div>
          <p class="text-gray-700 text-center">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
          </p>
        </div>

        <!-- Feature 4 -->
        <div class="flex flex-col items-center">
          <div class="bg-green-800 text-white font-bold w-12 h-12 flex items-center justify-center rounded-full mb-4">
            04
          </div>
          <p class="text-gray-700 text-center">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
          </p>
        </div>
      </div>
    </div>
  </section>






  <section class="min-h-screen  flex items-center justify-center px-6">
    <div class="w-full max-w-7xl grid grid-cols-1 lg:grid-cols-2 gap-8">
      <!-- Mobile App Section -->
      <div class="flex items-center justify-center">
        <img src="{{ asset('/img/vvc.png') }}" alt="Mobile App Mockup" class="max-w-full ">
      </div>

      <!-- News Update Section -->
      <div class=" p-8">
        <h2 class="text-2xl font-bold mb-6">News Update</h2>
        <div class="grid grid-cols-3 gap-6">
          <!-- Update 01 -->
          <div class="flex flex-col items-center">
            <div class="relative w-20 h-20">
              <svg class="w-full h-full text-gray-300" viewBox="0 0 36 36">
                <circle class="stroke-current text-green-800" stroke-width="3" fill="none" cx="18" cy="18" r="15"></circle>
                <circle
                  class="stroke-current text-white"
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
              <span class="absolute inset-0 flex items-center justify-center font-bold text-lg">87%</span>
            </div>
            <p class="mt-3 text-center font-medium">Update 01</p>
          </div>
          <!-- Update 02 -->
          <div class="flex flex-col items-center">
            <div class="relative w-20 h-20">
              <svg class="w-full h-full text-gray-300" viewBox="0 0 36 36">
                <circle class="stroke-current text-green-800" stroke-width="3" fill="none" cx="18" cy="18" r="15"></circle>
                <circle
                  class="stroke-current text-white"
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
              <span class="absolute inset-0 flex items-center justify-center font-bold text-lg">70%</span>
            </div>
            <p class="mt-3 text-center font-medium">Update 02</p>
          </div>
          <!-- Update 03 -->
          <div class="flex flex-col items-center">
            <div class="relative w-20 h-20">
              <svg class="w-full h-full text-gray-300" viewBox="0 0 36 36">
                <circle class="stroke-current text-green-800" stroke-width="3" fill="none" cx="18" cy="18" r="15"></circle>
                <circle
                  class="stroke-current text-white"
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
              <span class="absolute inset-0 flex items-center justify-center font-bold text-lg">82%</span>
            </div>
            <p class="mt-3 text-center font-medium">Update 03</p>
          </div>
        </div>
        <p class="mt-6 text-center text-sm">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
            <p class="text-lg text-gray-600">+123-456-7890</p>
          </li>
          <!-- Website -->
          <li class="flex items-center space-x-4">
            <span class="w-10 h-10 bg-green-800 text-white rounded-full flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
              </svg>
            </span>
            <p class="text-lg text-gray-600">www.reallygreatsite.com</p>
          </li>
          <!-- Email -->
          <li class="flex items-center space-x-4">
            <span class="w-10 h-10 bg-green-800 text-white rounded-full flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-18 8V6a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
              </svg>
            </span>
            <p class="text-lg text-gray-600">hello@reallygreatsite.com</p>
          </li>
          <!-- Address -->
          <li class="flex items-center space-x-4">
            <span class="w-10 h-10 bg-green-800 text-white rounded-full flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A15.978 15.978 0 0112 19c3.866 0 7.366-1.418 10.121-3.804A4 4 0 0016.242 13H7.758a4 4 0 00-2.637 1.804z" />
              </svg>
            </span>
            <p class="text-lg text-gray-600">123 Anywhere ST., Any City, ST 12345</p>
          </li>


          <div class="max-w-lg mx-auto p-6  ">
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-2">Contact Us</h2>

            <!-- Form -->
            <form action="#" method="POST">
                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-600 font-semibold ">Your Name</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 font-semibold 2">Your Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Message Field -->
                <div class="mb-4">
                    <label for="message" class="block text-gray-600 font-semibold 2">Your Message</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
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
