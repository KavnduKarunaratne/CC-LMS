<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
<div class="container">
@foreach($assignments as $assignment)
    <h2>Student Progress for Assignment: {{ $assignment->assignment_name }}</h2>
    <table>
        <thead>
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
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->admission_number }}</td>
                    <td>
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

<h2>Class Average: {{ $totalMarks / $totalStudents }} / 100</h2>

<h2>Overall Top Scoring Students</h2>
 <!-- the marks are calculated and the  students are arranged(sorted) in the descending order of marks-->
<!-- the flatmap function extracts the marks from the feedback-->
   <table>
        <thead>
               <tr>
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
                <td>{{ $student->name }}</td>
                <td>
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

<h2>Overall Least Scoring Students</h2>
  <!-- the marks are calculated and the  students are arranged(sorted) in the ascending order of marks.
  the flatmap function extracts the marks from the feedback-->
    <table>
        <thead>
            <tr>
                 <th>Student</th>
                <th>Total Marks</th>
            </tr>
        </thead>
        <tbody>
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
                <td>{{ $student->name }}</td>
                <td>
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


