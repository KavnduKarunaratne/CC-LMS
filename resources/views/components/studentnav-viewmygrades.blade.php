
<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d=""></path>
            </svg>
         </button>
        <a href="https://flowbite.com" class="flex ml-2 md:mr-24">
          <!--<img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="FlowBite Logo" />-->
          <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">EducateLanka</span>
        </a>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ml-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-violet-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-10 h-10 rounded-full border-4 border-gray-800" src="images/avatar.png" alt="user photo">
              </button>
            </div>
            <text class="ml-2 dark:text-white">{{ auth()->user()->name }}</text>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                  Neil Sims
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                  neil.sims@flowbite.com
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="{{ route('student-panel') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="w-7 h-7 text-gray-500 transition duration-75 dark:text- group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ml-3">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="{{ route('view-my-submissions') }}" class="flex items-center p-2 text-indigo-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-7 h-7 text-indigo-600 transition duration-75 dark:text-indigo-600 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                  <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">My Grades</span>
               <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300"></span>
            </a>
         </li>
         {{--<li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Notices</span>
               <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
            </a>
         </li>--}}
         <li>
            <a href="{{ url('profile/show') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Profile</span>
            </a>
         </li>
         <li>
            <a href="{{ route('logout') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
            </a>
         </li>
         {{--<li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                  <path stroke="current" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Sign In</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                  <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                  <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Sign Up</span>
            </a>
         </li>--}}
      </ul>
   </div>
</aside>

<div>
<div class="w-64 z-40 absolute bg-white shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out" id="mobile-nav">
                        <button aria-label="toggle sidebar" id="openSideBar" class="h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800" onclick="sidebarHandler(true)">
                            <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="6" cy="10" r="2" />
                                <line x1="6" y1="4" x2="6" y2="8" />
                                <line x1="6" y1="12" x2="6" y2="20" />
                                <circle cx="12" cy="16" r="2" />
                                <line x1="12" y1="4" x2="12" y2="14" />
                                <line x1="12" y1="18" x2="12" y2="20" />
                                <circle cx="18" cy="7" r="2" />
                                <line x1="18" y1="4" x2="18" y2="5" />
                                <line x1="18" y1="9" x2="18" y2="20" />
                            </svg>
                        </button>
                        <button aria-label="Close sidebar" id="closeSideBar" class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white" onclick="sidebarHandler(false)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                        <div class="px-8">
                            <div class="h-16 w-full flex items-center">
                                {{--<svg aria-label="Ripples. Logo"role="img" xmlns="http://www.w3.org/2000/svg" width="144" height="30" viewBox="0 0 144 30">
                                    <path
                                        fill="#5F7DF2"
                                        d=""
                                    />
                                </svg>--}}
                                <img src="images/logo3.png" alt="" style="width:210px !important; height: auto !important;">
                            </div>
                            <ul class="mt-12">
                                
                                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600  text-gray-800 hover:text-white">
                                    <a href="{{ url('student-panel') }}" class="flex items-center  focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"></path>
                                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                        </svg>
                                        <span class="text-sm ml-2">Dashboard</span>
                                    </a>

                                </li>
                                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600  text-gray-800 hover:text-white">
                                    <a href="{{ route('view-my-submissions') }}" class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                        </svg>
                                        <span class="text-sm ml-2">My Grades</span>
                                    </a>

                                </li>
                                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600  text-gray-800 hover:text-white">
                                    <a href="{{ url('profile/show') }}" class="flex items-center " >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                            <circle cx="12" cy="12" r="9"></circle>
                                        </svg>
                                        <span class="text-sm ml-2">Profile</span>
                                    </a>
                                </li>

                                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600  text-gray-800 hover:text-white">
                                    <a href="{{ route('logout') }}" class="flex items-center " >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                            <circle cx="12" cy="12" r="9"></circle>
                                        </svg>
                                        <span class="text-sm ml-2">Logout</span>
                                    </a>
                                </li>
                                
                            <div class="flex justify-center mt-48 mb-4 w-full">
                                <div class="relative">
                                    <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <circle cx="10" cy="10" r="7"></circle>
                                            <line x1="21" y1="21" x2="15" y2="15"></line>
                                        </svg>
                                    </div>
                                    <input class="bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-100  rounded w-full text-sm text-gray-300 placeholder-gray-400 bg-gray-100 pl-10 py-2" type="text" placeholder="Search" />
                                </div>
                            </div>
                        </div>
                        </div>
                        <script>
                    var sideBar = document.getElementById("mobile-nav");
                    var openSidebar = document.getElementById("openSideBar");
                    var closeSidebar = document.getElementById("closeSideBar");
                    sideBar.style.transform = "translateX(-260px)";

                    function sidebarHandler(flag) {
                        if (flag) {
                            sideBar.style.transform = "translateX(0px)";
                            openSidebar.classList.add("hidden");
                            closeSidebar.classList.remove("hidden");
                        } else {
                            sideBar.style.transform = "translateX(-260px)";
                            closeSidebar.classList.add("hidden");
                            openSidebar.classList.remove("hidden");
                        }
                    }
                </script>
</div>






















<div class="p-4 sm:ml-64 dark:bg-black">
   <div class="p-4 border-2 border-white border-dashed rounded-lg dark:border-black mt-14">
      <!--ADDED MY CONTENT HERE-->
      <!--student information-->
      <div class="text-3xl font-semi-bold text-gray-900 mb-5 dark:text-white">My Grades</div>
      @if (count($submissionsBySubject) > 0)
      @foreach ($submissionsBySubject as $subjectName => $submissions)
      <h2 class="text-2xl font-semi-bold text-black mb-3 dark:text-white">{{ $subjectName }}</h>
      <div class="grid grid-cols-1 md:grid-cols-1 gap-8 font-semi-bold">
      @foreach ($submissions as $submission)
        <div class="bg-white rounded-lg shadow-lg p-8 mt-3 border-solid border-2 border-gray-900 dark:border-violet-600">
        <h3 class="text-xl font-semi-bold text-gray-900 mt-1">Assignment Name: {{ $submission->assignment->assignment_name }}</h3>
        <h3 class="text-xl font-semi-bold text-gray-900 mt-1">Description: {{ $submission->assignment->description }}</h3>
        <h3 class="text-xl font-semi-bold text-gray-900 mt-1"></h3>
        @if ($submission->file)
        <a href="{{ asset('storage/app/submissions/' . $submission->file) }}" download class="dark:text-black">File: Download Here<h3 class="text-md font-bold text-gray-900 mt-1 dark:text-black"></h3></a>
        @endif 
        <h3 class="text-xl font-semi-bold text-gray-900 mt-1">Submit Date: {{ $submission->submit_date }}</h3>
        <h3 class="text-xl font-semi-bold text-gray-900 mt-1"></h3>
        @if (count($submission->feedback) == 0)
        <h3 class="text-xl font-semi-bold text-gray-900 mt-1">No Feedback</h3>
        @else
        @foreach ($submission->feedback as $feedback)
        <p class="dark:text-black text-xl">Feedback: {{ $feedback->feedback }}</p>
        <p class="dark:text-black text-xl">Marks: {{ $feedback->marks }}</p>
        @endforeach          
        </div>
      </div> 
      @endif
        @endforeach
        @endforeach 

        @else 
        <p class="dark:text-black">No Feedback</p>
        @endif            
   </div>
</div>



{{--@if (count($submissionsBySubject) > 0)
        @foreach ($submissionsBySubject as $subjectName => $submissions)
            <h3 class="text-md font-bold mt-4">{{ $subjectName }}</h3>
            <ul>
                @foreach ($submissions as $submission)
                    <div class="bg-white p-4 rounded-md shadow-md mb-4 ">
                        <li>
                            <strong>Assignment Name:</strong> {{ $submission->assignment->assignment_name }}
                            <br>
                            <strong>Description:</strong> {{ $submission->assignment->description }}
                            <br>
                            @if ($submission->file)
                                <strong>File:</strong> <a href="{{ asset('storage/app/submissions/' . $submission->file) }}" download>{{ $submission->file }}</a>
                                <br><!--downlaod the file from storage-->
                            @endif
                            <strong>Submit Date:</strong> {{ $submission->submit_date }}
                            <br>
                            <strong>Feedback:</strong>
                            @if (count($submission->feedback) == 0)
                                <p>No feedback available.</p>
                                <!--if there is no feedback available, display this message-->
                            @else
                            @foreach ($submission->feedback as $feedback)
                                <p>Feedback: {{ $feedback->feedback }}</p>
                                <p>Marks: {{ $feedback->marks }}</p>
                            @endforeach
                            @endif
                        </li>
                    </div>
                @endforeach
            </ul>
        @endforeach
    @else
        <p>No feedback available.</p>
        <!--if there are no feedback available, display this message-->
    @endif
</div>--}}


<style>
            #wrapper {
  display: flex;
}

#nav {
  flex: 0 0 200px; /* Fixed width for the navigation bar */
  height: 100vh; /* Set the height to the viewport height */
  overflow: auto; /* Allow content to be scrollable if it overflows */
  position: sticky;
  top: 0;
  background-color: white; /* Set your desired background color */
  /* Add any other styling you need for your navigation bar */
  box-shadow: 5px 0 20px rgba(0, 0, 0, 0.2);
}

#content {
  flex: 1; /* Allow the content to take up the remaining width */
  overflow-y: auto; /* Allow content to be scrollable if it overflows vertically */
  /* Add any other styling you need for the content on the right side */
}




        </style>