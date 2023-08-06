
<!DOCTYPE html>

<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>User Management</title>
</head>

<body class="bg-black">


<div class="container flex justify-center mx-auto mt-10">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-200 shadow">

            <table class="text-white">
                <thead>
                    <tr>
                        <th>Name </th>
                        <th>Email  </th>
                    
                        <th>Admission Number</th>
                        <th>Year of Registration</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        
                            <td>{{ $user->admission_number }}</td>
                            <td>{{ $user->year_of_registration }}</td>
                            <td class="px-6 py-4 text-sm text-white">
                                    <a href="{{ url('edit-user/'.$user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                                </td>
                                <td class="px-6 py-4 text-sm text-white">
                                    <a href="{{ url('delete-user/'.$user->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{url ('dashboard') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 px-3 rounded my-3 mt-1">Back To Dashboard</a>
        </div>
    </div>
</div>
