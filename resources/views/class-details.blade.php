<x-admin-layout>
    <div class="bg-white ml-4  p-4 rounded-md shadow-md">
        <p class="text-lg text-gray-500 mb-4">Class  {{ $class->class_name }}   </p>
     
        <div >
</div class="flex flex-row flex-wrap m-5">

        <a href="{{ url('edit-class/'.$class->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
        <a href="{{ url('delete-class/'.$class->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>
    </div>
    
    <div class="m-4">
        <h2 class="text-black text-lg font-semibold">Student details</h2>
        <!--<ul class="text-black">
            @foreach ($students as $student)
                <li>
                    {{ $student->name }} (Admission: {{ $student->admission_number }})
                    <a href="{{ url('edit-student/'.$student->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
                </li>
            @endforeach
        </ul>-->
    </div>
  

<div class=" m-10 overflow-x-auto border-x border-t">
   <table class="table-auto w-full bg-white">
      <thead class="border-b">
         <tr class="bg-gray-100">
            <th class="text-left p-4 font-medium">
               Name
            </th>
            <th class="text-left p-4 font-medium">
               SU Number
            </th>
            <th class="text-left p-4 font-medium">
               Email
            </th>
            <th class="text-left p-4 font-medium">
              Actions
            </th>
           
         </tr>
      </thead>
      <tbody>
      @foreach ($students as $student)
         <tr class="border-b hover:bg-gray-50">
            <td class="p-4">
            {{ $student->name }}
            </td>
            <td class="p-4">
            {{ $student->admission_number }}
            </td>
            <td class="p-4">
            {{ $student->email }}
            </td>
            <td class="p-4">
            <a href="{{ url('edit-student/'.$student->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>

            </td>
         </tr>
        @endforeach
      </tbody>
   </table>

</div>
    <div class="m-4">
        <h2 class="text-black text-lg font-semibold">Subject details</h2>
    </div>

    
<div class=" m-10 overflow-x-auto border-x border-t">
   <table class="table-auto w-full bg-white">
      <thead class="border-b">
         <tr class="bg-gray-100">
            <th class="text-left p-4 font-medium">
               Subject
            </th>
            <th class="text-left p-4 font-medium">
            Teacher in charge
            </th>
            <th class="text-left p-4 font-medium">
               Email
            </th>
            <th class="text-left p-4 font-medium">
               Actions
            </th>
         </tr>
      </thead>
      <tbody>
      @foreach ($subjects as $subject)
         <tr class="border-b hover:bg-gray-50">
            <td class="p-4">
            {{ $subject->subject_name }}
            </td>
            <td class="p-4">
            @if ($subject->teacher)
                         Teacher: {{ $subject->teacher->name }}
                    @else
                         No Teacher Assigned
                    @endif
            </td>
            <td class="p-4">
            @if ($subject->teacher)
                         Teacher: {{ $subject->teacher->email }}
                    @else
                         No Teacher Assigned
                    @endif
            </td>
            <td class="p-4">
            <a href="{{ url('edit-subject/'.$subject->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded my-3 mt-1">Edit</a>
           <!--         <a href="{{ url('delete-subject/'.$subject->id) }}" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded my-3 mt-1">Delete</a>-->
       
            </td>
         </tr>
        @endforeach
      </tbody>
   </table>

</div>
</x-admin-layout>