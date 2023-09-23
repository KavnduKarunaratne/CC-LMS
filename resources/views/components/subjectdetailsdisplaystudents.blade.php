

 @if (Auth::user() && Auth::user()->role_id == 4)
 <div class="bg-white py-16 ">
    <div class="container mx-auto px-4">
        @if ($subject->class && $subject->grade && $subject->class->students->count() > 0)
        <h2 class="text-xl font-bold text-black mb-8">Students in Grade: {{ $subject->grade->grade}} | Class: {{ $subject->class->class_name }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-lg p-8 border-solid border-2 border-gray-900">
                <div class="relative overflow-hidden">
                    {{--<img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">--}}
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                    </div>
                </div>
                @foreach ($subject->class ->students as $student)
                @if ($student->is_archived == 0 && $student->class_id == $subject->class_id)
                <div class="flex items-center justify-between mt-4">
                    <p>{{ $student->name }}</p>
                    <p>{{ $student->admission_number }}</p>
                </div>
                @endif
                @endforeach
            </div>

        </div>
        @else
        <p>No students in this class</p>
        @endif

    </div>
</div>
@endif
