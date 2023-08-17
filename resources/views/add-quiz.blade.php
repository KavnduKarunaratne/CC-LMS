<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Quiz</title>
</head>

<body class="bg-white">
    <div class="container mx-auto py-8 mt-12">
        <h2 class="text-2xl font-bold mb-6 text-center text-black">Add A QUIZ</h2>

        <form method="POST" action="{{ route('save-quiz') }}">
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
            </div>
        

            <button type="submit" class="btn btn-primary">Add Quiz</button>
        </form>
    </div>
</body>
</html>

