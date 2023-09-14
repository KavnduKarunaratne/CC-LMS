<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Submissions</title>
    @include('components.teacheravatardisplay')
</head>
<body>
        <div class="m-10">
            <form action="{{ route('search-submissions', $assignment->id) }}" method="GET">
                <input type="text" name="search" placeholder="Search submissions">
                <button type="submit" class="bg-green-400 hover:bg-green-300 text-white py-1 px-3 rounded">Search</button>
            </form>
        </div>

        <div class="container mx-auto p-4">
             <h2 class="text-2xl font-semibold mb-4">Submissions for Assignment: {{ $assignment->assignment_name }}</h2>
            @if ($submissions->count() > 0)
            <div class="bg-white p-4 rounded-md shadow-md">
                <ul>
                    @foreach ($submissions as $submission)<!--get the submissions for each assignment-->
                        <li class="mb-4">
                            <div class="bg-gray-100 p-4 rounded-md shadow-md">
                                <strong>Submission Name:</strong> {{ $submission->name }}
                                <br>
                                <strong>Submission Description:</strong> {{ $submission->description }}
                                <br>
                                @if ($submission->file)
                                    <strong>File:</strong> <a href="{{ asset('storage/' . $submission->file) }}" download>download</a><!--download the file-->
                                    <br>
                                @endif
                                <strong>Student Name:</strong> {{ $submission->student->name }}
                                <br>
                                <strong>Student Admission:</strong> {{ $submission->student->admission_number }}<!--get the admission number of the student through the relationship between the student and submission-->
                                <br>
                                <strong>Submission Upload Date:</strong> {{ $submission->submit_date}}
                            </div><!--this is the pop up for deletion confirmation-->
                            <a href="#" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $submission->id }}">Delete</a>
                            <div class="modal fade" id="deleteModal{{ $submission->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          Are you sure you want to delete this Submission?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary  bg-black hover:bg-black" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('delete-submission', ['id' => $submission->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger bg-red-700 hover:bg-red-700">Delete</button>
                                           </form>
                                        </div>
                                    </div>
                                </div>
                            </div>     

                            <div class="bg-gray-200 p-4 mt-4 rounded-md shadow-md">
                                <h3 class="text-lg font-semibold mb-2">Feedback for Submission:</h3>
                                <ul><!--get the feedback and grades for each submission-->
                               
                                    @foreach ($submission->feedback as $feedback)
                                    
                                        <li class="mb-2">
                                         
                                            <strong>Feedback:</strong> {{ $feedback->feedback }}
                                            <br>
                                            <strong>Marks:</strong> {{ $feedback->marks }}
                                            <br>
                                            <strong>Date:</strong> {{ $feedback->date }}
                                            <br>
                                            <a href="{{ url('edit-feedback', $feedback->id) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-1">Edit</a>
                                            <a href="{{ url('delete-feedback', $feedback->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-1">Delete</a>
                                        </li>
                                   
                                    @endforeach
                                    @if ($submission->feedback->isEmpty())
        <li class="mb-2">
            <strong>Provide Feedback</strong>
           
        </li>
    @endif
                                    
                                </ul>
                            </div>

                            @if (Auth::user() && Auth::user()->role_id == 4)<!-- display this to authenticated users with role id 4 -->
                                <a href="{{ url('add-feedback', ['submission_id' => $submission->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3">Provide Feedback</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="font-semi-bold text-lg">No submissions available </p>
        @endif
    </div>
    <div>
    @if (Auth::user() && Auth::user()->role_id == 4)<!--display this for authenticated user with role id 4-->
            <div class="bg-white p-4 rounded-md shadow-md mb-4">
                @if ($subject->class && $subject->grade && $subject->class->students->count() > 0)
                    <h4>Students in Grade:  {{ $subject->grade->grade}}   class {{ $subject->class->class_name }}:</h4>
                    <ul class=>
                        @foreach ($subject->class ->students as $student) <!--display students enrolled in the specific class-->
                            @if ($student->is_archived == 0 && $student->class_id == $subject->class_id)
                            <li>
                                    {{ $student->name }}
                                    {{ $student->admission_number }}
                                    @if ($student->hasSubmission($assignment->id)) <!-- Check if the student has a submission for this assignment -->
                                        <span class="text-green-500">Submitted</span>
                                    @else
                                        <span class="text-red-500">Not Submitted</span>
                                    @endif
                                </li>
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
</html>

