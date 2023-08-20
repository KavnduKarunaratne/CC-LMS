<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Subject Detail</title>
</head>
<body class="bg-white">

<div class="container mx-auto p-4">
    <div class="bg-white p-4 rounded-md shadow-md mb-4">
        <h2 class="text-lg font-semibold">Subject Detail</h2>
        <p>Subject Name: {{ $subject->subject_name }}</p>
        @if (Auth::user() && Auth::user()->role_id == 4)
      <p><a href="{{ route('student-progress', ['subject_id' => $subject->id]) }}">Student Progress</a></p>
       @endif
    </div>
   
    <div>
        <a href="{{ route('subject.flashcards', ['subject_id' => $subject->id]) }}">View Flashcards</a>
    </div>

  
    <div class="bg-white p-4 rounded-md shadow-md mb-4">
<h3 class="text-lg font-semibold">Materials:</h3>
@if ($materials->count() > 0)
    <ul>
        @foreach ($materials as $material)
        @php
                    $isAccessible = in_array(Auth::user()->id, $material->users->pluck('id')->toArray());
                @endphp
                @if ($isAccessible || $material->users->isEmpty() || Auth::user()->role_id == 4)
            <li>
                <strong>Material Name:</strong> {{ $material->material_name }}
                <br>
                <strong>Description:</strong> {{ $material->description }}
                <br>
                @if ($material->file)
                <strong>File:</strong> <a href="{{ asset('storage/app/materials' . $material->file) }}" download>{{ $material->file }}</a>
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
             
            </li>
            @endif
        @endforeach
    </ul>
@else
    <p>No materials available for this subject.</p>
@endif
</div>

<div>
    
</div>

<div class="bg-white p-4 rounded-md shadow-md mb-4">
<h3 class="text-lg font-semibold">Assignments:</h3>
@if ($assignments->count() > 0)
    <ul>
        @foreach ($assignments as $assignment)
            <li>
                <strong>Assignment Name:</strong> {{ $assignment->assignment_name }}
                <br>
                <strong>Description:</strong> {{ $assignment->description }}
                <br>
                @if ($assignment->file)
                <strong>File:</strong> <a href="{{ asset('storage/app/assignments' . $assignment->file) }}" download>{{ $assignment->file }}</a>
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
              
                @if (Auth::user() && Auth::user()->role_id == 3)<!--php code is used to excute php directly inside the blade file-->
    @php
        $hasSubmitted = Auth::user()->submissions->contains('assignment_id', $assignment->id);
    @endphp
<!--checks if the student has already made a submission for this assignment-->
    @if ($hasSubmitted)
        <p>You have already submitted for this assignment.</p>
    @elseif (strtotime($assignment->due_date) > time())<!--checks if the due date is passed for submissions. if so the link is hidden-->
        <a href="{{ url('add-submission', ['assignment_id' => $assignment->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Add Submission for Assignment</a>
    @endif

@endif


                @if (Auth::user() && Auth::user()->role_id == 4)
                <td class="px-6 py-2 text-xs text-gray-500">
    <a href="{{ route('view-submissions', ['assignment_id' => $assignment->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">View Submissions</a>
</td>

                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No assignments available for this subject.</p>
@endif
</div>


@if (Auth::user() && Auth::user()->role_id == 4)
<div class="bg-white p-4 rounded-md shadow-md mb-4">
    <a href="{{ url('add-material', ['subject_id' => $subject->id]) }}"  class="bg-amber-500 hover:bg-amber-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1"> Upload Materials</a>
    <a href="{{ url('add-assignment',['subject_id' => $subject->id]) }}"  class="bg-amber-500 hover:bg-amber-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1"> Upload Assignment</a>
    </div>

</div>
<div class="bg-white p-4 rounded-md shadow-md mb-4">
@if ($subject->class && $subject->class->students->count() > 0)
    <h4>Students in {{ $subject->class->class_name }}:</h4>
    <ul>
        @foreach ($subject->class->students as $student)
            <li> Name :{{ $student->name }}  Admission No:   {{$student->admission_number}}  Student Email : {{ $student->email }}</li>
        @endforeach
    </ul>
@else
    <p>No students in this class.</p>
@endif
</div>
@endif

</div>

</body>
</html>
