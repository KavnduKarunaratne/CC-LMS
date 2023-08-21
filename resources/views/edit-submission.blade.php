<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Submission</title>
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
        <h2 class="text-2xl font-bold mb-6 text-center text-white">Edit your submission</h2>

        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" method="post" action="{{ route('update-submission',['id'=> $submission->id])  }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Submission title</label>
                <input type="text" name="name"               class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                <textarea name="description" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="file">Your submission</label>
                <input type="file" name="file" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
            </div>

            <input type="hidden" name="assignment_id" value="{{ $assignment->id }}" />




            <br>
            <button type="submit" class="w-full bg-green-500 text-white text-sm font-bold py-2 px-4 mb-4 rounded-md hover:bg-green-600 transition duration-300">Save</button>
            <a href="{{ url('submission-list') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 px-3 rounded my-3 mt-1">Back</a>
        </form>
    </div>
</body>
</html>
