<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>admin</title>
    <style>
        .page-container {
            padding: 2rem;
        }

        .card {
            background-color: white;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin: 1rem;
            border: 2px solid black;
        }
    </style>
</head>
<body class="bg-white">

            <dh-component>
                <div class="flex flex-no-wrap  " id="nav">
                    <!-- Sidebar starts -->
                    <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
                    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
                    <div  class="w-70 absolute sm:relative bg-white shadow-2xl md:h-full flex-col justify-between hidden sm:flex">
                        <div class="px-8">
                            <div class="h-16 w-full flex items-center">
                                {{--<svg aria-label="Ripples. Logo" role="img" xmlns="http://www.w3.org/2000/svg" width="144" height="30" viewBox="0 0 144 30">
                                    <path
                                        fill="#5F7DF2"
                                        d=""
                                    />
                                </svg>--}}
                                <img src="images/logo3.png" alt="" style="width:210px !important; height: auto !important;">
                            </div>
                            <ul class="mt-12">
                                {{--<li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">--}}
                                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600  text-gray-800 hover:text-white">

                                    <a href="{{ url('user-management') }}" class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                        </svg>
                                        <span class="text-lg ml-2">User Management</span>
                                    </a>
                                    
                                </li>
                                {{--<li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">--}}
                                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600 text-gray-800 hover:text-white">
                                    <a href="{{ url('subject-list') }}" href="{{ url('profile/show') }}" class="flex items-center focus:outline-none ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                        </svg>
                                        <span class="text-lg ml-2">Course Management</span>
                                    </a>
                                    
                                </li>

                                {{--<li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">--}}
                                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600 text-gray-800 hover:text-white">
                                    <a href="{{ url('profile/show') }}" href="{{ url('profile/show') }}" class="flex items-center focus:outline-none ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                        </svg>
                                        <span class="text-lg ml-2">Account</span>
                                    </a>
                                    
                                </li>

                         
                                {{--<li class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">--}}
                                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600 text-gray-800 hover:text-white">
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
                                    <input class="bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-100  rounded w-full text-sm text-gray-300 placeholder-gray-400  pl-10 py-2" type="text" placeholder="Search" />
                                </div>
                            </div>
                        </div>
                       
                    </div>
                   
<div class="page-container">
    <div class="p-4">
        <a href="{{ url('add-grade') }}" class="bg-indigo-600 hover:bg-indigo-800 text-white text-xl font-bold py-2 px-4 rounded-full ml-4 mt-1">Add Grade</a>
    </div>
   
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    
        @foreach($grade as $grade)
    
            <div class="card rounded-2xl">
            <a href="{{ route('classes.show', $grade) }}">
                <p class=" text-indigo-600 font-bold">Grade {{ $grade->grade }}</p>
             <!--   <div class="flex justify-end mt-3">
                    <div class="flex">
                        <a href="{{ route('classes.show', $grade) }}" class="bg-green-500 hover:bg-green-700 text-white text-l font-bold py-2 px-3 rounded-full block md:inline">View Classes</a>
                </div>
                </div>-->
                <div class="flex justify-end mt-3 space-around ">
                    <div class="flex flex-row space-x-2">
                        <a href="{{ url('edit-grade/'.$grade->id) }}"  class="w-20 bg-gray-900 text-white py-1 px-4 rounded-xl  hover:bg-gray-800 text-center">Edit</a>
                        <a href="{{ url('delete-grade/'.$grade->id) }}" class="bg-gray-900 text-white py-1 px-4 rounded-xl  hover:bg-gray-800">Delete</a>
                    </div>
                </div>
                </a>
            </div>
                             
        @endforeach
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





</body>
</html>
