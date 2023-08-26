<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Teacher Panel</title>
</head>
<body class="bg-white">
    @if (Auth::check() && Auth::user()->is_archived==0 && Auth::user()->role_id == 4) <!--checks if user is archived and the role id is 4-->
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <a href="{{ url('profile/show') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Profile</a>
                                <a href="{{ route('logout') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mx-auto p-4">
            <div class="bg-white p-4 rounded-md shadow-md mb-4">
                <h2 class="text-lg font-semibold">Teacher Panel</h2>
                <p>User: {{ auth()->user()->name }}</p>
            </div>
            @if ($subjects->count() > 0)
                <div class="bg-white p-4 rounded-md shadow-md mb-4">
                    <h3 class="text-lg font-semibold">Subjects You Are In Charge Of:</h3>
                    <ul>
                        @foreach (Auth::user()->subjects as $subject)
                            <li>
                                <a href="{{ route('subject.detail', ['subject_id' => $subject->id]) }}">
                                    {{ $subject->subject_name }}
                                </a>
                                | Class: {{ $subject->class->class_name ?? 'N/A' }}
                                | Grade: {{ $subject->grade->grade }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="bg-white p-4 rounded-md shadow-md mb-4">
                    <p>No subjects assigned.</p>
                </div>
            @endif
        </div>
    @else
        <p>You do not have access to this.</p>
        <a href="{{ route('logout') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Log Out</a>
    @endif
</body>
</html>
