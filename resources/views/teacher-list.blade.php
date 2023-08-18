<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Teacher List</title>
</head>
<body class="bg-black">
    <div class="container flex justify-center mx-auto mt-10">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <a href="{{ url('add-teacher') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1">Add New Teacher</a>
                    
                    <table class="table-auto">
                        <thead class="bg-black divide-y divide-gray-300">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">ID</th>
                                <th class="px-6 py-2 text-xs text-gray-500">Name</th>
                                <th class="px-6 py-2 text-xs text-gray-500">Email</th>
                                <th class="px-6 py-2 text-xs text-gray-500">Admission</th>
                                <th class="px-6 py-2 text-xs text-gray-500">Reg</th>
                                <!-- Add more columns for teacher-specific attributes -->
                                <th class="px-6 py-2 text-xs text-gray-500">Edit</th>
                                <th class="px-6 py-2 text-xs text-gray-500">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-black divide-y divide-gray-300">
                            @foreach($teachers as $teacher)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-white">{{ $teacher->id }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $teacher->name }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $teacher->email }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $teacher->admission_number }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $teacher->year_of_registration }}</td>
                                <!-- Add more cells for teacher-specific attributes -->
                                <td class="px-6 py-4 text-sm text-white">
                                    <a href="{{ url('edit-teacher/'.$teacher->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                                </td>
                                <td class="px-6 py-4 text-sm text-white">
                                    <a href="{{ url('delete-teacher/'.$teacher->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <a href="{{ url('dashboard') }}" class="text-white">Back To Dashboard</a>
        </div>
    </div>
</body>
</html>
