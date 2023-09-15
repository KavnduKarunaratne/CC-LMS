<div class="container mx-auto p-4">
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            
            <h2 class="text-lg font-semibold">Welcome to the Student Panel</h2>
            <p>Your role ID: {{ Auth::user()->role_id }}</p>
            <p>Logged-in User: {{ auth()->user()->name }}</p>
        </div>
        @if (Auth::user()->grade)
            <div class="bg-white p-4 rounded-md shadow-md mb-4">
                <h3 class="text-lg font-semibold">My Grade:</h3>
                <ul>
                    <li>{{ Auth::user()->grade->grade }}</li>
                </ul>
            </div>
        @else
            <p>No grades assigned.</p>
        @endif
        @if (Auth::user()->class)
            <div class="bg-white p-4 rounded-md shadow-md mb-4">
                <h3 class="text-lg font-semibold">My Class:</h3>
                <ul>
                    <li>{{ Auth::user()->class->class_name }}</li>
                </ul>
            </div>
        @else
            <p>No classes assigned.</p>
        @endif

        @if (Auth::user()->grade && Auth::user()->class)
            <div class="bg-white p-4 rounded-md shadow-md">
                <h3 class="text-lg font-semibold">Subjects for Your Class and Grade:</h3>
                <ul>
                    @foreach (Auth::user()->class->subjects()->where('grade_id', Auth::user()->grade->id)->get() as $subject)
                        <li>
                            <a href="{{ route('subject.detail', ['subject_id' => $subject->id]) }}">
                                {{ $subject->subject_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>



    <div class="bg-white p-4 rounded-md shadow-md">
        <h3 class="text-lg font-semibold">Notices for Your Grade:</h3>
        <ul>
            @foreach (Auth::user()->grade->notices as $notice)
                @if ($notice->grade_id == Auth::user()->grade->id || $notice->grade_id == null)
                    <li>
                        Notice: {{ $notice->notice }}
                        | Date: {{ $notice->date_of_notice }}
                    </li>
                @endif
            @endforeach
        </ul>
    </div>



    /////////////////////////////////////////////
    <div>
        @if ($notices->count() > 0)
            @foreach ($notices as $notice)
                @if ($notice->grade_id == null)
                    <div class="text-white mt-4">
                        <div class="text-black w-full bg-white p-4 mb-4 rounded-md shadow-md">
                            {{ $notice->notice }}<br>
                            <span class="text-black">{{ $notice->date_of_notice }}</span><br>
                            @if ($notice->management)
                                <span>Management: {{ $notice->management->name }}</span>
                            @else
                                <span>Management: Not available</span>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <p>No notices available.</p>
        @endif
    </div>


<!---->

<!--student information-->
<div class="bg-blue-700 py-5 mb-0">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-white mb-8">Welcome to Student Panel</h2>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
            <div class="bg-white rounded-lg shadow-lg p-8 mx-auto">
                <div class="relative overflow-hidden">
                    {{--<img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">--}}
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mt-1">Your logged in Username:{{ auth()->user()->name }} </h3>
                <h3 class="text-xl font-bold text-gray-900 mt-1">Your role ID: {{ Auth::user()->role_id }}</h3>
                @if (Auth::user()->grade)
                <h3 class="text-xl font-bold text-gray-900 mt-1">Your Grade: {{ Auth::user()->grade->grade }}</h3>
                @else
                <h3 class="text-xl font-bold text-red-600 mt-1">Not assigned to a grade</h3>
                @endif
                @if (Auth::user()->class)
                <h3 class="text-xl font-bold text-gray-900 mt-1">Your Class: {{ Auth::user()->class->class_name }}</h3>
                @else 
                <h3 class="text-xl font-bold text-red-600 mt-1">Not assigned to a class</h3>
                @endif
            </div>
        </div>
    </div>
</div>
<!--Subjects for student-->
@if (Auth::user()->grade && Auth::user()->class)
<div class="bg-black py-16 mb-10">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-white mb-8">Your Subjects</h2>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="relative overflow-hidden">
                    {{--<img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">--}}
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                    </div>
                </div>
                @foreach (Auth::user()->class->subjects()->where('grade_id', Auth::user()->grade->id)->get() as $subject)
                <h3 class="text-xl font-bold text-gray-900 mt-3">{{ $subject->subject_name }}</h3>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
<!--Notices-->
<div class="bg-black py-16 mb-10">
    <h2 class="text-3xl font-bold text-white mb-8">Accouncements</h2>  
        @foreach (Auth::user()->grade->notices as $notice)
        @if ($notice->grade_id == Auth::user()->grade->id || $notice->grade_id == null)
        <li>
            Notice:{{ $notice->notice }}
            Date:{{ $notice->date_of_notice }}
        </li>
        @endif
        @endforeach         
</div>
<!--Notices-->
<div class="bg-black py-16 mb-10">
    <h2 class="text-3xl font-bold text-white mb-8">Accouncements</h2>
    @if ($notices->count() > 0)
    @foreach ($notices as $notice)
    @if ($notice->grade_id == null)
    <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="relative overflow-hidden"></div>
            <h3 class="text-xl font-bold text-gray-900 mt-3">{{ $notice->notice }}</h3>
            <h3 class="text-xl font-bold text-gray-900 mt-3">Posted on: {{ $notice->date_of_notice }}</h3>
            @if ($notice->management)
            <h3 class="text-xl font-bold text-gray-900 mt-3">Posted by: {{ $notice->management->name }}</h3>
            @else
            <h3 class="text-xl font-bold text-gray-900 mt-3">Not Available</h3>
            @endif
        </div>
    </div>
    @endif
    @endforeach
    @else
    <h3 class="text-xl font-bold text-gray-900 mt-3">No Notices Available</h3>
    @endif
</div>
