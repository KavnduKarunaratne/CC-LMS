
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Panel</title>
</head>

<body class="bg-white">





@if(Auth::check() && Auth::user()->role_id == 3)
    <div>
        <h2>Welcome to the Student Panel</h2>
        <p>Your role ID: {{ Auth::user()->role_id }}</p>
        
        @if(Auth::user()->grade)
            <h3>Your Grades:</h3>
            <ul>
                <li>{{ Auth::user()->grade->grade }}</li>
            </ul>
        @else
            <p>No grades assigned.</p>
        @endif
        
        @if(Auth::user()->class)
            <h3>Your Classes:</h3>
            <ul>
                <li>{{ Auth::user()->class->class_name }}</li>
            </ul>
        @else
            <p>No classes assigned.</p>
        @endif
    </div>
@else
    <p>You do not have access to this page.</p>
@endif
<!-- ... (other code) -->

@if(Auth::check() && Auth::user()->role_id == 3)
    <div>
      
        
        @if(Auth::user()->grade && Auth::user()->class)
            <h3>Subjects for Your Class and Grade:</h3>
            <ul>
                @foreach (Auth::user()->class->subjects as $subject)
                <!-- <li>{{ $subject->subject_name }}</li>-->

                <a href="{{ route('subject.detail', ['subject_id' => $subject->id]) }}">
            {{ $subject->subject_name }}
        </a>
                @endforeach
            </ul>
        @endif
    </div>
@else
    <p>You do not have access to this page.</p>
@endif



</body>
</html>