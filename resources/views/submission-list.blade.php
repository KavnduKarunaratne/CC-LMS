<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Submission List</title>
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
                            <th class="px-6 py-2 text-xs text-gray-500">Submission Name</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Description</th>
                            <th class="px-6 py-2 text-xs text-gray-500">File</th>
                            <th class="px-6 py-2 text-xs text-gray-500">assigment</th>
                            <th class="px-6 py-2 text-xs text-gray-500">student</th>
                            <th class="px-6 py-2 text-xs text-gray-500">submitted Date</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-black divide-y divide-gray-300">
                        @foreach($submission as $submission)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-white">{{ $submission->id }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $submission->name }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $submission->description }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $submission->file }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $submission->assignment->assignment_name }}</td><!--student name and assignment name is displayed using the relationship-->
                                <td class="px-6 py-4 text-sm text-white">{{ $submission->student->name ?? 'N/A'}}</td> <!-- ?? 'N/A' is used to show N/A if the student is not assigned to the submission -->

                                <td class="px-6 py-4 text-sm text-white">{{ $submission->submit_date }}</td>
                                <td class="px-6 py-4 text-sm text-white">
                                    <a href="{{ url('edit-submission', $submission->id) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                                    <a href="{{ url('delete-submission', $submission->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
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
