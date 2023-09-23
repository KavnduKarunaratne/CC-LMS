<div class="h-screen w-full bg-white relative flex overflow-hidden">

  <!-- Sidebar -->
  <aside class="h-full w-16 flex flex-col ml-2 space-y-10 items-center justify-center relative bg-white text-indigo-600">
    <!-- Profile -->
    <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
    </div>

    <!-- Courses -->
    <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
    </div>

    <!-- Theme -->
    <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
      </svg>
    </div>

    <!-- Configuration -->
    <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
    </div>
  </aside>

  
 
  {{--<div class="w-full h-full flex flex-col justify-between">
    <!-- Header -->
    <header class="h-16 w-full flex items-center relative justify-end px-5 space-x-10 bg-gray-800">
      <!-- Informação -->
      <div class="flex flex-shrink-0 items-center space-x-4 text-white">
        
        <!-- Texto -->
        <div class="flex flex-col items-end ">
          <!-- Nome -->
          <div class="text-md font-medium ">Unknow Unknow</div>
          <!-- Título -->
          <div class="text-sm font-regular">Student</div>
        </div>
        
        <!-- Foto -->
        <div class="h-10 w-10 rounded-full cursor-pointer bg-gray-200 border-2 border-blue-400"></div>
      </div>
    </header>--}}

    <!-- Main -->
    <main class="max-w-full h-full flex relative overflow-y-hidden">
      <!-- Container -->
      {{--<div class="h-full w-full m-4 flex flex-wrap items-start justify-start rounded-tl grid-flow-col auto-cols-max gap-4 overflow-y-scroll">
        <!-- Container -->
        <div class="w-96 h-60 rounded-lg flex-shrink-0 flex-grow bg-gray-400"></div>
        <div class="w-96 h-60 rounded-lg flex-shrink-0 flex-grow bg-gray-400"></div>
        <div class="w-96 h-60 rounded-lg flex-shrink-0 flex-grow bg-gray-400"></div>
        <div class="w-96 h-60 rounded-lg flex-shrink-0 flex-grow bg-gray-400"></div>
        <div class="w-96 h-60 rounded-lg flex-shrink-0 flex-grow bg-gray-400"></div>
        <div class="w-96 h-60 rounded-lg flex-shrink-0 flex-grow bg-gray-400"></div>
        <div class="w-96 h-60 rounded-lg flex-shrink-0 flex-grow bg-gray-400"></div>
        <div class="w-96 h-60 rounded-lg flex-shrink-0 flex-grow bg-gray-400"></div>
        <div class="w-96 h-60 rounded-lg flex-shrink-0 flex-grow bg-gray-400"></div>
      </div>
    </main>
  </div>--}}
  <ul class="grid grid-cols-1 xl:grid-cols-3 gap-y-10 gap-x-6 items-start p-8">
    <li class="relative flex flex-col sm:flex-row xl:flex-col items-start">
        <div class="order-1 sm:ml-6 xl:ml-0">
            <h3 class="mb-1 text-slate-900 font-semibold dark:text-slate-200">
                <span class="mb-1 block text-sm leading-6 text-indigo-500">Headless UI</span>Completely unstyled, fully
                accessible UI components</h3>
            <div class="prose prose-slate prose-sm text-slate-600 dark:prose-dark">
                <p>Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind
                    CSS.</p>
            </div><a
                class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                href="https://headlessui.dev">Learn
                more<span class="sr-only">, Completely unstyled, fully accessible UI components</span><svg
                    class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                    width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M0 0L3 3L0 6"></path>
                </svg></a>
        </div><img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-full" width="1216" height="640">
    </li>
    <li class="relative flex flex-col sm:flex-row xl:flex-col items-start">
        <div class="order-1 sm:ml-6 xl:ml-0">
            <h3 class="mb-1 text-slate-900 font-semibold dark:text-slate-200">
                <span class="mb-1 block text-sm leading-6 text-purple-500">Heroicons</span>Beautiful hand-crafted SVG
                icons, by the makers of Tailwind CSS.</h3>
            <div class="prose prose-slate prose-sm text-slate-600 dark:prose-dark">
                <p>A set of 450+ free MIT-licensed SVG icons. Available as basic SVG icons and via first-party React and
                    Vue libraries.</p>
            </div><a
                class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                href="https://heroicons.com">Learn
                more<span class="sr-only">, Beautiful hand-crafted SVG icons, by the makers of Tailwind CSS.</span><svg
                    class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                    width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M0 0L3 3L0 6"></path>
                </svg></a>
        </div><img src="https://tailwindcss.com/_next/static/media/heroicons@75.4a558f35.jpg" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-full" width="1216" height="640">
    </li>
    <li class="relative flex flex-col sm:flex-row xl:flex-col items-start">
        <div class="order-1 sm:ml-6 xl:ml-0">
            <h3 class="mb-1 text-slate-900 font-semibold dark:text-slate-200">
                <span class="mb-1 block text-sm leading-6 text-cyan-500">Hero Patterns</span>Seamless SVG background
                patterns by the makers of Tailwind CSS.</h3>
            <div class="prose prose-slate prose-sm text-slate-600 dark:prose-dark">
                <p>A collection of over 100 free MIT-licensed high-quality SVG patterns for you to use in your web
                    projects.</p>
            </div><a
                class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                href="https://heropatterns.com">Learn
                more<span class="sr-only">, Seamless SVG background patterns by the makers of Tailwind CSS.</span><svg
                    class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                    width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M0 0L3 3L0 6"></path>
                </svg></a>
        </div><img src="https://tailwindcss.com/_next/static/media/heropatterns@75.82a09697.jpg" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-full" width="1216" height="640">
    </li>
</ul>


</div>
<div class="max-w-full h-full flex relative overflow-y-hidden">
<ul class="grid grid-cols-1 xl:grid-cols-3 gap-y-10 gap-x-6 items-start p-8">
    <li class="relative flex flex-col sm:flex-row xl:flex-col items-start">
        <div class="order-1 sm:ml-6 xl:ml-0">
            <h3 class="mb-1 text-slate-900 font-semibold dark:text-slate-200">
                <span class="mb-1 block text-sm leading-6 text-indigo-500">Headless UI</span>Completely unstyled, fully
                accessible UI components</h3>
            <div class="prose prose-slate prose-sm text-slate-600 dark:prose-dark">
                <p>Completely unstyled, fully accessible UI components, designed to integrate beautifully with Tailwind
                    CSS.</p>
            </div><a
                class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                href="https://headlessui.dev">Learn
                more<span class="sr-only">, Completely unstyled, fully accessible UI components</span><svg
                    class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                    width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M0 0L3 3L0 6"></path>
                </svg></a>
        </div><img src="https://tailwindcss.com/_next/static/media/headlessui@75.c1d50bc1.jpg" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-full" width="1216" height="640">
    </li>
    <li class="relative flex flex-col sm:flex-row xl:flex-col items-start">
        <div class="order-1 sm:ml-6 xl:ml-0">
            <h3 class="mb-1 text-slate-900 font-semibold dark:text-slate-200">
                <span class="mb-1 block text-sm leading-6 text-purple-500">Heroicons</span>Beautiful hand-crafted SVG
                icons, by the makers of Tailwind CSS.</h3>
            <div class="prose prose-slate prose-sm text-slate-600 dark:prose-dark">
                <p>A set of 450+ free MIT-licensed SVG icons. Available as basic SVG icons and via first-party React and
                    Vue libraries.</p>
            </div><a
                class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                href="https://heroicons.com">Learn
                more<span class="sr-only">, Beautiful hand-crafted SVG icons, by the makers of Tailwind CSS.</span><svg
                    class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                    width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M0 0L3 3L0 6"></path>
                </svg></a>
        </div><img src="https://tailwindcss.com/_next/static/media/heroicons@75.4a558f35.jpg" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-full" width="1216" height="640">
    </li>
    <li class="relative flex flex-col sm:flex-row xl:flex-col items-start">
        <div class="order-1 sm:ml-6 xl:ml-0">
            <h3 class="mb-1 text-slate-900 font-semibold dark:text-slate-200">
                <span class="mb-1 block text-sm leading-6 text-cyan-500">Hero Patterns</span>Seamless SVG background
                patterns by the makers of Tailwind CSS.</h3>
            <div class="prose prose-slate prose-sm text-slate-600 dark:prose-dark">
                <p>A collection of over 100 free MIT-licensed high-quality SVG patterns for you to use in your web
                    projects.</p>
            </div><a
                class="group inline-flex items-center h-9 rounded-full text-sm font-semibold whitespace-nowrap px-3 focus:outline-none focus:ring-2 bg-slate-100 text-slate-700 hover:bg-slate-200 hover:text-slate-900 focus:ring-slate-500 dark:bg-slate-700 dark:text-slate-100 dark:hover:bg-slate-600 dark:hover:text-white dark:focus:ring-slate-500 mt-6"
                href="https://heropatterns.com">Learn
                more<span class="sr-only">, Seamless SVG background patterns by the makers of Tailwind CSS.</span><svg
                    class="overflow-visible ml-3 text-slate-300 group-hover:text-slate-400 dark:text-slate-500 dark:group-hover:text-slate-400"
                    width="3" height="6" viewBox="0 0 3 6" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M0 0L3 3L0 6"></path>
                </svg></a>
        </div><img src="https://tailwindcss.com/_next/static/media/heropatterns@75.82a09697.jpg" alt="" class="mb-6 shadow-md rounded-lg bg-slate-50 w-full sm:w-[17rem] sm:mb-0 xl:mb-6 xl:w-full" width="1216" height="640">
    </li>
</ul>

</div>