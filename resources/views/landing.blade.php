<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link

href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <style>
    body {
      font-family: Poppins, sans-serif;
    }
  </style>

</head>

<body class="max-w-[1920px] mx-auto">
  <div class="bg-white text-black text-[15px]">
    <header
      class='shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] sticky top-0 py-3 px-4 sm:px-10 bg-white z-50 min-h-[70px]'>
      <div class='flex flex-wrap items-center gap-4'>
        <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo" class='w-36' />
        </a>

        <div id="collapseMenu"
          class='max-lg:hidden lg:!block max-lg:fixed max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50
max-lg:before:inset-0 max-lg:before:z-50'>
          <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white p-3'>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black" viewBox="0 0 320.591 320.591">
              <path
                d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643
10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0
1-21.256 7.288z"
                data-original="#000000"></path>
              <path
                d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736
28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0
1-23.078 7.288z"
                data-original="#000000"></path>
            </svg>
          </button>

          <ul
            class='lg:ml-12 lg:flex gap-x-6 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px]
max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
            <li class='mb-6 hidden max-lg:block'>
              <a href="javascript:void(0)"><img src="https://www.udsm.ac.tz/web/themes/udsm/layouts/main/img/logo_ud.png" alt="logo" class='w-36' />
              </a>
            </li>


          </ul>
        </div>

        <div class='flex ml-auto'>
          <button class='mr-6 font-semibold border-none outline-none'><a href='javascript:void(0)'
              class='text-blue-600 hover:underline'>Login</a></button>
          <button class='bg-blue-600 hover:bg-blue-700 transition-all text-white rounded-full px-5 py-2.5'>Sign
            up</button>
          <button id="toggleOpen" class='lg:hidden ml-7'>
            <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0
011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"></path>
            </svg>
          </button>
        </div>
      </div>
    </header>

    <div class="px-4 sm:px-10">
      <div class="min-h-[500px]">
        <div class="grid md:grid-cols-2 justify-center items-center gap-10">
          <div class="max-md:order-1 mt-6">
            <p class="mt-4 mb-2 font-semibold text-blue-600"><span class="rotate-90 inline-block mr-2">|</span> ALL IN
              ONE
              MEETING SCHEDULER</p>
            <h1 class="md:text-5xl text-4xl font-bold mb-4 md:!leading-[55px]">Schedule meetings effortlessly</h1>
            <p class="mt-4 text-base leading-relaxed">Embark on a gastronomic journey with our curated dishes, delivered
              promptly to your doorstep. Elevate your dining experience today. Delve into the details and let us enhance
              every aspect of your dining adventure.</p>
            <div
              class="bg-white mt-10 flex px-1 py-1.5 rounded-full shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] overflow-hidden">
              <input type='email' placeholder='Search Something...' class="w-full outline-none bg-white pl-4" />
              <button type='button'
                class="bg-blue-600 hover:bg-blue-700 transition-all text-white rounded-full px-5 py-2.5">Search</button>
            </div>
            <div class="flex items-center mt-10">
              <input id="checkbox3" type="checkbox" class="hidden peer" checked />
              <label for="checkbox3"
                class="relative flex items-center justify-center p-1 peer-checked:before:hidden before:block before:absolute
before:w-full before:h-full before:bg-white w-5 h-5 cursor-pointer bg-blue-600 border rounded-full overflow-hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-white" viewBox="0 0 520 520">
                  <path
                    d="M79.423 240.755a47.529 47.529 0 0 0-36.737 77.522l120.73 147.894a43.136 43.136 0 0 0 36.066
16.009c14.654-.787 27.884-8.626 36.319-21.515L486.588 56.773a6.13 6.13 0 0 1 .128-.2c2.353-3.613 1.59-10.773-3.267-15.271a13.321
13.321 0 0 0-19.362 1.343q-.135.166-.278.327L210.887 328.736a10.961 10.961 0 0 1-15.585.843l-83.94-76.386a47.319 47.319 0 0
0-31.939-12.438z"
                    data-name="7-Check" data-original="#000000" />
                </svg>
              </label>
              <p class="text-base ml-3">No credit card required!</p>
            </div>
            <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-4 items-center">
              <img src="https://readymadeui.com/google-logo.svg" class="w-28 mx-auto" alt="google-logo" />
              <img src="https://readymadeui.com/facebook-logo.svg" class="w-28 mx-auto" alt="facebook-logo" />
              <img src="https://readymadeui.com/linkedin-logo.svg" class="w-28 mx-auto" alt="linkedin-logo" />
              <img src="https://readymadeui.com/pinterest-logo.svg" class="w-28 mx-auto" alt="pinterest-logo" />
            </div>
          </div>
          <div class="max-md:mt-12 h-full">
            <img src="https://readymadeui.com/team-image.webp" alt="banner img" class="w-full h-full object-cover" />
          </div>
        </div>
      </div>

      <div class="mt-28 bg-gray-50 px-4 sm:px-10 py-12">
        <div class="max-w-7xl mx-auto">
          <div class="md:text-center max-w-2xl mx-auto">
            <h2 class="md:text-4xl text-3xl font-bold mb-6">Discover Our Exclusive Features</h2>
            <p>Unlock a world of possibilities with our exclusive features. Explore how our unique offerings can
              transform your journey and empower you to achieve more.</p>
          </div>
          <div class="grid lg:grid-cols-3 sm:grid-cols-2 gap-10 mt-14">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-blue-600 mb-4 inline-block" viewBox="0 0 32 32">
                <path
                  d="M28.068 12h-.128a.934.934 0 0 1-.864-.6.924.924 0 0 1 .2-1.01l.091-.091a2.938 2.938 0 0 0
0-4.147l-1.511-1.51a2.935 2.935 0 0 0-4.146 0l-.091.091A.956.956 0 0 1 20 4.061v-.129A2.935 2.935 0 0 0 17.068 1h-2.136A2.935
2.935 0 0 0 12 3.932v.129a.956.956 0 0 1-1.614.668l-.086-.091a2.935 2.935 0 0 0-4.146 0l-1.516 1.51a2.938 2.938 0 0 0 0
4.147l.091.091a.935.935 0 0 1 .185 1.035.924.924 0 0 1-.854.579h-.128A2.935 2.935 0 0 0 1 14.932v2.136A2.935 2.935 0 0 0 3.932
20h.128a.934.934 0 0 1 .864.6.924.924 0 0 1-.2 1.01l-.091.091a2.938 2.938 0 0 0 0 4.147l1.51 1.509a2.934 2.934 0 0 0 4.147
0l.091-.091a.936.936 0 0 1 1.035-.185.922.922 0 0 1 .579.853v.129A2.935 2.935 0 0 0 14.932 31h2.136A2.935 2.935 0 0 0 20
28.068v-.129a.956.956 0 0 1 1.614-.668l.091.091a2.935 2.935 0 0 0 4.146 0l1.511-1.509a2.938 2.938 0 0 0
0-4.147l-.091-.091a.935.935 0 0 1-.185-1.035.924.924 0 0 1 .854-.58h.128A2.935 2.935 0 0 0 31 17.068v-2.136A2.935 2.935 0 0 0
28.068 12ZM29 17.068a.933.933 0 0 1-.932.932h-.128a2.956 2.956 0 0 0-2.083 5.028l.09.091a.934.934 0 0 1 0 1.319l-1.511
1.509a.932.932 0 0 1-1.318 0l-.09-.091A2.957 2.957 0 0 0 18 27.939v.129a.933.933 0 0 1-.932.932h-2.136a.933.933 0 0
1-.932-.932v-.129a2.951 2.951 0 0 0-5.028-2.082l-.091.091a.934.934 0 0 1-1.318 0l-1.51-1.509a.934.934 0 0 1
0-1.319l.091-.091A2.956 2.956 0 0 0 4.06 18h-.128A.933.933 0 0 1 3 17.068v-2.136A.933.933 0 0 1 3.932 14h.128a2.956 2.956 0 0 0
2.083-5.028l-.09-.091a.933.933 0 0 1 0-1.318l1.51-1.511a.932.932 0 0 1 1.318 0l.09.091A2.957 2.957 0 0 0 14 4.061v-.129A.933.933
0 0 1 14.932 3h2.136a.933.933 0 0 1 .932.932v.129a2.956 2.956 0 0 0 5.028 2.082l.091-.091a.932.932 0 0 1 1.318 0l1.51
1.511a.933.933 0 0 1 0 1.318l-.091.091A2.956 2.956 0 0 0 27.94 14h.128a.933.933 0 0 1 .932.932Z"
                  data-original="#000000" />
                <path d="M16 9a7 7 0 1 0 7 7 7.008 7.008 0 0 0-7-7Zm0 12a5 5 0 1 1 5-5 5.006 5.006 0 0 1-5 5Z"
                  data-original="#000000" />
              </svg>
              <h3 class="text-xl font-semibold mb-2">Customization</h3>
              <p>Tailor our product to suit your needs.</p>
              <a href="javascript:void(0);" class="text-blue-600 font-semibold inline-block mt-2 hover:underline">Learn
                more</a>
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-blue-600 mb-4 inline-block"
                viewBox="0 0 682.667 682.667">
                <defs>
                  <clipPath id="a" clipPathUnits="userSpaceOnUse">
                    <path d="M0 512h512V0H0Z" data-original="#000000" />
                  </clipPath>
                </defs>
                <g fill="none" class="stroke-blue-600" stroke-linecap="round" stroke-linejoin="round"
                  stroke-miterlimit="10" stroke-width="40" clip-path="url(#a)"
                  transform="matrix(1.33 0 0 -1.33 0 682.667)">
                  <path
                    d="M256 492 60 410.623v-98.925C60 183.674 137.469 68.38 256 20c118.53 48.38 196 163.674 196 291.698v98.925z"
                    data-original="#000000" />
                  <path d="M178 271.894 233.894 216 334 316.105" data-original="#000000" />
                </g>
              </svg>
              <h3 class="text-xl font-semibold mb-2">Security</h3>
              <p>Your data is protected by the latest security measures.</p>
              <a href="javascript:void(0);" class="text-blue-600 font-semibold inline-block mt-2 hover:underline">Learn
                more</a>
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-blue-600 mb-4 inline-block"
                viewBox="0 0 512.001 512.001">
                <path
                  d="M271.029 0c-33.091 0-61 27.909-61 61s27.909 61 61 61 60-27.909 60-61-26.909-61-60-61zm66.592 122c-16.485
18.279-40.096 30-66.592 30-26.496 0-51.107-11.721-67.592-30-14.392 15.959-23.408 36.866-23.408 60v15c0 8.291 6.709 15 15
15h151c8.291 0 15-6.709 15-15v-15c0-23.134-9.016-44.041-23.408-60zM144.946 460.404 68.505
307.149c-7.381-14.799-25.345-20.834-40.162-13.493l-19.979 9.897c-7.439 3.689-10.466 12.73-6.753 20.156l90 180c3.701 7.423 12.704
10.377 20.083 6.738l19.722-9.771c14.875-7.368 20.938-25.417 13.53-40.272zM499.73 247.7c-12.301-9-29.401-7.2-39.6 3.9l-82
100.8c-5.7 6-16.5 9.6-22.2 9.6h-69.901c-8.401 0-15-6.599-15-15s6.599-15 15-15h60c16.5 0 30-13.5
30-30s-13.5-30-30-30h-78.6c-7.476 0-11.204-4.741-17.1-9.901-23.209-20.885-57.949-30.947-93.119-22.795-19.528 4.526-32.697
12.415-46.053 22.993l-.445-.361-21.696 19.094L174.28 452h171.749c28.2 0 55.201-13.5 72.001-36l87.999-126c9.9-13.201
7.2-32.399-6.299-42.3z"
                  data-original="#000000" />
              </svg>
              <h3 class="text-xl font-semibold mb-2">Support</h3>
              <p>24/7 customer support for all your inquiries.</p>
              <a href="javascript:void(0);" class="text-blue-600 font-semibold inline-block mt-2 hover:underline">Learn
                more</a>
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-blue-600 mb-4 inline-block" viewBox="0 0 24 24">
                <g fill-rule="evenodd" clip-rule="evenodd">
                  <path
                    d="M17.03 8.97a.75.75 0 0 1 0 1.06l-4.2 4.2a.75.75 0 0 1-1.154-.114l-1.093-1.639L8.03 15.03a.75.75 0 0
1-1.06-1.06l3.2-3.2a.75.75 0 0 1 1.154.114l1.093 1.639L15.97 8.97a.75.75 0 0 1 1.06 0z"
                    data-original="#000000" />
                  <path
                    d="M13.75 9.5a.75.75 0 0 1 .75-.75h2a.75.75 0 0 1 .75.75v2a.75.75 0 0 1-1.5 0v-1.25H14.5a.75.75 0 0
1-.75-.75z"
                    data-original="#000000" />
                  <path
                    d="M3.095 3.095C4.429 1.76 6.426 1.25 9 1.25h6c2.574 0 4.57.51 5.905 1.845C22.24 4.429 22.75 6.426 22.75
9v6c0 2.574-.51 4.57-1.845 5.905C19.571 22.24 17.574 22.75 15 22.75H9c-2.574 0-4.57-.51-5.905-1.845C1.76 19.571 1.25 17.574 1.25
15V9c0-2.574.51-4.57 1.845-5.905zm1.06 1.06C3.24 5.071 2.75 6.574 2.75 9v6c0 2.426.49 3.93 1.405 4.845.916.915 2.419 1.405 4.845
1.405h6c2.426 0 3.93-.49 4.845-1.405.915-.916 1.405-2.419 1.405-4.845V9c0-2.426-.49-3.93-1.405-4.845C18.929 3.24 17.426 2.75 15
2.75H9c-2.426 0-3.93.49-4.845 1.405z"
                    data-original="#000000" />
                </g>
              </svg>
              <h3 class="text-xl font-semibold mb-2">Performance</h3>
              <p>Experience blazing-fast performance with our product.</p>
              <a href="javascript:void(0);" class="text-blue-600 font-semibold inline-block mt-2 hover:underline">Learn
                more</a>
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-blue-600 mb-4 inline-block"
                viewBox="0 0 504.69 504.69">
                <path
                  d="M252.343 262.673c-49.32 0-89.447-40.127-89.447-89.447s40.127-89.447 89.447-89.447 89.447 40.127 89.447
89.447-40.121 89.447-89.447 89.447zm0-158.235c-37.926 0-68.787 30.861-68.787 68.787s30.861 68.787 68.787 68.787 68.787-30.861
68.787-68.787-30.855-68.787-68.787-68.787z"
                  data-original="#000000" />
                <path
                  d="M391.787 405.309c-5.645 0-10.253-4.54-10.325-10.201-.883-70.306-58.819-127.503-129.15-127.503-49.264
0-93.543 27.405-115.561 71.52-8.724 17.473-13.269 36.31-13.517 55.988-.072 5.702-4.757 10.273-10.459
10.201s-10.273-4.757-10.201-10.459c.289-22.814 5.568-44.667 15.691-64.955 25.541-51.164 76.907-82.95 134.047-82.95 81.581 0
148.788 66.349 149.81 147.905.072 5.702-4.494 10.392-10.201 10.459-.046-.005-.087-.005-.134-.005z"
                  data-original="#000000" />
                <path
                  d="M252.343 463.751c-116.569 0-211.408-94.834-211.408-211.408 0-116.569 94.839-211.408 211.408-211.408 116.574
0 211.408 94.839 211.408 211.408 0 116.574-94.834 211.408-211.408 211.408zm0-402.156c-105.18 0-190.748 85.568-190.748
190.748s85.568 190.748 190.748 190.748 190.748-85.568 190.748-190.748S357.523 61.595 252.343 61.595zM71.827 90.07 14.356
32.599c-4.034-4.034-4.034-10.573 0-14.607 4.029-4.034 10.573-4.034 14.607 0l57.466 57.471c4.034 4.034 3.951 10.49 0 14.607-3.792
3.951-11.039 3.698-14.602 0z"
                  data-original="#000000" />
                <path
                  d="M14.717 92.254a10.332 10.332 0 0 1-10.299-9.653L.023 15.751a10.317 10.317 0 0 1 2.929-7.908 10.2 10.2 0 0 1
7.851-3.089L77.56 7.796c5.697.258 10.108 5.093 9.85 10.79s-5.041 10.154-10.79 9.85l-55.224-2.521 3.641 55.327c.377 5.692-3.936
10.614-9.628 10.986a7.745 7.745 0 0 1-.692.026zm403.541-2.184c-4.256-3.796-4.034-10.573 0-14.607l58.116-58.116c4.034-4.034
10.573-4.034 14.607 0s4.034 10.573 0 14.607L432.864 90.07c-4.085 3.951-9.338 4.7-14.606 0z"
                  data-original="#000000" />
                <path
                  d="M489.974 92.254a9.85 9.85 0 0 1-.687-.021c-5.697-.372-10.01-5.294-9.633-10.986l3.641-55.327-55.224
2.515c-5.511.238-10.526-4.147-10.79-9.85-.258-5.702 4.153-10.531 9.85-10.79l66.757-3.042c2.934-.134 5.79.992 7.851 3.089s3.12
4.974 2.929 7.908l-4.401 66.85c-.361 5.465-4.896 9.654-10.293 9.654zM11.711 489.339c-3.791-4.266-4.034-10.573
0-14.607l60.115-60.11c4.029-4.034 10.578-4.034 14.607 0 4.034 4.034 4.034 10.573 0 14.607l-60.115 60.11c-3.827 3.884-11.156
3.884-14.607 0z"
                  data-original="#000000" />
                <path
                  d="M10.327 499.947a10.33 10.33 0 0 1-7.376-3.104 10.312 10.312 0 0 1-2.929-7.902l4.401-66.85c.372-5.697
5.191-10.036 10.986-9.633 5.692.377 10.005 5.294 9.628 10.986l-3.641 55.332 55.224-2.515c5.645-.191 10.531 4.153 10.79 9.85.258
5.697-4.153 10.526-9.85 10.79l-66.763 3.037c-.155.004-.31.009-.47.009zm465.639-13.01-57.708-57.708c-4.034-4.034-4.034-10.573
0-14.607s10.573-4.034 14.607 0l57.708 57.708c4.034 4.034 3.962 10.5 0 14.607-3.817 3.951-10.062 3.951-14.607 0z"
                  data-original="#000000" />
                <path
                  d="M494.359 499.947c-.155 0-.315-.005-.47-.01l-66.757-3.042c-5.702-.263-10.108-5.088-9.85-10.79.263-5.702
5.113-9.984 10.79-9.85l55.219 2.515-3.641-55.332c-.372-5.692 3.941-10.609 9.633-10.986 5.625-.398 10.609 3.946 10.986
9.633l4.401 66.85a10.33 10.33 0 0 1-2.929 7.902 10.323 10.323 0 0 1-7.382 3.11z"
                  data-original="#000000" />
              </svg>
              <h3 class="text-xl font-semibold mb-2">Global Reach</h3>
              <p>Expand your reach with our global network.</p>
              <a href="javascript:void(0);" class="text-blue-600 font-semibold inline-block mt-2 hover:underline">Learn
                more</a>
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-blue-600 mb-4 inline-block"
                viewBox="0 0 682.667 682.667">
                <defs>
                  <clipPath id="a" clipPathUnits="userSpaceOnUse">
                    <path d="M0 512h512V0H0Z" data-original="#000000" />
                  </clipPath>
                </defs>
                <g fill="none" class="stroke-blue-600" stroke-miterlimit="10" stroke-width="30" clip-path="url(#a)"
                  transform="matrix(1.33 0 0 -1.33 0 682.667)">
                  <path
                    d="M226 15v60c0 16.568-13.432 30-30 30H76c-16.568 0-30-13.432-30-30V15Zm-45 165c0-24.853-20.147-45-45-45s-45
20.147-45 45 20.147 45 45 45 45-20.147 45-45ZM466 15v60c0 16.568-13.432 30-30 30H316c-16.568 0-30-13.432-30-30V15Zm-45
165c0-24.853-20.147-45-45-45s-45 20.147-45 45 20.147 45 45 45 45-20.147 45-45Zm-75 167v-50.294L286 347h-60.002L166
296.706V347h-15c-41.421 0-75 33.579-75 75s33.579 75 75 75h210c41.421 0 75-33.579 75-75s-33.579-75-75-75Zm-105 75h30m-90 0h30m90
0h30"
                    data-original="#000000" />
                </g>
              </svg>
              <h3 class="text-xl font-semibold mb-2">Communication</h3>
              <p>Seamless communication for your team.</p>
              <a href="javascript:void(0);" class="text-blue-600 font-semibold inline-block mt-2 hover:underline">Learn
                more</a>
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-blue-600 mb-4 inline-block" viewBox="0 0 512 512">
                <path
                  d="M30 256C30 131.383 131.383 30 256 30c46.867 0 91.563 14.211 129.196 40.587h-29.074c-8.284 0-15 6.716-15
15s6.716 15 15 15h70.292c8.284 0 15-6.716 15-15V15.295c0-8.284-6.716-15-15-15s-15 6.716-15 15v37.339C366.987 18.499 312.91 0 256
0 187.62 0 123.333 26.629 74.98 74.98 26.629 123.333 0 187.62 0 256c0 44.921 11.871 89.182 34.33 127.998 2.78 4.806 7.818 7.49
12.997 7.49 2.55 0 5.134-.651 7.499-2.019 7.17-4.149 9.619-13.325 5.471-20.496C40.477 334.718 30 295.652 30
256zm447.67-127.998c-4.15-7.171-13.328-9.619-20.496-5.47-7.17 4.149-9.619 13.325-5.471 20.496C471.523 177.281 482 216.346 482
256c0 124.617-101.383 226-226 226-46.863 0-91.551-14.215-129.18-40.587h29.058c8.284 0 15-6.716
15-15s-6.716-15-15-15H85.587c-8.284 0-15 6.716-15 15v70.292c0 8.284 6.716 15 15 15s15-6.716 15-15v-37.376C145.013 493.475
199.083 512 256 512c68.38 0 132.667-26.629 181.02-74.98C485.371 388.667 512 324.38 512
256c0-44.923-11.871-89.184-34.33-127.998z"
                  data-original="#000000" />
                <path
                  d="M384.413 217.203a14.994 14.994 0 0 0-1.499-11.382l-20-34.641c-4.142-7.174-13.315-9.632-20.49-5.49l-13.602
7.853a108.886 108.886 0 0 0-37.821-21.856V136c0-8.284-6.716-15-15-15h-40c-8.284 0-15 6.716-15 15v15.686a108.89 108.89 0 0
0-37.822 21.856l-13.601-7.853c-7.174-4.144-16.349-1.685-20.49 5.49l-20 34.641c-4.142 7.174-1.684 16.348 5.49 20.49l13.598
7.851c-1.446 7.163-2.176 14.47-2.176 21.838s.729 14.676 2.176 21.838l-13.598 7.851c-7.174 4.142-9.632 13.316-5.49 20.49l20
34.641c4.142 7.175 13.315 9.633 20.49 5.49l13.601-7.853a108.865 108.865 0 0 0 37.822 21.856V376c0 8.284 6.716 15 15 15h40c8.284
0 15-6.716 15-15v-15.686a108.886 108.886 0 0 0 37.821-21.856l13.602 7.853c7.174 4.142 16.348 1.683 20.49-5.49l20-34.641a15.003
15.003 0 0 0 1.499-11.382 14.994 14.994 0 0 0-6.989-9.108l-13.599-7.852C365.271 270.676 366 263.369 366
256s-.729-14.676-2.175-21.838l13.599-7.852a14.995 14.995 0 0 0 6.989-9.107zM256 296c-22.091 0-40-17.909-40-40s17.909-40 40-40 40
17.909 40 40-17.909 40-40 40z"
                  data-original="#000000" />
              </svg>
              <h3 class="text-xl font-semibold mb-2">Integration</h3>
              <p>Seamlessly integrate with your existing tools and systems.</p>
              <a href="javascript:void(0);" class="text-blue-600 font-semibold inline-block mt-2 hover:underline">Learn
                more</a>
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-blue-600 mb-4 inline-block" viewBox="0 0 32 32">
                <path
                  d="M29 0H3C1.346 0 0 1.346 0 3v12.35a1 1 0 1 0 2 0V3c0-.552.449-1 1-1h26c.551 0 1 .448 1 1v26c0 .552-.449 1-1
1H16.65a1 1 0 1 0 0 2H29c1.654 0 3-1.346 3-3V3c0-1.654-1.346-3-3-3z"
                  data-original="#000000" />
                <path
                  d="M11 18H3c-1.654 0-3 1.346-3 3v8c0 1.654 1.346 3 3 3h8c1.654 0 3-1.346 3-3v-8c0-1.654-1.346-3-3-3zm1 11c0
.552-.449 1-1 1H3c-.551 0-1-.448-1-1v-8c0-.552.449-1 1-1h8c.551 0 1 .448 1 1zm4.707-12.293L23 10.414V12a1 1 0 1 0 2
0V8c0-.536-.456-1-1-1h-4a1 1 0 1 0 0 2h1.586l-6.293 6.293a1 1 0 0 0 0 1.414c.378.378 1.024.39 1.414 0z"
                  data-original="#000000" />
              </svg>
              <h3 class="text-xl font-semibold mb-2">Scalability</h3>
              <p>Easily scale your resources to meet growing demands.</p>
              <a href="javascript:void(0);" class="text-blue-600 font-semibold inline-block mt-2 hover:underline">Learn
                more</a>
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 fill-blue-600 mb-4 inline-block"
                viewBox="0 0 682.667 682.667">
                <defs>
                  <clipPath id="a" clipPathUnits="userSpaceOnUse">
                    <path d="M0 512h512V0H0Z" data-original="#000000" />
                  </clipPath>
                </defs>
                <g fill="none" class="stroke-blue-600" stroke-linecap="round" stroke-linejoin="round"
                  stroke-miterlimit="10" stroke-width="40" clip-path="url(#a)"
                  transform="matrix(1.33 0 0 -1.33 0 682.667)">
                  <path
                    d="M256 492 60 410.623v-98.925C60 183.674 137.469 68.38 256 20c118.53 48.38 196 163.674 196 291.698v98.925z"
                    data-original="#000000" />
                  <path d="M178 271.894 233.894 216 334 316.105" data-original="#000000" />
                </g>
              </svg>
              <h3 class="text-xl font-semibold mb-2">Security</h3>
              <p>Your data is protected by the latest security measures.</p>
              <a href="javascript:void(0);" class="text-blue-600 font-semibold inline-block mt-2 hover:underline">Learn
                more</a>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-28">
        <div class="md:text-center max-w-2xl mx-auto">
          <h2 class="md:text-4xl text-3xl font-bold mb-6">Explore Our Unique Offerings</h2>
          <p>Discover a range of exclusive features designed to elevate your experience. Learn how our distinct
            offerings can redefine your journey and empower you to accomplish more.</p>
        </div>
        <div class="mt-14">
          <div class="grid md:grid-cols-2 items-center gap-16">
            <div>
              <img src="https://readymadeui.com/image-1.webp"
                class="w-full object-contain rounded-md shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]" />
            </div>
            <div class="max-w-lg">
              <h3 class="text-xl font-semibold mb-4">Tailored Customization</h3>
              <p>Experience unparalleled customization options tailored to suit your unique needs. Our platform provides
                a wide array of features, ensuring you have the flexibility to personalize your journey.</p>
              <button type="button"
                class="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-5 py-2.5 mt-8 transition-all">
                Learn More
              </button>
            </div>
            <div class="max-md:order-1 max-w-lg">
              <h3 class="text-xl font-semibold mb-4">Optimized Performance</h3>
              <p>Unlock top-notch performance with our advanced optimization techniques. We prioritize speed,
                efficiency, and reliability to ensure a seamless experience, no matter the complexity of your tasks.</p>
              <button type="button"
                class="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-5 py-2.5 mt-8 transition-all">
                Learn More
              </button>
            </div>
            <div>
              <img src="https://readymadeui.com/contact.webp"
                class="w-full object-contain rounded-md shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]" />
            </div>
          </div>
        </div>
      </div>

      <div class="mt-28 bg-gray-50 px-4 sm:px-10 py-12">
        <div class="max-w-7xl max-md:max-w-lg mx-auto">
          <h2 class="md:text-4xl text-3xl font-bold md:text-center mb-14">Our Latest Blogs</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-14">
            <div class="bg-white cursor-pointer rounded-md overflow-hidden group">
              <div class="relative overflow-hidden">
                <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1"
                  class="w-full h-60 object-cover group-hover:scale-125 transition-all duration-300" />
                <div class="px-4 py-2.5 text-white bg-blue-600 absolute bottom-0 right-0">June 10, 2023</div>
              </div>
              <div class="p-6">
                <h3 class="text-xl font-semibold">A Guide to Igniting Your Imagination</h3>
                <button type="button"
                  class="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-5 py-2.5 mt-6 transition-all">Read
                  More</button>
              </div>
            </div>
            <div class="bg-white cursor-pointer rounded-md overflow-hidden group">
              <div class="relative overflow-hidden">
                <img src="https://readymadeui.com/hacks-watch.webp" alt="Blog Post 2"
                  class="w-full h-60 object-cover group-hover:scale-125 transition-all duration-300" />
                <div class="px-4 py-2.5 text-white bg-blue-600 absolute bottom-0 right-0">April 20, 2023</div>
              </div>
              <div class="p-6">
                <h3 class="text-xl font-semibold">Hacks to Supercharge Your Day</h3>
                <button type="button"
                  class="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-5 py-2.5 mt-6 transition-all">Read
                  More</button>
              </div>
            </div>
            <div class="bg-white cursor-pointer rounded-md overflow-hidden group">
              <div class="relative overflow-hidden">
                <img src="https://readymadeui.com/prediction.webp" alt="Blog Post 3"
                  class="w-full h-60 object-cover group-hover:scale-125 transition-all duration-300" />
                <div class="px-4 py-2.5 text-white bg-blue-600 absolute bottom-0 right-0">August 16, 2023</div>
              </div>
              <div class="p-6">
                <h3 class="text-xl font-semibold">Trends and Predictions</h3>
                <button type="button"
                  class="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-5 py-2.5 mt-6 transition-all">Read
                  More</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-28">
        <div class="grid md:grid-cols-2 justify-center items-center gap-10">
          <div>
            <h2 class="md:text-4xl text-3xl font-bold mb-6">Unlock Premium Features</h2>
            <p>Veniam proident aute magna anim excepteur et ex consectetur velit ullamco veniam minim aute sit. Elit
              occaecat officia et laboris Lorem minim. Officia do aliqua adipisicing ullamco in.</p>
            <button type="button"
              class="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-5 py-2.5 mt-6 transition-all">
              Upgrade Now
            </button>
          </div>
          <div class="text-center">
            <img src="https://readymadeui.com/login-image.webp" alt="Premium Benefits" class="w-full mx-auto" />
          </div>
        </div>
      </div>

      <div class="mt-28 bg-gray-50 px-4 sm:px-10 py-12">
        <div class="max-w-6xl mx-auto">
          <div class="grid md:grid-cols-2 items-center gap-8">
            <div class="space-y-6 bg-gray-100 rounded-md p-6 max-w-md max-md:order-1">
              <div class="flex sm:items-center max-sm:flex-col-reverse">
                <div class="mr-3">
                  <h4 class="text-base font-semibold">John Doe</h4>
                  <p class="mt-2">Veniam proident aute magna anim excepteur et ex consectetur velit ullamco veniam minim
                    aute sit.</p>
                </div>
                <img src='https://readymadeui.com/profile_2.webp' class="w-16 h-16 rounded-full max-sm:mb-2" />
              </div>
              <div
                class="flex sm:items-center max-sm:flex-col-reverse p-6 relative lg:left-12 bg-white
shadow-[0_2px_20px_-4px_rgba(93,96,127,0.2)] rounded-md">
                <div class="mr-3">
                  <h4 class="text-base font-semibold">Mark Adair</h4>
                  <p class="mt-2">Veniam proident aute magna anim excepteur et ex consectetur velit ullamco veniam minim
                    aute sit.</p>
                </div>
                <img src='https://readymadeui.com/profile_3.webp' class="w-16 h-16 rounded-full max-sm:mb-2" />
              </div>
              <div class="flex sm:items-center max-sm:flex-col-reverse">
                <div class="mr-3">
                  <h4 class="text-base font-semibold">Simon Konecki</h4>
                  <p class="mt-2">Veniam proident aute magna anim excepteur et ex consectetur velit ullamco veniam minim
                    aute sit.</p>
                </div>
                <img src='https://readymadeui.com/profile_4.webp' class="w-16 h-16 rounded-full max-sm:mb-2" />
              </div>
            </div>
            <div>
              <h6 class="text-xl font-bold text-gray-300 mb-4">Testimonials</h6>
              <h2 class="md:text-4xl text-3xl font-bold">We are loyal with our customer</h2>
              <div class="mt-4">
                <p>Veniam proident aute magna anim excepteur et ex consectetur velit ullamco veniam minim aute sit. Elit
                  occaecat officia et laboris Lorem minim. Officia do aliqua adipisicing ullamco in.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-28">
        <h2 class="md:text-4xl text-3xl font-bold text-center mb-14">Application Metrics</h2>
        <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-6 max-lg:gap-12">
          <div class="text-center">
            <h3 class="text-4xl font-semibold">5.4<span class="text-blue-600">M+</span></h3>
            <p class="text-base font-semibold mt-4">Total Users</p>
            <p class="mt-2">The total number of registered users on the platform.</p>
          </div>
          <div class="text-center">
            <h3 class="text-4xl font-semibold">$80<span class="text-blue-600">K</span></h3>
            <p class="text-base font-semibold mt-4">Revenue</p>
            <p class="mt-2">The total revenue generated by the application.</p>
          </div>
          <div class="text-center">
            <h3 class="text-4xl font-semibold">100<span class="text-blue-600">K</span></h3>
            <p class="text-base font-semibold mt-4">Engagement</p>
            <p class="mt-2">The level of user engagement with the application's content and features.</p>
          </div>
          <div class="text-center">
            <h3 class="text-4xl font-semibold">99.9<span class="text-blue-600">%</span></h3>
            <p class="text-base font-semibold mt-4">Server Uptime</p>
            <p class="mt-2">The percentage of time the server has been operational and available.</p>
          </div>
        </div>
      </div>

      <div class="mt-28 bg-gray-50 px-4 sm:px-10 py-12 space-y-6">
        <div class="md:text-center max-w-2xl mx-auto mb-14">
          <h2 class="md:text-4xl text-3xl font-bold mb-6">Frequently Asked Questions</h2>
          <p>Explore common questions and find answers to help you make the most out of our services. If you don't see
            your question here, feel free to contact us for assistance.</p>
        </div>
        <div class="shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border-2 border-blue-600 rounded-md transition-all"
          role="accordion">
          <button type="button" class="w-full font-semibold text-left py-5 px-6 flex items-center">
            <span class="text-base mr-4">Are there any special discounts or promotions available during the
              event.</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current ml-auto shrink-0 rotate-180"
              viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734
7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                clip-rule="evenodd" data-original="#000000"></path>
            </svg>
          </button>
          <div class="pb-5 px-6">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor auctor arcu,
              at fermentum dui. Maecenas
              vestibulum a turpis in lacinia. Proin aliquam turpis at erat venenatis malesuada. Sed semper, justo vitae
              consequat fermentum, felis diam posuere ante, sed fermentum quam justo in dui. Nulla facilisi. Nulla
              aliquam
              auctor purus, vitae dictum dolor sollicitudin vitae. Sed bibendum purus in efficitur consequat. Fusce et
              tincidunt arcu. Curabitur ac lacus lectus. Morbi congue facilisis sapien, a semper orci facilisis in.
            </p>
          </div>
        </div>
        <div
          class="shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border-2 border-transparent hover:border-blue-600 rounded-md
transition-all"
          role="accordion">
          <button type="button" class="w-full font-semibold text-left py-5 px-6 flex items-center">
            <span class="text-base mr-4">What are the dates and locations for the product launch events?</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current ml-auto shrink-0 -rotate-90"
              viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734
7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                clip-rule="evenodd" data-original="#000000"></path>
            </svg>
          </button>
          <div class="hidden pb-5 px-6">
            <p>Content</p>
          </div>
        </div>
        <div
          class="shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border-2 border-transparent hover:border-blue-600 rounded-md
transition-all"
          role="accordion">
          <button type="button" class="w-full font-semibold text-left py-5 px-6 flex items-center">
            <span class="text-base mr-4">Can I bring a guest with me to the product launch event?</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current ml-auto shrink-0 -rotate-90"
              viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734
7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                clip-rule="evenodd" data-original="#000000"></path>
            </svg>
          </button>
          <div class="hidden pb-5 px-6">
            <p>Content</p>
          </div>
        </div>
        <div
          class="shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border-2 border-transparent hover:border-blue-600 rounded-md
transition-all"
          role="accordion">
          <button type="button" class="w-full font-semibold text-left py-5 px-6 flex items-center">
            <span class="text-base mr-4">How can I contact customer support?</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current ml-auto shrink-0 -rotate-90"
              viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734
7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                clip-rule="evenodd" data-original="#000000"></path>
            </svg>
          </button>
          <div class="hidden pb-5 px-6">
            <p>Content</p>
          </div>
        </div>
        <div
          class="shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border-2 border-transparent hover:border-blue-600 rounded-md
transition-all"
          role="accordion">
          <button type="button" class="w-full font-semibold text-left py-5 px-6 flex items-center">
            <span class="text-base mr-4">What payment methods do you accept?</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current ml-auto shrink-0 -rotate-90"
              viewBox="0 0 24 24">
              <path fill-rule="evenodd"
                d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734
7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z"
                clip-rule="evenodd" data-original="#000000"></path>
            </svg>
          </button>
          <div class="hidden pb-5 px-6">
            <p>Content</p>
          </div>
        </div>
      </div>
    </div>

    <footer class="bg-gray-50 px-4 sm:px-10 py-12 mt-28">
      <div class="md:max-w-[50%] mx-auto text-center">
        <div class="bg-[#fff] border flex px-2 py-1 rounded-full text-left mt-4">
          <input type='email' placeholder='Enter your email' class="w-full outline-none bg-transparent pl-4" />
          <button type='button'
            class="bg-blue-600 hover:bg-blue-700 text-white rounded-full px-5 py-2.5 transition-all">Subscribe</button>
        </div>
      </div>
      <div class="grid max-sm:grid-cols-1 max-xl:grid-cols-2 xl:grid-cols-5 gap-8 border-t border-gray-300 mt-10 pt-8">
        <div class="xl:col-span-2">
          <h4 class="text-xl font-semibold mb-6">Disclaimer</h4>
          <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean gravida,
            mi eu pulvinar cursus, sem elit interdum mauris.</p>
        </div>
        <div>
          <h4 class="text-xl font-semibold mb-6">Services</h4>
          <ul class="space-y-4">
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Web
                Development</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Mobile App
                Development</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">UI/UX
                Design</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Digital Marketing</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-xl font-semibold mb-6">Resources</h4>
          <ul class="space-y-4">
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Webinars</a>
            </li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Ebooks</a>
            </li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Templates</a>
            </li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Tutorials</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-xl font-semibold mb-4">About Us</h4>
          <ul class="space-y-4">
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Our Story</a>
            </li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Mission and
                Values</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Team</a></li>
            <li><a href="javascript:void(0)" class="hover:text-blue-600">Testimonials</a></li>
          </ul>
        </div>
      </div>
      <p class='mt-10'>© 2023<a href='https://readymadeui.com/' target='_blank'
          class="hover:underline mx-1">ReadymadeUI</a>All Rights Reserved.</p>
    </footer>

  </div>

  <script>

    var toggleOpen = document.getElementById('toggleOpen');
    var toggleClose = document.getElementById('toggleClose');
    var collapseMenu = document.getElementById('collapseMenu');

    function handleClick() {
      if (collapseMenu.style.display === 'block') {
        collapseMenu.style.display = 'none';
      } else {
        collapseMenu.style.display = 'block';
      }
    }

    toggleOpen.addEventListener('click', handleClick);
    toggleClose.addEventListener('click', handleClick);

  </script>
</body>

</html>
