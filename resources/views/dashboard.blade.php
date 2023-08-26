<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>admin</title>
</head>
<body class="bg-white">

<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="{{ url('student-list') }}" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
                        <a href="{{ url('user-management') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">User Management</a>
                        <a href="{{ url('subject-list') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Course Management</a>
                        <a href="{{ url('add-teacher') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Enroll Teacher</a>
                        <a href="{{ url('add-student') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Enroll Student</a>
                        <a href="{{ url('profile/show') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Profile</a>
                        <a href="{{ route('logout') }}" class="block mt-4 lg:inline-block lg:mt-0 text-amber-100 mr-4 px-3 py-2 no-underline hover:underline sm:block" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<br>
<p>Logged-in User: {{ auth()->user()->name }}</p>
<div>
    <div>
        <a href="{{ url('add-grade') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1">Add Grade</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($grade as $grade)
            <div class="bg-black text-white p-4 rounded-md shadow-md">
                <p class="text-xs text-gray-500">Grade</p>
                <p class="text-sm">{{ $grade->grade }}</p>
                <div class="flex justify-end mt-3">
                    <a href="{{ route('classes.show', $grade) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded">View Classes</a>
                </div>
                <div class="flex justify-end mt-3">
                    <a href="{{ url('edit-grade/'.$grade->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">Edit</a>
                    <a href="{{ url('delete-grade/'.$grade->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded ml-2">Delete</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<br>
</body>
</html>
