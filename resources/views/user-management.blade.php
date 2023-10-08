<x-admin-layout>
    <div class="pl-6 dark:bg-black ">
        <div class="flex items-center mb-6 dark:bg-black">
            <a href="{{ url('add-management') }}" class="bg-green-500 hover:bg-green-700 text-white text-xl font-bold py-2 px-4 rounded-full mt-1">Add New Management</a>
            <form action="{{ route('search-users') }}" method="GET" class="ml-4 flex">
                <input type="text" name="search" placeholder="Search users" class="border py-1 px-2 rounded-l-full text-xl">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 text-white text-xl font-bold rounded-r-full py-2 px-6 mr-2">Search</button>
            </form>


        </div>
        
        <div class="flex flex-row flex-wrap justify-end mb-3">
            <form action="{{ route('users.filter') }}" method="GET">

            <!-- Grade filter -->
        <select name="grade_id"  class="bg-white py-2 px-2 m-2  border-black border-2" >
            <option value="">All Grades</option>
            @foreach ($grades as $grade)
                <option value="{{ $grade->id }}">{{ $grade->grade }}</option>
            @endforeach
        </select>


        <!-- Class filter filter -->
        <select name="class_id" class="bg-white  py-2 px-2 m-2  border-black border-2" >
            <option value="">All Classes</option>
            @foreach ($classes as $class)
                <option value="{{ $class->id }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $class-> class_name}}</option>
            @endforeach
        </select>

        

        <input type="text" name="year_of_registration" placeholder="Year of Registration" class="bg-white py-2 px-2 m-2 border-black border-2">

        <select name="role_id" class="bg-white py-2 px-2 m-2 border-black border-2">
        <option value="">All Roles</option>
        <option value="3">Student</option>
        <option value="4">Teacher</option>
        <option value="2">Management</option>
        <option value="1">Admin</option>
        </select>

        <select name="status" class="bg-white py-2 px-2 m-2 border-black border-2">
    <option value="">All Status</option>
    <option value="active">Active</option>
    <option value="archived">Archived</option>
</select>
        <button type="submit"  class="bg-white text-black hover:text-white hover:bg-black py-2 px-2 m-2 border-black border-2" >Filter</button>
    </form>
</div>
        <!-- Display Active Users -->
        <div class="shadow overflow-hidden border-b border-gray-200 ">
            <table class="w-screen divide-y divide-gray-200">
                <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Admission Number
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Year of Registration
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 ">
                @if ($user->count() == 0)
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No users found.</td>
                    </tr>
                @else
                    @foreach ($user as $user)
                        @if ($user->role_id == 2 || $user->role_id == 3 || $user->role_id == 4)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->admission_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->year_of_registration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_archived ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $user->is_archived ? 'Inactive' : 'Active' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <a href="{{ url('edit-user/'.$user->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ url('archive-user/'.$user->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-red-600 hover:underline">Archive</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <!-- Display Archived Users -->
        <h2 class="mt-8 mb-4 text-xl font-semibold dark:bg-black dark:text-white">Archived Users</h2>
        <div class="shadow overflow-hidden border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Admission Number
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Year of Registration
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date of Archive
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 ">
                @foreach ($archivedUsers as $user)
                    @if ($user->role_id == 2 || $user->role_id == 3 || $user->role_id == 4)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->admission_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->year_of_registration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_archived ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $user->is_archived ? 'Inactive' : 'Active' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                        {{ $user->archived_at ? \Carbon\Carbon::parse($user->archived_at)->format('Y-m-d H:i:s') : '' }}
                    </td>                            
                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                <form action="{{ url('unarchive-user/'.$user->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-green-600 hover:underline">Unarchive</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
      <!--  <div class="mt-4 dark:bg-black mb-6">
            <a href="{{ url('dashboard') }}" class="bg-indigo-600 hover:bg-indigo-800 text-white text-xl font-bold py-1 px-3  rounded-full mt-10">Back To Dashboard</a>
        </div>-->
    </div>
</x-admin-layout>