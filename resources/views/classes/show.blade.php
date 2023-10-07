<x-admin-layout>
    <div class="m-6 ">
    <h1 class="text-white p-4 font-bold text-xl">Classes for Grade {{ $grade->grade }}</h1>

    @if($classes)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($classes as $class)
                <div class="bg-white border-2 border-black p-4 m-2 rounded-xl shadow-md">
                    <p class="text-black font-bold text-lg">Class Name</p>
                    <p class="text-lg font-bold">{{ $class->class_name }}</p>

                    <div class="flex justify-end mt-3">
                        <a href="{{ route('class.details', ['class' => $class->id]) }}" class="bg-indigo-600 hover:bg-indigo-800 text-white text-xl font-bold py-2 px-4 rounded-full ml-4 mt-1">View Details</a>
                    </div>

                    <div class="flex justify-end mt-3">
                        <a href="{{ url('delete-class/'.$class->id) }}" class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Delete</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-white">No classes available.</p>
    @endif
</div>

</x-admin-layout>