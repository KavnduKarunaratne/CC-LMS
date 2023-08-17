<!DOCTYPE html>

<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>QUIZES</title>
</head>

<body class="bg-black">

    <div class="container flex justify-center mx-auto mt-10">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">

                    <table class="table-auto mt-4">
                        <thead class="bg-black divide-y divide-gray-300">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    ID
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Title
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Description
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Deadline
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Class
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Grade
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Teacher
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Edit
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-black divide-y divide-gray-300">
                            @foreach($quizzes as $quiz)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-white">{{ $quiz->id }}</td>
                                    <td class="px-6 py-4 text-sm text-white">{{ $quiz->title }}</td>
                                    <td class="px-6 py-4 text-sm text-white">{{ $quiz->description }}</td>
                                    <td class="px-6 py-4 text-sm text-white">{{ $quiz->deadline }}</td>
                                    <td class="px-6 py-4 text-sm text-white">{{ $quiz->quizClass->class_name}}</td>
        <td class="px-6 py-4 text-sm text-white">{{ $quiz->quizGrade->grade }}</td>
        <td class="px-6 py-4 text-sm text-white">{{ $quiz->quizTeacher->name }}</td>
        <td class="px-6 py-4 text-sm text-white">
                                   
                                    <td class="px-6 py-4 text-sm text-white">
                                        <a href="{{ url('edit-quiz/'.$quiz->id) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-white">
                                        <a href="{{ url('delete-quiz/'.$quiz->id) }}" class="bg-green-500 hover:bg-green-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
                                    </td>
                                    <td><a href="{{ url('quiz-details/'.$quiz->id) }}" class="text-white">quiz details</a></td>
                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="flex-wrap">
                <a href="{{ url('teacher-panel') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 px-3 rounded my-3 mt-1">Back To Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
