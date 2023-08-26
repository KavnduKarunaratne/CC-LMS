<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Management</title>
</head>
<body class="bg-black">
    <div class="container flex justify-center mx-auto mt-10">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <a href="{{ url('add-management') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1">Add New Management</a>

                    <table class="table-auto mt-4">
                        <thead class="bg-black divide-y divide-gray-300">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    ID
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Name
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Email
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Admission
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Reg
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Grade
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-black divide-y divide-gray-300">
                            @foreach($management as $management)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-white">{{ $management->id }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $management->name }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $management->email }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $management->admission_number }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $management->year_of_registration }}</td>
                                <td class="px-6 py-4 text-sm text-white">
                                    <a href="{{ url('delete-management/'.$management->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
                                    <a href="{{ url('edit-management/'.$management->id) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="flex-wrap">
                <a href="{{ url('dashboard') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 px-3 rounded my-3 mt-1">Back To Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
