<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Class Details</title>
</head>
<body class="bg-black">
    <div class="bg-white p-4 rounded-md shadow-md">
        <p class="text-xs text-gray-500">Class Name</p>
        <p class="text-sm">{{ $class->class_name }}</p>
        <a href="{{ url('edit-class/'.$class->id) }}">Edit</a><br>
        <a href="{{ url('delete-class/'.$class->id) }}">Delete</a>
    </div>
    
    <div class="mt-4">
        <h2 class="text-white text-lg font-semibold">Students in {{ $class->class_name }}</h2>
        <ul class="text-white">
            @foreach ($students as $student)
                <li>
                    {{ $student->name }} (Admission: {{ $student->admission_number }})
                    <a href="{{ url('edit-student/'.$student->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                </li>
            @endforeach
        </ul>
    </div>
    
    <div class="mt-4">
        <h2 class="text-white text-lg font-semibold">Subjects in {{ $class->class_name }}</h2>
        <ul class="text-white">
            @foreach ($subjects as $subject)
                <li>
                    Subject: {{ $subject->subject_name }}
                    @if ($subject->teacher)
                        | Teacher: {{ $subject->teacher->name }}
                    @else
                        | No Teacher Assigned
                    @endif
                    <a href="{{ url('edit-subject/'.$subject->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                    <a href="{{ url('delete-subject/'.$subject->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
