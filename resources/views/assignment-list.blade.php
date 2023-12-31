<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Assignment List</title>
</head>
<body class="bg-black">
<div class="container flex justify-center mx-auto mt-10">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-200 shadow">
                <a href="{{ url('add-assignment') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1">Add New Assignment</a>
            
                <table class="table-auto mt-4">
                    <thead class="bg-black divide-y divide-gray-300">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">ID</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Assignment Name</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Description</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Subject</th>
                            <th class="px-6 py-2 text-xs text-gray-500">File</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Due Date</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Upload Date</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-black divide-y divide-gray-300">
                        @foreach($assignments as $assignment)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-white">{{ $assignment->id }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $assignment->assignment_name }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $assignment->description }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $assignment->subject->subject_name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $assignment->file }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $assignment->due_date }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $assignment->upload_date }}</td>
                                <td class="px-6 py-4 text-sm text-white">
                                    <a href="{{ url('edit-assignment', $assignment->id) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                                    <a href="{{ url('delete-assignment', $assignment->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>

        <div class="flex-wrap">
            <a href="{{ url('teacher-panel') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 px-3 rounded my-3 mt-1">Teacher Panel</a>
        </div>
    </div>
</div>
</body>
</html>
