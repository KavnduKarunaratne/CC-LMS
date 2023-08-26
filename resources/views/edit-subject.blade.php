<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Subject</title>
</head>
<body class="bg-black">
    <div class="container mx-auto py-8 mt-12">
        @if (session('success'))
            <div class="bg-green-200 text-green-700 p-2 rounded my-3 mt-1">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-200 text-red-700 p-2 rounded my-3 mt-1">
                {{ session('error') }}
            </div>
        @endif
        <h2 class="text-2xl font-bold mb-6 text-center text-white">Edit Subject</h2>
        <form method="post" action="{{ route('update-subject', ['id' => $subject->id]) }}" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="subject_name">Subject Name</label>
                <input type="text" name="subject_name" value="{{ $subject->subject_name }}" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" value="{{ $subject->subject_name }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grade_id">Select Grade</label>
                <select name="grade_id" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">
                    @foreach($grade as $grade)
                    <option value="{{ $grade->id }}" {{ $grade->id == $subject->grade_id ? 'selected' : '' }}>{{ $grade->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="class_id">Select Class</label>
                <select name="class_id" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">
                    @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ $class->id == $subject->class_id ? 'selected' : '' }}>{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="teacher_id">Select Teacher</label>
                <select name="teacher_id" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">
                    @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="flex items-center justify-around">
                <button class="bg-amber-500 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Update
                </button>
                <a href="{{ url('dashboard') }}" class="text-black no-underline hover:underline">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
