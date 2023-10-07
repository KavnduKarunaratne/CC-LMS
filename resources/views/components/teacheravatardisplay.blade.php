
        <div class="grid grid-cols-1 md:grid-cols-1 gap-1 dark:bg-black">
            
            <div class="bg-indigo-600 ml-0.5 mr-0.5 p-3 pr-2 mb-4 rounded-b-3xl sticky top-0 z-50" id="topnav">
                <div class="relative overflow-hidden">
                    {{--<img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">--}}
                    {{--<div class="absolute inset-0 bg-black opacity-40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                    </div>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mt-3 mb-1">Subject: </h3>
                <h3 class="text-xl font-bold text-gray-900 mt-1 mb-4">Teacher in Charge: </h3>
                <h3 class="text-2xl font-bold text-indigo-700 mt-4 hover:text-indigo-400">View Student Progress</h3>
                <h3 class="text-2xl font-bold text-indigo-700 hover:text-indigo-400 mt-2 mb-5">View Flashcards</h3>--}}
                

                {{--<p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                    ante justo. Integer euismod libero id mauris malesuada tincidunt.</p>--}}
                <div class="flex space-x-4 justify-end">
                    <text class="mt-1.5 font-semi-bold text-white text-lg mr-3"></text>
                    <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                        <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    </div>                   
                    <text class="mt-1.5 font-semi-bold text-white text-lg">{{ auth()->user()->name }}</text>
                    
                </div>
            </div>
               
            <style>
                #topnavcontainer{
                  
                }
            </style>

        </div>

