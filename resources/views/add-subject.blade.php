<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Subject</title>
</head>

<body class="bg-black">
    <div class="container mx-auto py-8 mt-12">
        <h2 class="text-2xl font-bold mb-6 text-center text-white">Add Subject</h2>

        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" method="post" action="{{ url('save-subject') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="subject_name">Subject Name</label>
                <input type="text" name="subject_name" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grade_id">Select Grade</label>
                <select name="grade_id" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">
                    @foreach($grades as $grade)
                    <option value="{{$grade->id}}">{{$grade->id}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="class_id">Select Class</label>
                <select name="class_id" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">
                    @foreach($classes as $class)
                    <option value="{{$class->id}}">{{$class->class_name}}</option>
                    @endforeach
                </select>
            </div>

           <!-- <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="teacher_id">Select Teacher</label>
                <select name="teacher_id" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">
                    @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->teacher_name}}</option>
                    @endforeach
                </select>
            </div>-->

            <!-- ... -->
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="teacher_id">Select Teacher</label>
    <select name="teacher_id" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">
        @if($teachers)
            @foreach($teachers as $teacher)
                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
            @endforeach
        @else
            <option value="">No Teachers Available</option>
        @endif
    </select>
</div>
<!-- ... -->

               <br>
            <button type="submit" class="w-full bg-amber-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-amber-600 transition duration-300">Save</button>
            <a href="{{ url('dashboard') }}">Back</a>
        </form>
    </div>
</body>
</html>