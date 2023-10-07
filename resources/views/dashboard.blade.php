<x-admin-layout>
                   
<div class="page-container m-10 dark:bg-black">
    <div class="p-4">
        <a href="{{ url('add-grade') }}" class="bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-800 text-white dark:text-gray-100 text-xl font-bold py-2 px-4 rounded-full ml-4 mt-1">Add Grade</a>
    </div>
   
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    
        @foreach($grade as $grade)
    
            <div class="card rounded-2xl border-2 w-full h-2/2 border-black dark:border-gray-300 m-4">
            <a href="{{ route('classes.show', $grade) }}">
                <p class=" text-indigo-600 dark:text-indigo-300 font-bold text-center mt-4">Grade {{ $grade->grade }}</p>
             <!--   <div class="flex justify-end mt-3">
                    <div class="flex">
                        <a href="{{ route('classes.show', $grade) }}" class="bg-green-500 hover:bg-green-700 text-white text-l font-bold py-2 px-3 rounded-full block md:inline">View Classes</a>
                </div>
                </div>-->
                <div class="flex justify-center m-4 space-around ">
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


</x-admin-layout>