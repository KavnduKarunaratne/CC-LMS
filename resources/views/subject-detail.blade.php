<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Subject Detail</title>
</head>
<body class="bg-white">

<div>
<h2>Subject Detail</h2>
<p>Subject Name: {{ $subject->subject_name }}</p>

<h3>Materials:</h3>
@if ($materials->count() > 0)
    <ul>
        @foreach ($materials as $material)
            <li>
                <strong>Material Name:</strong> {{ $material->material_name }}
                <br>
                <strong>Description:</strong> {{ $material->description }}
                <br>
                @if ($material->file)
                <strong>File:</strong> <a href="{{ asset('storage/' . $material->file) }}" download>{{ $material->file }}</a>
                <br>
                @endif
                <strong>Link:</strong> {{ $material->link }}
                <br>
                <strong>Upload Date:</strong> {{ $material->upload_date }}
    


                <br>
                @if (Auth::user() && Auth::user()->role_id == 4)
                <a href="{{ url('edit-material', $material->id) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                <a href="{{ url('delete-material', $material->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
                @endif
                <!-- Display other material details -->
            </li>
        @endforeach
    </ul>
@else
    <p>No materials available for this subject.</p>
@endif

<h3>Assignments:</h3>
@if ($assignments->count() > 0)
    <ul>
        @foreach ($assignments as $assignment)
            <li>
                <strong>Assignment Name:</strong> {{ $assignment->assignment_name }}
                <br>
                <strong>Description:</strong> {{ $assignment->description }}
                <br>
                @if ($assignment->file)
                <strong>File:</strong> <a href="{{ asset('storage/' . $assignment->file) }}" download>{{ $assignment->file }}</a>
                <br>
                @endif
                <strong>Due Date:</strong> {{ $assignment->due_date }}
                <br>
                <strong>Upload Date:</strong> {{ $assignment->upload_date }}
                <br>
                @if (Auth::user() && Auth::user()->role_id == 4)
                <a href="{{ url('edit-assignment', $assignment->id) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                <a href="{{ url('delete-assignment', $assignment->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No assignments available for this subject.</p>
@endif











@if (Auth::user() && Auth::user()->role_id == 4)
    <a href="{{ url('add-material') }}"  class="bg-amber-500 hover:bg-amber-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1"> Upload Materials</a>
    <a href="{{ url('add-assignment') }}"  class="bg-amber-500 hover:bg-amber-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1"> Upload Assignment</a>

@endif
</div>
<div>
@if ($subject->class && $subject->class->students->count() > 0)
    <h4>Students in {{ $subject->class->class_name }}:</h4>
    <ul>
        @foreach ($subject->class->students as $student)
            <li>{{ $student->name }} ({{ $student->email }})</li>
        @endforeach
    </ul>
@else
    <p>No students in this class.</p>
@endif

</div>

</body>
</html>
