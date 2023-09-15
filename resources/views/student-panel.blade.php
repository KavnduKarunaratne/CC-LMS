<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Panel</title>
</head>
<body class="bg-white">
@if (Auth::check() && Auth::user()->is_archived==0 && Auth::user()->role_id == 3)
    <!--checks if user is archived and the roleid is 3-->

    @include('components.studentsidenav2')
    {{--@include('kiddyLMS.kiddypanelnav3')--}}
    

@else
    <p>You do not have access to this page.</p>
    <a href="{{ route('logout') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Log Out</a>
@endif
</body>
</html>
