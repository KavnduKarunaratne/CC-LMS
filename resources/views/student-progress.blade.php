<!DOCTYPE html>
<html>
<head>
    <title>Student Progress - {{ $subject->subject_name }}</title>
</head>
<body>


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
                $totalMarks = 0;
                $totalStudents = $students->count();
            @endphp

            @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->admission_number}}</td>
                <td>
                    @php
                        $marks = $student->submissions 
                            ->where('assignment.subject_id', $subject->id)
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

    <h2>Class Average: {{ $totalMarks / $totalStudents }} / 100</h2>

    <h2>Top Scoring Students</h2>
    <table>
        <thead>
            <tr>
                <th>Student</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody>
            
            @php
                $topScoringStudents = $students->sortByDesc(function ($student) use ($subject) {
                    return $student->submissions
                        ->where('assignment.subject_id', $subject->id)
                        ->flatMap(function ($submission) {
                            return $submission->feedback->pluck('marks');
                        })
                        ->sum();
                });
            @endphp
            @foreach($topScoringStudents as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>
                    @php
                        $marks = $student->submissions
                            ->where('assignment.subject_id', $subject->id)
                            ->flatMap(function ($submission) {
                                return $submission->feedback->pluck('marks');
                            })
                            ->sum();
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
    <h2>Least Scoring Students</h2>
    <table>
        <thead>
            <tr>
                <th>Student</th>
                <th>Marks</th>
            </tr>
        </thead>
        <tbody>
            @php
                $leastScoringStudents = $students->sortBy(function ($student) use ($subject) {
                    return $student->submissions
                        ->where('assignment.subject_id', $subject->id)
                        ->flatMap(function ($submission) {           
                            return $submission->feedback->pluck('marks');
                        })
                        ->sum();
                });
            @endphp
   
            @foreach($leastScoringStudents as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>
                    @php
                        $marks = $student->submissions
                            ->where('assignment.subject_id', $subject->id)
                            ->flatMap(function ($submission) {
                                return $submission->feedback->pluck('marks');
                            })
                            ->sum();
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
</body>
</html>
 <!-- the marks are calculated and the  students are arranged(sorted) in the descending order of marks-->
<!-- the flatmap function extracts the marks from the feedback-->
  <!-- the marks are calculated and the  students are arranged(sorted) in the ascending order of marks-->
<!--use the subject id to find the related assignments and submission and the feedback for those submissions-->
<!--the flatmap function extracts the marks from the feedback-->