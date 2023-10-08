<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
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
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-10 h-10 rounded-full border-gray-700" src="images/avatar.png" alt="user photo">
              </button>
            </div>
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
      <ul class="space-y-4 font-medium">
         <li class>
            <a href="#" class="flex items-center p-2 text-indigo-600 hover:text-black rounded-lg dark:text-white bg-indigo-300 dark:hover:bg-gray-700 group">
               <svg class="w-10 h-10 text-indigo-600 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ml-3">Dashboard</span>
            </a>
         </li>
         {{--<li>
            <a href="{{ route('view-my-submissions') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white bg-pink-300 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-10 h-10 text-pink-300 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                  <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">My Grades</span>
               <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300"></span>
            </a>
         </li>--}}
         <li>
            <a href="{{ route('view-my-submissions') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white bg-pink-200 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-10 h-10 text-pink-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                  <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                  <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">My Grades</span>
            </a>
         </li>
         {{--<li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-10 h-10 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Notices</span>
               <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
            </a>
         </li>--}}
         <li>
            <a href="{{ url('profile/show') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white bg-green-200 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-10 h-10 text-green-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Profile</span>
            </a>
         </li>
         <li>
            <a href="{{ route('logout') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white bg-yellow-200 dark:hover:bg-gray-700 group">
               <svg class="flex-shrink-0 w-10 h-10 text-yellow-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
            </a>
         </li>

      </ul>
   </div>
</aside>

<div class=" sm:ml-64">
   <div class="p-4 border-2 border-white border-dashed rounded-lg dark:border-gray-700 mt-14">
      <!--ADDED MY CONTENT HERE-->
<div class="bg-white py-0 mb-0">
    <div class="container mx-auto px-0">
        
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
            <div class="bg-white rounded-lg b p-1">
                <div class="relative overflow-hidden">
                <h2 class="text-2xl font-semi-bold text-gray-900 mt-2 ml-4 mb-2">Dashboard</h2>
   
                   

                </div>
                <!DOCTYPE html>
                
                <!--Carousel-->
                <div class="columns-2">
        <div class=""><img class="h-[500px]" src="images/redmonster.jpg"></div>
        <div>
        @include('kiddyLMS.nametag')
        </div>
      
        </div>

    

            </div>
        </div>
    </div>
</div>

<!--Subjects for student-->
@if (Auth::user()->grade && Auth::user()->class)
<div class="bg-white py-5 mb-4">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-2 mt-2">Here are Your Subjects!</h2>
      
        
      
<div class="grid-cols-1 sm:grid md:grid-cols-3 ">
   
@foreach (Auth::user()->class->subjects()->where('grade_id', Auth::user()->grade->id)->get() as $subject)

  <div
    class="mx-3 mt-6 flex flex-col rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
   
    @if ($subject->image)
 
      <img src="{{ asset('storage/' . $subject->image) }}"

        class="rounded-t-lg"
       
        alt="Header" />

  @elseif ($subject->image == null)
      <img src="{{asset('images/logo3.png')}}"

        class="rounded-t-lg"
       
        alt="Header" />
    @endif
    <div class="p-6">
      <h5
        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
        <a href="{{ route('subject.detail', ['subject_id' => $subject->id]) }}">{{ $subject->subject_name }}</a>

      </h5>
 
    </div>
  </div>
  @endforeach
</div>






       <!-- <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
            <div class="bg-white rounded-lg border-solid border-2 border-black p-8">
                <div class="relative overflow-hidden">
                    {{--<img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">--}}
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                    </div>
                </div>
                @foreach (Auth::user()->class->subjects()->where('grade_id', Auth::user()->grade->id)->get() as $subject)
                <a href="{{ route('subject.detail', ['subject_id' => $subject->id]) }}"><h3 class="text-xl font-bold text-indigo-600 hover:text-indigo-300 mt-3">{{ $subject->subject_name }}</h3></a>
                @endforeach
            </div>
        </div>-->
    </div>
</div>
@endif
<!--Notices-->
{{--<div class="bg-black py-16 mb-10">
    
        @foreach (Auth::user()->grade->notices as $notice)
        @if ($notice->grade_id == Auth::user()->grade->id || $notice->grade_id == null)
        <li>
            Notice:{{ $notice->notice }}
            Date:{{ $notice->date_of_notice }}
        </li>
        @endif
        @endforeach         
</div>--}}

<div class="mx-4 my-8 py-4">
<h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-br from-purple-400 to-blue-700 mb-6">Ready for Todays Adventure?</h2>
<div class="image-container">
  @include('kiddyLMS.carousel')
</div>

</div>






<!--Notices-->
<div class="bg-white py-5 mb-10">
    <h2 class="text-2xl font-bold text-gray-900 mt-2 ml-4 mb-2">Announcements</h2>
    @if ($notices->count() > 0)
    @php
    // Define an array of predefined border colors
    $borderColors = ['#fbcfe8', '#bbf7d0', '#0000FF', '#FF00FF', '#FFFF00'];
    // Initialize an index to track the current border color
    $currentColorIndex = 0;
    @endphp
    @foreach ($notices as $notice)
    @if ($notice->grade_id == null)
    @php
    // Get the current border color from the array
    $borderColor = $borderColors[$currentColorIndex];
    // Increment the index to move to the next border color
    $currentColorIndex = ($currentColorIndex + 1) % count($borderColors);
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
        <div class="bg-white rounded-lg border-solid border-4 p-8 m-4" style="border-color: {{ $borderColor }};">
            <div class="relative overflow-hidden"></div>
            <h3 class="text-xl font-semi-bold text-gray-900 mt-3">{{ $notice->notice }}</h3>
            <h3 class="text-xl font-semi-bold text-gray-900 mt-3">Posted on: {{ $notice->date_of_notice }}</h3>
            @if ($notice->management)
            <h3 class="text-xl font-semi-bold text-gray-900 mt-3">Posted by: {{ $notice->management->name }}</h3>
            @else
            <h3 class="text-xl font-semi-bold text-gray-900 mt-3">Not Available</h3>
            @endif
        </div>
    </div>
    @endif
    @endforeach
    @else
    <h3 class="text-xl font-semi-bold text-gray-900 mt-3">No Notices Available</h3>
    @endif
</div>
      
      
   </div>
</div>