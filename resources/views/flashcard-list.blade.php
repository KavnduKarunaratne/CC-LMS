<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Flashcard List</title>
</head>
<body class="bg-black">
<div class="container flex justify-center mx-auto mt-10">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-200 shadow">
                <table class="table-auto mt-4">
                    <thead class="bg-black divide-y divide-gray-300">
                    <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">ID</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Content</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Answer</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Subject</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Uploaded by</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Upload Date</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-black divide-y divide-gray-300">
                        @foreach($flashcards as $flashcard)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-white">{{ $flashcard->id }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $flashcard->content }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $flashcard->answer }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $flashcard->subject->subject_name ?? 'N/A' }}</td><!--if the subject is unavailable, it will show N/A-->
                                <td class="px-6 py-4 text-sm text-white">{{ $flashcard->teacher->name}}</td><!-- the teacher who uploaded the flashcards will be shown-->
                                <td class="px-6 py-4 text-sm text-white">{{ $flashcard->upload_date }}</td>
                                <td class="px-6 py-4 text-sm text-white">
                                    <a href="{{ url('edit-card', $flashcard->id) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                                    <a href="{{ url('delete-flashcard', $flashcard->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
                                </td>         
                            </tr>                                   
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="flex-wrap">
            <a href="{{ url('teacher-panel') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 px-3 rounded my-3 mt-1">Back To Dashboard</a>
        </div>
    </div>
</div>
</body>
</html>
