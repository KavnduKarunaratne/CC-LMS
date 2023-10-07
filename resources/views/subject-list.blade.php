<x-admin-layout>
<div class="p-8 w-full dark:bg-black">
    <div class="flex items-center mb-6 ">
        <a href="{{ url('add-class') }}"   class="bg-indigo-600 hover:bg-indigo-800 text-white text-xl font-bold py-2 px-4 rounded-full ml-4 mt-1">Add Class</a>
        <a href="{{ url('add-subject') }}" class="bg-indigo-600 hover:bg-indigo-800 text-white text-xl font-bold py-2 px-4 rounded-full ml-4 mt-1">Add New Subject</a>
        <a href="{{ url('add-teacher') }}" class="bg-indigo-600 hover:bg-indigo-800 text-white text-xl font-bold py-2 px-4 rounded-full ml-4 mt-1">Enroll Teacher</a>
        <a href="{{ url('add-student') }}" class="bg-indigo-600 hover:bg-indigo-800 text-white text-xl font-bold py-2 px-4 rounded-full ml-4 mt-1">Enroll Student</a>
                      
    </div>

    <div class="shadow overflow-hidden border-b border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-l font-medium text-gray-500 uppercase tracking-wider">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-l font-medium text-gray-500 uppercase tracking-wider">
                    Subject Name
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-l font-medium text-gray-500 uppercase tracking-wider">
                    Grade
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-l font-medium text-gray-500 uppercase tracking-wider">
                    Class
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-l font-medium text-gray-500 uppercase tracking-wider">
                    Teacher
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-l font-medium text-gray-500 uppercase tracking-wider">
                    Edit
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-l font-medium text-gray-500 uppercase tracking-wider">
                    Delete
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($subject as $subject)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap bg-white">{{ $subject->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap bg-white">{{ $subject->subject_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap bg-white">{{ $subject->grade->grade }}</td>
                    <td class="px-6 py-4 whitespace-nowrap bg-white">{{ $subject->class->class_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap bg-white">{{ $subject->teacher->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap bg-white">
                        <a href="{{ url('edit-subject/'.$subject->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap bg-white">
                        <a href="{{ url('delete-subject/'.$subject->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-10 dark:bg-black">
        <a href="{{ url('dashboard') }}" class="bg-indigo-600 hover:bg-indigo-800 text-white text-xl font-bold py-2 px-4 rounded-full mt-10">Back To Dashboard</a>
    </div>
</div>
</x-admin-layout>