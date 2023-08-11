<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Teacher Panel</title>
</head>
<body>

<div class="container mx-auto p-4">
    @if(Auth::check() && Auth::user()->role_id == 4)
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h2 class="text-lg font-semibold">Teacher Panel</h2>
            <p>Your role ID: {{ Auth::user()->role_id }}</p>
        </div>

        @if($subjects->count() > 0)
            <div class="bg-white p-4 rounded-md shadow-md">
                <h3 class="text-lg font-semibold">Subjects You Are In Charge Of:</h3>
                <ul>
                    @foreach ($subjects as $subject)
                        <li>{{ $subject->subject_name }}</li>
                    @endforeach
                </ul>
            </div>
        @else
            <p>No subjects assigned.</p>
        @endif
    @else
        <div class="bg-white p-4 rounded-md shadow-md">
            <p>You do not have access to this page.</p>
        </div>
    @endif
</div>

</body>
</html>
