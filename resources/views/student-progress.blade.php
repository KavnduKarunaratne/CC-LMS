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
                            $marks = $student->submissions
                                ->where('assignment_id', $assignment->id) // Get submissions for this assignment
                                ->flatMap(function ($submission) {
                                    return $submission->feedback->pluck('marks');
                                })
                                ->sum();

                            $totalMarks += $marks;
                        @endphp

                        @if ($marks !== 0)
                            {{ $marks }} / 100
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endforeach

<h2 class="font-bold text-lg mb-5 underline decoration-solid dark:decoration-indigo-200 decoration-indigo-600 dark:text-white">Class Average: {{ $totalMarks / $totalStudents }} / 100</h2>

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
        @php
            $overallTopStudents = $students->sortByDesc(function ($student) use ($subject) {
                return $student->submissions
                    ->where('assignment.subject_id', $subject->id)
                    ->flatMap(function ($submission) {
                        return $submission->feedback->pluck('marks');
                    })
                    ->sum();
            });
        @endphp
         @foreach($overallTopStudents as $student)
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
                        N/A
                    @endif
                </td>
            </tr>
         @endforeach
        </tbody>
    </table>

<h2 class="text-xl font-bold mb-2 dark:text-white">Overall Least Scoring Students</h2>
  <!-- the marks are calculated and the  students are arranged(sorted) in the ascending order of marks.
  the flatmap function extracts the marks from the feedback-->
    <table>
        <thead>
            <tr class="text-indigo-600 mt-4">
                 <th>Student</th>
                <th>Total Marks</th>
            </tr>
        </thead>
        <tbody class="dark:bg-white">
        @php
            $overallLeastStudents = $students->sortBy(function ($student) use ($subject) {
                return $student->submissions
                    ->where('assignment.subject_id', $subject->id)
                    ->flatMap(function ($submission) {
                        return $submission->feedback->pluck('marks');
                    })
                    ->sum();
            });
        @endphp
        @foreach($overallLeastStudents as $student)
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
                        N/A
                    @endif
                </td>
            </tr>
         @endforeach
       </tbody>
    </table>
</div>
</body>
</html>

