<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Announcement</title>
</head>
<body class="bg-white dark:bg-black">
    {{--<nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="{{ url('management') }}" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Management Panel</a>
                            <a href="{{ route('logout') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Log Out</a>
                            <a href="{{ url('profile/show') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>--}}


    @include('components.managementnav2')

    <!--managementnavbar & managementcards-->

    {{--<div class="container flex justify-center mx-auto mt-10">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <a href="{{ url('add-notice') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1">Add Notice</a>
                    @foreach ($notice as $notice)
                        <div class="text-white mt-4">
                            <div class="text-black w-full max-w-sm mx-auto bg-white p-4 mb-4 rounded-md shadow-md">
                                {{ $notice->notice }}<br>
                                <span class="text-black">{{ $notice->date_of_notice }}</span><br>
                                <span>Grade : {{ $notice -> grade_id}}</span><br>
                                @if ($notice->management)
                                    <span>Management: {{ $notice->management->name }}</span>
                                @else
                                    <span>Management: Not available</span>
                                @endif
                            </div>
                            <a href="{{ url ('edit-notice/'.$notice->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                            <a href="{{ url ('delete-notice/'.$notice->id)}}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
                        </div>
                        <br>
                    @endforeach
                </div>
                <br>
            </div>
        </div>
    </div>--}}
</body>
</html>
