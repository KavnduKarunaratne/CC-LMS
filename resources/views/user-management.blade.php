<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>User Management</title>
</head>
<body class="bg-white text-black">
    <div class="m-10">
        <form action="{{ route('search-users') }}" method="GET">
            <input type="text" name="search" placeholder="Search users" class="border border-black">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">Search</button>
        </form>
    </div>
    <div class="container flex justify-center mx-auto mt-10">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <a href="{{ url('add-management') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1"> Add New Management</a>
                    <!-- Display Active Users -->
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Admission Number</th>
                                <th>Year of Registration</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($user->count() == 0)
                                <tr>
                                    <td colspan="6" class="text-center">No users found.</td>
                                </tr>
                            @else
                                @foreach ($user as $user)
                                    @if ($user->role_id == 2)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->admission_number }}</td>
                                            <td>{{ $user->year_of_registration }}</td>
                                            <td>
                                                <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                                    {{ $user->is_archived ? 'Inactive' : 'Active' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-white">
                                                <a href="{{ url('edit-user/'.$user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                                                <form action="{{ url('archive-user/'.$user->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white py-1 px-3 rounded my-3 mt-1">Archive</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($user->role_id == 3)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->admission_number }}</td>
                                            <td>{{ $user->year_of_registration }}</td>
                                            <td>
                                                <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                                    {{ $user->is_archived ? 'Inactive' : 'Active' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-white">
                                                <a href="{{ url('edit-user/'.$user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                                                <form action="{{ url('archive-user/'.$user->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white py-1 px-3 rounded my-3 mt-1">Archive</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($user->role_id == 4)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->admission_number }}</td>
                                            <td>{{ $user->year_of_registration }}</td>
                                            <td>
                                                <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                                    {{ $user->is_archived ? 'Inactive' : 'Active' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-white">
                                                <a href="{{ url('edit-user/'.$user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                                                <form action="{{ url('archive-user/'.$user->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white py-1 px-3 rounded my-3 mt-1">Archive</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <!-- Display Archived Users -->
                    <h2>Archived Users</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Admission Number</th>
                                <th>Year of Registration</th>
                                <th>Status</th>
                                <th>Date of Archive</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archivedUsers as $user)
                                @if ($user->role_id == 2)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->admission_number }}</td>
                                        <td>{{ $user->year_of_registration }}</td>
                                        <td>
                                            <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                                {{ $user->is_archived ? 'Inactive' : 'Active' }}
                                            </span>
                                        </td>
                                        <td>{{ $user->date_of_archive }}</td>
                                        <td class="px-6 py-4 text-sm text-white">
                                            <form action="{{ url('unarchive-user/'.$user->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Unarchive</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                                @if ($user->role_id == 3)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->admission_number }}</td>
                                        <td>{{ $user->year_of_registration }}</td>
                                        <td>
                                            <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                                {{ $user->is_archived ? 'Inactive' : 'Active' }}
                                            </span>
                                        </td>
                                        <td>{{ $user->date_of_archive }}</td>
                                        <td class="px-6 py-4 text-sm text-white">
                                            <form action="{{ url('unarchive-user/'.$user->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Unarchive</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                                @if ($user->role_id == 4)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->admission_number }}</td>
                                        <td>{{ $user->year_of_registration }}</td>
                                        <td>
                                            <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                                {{ $user->is_archived ? 'Inactive' : 'Active' }}
                                            </span>
                                        </td>
                                        <td>{{ $user->date_of_archive }}</td>
                                        <td class="px-6 py-4 text-sm text-white">
                                            <form action="{{ url('unarchive-user/'.$user->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Unarchive</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ url('dashboard') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 px-3 rounded my-3 mt-1">Back To Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
