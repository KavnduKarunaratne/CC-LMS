{{--<div class="bg-white dark:bg-black py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-white mb-8">Introducing Our Latest Product</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="relative overflow-hidden">
                    <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mt-4">Product Name</h3>
                <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                    ante justo. Integer euismod libero id mauris malesuada tincidunt.</p>
                <div class="flex items-center justify-between mt-4">
                    <span class="text-gray-900 font-bold text-lg">$29.99</span>
                    <button class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Add to Cart</button>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="relative overflow-hidden">
                    <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mt-4">Product Name</h3>
                <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                    ante justo. Integer euismod libero id mauris malesuada tincidunt.</p>
                <div class="flex items-center justify-between mt-4">
                    <span class="text-gray-900 font-bold text-lg">$29.99</span>
                    <button class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Add to Cart</button>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="relative overflow-hidden">
                    <img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mt-4">Product Name</h3>
                <p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                    ante justo. Integer euismod libero id mauris malesuada tincidunt.</p>
                <div class="flex items-center justify-between mt-4">
                    <span class="text-gray-900 font-bold text-lg">$29.99</span>
                    <button class="bg-gray-900 text-white py-2 px-4 rounded-full font-regular hover:bg-gray-800">Add to Cart</button>
                </div>
            </div>
        </div>

    </div>
</div>--}}

<div class="bg-white dark:bg-black ">
    <div class="container mx-auto px-4">
    <a href= "{{ url('add-notice') }}">
        <button class="bg-custom-color text-white font-bold py-2 mb-4 px-4 rounded-full">Add Announcement</button>
    </a>
  



        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">

        @foreach ($notice as $notice)
        <div class="bg-white rounded-lg shadow-lg p-8">

               
                <p class="text-gray-500 text-sm mt-2">Announcement: {{ $notice->notice }}</p>
                <h1 class="text-sm  text-gray-900 mt-4">Posted on: {{ $notice->date_of_notice }}</h1>
                <h1 class="text-sm  text-gray-900 mt-4">For Grade/s : {{ $notice -> grade_id}}</h1>
                <h1 class="text-sm  text-gray-900 mt-4">By:                                 @if ($notice->management)
                                    <span>{{ $notice->management->name }}</span>
                                @else
                                    <span>Management: Not available</span>
                                @endif</h1>
                <div class="flex space-x-2 ... items-center justify-between mt-4">
                    <a href="{{ url ('edit-notice/'.$notice->id)}}">
                        <button class="w-20 bg-gray-900 text-white py-1 px-4 rounded-xl  hover:bg-gray-800">Edit</button>
                    </a>

                    <a href="{{ url ('delete-notice/'.$notice->id)}}">
                        <button class="bg-gray-900 text-white py-1 px-4 rounded-xl  hover:bg-gray-800">Delete</button>
                    </a>

                    
                </div>
        </div>      
        
        @endforeach


       
           






            
            
        </div>

    </div>
    <style>

        /* In your CSS file or Tailwind CSS configuration */
.bg-custom-color {
  background-color: #5350F7;
  transition: background-color 0.2s ease, opacity 0.2s ease; /* Add transitions for both background-color and opacity */
}

/* Add a hover class to override the background-color and reduce opacity on hover */
.bg-custom-color:hover {
  background-color: #5350F7;
  opacity: 0.8; /* You can adjust the opacity value as needed */
}

    </style>
</div>