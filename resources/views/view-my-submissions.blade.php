<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>My Submissions and Feedback</title>
</head>
<body class="bg-white">

<div class="container mx-auto p-4">
    <h2 class="text-lg font-semibold">My Submissions and Feedback</h2>

    @if ($submissions->count() > 0)
        <ul>
            @foreach ($submissions as $submission)
                <li>
                    <strong>Assignment Name:</strong> {{ $submission->assignment->assignment_name }}
                    <br>
                    <strong>Description:</strong> {{ $submission->assignment->description }}
                    <br>
                    @if ($submission->file)
                        <strong>File:</strong> <a href="{{ asset('storage/app/submissions' . $submission->file) }}" download>{{ $submission->file }}</a>
                        <br>
                    @endif
                    <strong>Submit Date:</strong> {{ $submission->submit_date }}
                    <br>
                    <strong>Feedback:</strong>
                    @foreach ($submission->feedback as $feedback)
                        <p>{{ $feedback->feedback }}</p>
                        <p>{{ $feedback->marks}}</p>
                    @endforeach
                </li>
                <hr>
            @endforeach
        </ul>
    @else
        <p>No submissions and feedback available.</p>
    @endif
</div>


</body>
</html>
