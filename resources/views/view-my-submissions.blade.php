<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <title >My Grades</title>
</head>
<body class="bg-white">


@include('components.studentnav-viewmygrades')



{{--<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semi-bold text-gray-900 mb-8">>My Grades</h2>
    <p>User: {{ auth()->user()->name }}</p><!--display the user name-->

    

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
                                <br><!--downlaod the file from storage-->
                            @endif
                            <strong>Submit Date:</strong> {{ $submission->submit_date }}
                            <br>
                            <strong>Feedback:</strong>
                            @if (count($submission->feedback) == 0)
                                <p>No feedback available.</p>
                                <!--if there is no feedback available, display this message-->
                            @else
                            @foreach ($submission->feedback as $feedback)
                                <p>Feedback: {{ $feedback->feedback }}</p>
                                <p>Marks: {{ $feedback->marks }}</p>
                            @endforeach
                            @endif
                        </li>
                    </div>
                @endforeach
            </ul>
        @endforeach
    @else
        <p>No feedback available.</p>
        <!--if there are no feedback available, display this message-->
    @endif
</div>--}}

</body>
</html>

