<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('components.teacheravatardisplay')
    <title>Student Progress - {{ $subject->subject_name }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            margin-top: 20px;
            

        }
    </style>
</head>
<body>
<div class="container dark:bg-black">
<div class="">
    <form action="{{ route('search-progress') }}" method="GET">
        <input class="py-2 px-4 mr-1 rounded-md" type="text" name="search" placeholder="Enter Assignment Name">
        <button type="submit" class="bg-indigo-400 hover:bg-indigo-300 text-white py-2 px-3 rounded">Search</button>
    </form>
</div>

<h2 class="font-bold text-lg mb-5 decoration-solid dark:decoration-indigo-200 decoration-indigo-600 dark:text-white">Class Average : {{ number_format($classAverage, 2) }}</h2>

<!-- Add this snippet where you want to display the searched assignment progress -->
@if (isset($Searchedassignment))
    <h2 class="font-bold text-xl mt-2 mb-0 dark:text-white">Student Progress for Assignment: {{ $Searchedassignment->assignment_name }}</h2>
    <table class="mb-5 mt-2">
        <thead class="text-indigo-600">
            <tr>
                <th>Student</th>
                <th>Admission Number</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalMarks = 0; // Set the initial value to 0
                $totalStudents = $students->count(); // Get the total number of students
            @endphp

            @foreach($students as $student)
                <tr>
                    <td class="dark:bg-white">{{ $student->name }}</td>
                    <td class="dark:bg-white">{{ $student->admission_number }}</td>
                    <td class="dark:bg-white">
                         @php
                            $submission = $student->submissions
                                ->where('assignment_id', $Searchedassignment->id)
                                ->first(); // Get the first submission for the searched assignment

                            if ($submission) {
                                $marks = $submission->feedback->pluck('marks')->sum();
                                $totalMarks += $marks;

                                if ($marks !== null) {
                                    echo $marks . ' / 100';
                                } else {
                                    echo 'Not Marked';
                                }
                            } else {
                                echo 'No submission';
                            }
                        @endphp
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
   @endif


@foreach($assignments as $assignment)
    <h2 class="font-bold text-xl mt-2 mb-0 dark:text-white">Student Progress for Assignment: {{ $assignment->assignment_name }}</h2>
    <table class="mb-5 mt-2">
        <thead class="text-indigo-600">
            <tr>
                <th >Student</th>
                <th>Admission Number</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalMarks = 0; // Set the initial value to 0
                $totalStudents = $students->count(); // Get the total number of students
            @endphp

            @foreach($students as $student)
                <tr>
                    <td class="dark:bg-white">{{ $student->name }}</td>
                    <td class="dark:bg-white">{{ $student->admission_number }}</td>
                    <td class="dark:bg-white">
                         @php
                            $submission = $student->submissions
                                ->where('assignment_id', $assignment->id)
                                ->first(); // Get the first submission for this assignment

                            if ($submission) {
                                $marks = $submission->feedback->pluck('marks')->sum();
                                $totalMarks += $marks;

                                if ($marks !== null) {
                                    echo $marks . ' / 100';
                                } else {
                                    echo 'Not Marked';
                                }
                            } else {
                                echo 'No submission';
                            }
                        @endphp
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endforeach


<h2 class="font-bold text-xl dark:text-white">Overall Top Scoring Students</h2>
 <!-- the marks are calculated and the  students are arranged(sorted) in the descending order of marks-->
<!-- the flatmap function extracts the marks from the feedback-->
<table class="mb-5">
            <thead>
                <tr class="text-indigo-600 mb-3 mt-4">
                    <th>Student</th>
                    <th>Total Marks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($top5Students as $student)
                    <tr>
                        <td class="dark:bg-white">{{ $student->name }}</td>
                        <td class="dark:bg-white">
                            @php
                                $totalMarks = $student->submissions
                                    ->where('assignment.subject_id', $subject->id)
                                    ->flatMap(function ($submission) {
                                        return $submission->feedback->pluck('marks');
                                    })
                                    ->sum();
                            @endphp
                            @if ($totalMarks !== 0)
                                {{ $totalMarks }} / {{ $assignments->count() * 100 }}
                            @else
                                Pending
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="text-xl font-bold mb-2 dark:text-white">Least Scoring 5 Students</h2>
        <table>
            <thead>
                <tr class="text-indigo-600 mt-4">
                    <th>Student</th>
                    <th>Total Marks</th>
                </tr>
            </thead>
            <tbody class="dark:bg-white">
                @foreach($least5Students as $student)
                    <tr>
                        <td class="dark:bg-white">{{ $student->name }}</td>
                        <td class="dark:bg-white">
                            @php
                                $totalMarks = $student->submissions
                                    ->where('assignment.subject_id', $subject->id)
                                    ->flatMap(function ($submission) {
                                        return $submission->feedback->pluck('marks');
                                    })
                                    ->sum();
                            @endphp
                            @if ($totalMarks !== 0)
                                {{ $totalMarks }} / {{ $assignments->count() * 100 }}
                            @else
                                Pending
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
</body>
</html>

