<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
</head>
<body>
    <h2>Submissions for Assignment: {{ $assignment->assignment_name }}</h2>
    @if ($submissions->count() > 0)
        <ul>
            @foreach ($submissions as $submission)
                <li>
                    <strong>Submission Name:</strong> {{ $submission->name }}
                    <br>
                    <strong>Submission Description:</strong> {{ $submission->description }}
                    <br>
                    @if ($submission->file)
                    <strong>File:</strong> <a href="{{ asset('storage/' . $submission->file) }}" download>{{ $submission->file }}</a>
                    <br>
                    @endif
                    <strong>Student name</strong> {{ $submission->student->name }}
                    <strong>Student admission</strong> {{ $submission->student->admission_number }}

                    <br>
                    <strong>Submission Upload Date:</strong> {{ $submission->upload_date }}

                    <br>
                    <h3>Feedback for Submission:</h3>
                    <ul>
                        @foreach ($submission->feedback as $feedback)
                            <li>
                                <strong>Feedback:</strong> {{ $feedback->feedback }}
                                <br>
                                <strong>Marks:</strong> {{ $feedback->marks }}
                                <br>
                                <strong>Date:</strong> {{ $feedback->date }}
                            </li>
                            <a href="{{ url('edit-feedback', $feedback->id) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                                    <a href="{{ url('delete-feedback', $feedback->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
                        @endforeach
                    </ul>
                   
            
              @if (Auth::user() && Auth::user()->role_id == 4)
                <a href="{{ url('add-feedback', ['submission_id' => $submission->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Provide  feedback</a>
                @endif

               
                  
               

                    <!-- Display other submission details -->
                </li>
            @endforeach
        </ul>
    @else
        <p>No submissions available for this assignment.</p>
    @endif
    <!-- Add other page content or links as needed -->
</body>
</html>
