<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <script src="https://unpkg.com/alpinejs" defer></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">

<div class="min-h-screen bg-white dark:bg-gray-800">
    <div class="flex h-screen ">
        <div class="px-4 py-2 text-black dark:text-white bg-white dark:bg-gray-800  fixed h-full ">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline w-8 h-8 text-black dark:text-white lg:hidden" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" id="menu-button">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <div class="hidden lg:block " id="menu">

        
                <div class="avatar flex items-center justify-center  ">
                <div class="h-16 w-full flex items-center">
                    
                                <img src="images/logo3.png" alt="" style="width:210px !important; height: auto !important;">
                            </div>

                </div>


                <div>

                </div>
                <ul  class="pt-10" >

                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600 text-gray-800 dark:text-white hover:text-white">
                                    <a href="{{ url('dashboard') }}" href="{{ url('profile/show') }}" class="flex items-center focus:outline-none ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                        </svg>
                                        <span class="text-lg ml-2">Dashboard</span>
                                    </a>
                                    
                                </li>
                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600 text-gray-800 dark:text-white hover:text-white">
                                    <a href="{{ url('user-management') }}" href="{{ url('profile/show') }}" class="flex items-center focus:outline-none ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                        </svg>
                                        <span class="text-lg ml-2">User Management</span>
                                    </a>
                                    
                                </li>
              
                    <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600 text-gray-800 dark:text-white hover:text-white">
                                    <a href="{{ url('subject-list') }}" href="{{ url('profile/show') }}" class="flex items-center focus:outline-none ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                        </svg>
                                        <span class="text-lg ml-2">Course Management</span>
                                    </a>
                                    
                                </li>


                    <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600  text-gray-800 dark:text-white hover:text-white">
                                    <a href="{{ url('profile/show') }}" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                        </svg>
                                        <span class="text-lg ml-2">Account</span>
                                    </a>

                                </li>
                
                                <li class="p-4 mt-3 flex items-center rounded-md px-6 duration-300 cursor-pointer hover:bg-indigo-600  text-gray-800 dark:text-white hover:text-white">
                                    <a href="{{ route('logout') }}" class="flex items-center " >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"></path>
                                            <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                            <circle cx="12" cy="12" r="9"></circle>
                                        </svg>
                                        <span class="text-lg ml-2">Logout</span>
                                    </a>
                                </li>

               

                    
                </ul>
            </div>
            <script>


                const button = document.querySelector('#menu-button');
                const menu = document.querySelector('#menu');


                button.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                });
            </script>

        </div>

        <div class="px-4 py-2 lg:ml-[250px] w-full dark:bg-black">
            <div class="container mx-auto mt-12 ">
                {{ $slot }}
            </div>
        </div>

    </div>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
