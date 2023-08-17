<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Quiz</title>
</head>

<body class="bg-white">
    <div class="container mx-auto py-8 mt-12">
        <h2 class="text-2xl font-bold mb-6 text-center text-black">Edit Quiz</h2>

        <form method="POST" action="{{ url('update-quiz/'.$quiz->id) }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Quiz Title</label>
                <input type="text" name="title" id="title" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2"  for="description">Quiz Description</label>
                <textarea name="description" id="description" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2"  for="deadline">Deadline</label>
                <input type="datetime-local" name="deadline" id="deadline" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="class_id">Class</label>
                <select name="class_id"  required>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grade_id">Grade</label>
                <select name="grade_id"  required>
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->grade }}</option>
                    @endforeach
                </select>
                <br>

                

            <button type="submit" class="w-full bg-green-500 text-white text-sm font-bold py-2 px-4 mb-4 rounded-md hover:bg-green-600 transition duration-300">Save Changes</button>
            <a href="{{ url('dashboard') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 px-3 rounded my-3 mt-1">Back</a>
    </div>
</body>
</html>

