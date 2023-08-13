<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Panel</title>
</head>
<body class="bg-white">

@if (Auth::check() && Auth::user()->role_id == 3)
    <div class="container mx-auto p-4">
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h2 class="text-lg font-semibold">Welcome to the Student Panel</h2>
            <p>Your role ID: {{ Auth::user()->role_id }}</p>
        </div>

        @if (Auth::user()->grade)
            <div class="bg-white p-4 rounded-md shadow-md mb-4">
                <h3 class="text-lg font-semibold">My Grade:</h3>
                <ul>
                    <li>{{ Auth::user()->grade->grade }}</li>
                </ul>
            </div>
        @else
            <p>No grades assigned.</p>
        @endif

        @if (Auth::user()->class)
            <div class="bg-white p-4 rounded-md shadow-md mb-4">
                <h3 class="text-lg font-semibold">My Class:</h3>
                <ul>
                    <li>{{ Auth::user()->class->class_name }}</li>
                </ul>
            </div>
        @else
            <p>No classes assigned.</p>
        @endif

        @if (Auth::user()->grade && Auth::user()->class)
            <div class="bg-white p-4 rounded-md shadow-md">
                <h3 class="text-lg font-semibold">Subjects for Your Class and Grade:</h3>
                <ul>
                    @foreach (Auth::user()->class->subjects as $subject)
                        <li>
                            <a href="{{ route('subject.detail', ['subject_id' => $subject->id]) }}">
                                {{ $subject->subject_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@else
    <p>You do not have access to this page.</p>
@endif
<div class="bg-white p-4 rounded-md shadow-md">
                <h3 class="text-lg font-semibold">Notices for Your Grade:</h3>
                <ul>
                    @foreach (Auth::user()->grade->notices as $notice)
                        <li>
                            Notice: {{ $notice->notice }}
                            | Date: {{ $notice->date_of_notice }}
                        </li>
                    @endforeach
                </ul>
            </div>

</body>
</html>
