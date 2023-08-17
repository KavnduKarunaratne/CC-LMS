<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Details</title>
</head>
<body class="bg-black">
    <div class="container mx-auto mt-10">
        <div class="flex flex-col text-white">
            @if(isset($quiz))
                <h2 class="text-xl font-semibold mb-4">{{ $quiz->title }}</h2>
                <p>Description: {{ $quiz->description }}</p>
                <p>Deadline: {{ $quiz->deadline }}</p>
                <p>Class: {{ $quiz->quizClass->class_name }}</p>
                <p>Grade: {{ $quiz->quizGrade->grade }}</p>
                <p>Created By: {{ $quiz->quizTeacher->name }}</p>
                <p>Uploaded on: {{ $quiz->upload_date }}</p>
                <!-- Add more details here as needed -->
            @else
                <p>No quiz details available.</p>
            @endif
            <br>
            <div>
            <a href="{{ url('add-question/'.$quiz->id) }}">Add a question</a>

             
</div>

            <a href="{{ url('quiz-list') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 px-3 rounded my-3 mt-1">Back to Quiz List</a>

        </div>
    </div>
</body>
</html>
