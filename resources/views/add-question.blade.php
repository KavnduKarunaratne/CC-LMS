<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Notice</title>
</head>
<body class="bg-white">
    <div class="container mx-auto py-8 mt-12">
        <h2 class="text-2xl font-bold mb-6 text-center text-black">Add A QUIZ</h2>

        <form method="POST" action="{{ route('save-question', ['quiz_id' => $quiz->id]) }}">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="question">Question</label>
        <input type="text" name="question" id="question" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Question</button>
</form>
    </div>
</body>
</html>