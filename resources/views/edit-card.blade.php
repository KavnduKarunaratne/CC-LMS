<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit flashcard</title>
</head>
<body class="bg-white">
    <h2 class="text-2xl font-bold mb-6 text-center text-black">Edit Flashcard</h2>
    <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" method="post" action="{{ url('update-flashcard/'.$flashcard->id) }}">
        @if (session('error'))
            <div class="bg-red-200 text-red-700 p-2 rounded my-3 mt-1">
                {{ session('error') }}
            </div>
         @elseif(session('success'))
            <div class="bg-green-200 text-green-700 p-2 rounded my-3 mt-1">
                {{ session('success') }}
            </div>
        @endif
        @csrf 
         
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">Content</label>
            <textarea name="content" rows="5" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">{{ $flashcard->content}}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="answer">Answer</label>
            <textarea name="answer" rows="5" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">{{ $flashcard->answer }}</textarea>
        </div>
        <br>
        <button type="submit" class="w-full bg-green-500 text-white text-sm font-bold py-2 px-4 mb-4 rounded-md hover:bg-green-600 transition duration-300">Save</button>
        <a href="{{ url('teacher-panel') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 px-3 rounded my-3 mt-1">Back</a>
    </form>
</body>
</html>
