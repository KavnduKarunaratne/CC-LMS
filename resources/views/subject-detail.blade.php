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
                <strong>File:</strong> {{ $material->file }}
                <br>
                <strong>Link:</strong> {{ $material->link }}
                <br>
                <strong>Upload Date:</strong> {{ $material->upload_date }}
                <br>
                <a href="{{ url('edit-material', $material->id) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                <a href="{{ url('delete-material', $material->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
                <!-- Display other material details -->
            </li>
        @endforeach
    </ul>
@else
    <p>No materials available for this subject.</p>
@endif
@if (Auth::user() && Auth::user()->role_id == 4)
    <a href="{{ url('add-material') }}"  class="bg-amber-500 hover:bg-amber-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1"> Upload Materials</a>
@endif
</div>

</body>
</html>
