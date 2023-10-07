<!-- component -->
<div class="w-full h-full" id="wrapper">
            <dh-component>
                <div class="flex flex-no-wrap " id="nav">
                    <!-- Sidebar starts -->
                    <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
                    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
                    <div style="min-height: 716px" class="w-70 absolute sm:relative bg-white dark:bg-gray-800 shadow-2xl md:h-full flex-col justify-between hidden sm:flex">
                        <div class="px-8">
                            <div class="h-16 w-full flex items-center">
                                {{--<svg aria-label="Ripples. Logo" role="img" xmlns="http://www.w3.org/2000/svg" width="144" height="30" viewBox="0 0 144 30">
                                    <path
                                        fill="#5F7DF2"
                                        d=""
                                    />
                                </svg>--}}
                                <img src="images/logo3.png" alt="" style="width:210px !important; height: auto !important;">
                                {{--<h2>EducateLanka</h2>--}}
                            </div>
                            <ul class="mt-12">
                                {{--<li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">--}}
                                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600  text-gray-800 dark:text-white hover:text-white dark:hover:text-gray-800">

                                    <a href="{{ url('management') }}" class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                        </svg>
                                        <span class="text-lg ml-2">Dashboard</span>
                                    </a>
                                    
                                </li>
                                {{--<li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">--}}
                                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600 text-gray-800 dark:text-white hover:text-white dark:hover:text-gray-800">
                                    <a href="{{ url('profile/show') }}" href="{{ url('profile/show') }}" class="flex items-center focus:outline-none ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                        </svg>
                                        <span class="text-lg ml-2">Account</span>
                                    </a>
                                    
                                </li>
                                {{--<li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">--}}
                                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600 text-gray-800 dark:text-white hover:text-white dark:hover:text-gray-800">
                                    <a href="{{ route('logout') }}" class="flex items-center ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                            <circle cx="12" cy="12" r="9"></circle>
                                        </svg>
                                        <span class="text-lg ml-2">Logout</span>
                                    </a>
                                </li>

                        </div>

                        <style>
                        
                            
                        </style>
                        
                    </div>
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
                            <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                    <a href="{{ url('management') }}" class="flex items-center  focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                        </svg>
                                        <span class="text-sm ml-2">Dashboard</span>
                                    </a>

                                </li>
                                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600  text-gray-800 hover:text-white">
                                    <a href="{{ url('profile/show') }}" class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                        </svg>
                                        <span class="text-sm ml-2">Account</span>
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
                    <!-- Sidebar ends -->
                    <!-- Remove class [ h-64 ] when adding a card block -->
                    <div class="container mx-auto py-10 md:w-4/5 w-11/12 px-6 dark:bg-black" id="content">
                        <!-- Remove class [ border-dashed border-2 border-gray-300 ] to remove dotted border -->
                        @include('components.managementcards')
                            <!-- Place your content here -->
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
                
            </dh-component>
        </div>





        
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

