<x-admin-layout>
<div class="p-8 w-full dark:bg-black">

    <div class="flex flex-row flex-wrap justify-end mb-3">
            <form action="{{ route('subjects.filter') }}" method="GET">
        <!-- Class filter filter -->
        <select name="class_id" class="bg-white  py-2 px-2 m-2  border-black border-2" >
            <option value="">All Classes</option>
            @foreach ($classes as $class)
                <option value="{{ $class->id }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $class-> class_name}}</option>
            @endforeach
        </select>

        <!-- Grade filter -->
        <select name="grade_id"  class="bg-white py-2 px-2 m-2  border-black border-2" >
            <option value="">All Grades</option>
            @foreach ($grades as $grade)
                <option value="{{ $grade->id }}">{{ $grade->grade }}</option>
            @endforeach
        </select>

        <select name="teacher_id" class="bg-white py-2 px-2 m-2 border-black border-2">
        <option value="">All Teachers</option>
        @foreach ($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
        @endforeach
    </select>


      
       
        <button type="submit"  class="bg-white text-black hover:text-white hover:bg-black py-2 px-2 m-2 border-black border-2" >Filter</button>
    </form>
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
            @foreach($filteredSubjects as $subject)
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
    <!--
    <div class="mt-10 dark:bg-black">
        <a href="{{ url('dashboard') }}" class="bg-indigo-600 hover:bg-indigo-800 text-white text-xl font-bold py-2 px-4 rounded-full mt-10">Back To Dashboard</a>
    </div>-->
</div>
</x-admin-layout>