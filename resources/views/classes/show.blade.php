<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Classes</title>
</head>
<body class="bg-black">
    <h1 class="text-white">Classes for Grade {{ $grade->grade }}</h1>

    @if($classes)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($classes as $class)
                <div class="bg-white p-4 rounded-md shadow-md">
                    <p class="text-xs text-gray-500">Class Name</p>
                    <p class="text-sm">{{ $class->class_name }}</p>

                    <div class="flex justify-end mt-3">
                        <a href="{{ route('class.details', ['class' => $class->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">View Details</a>
                    </div>

                    <div class="flex justify-end mt-3">
                        <a href="{{ url('delete-class/'.$class->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded ml-2">Delete</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-white">No classes available.</p>
    @endif
</body>
</html>
