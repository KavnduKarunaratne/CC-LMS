<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>My Grades</title>
</head>
<body class="bg-white">

<div class="container mx-auto p-4">
    <h2 class="text-lg font-semibold">My Grades</h2>
    <p>User: {{ auth()->user()->name }}</p>

    @if (count($submissionsBySubject) > 0)
        @foreach ($submissionsBySubject as $subjectName => $submissions)
            <h3 class="text-md font-bold mt-4">{{ $subjectName }}</h3>
            <ul>
                @foreach ($submissions as $submission)
                    <div class="bg-white p-4 rounded-md shadow-md mb-4">
                        <li>
                            <strong>Assignment Name:</strong> {{ $submission->assignment->assignment_name }}
                            <br>
                            <strong>Description:</strong> {{ $submission->assignment->description }}
                            <br>
                            @if ($submission->file)
                                <strong>File:</strong> <a href="{{ asset('storage/app/submissions/' . $submission->file) }}" download>{{ $submission->file }}</a>
                                <br>
                            @endif
                            <strong>Submit Date:</strong> {{ $submission->submit_date }}
                            <br>
                            <strong>Feedback:</strong>
                            @foreach ($submission->feedback as $feedback)
                                <p>Feedback: {{ $feedback->feedback }}</p>
                                <p>Marks: {{ $feedback->marks }}</p>
                            @endforeach
                        </li>
                    </div>
                @endforeach
            </ul>
        @endforeach
    @else
        <p>No submissions and feedback available.</p>
    @endif
</div>

</body>
</html>
