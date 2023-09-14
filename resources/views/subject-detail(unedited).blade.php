<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Subject Detail</title>
</head>
<body class="bg-white">
    <!--ADD CONTENT HERE-->
    
    @include('components.teacheravatardisplay')
    
    

    <div class="container mx-auto p-4">
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h2 class="text-lg font-semibold">Subject Detail Panel</h2>
            <p class="text-lg font-semibold">{{ $subject->subject_name }}</p>
            <p class="text-m font-semibold">Teacher in charge : {{ $subject ->teacher->name}}</p>


            @if (Auth::user() && Auth::user()->role_id == 4)<!--this link is only visible for authinticated users with role id 4-->
                <p>
                    <a href="{{ route('student-progress', ['subject_id' => $subject->id]) }}">View Student Progress for this subject</a>
                    <br><br>
                    <a href="{{ url('add-material', ['subject_id' => $subject->id]) }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1"> Upload Materials</a>
                    <a href="{{ url('add-assignment',['subject_id' => $subject->id]) }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 mb-6 px-3 rounded my-3 mt-1"> Upload an Assignment</a>
                </p>
            @endif
        </div>



        <div class="border p-4 rounded-md shadow-md mb-4 font-semibold">
            <a href="{{ route('subject.flashcards', ['subject_id' => $subject->id]) }}">Flashcards</a>
        </div>







        <!-- Materials -->
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h3 class="text-lg font-semibold">Materials:</h3>
            @if ($materials->count() > 0)<!--display the subject materials and special learning materials-->
                <ul>
                    @foreach ($materials as $material)
                        <div class="border p-4 rounded-md shadow-md mb-4 font-semibold"><!--checks if the material is only accessible to specific students-->
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
                                        <strong>File:</strong> <a href="{{ asset('storage/' . $material->file) }}" download>download</a><!--download the file from storage-->
                                        <br>
                                    @endif
                                    <strong>Link:</strong> <a href="{{ $material->link }}" target="_blank">{{ $material->link }}</a>
                                    <br>
                                    <strong>Upload Date:</strong> {{ $material->upload_date }}
                                    <br>
                                    @if (Auth::user() && Auth::user()->role_id == 4)<!--display if the role id is 4-->
                                    {{--<a href="{{ route('edit-material', ['subject_id' => $material->subject->id, 'id' => $material->id]) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>--}}

                                        <a href="#" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $material->id }}">Delete</a>
                                   <!--this is a pop up for deletion confirmation-->
                                        <div class="modal fade" id="deleteModal{{ $material->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this Material?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary  bg-black hover:bg-black" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('delete-material', ['id' => $material->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger bg-red-700 hover:bg-red-700">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            @endif
                        </div>
                    @endforeach
                </ul>
            @else
                <p>No materials available for this subject.</p>
            @endif
            <hr>
        </div>



        <!-- Assignments -->
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h3 class="text-lg font-semibold">Assignments:</h3>
            @if ($assignments->count() > 0)
                <ul>
                    @foreach ($assignments as $assignment)
                        <div class="border p-4 rounded-md shadow-md mb-4 font-semibold">
                            <li>
                                <strong>Assignment Name:</strong> {{ $assignment->assignment_name }}
                                <br>
                                <strong>Description:</strong> {{ $assignment->description }}
                                <br>
                                @if ($assignment->file)
                                    <strong>File:</strong> <a href="{{ asset('storage/' . $assignment->file) }}" download>download</a><!--download the file from storage-->
                                    <br>
                                @endif
                                <strong>Due Date:</strong> {{ $assignment->due_date }}
                                <br>
                                <strong>Upload Date:</strong> {{ $assignment->upload_date }}
                                <br>
                                @if (Auth::user() && Auth::user()->role_id == 4)
                                    <a href="{{ url('edit-assignment', $assignment->id) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                                    <a href="#" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $assignment->id }}">Delete</a>
                                <!--this is a pop up for deletion confirmation-->
                                    <div class="modal fade" id="deleteModal{{ $assignment->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this assignment?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary  bg-black  hover:bg-black " data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('delete-assignment', ['id' => $assignment->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger bg-red-700 hover:bg-red-700">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif  <!--checks if the student has submitted to the assignment-->
                                @if (Auth::user() && Auth::user()->role_id == 3)
                                    @php
                                        $hasSubmitted = Auth::user()->submissions->contains('assignment_id', $assignment->id);
                                    @endphp
                                    @if ($hasSubmitted)
                                        <div class="border border-green-500 text-green-700 bg-green-400">
                                            <p>You have  submitted for this assignment.</p>
                                        </div>
                                    @elseif (strtotime($assignment->due_date) > time())<!--checks if the due date is passed. if so the link is hidden-->
                                        <a href="{{ url('add-submission', ['assignment_id' => $assignment->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Add Submission for Assignment</a>
                                    @endif
                                @endif
                                @if (Auth::user() && Auth::user()->role_id == 4)
                                    <td class="px-6 py-2 text-xs text-gray-500">
                                        <a href="{{ route('view-submissions', ['assignment_id' => $assignment->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">View Submissions</a>
                                    </td>
                                @endif
                            </li>
                        </div>
                    @endforeach
                </ul>
            @else
                <p>No assignments available for this subject.</p>
            @endif
        </div>

        @if (Auth::user() && Auth::user()->role_id == 4)<!--display this for authenticated user with role id 4-->
            <div class="bg-white p-4 rounded-md shadow-md mb-4">
                @if ($subject->class && $subject->grade && $subject->class->students->count() > 0)
                    <h4>Students in Grade:  {{ $subject->grade->grade}}   class {{ $subject->class->class_name }}:</h4>
                    <ul>
                        @foreach ($subject->class ->students as $student) <!--display students enrolled in the specific class-->
                            @if ($student->is_archived == 0 && $student->class_id == $subject->class_id)
                                <li>  {{ $student->name }}      {{ $student->admission_number }}  </li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <p>No students in this class.</p>
                @endif
            </div>
        @endif
    </div>
</body>
<style>
    #content {
  flex: 1; /* Allow the content to take up the remaining width */
  overflow-y: auto; /* Allow content to be scrollable if it overflows vertically */
  /* Add any other styling you need for the content on the right side */
}
</style>
</html>




