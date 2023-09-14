{{--<div class="flex flex-wrap justify-center mt-10">
    <!-- card 1 -->
    <div class="p-4 max-w-sm">
        <div class="flex rounded-lg h-full bg-teal-400 p-8 flex-col">
            <div class="flex items-center mb-3">
 
                <h2 class="text-white text-lg font-medium">Heading</h2>
            </div>
            <div class="flex flex-col justify-between flex-grow">

                <p class="leading-relaxed text-base text-white">Grade 1</p>
                    <p class="leading-relaxed text-base text-white">Maths</p>
            </div>
        </div>
    </div>
</div>--}}


{{--<html>
    @if ($subjects->count() > 0)
    <h3 class="text-lg font-semibold py-px mb-8 ml-3 mt-8">Subjects You Are In Charge Of:</h3>
    <div class="bg-white ">
    <div class="container mx-auto px-4">      
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach (Auth::user()->subjects as $subject)
        <div class="bg-neutral-100 rounded-lg shadow-lg p-8" style="width: 300px;">               
                <a href="{{ route('subject.detail', ['subject_id' => $subject->id]) }}"><p class="text-cyan-900 text-xl mt-2 font-semibold">{{ $subject->subject_name }}</p></a>
                <h1 class="text-sm  text-gray-900 mt-4 font-semibold">Class: {{ $subject->class->class_name ?? 'N/A' }}</h1>
                <h1 class="text-sm  text-gray-900 mt-4 font-semibold">Grade: {{ $subject->grade->grade }}</h1>
        </div>             
        @endforeach                      
    </div>
    </div>
    @else
    <div class="bg-white p-4 rounded-md shadow-md mb-4">
                    <p>No subjects assigned.</p>
    </div>
    @endif

</html>--}}






{{--<div class="bg-white ">
    <div class="container mx-auto px-4">      
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach (Auth::user()->subjects as $subject)
        <div class="bg-neutral-100 rounded-lg shadow-lg p-8" style="width: 300px;">               
                <p class="text-cyan-900 text-xl mt-2 font-semibold">{{ $subject->subject_name }}</p>
                <h1 class="text-sm  text-gray-900 mt-4 font-semibold">Class: {{ $subject->class->class_name ?? 'N/A' }}</h1>
                <h1 class="text-sm  text-gray-900 mt-4 font-semibold">Grade: {{ $subject->grade->grade }}</h1>
        </div>             
        @endforeach                      
    </div>
</div>--}}


<html>
    @if ($subjects->count() > 0)


    <h3 class="text-lg font-semibold py-px mb-8 ml-3 mt-2">Subjects You Are In Charge Of:</h3>
    <div class="bg-white ">
    <div class="container mx-auto px-4">      
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach (Auth::user()->subjects as $subject)
        <div class="relative h-full ml-0 mr-0 sm:mr-10">
        <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-black rounded-lg" style="width:300px;"></span>
        <div class="relative h-full p-5 bg-white border-2 border-black rounded-lg" style="width: 300px;">               
                <a href="{{ route('subject.detail', ['subject_id' => $subject->id]) }}"><p class="text-indigo-700 text-xl mt-2 font-semibold hover:text-indigo-400">{{ $subject->subject_name }}</p></a>
                <h1 class="text-sm  text-gray-900 mt-4 font-semibold">Class: {{ $subject->class->class_name ?? 'N/A' }}</h1>
                <h1 class="text-sm  text-gray-900 mt-4 font-semibold">Grade: {{ $subject->grade->grade }}</h1>
        </div>    
        </div>         
        @endforeach                      
    </div>
    </div>
    @else
    <div class="bg-white p-4 rounded-md shadow-md mb-4">
                    <p>No subjects assigned.</p>
    </div>
    @endif

</html>

{{--<div class="relative h-full ml-0 mr-0 sm:mr-10">
    <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-indigo-500 rounded-lg"></span>
    <div class="relative h-full p-5 bg-white border-2 border-indigo-500 rounded-lg">
    <!-- Service box content -->
</div>
</div>--}}


