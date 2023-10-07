
<!--Subject Details-->
<div class= "mb-11  dark:bg-black">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-3 dark:text-white">Subject Details</h2>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
        @if (Auth::user() && Auth::user()->role_id == 4)
        <div class=" " x-data="{ open: false }">
                    <button class="bg-indigo-600 text-white p-4" x-on:click="open = ! open" >View students</button>
                    <div x-show="open" x-transition>
                    <div class="bg-white text-black m-6  w-1/4 p-4 rounded-2xl fixed ">
                   
            @if ($subject->class && $subject->grade && $subject->class->students->count() > 0)
               <!-- <h4>Students in Grade: {{ $subject->grade->grade }} Class {{ $subject->class->class_name }}:</h4>-->
              
               <ul>
                    @foreach ($subject->class->students as $student)
                        @if ($student->is_archived == 0 && $student->class_id == $subject->class_id)
                            <li>{{ $student->name }} {{ $student->admission_number }}</li>
                        @endif
                    @endforeach
                </ul>
                @else
                <p>No students in this class.</p>
               @endif
                 @endif
</div>
                </div>
                         </div>
            <div class="bg-white rounded-lg border-solid border-2 border-gray-900 p-8">
            

                <h3 class="text-lg font-semi-bold text-gray-900 mt-2 mb-1">Subject: {{ $subject->subject_name }} </h3>
                <h3 class="text-lg font-semi-bold text-gray-900 mt-1 mb-2">Teacher in Charge: {{ $subject ->teacher->name}} </h3>

                @if (Auth::user() && Auth::user()->role_id == 4)

                <a href="{{ route('student-progress', ['subject_id' => $subject->id]) }}"><h3 class="text-lg font-bold text-indigo-700 mt-3 hover:text-indigo-400">View Student Progress</h3></a>
                <a href="{{ route('subject.flashcards', ['subject_id' => $subject->id]) }}"><h3 class="text-lg font-bold text-indigo-700 hover:text-indigo-400 mt-2 mb-3">View Flashcards</h3></a>

                <div class="flex space-x-4 place-content-start">
                    <a href="{{ url('add-material', ['subject_id' => $subject->id]) }}"><button class="bg-green-400 text-white py-2.5 px-4 rounded-full font-bold hover:bg-gray-800">Materials</button></a>
                    <a href="{{ url('add-assignment',['subject_id' => $subject->id]) }}"><button class="bg-green-400 text-white py-2.5 px-4 rounded-full font-bold hover:bg-gray-800">Assigments</button></a>
                    
                </div>
             
                @endif
                @if (Auth::user() && Auth::user()->role_id == 3)
                <div class=" mt-6 ">
            <a href="{{ route('subject.flashcards', ['subject_id' => $subject->id]) }}"  class="bg-indigo-600 p-4 hover:bg-indigo-400 text-white text-center w-[300px]  font-semibold rounded my-3 py-3 mt-1">Flashcards</a>
        </div>
        @endif

            </div>

        </div>


    </div>

</div>




<!--Materials-->
<div class="dark:bg-black">
    <div class="container mx-auto px-4">
    @if ($materials->count() > 0)
        <h2 class="text-2xl font-bold text-gray-900 mb-3 dark:text-white">Materials</h2>

        @foreach ($materials as $material)
        @php
        $isAccessible = in_array(Auth::user()->id, $material->users->pluck('id')->toArray());
        @endphp
        @if ($isAccessible || $material->users->isEmpty() || Auth::user()->role_id == 4)
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8 pt-3">
        <div class="bg-white rounded-lg border-solid border-2 border-gray-900 p-8">
        <h3 class="text-lg font-semi-bold text-gray-900 mt-3">Topic: {{ $material->material_name }} </h3>
                <h3 class="text-lg font-semi-bold text-gray-900 mt-2"> {{ $material->description }} </h3>
                @if ($material->file)
                <a href="{{ asset('storage/' . $material->file) }}" download><h3 class="text-lg font-semi-bold text-gray-900 mt-2">resources : DOWNLOAD HERE </h3></a>
                @endif 

                @if($material->link)
               <a href="{{ $material->link }}" target="_blank"><h3 class="text-lg font-semi-bold text-blue-700 underline mt-2 overflow-hidden">Link: {{ $material->link }} </h3></a>
             @endif
               <h3 class="text-lg font-semi-bold text-gray-900 mt-2 mb-4">Upload Date: {{ $material->upload_date }} </h3>

                @if (Auth::user() && Auth::user()->role_id == 4)

                <div class="flex space-x-4 place-content-start">
                    <a href="{{ route('edit-material', $material->id) }}"><button class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Edit</button></a>
                    <a href="#" class="" data-bs-toggle="modal" data-bs-target="#deleteMaterialModal{{ $material->id }}">
    <button class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Delete</button>
</a>                    
                </div>

                <!--Delete Confirmation-->
                <div class="modal fade" id="deleteMaterialModal{{ $material->id }}" tabindex="-1" aria-labelledby="deleteMaterialModalLabel" aria-hidden="true">                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this Material?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary  bg-black hover:bg-black" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('delete-material', ['id' => $material->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger bg-red-700 hover:bg-red-700">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                @endif


        </div>
        </div>
        @endif
        @endforeach
    @endif  
        

    </div>

</div>


<!--Assignments-->
<div class="mb-11 dark:bg-black">
    <div class="container mx-auto px-4">
    @if ($assignments->count() > 0)
    <h2 class="text-2xl font-bold text-gray-900 mb-3 dark:text-white">Assignments</h2>
    @foreach ($assignments as $assignment)
    <div class="grid grid-cols-1 md:grid-cols-1 gap-8 pt-3">
        <div class="bg-white rounded-lg border-solid border-2 border-gray-900 p-8">
            <h3 class="text-lg font-semi-bold text-gray-900 mt-3">Assignment name:  {{ $assignment->assignment_name }}</h3>
            <h3 class="text-lg font-semi-bold text-gray-900 mt-2">Description:  {{ $assignment->description }}</h3>
            @if ($assignment->file)
                <a href="{{ asset('storage/' . $assignment->file) }}" download><h3 class="text-lg font-semi-bold text-gray-900 mt-2">File: DOWNLOAD HERE</h3></a>
            @endif 
            <h3 class="text-lg font-semi-bold text-gray-900 mt-2">Due Date: {{ $assignment->due_date }} </h3>
            <h3 class="text-lg font-semi-bold text-gray-900 mt-2 mb-4">Upload Date: {{ $assignment->upload_date }} </h3>
            @if (Auth::user() && Auth::user()->role_id == 4)
                <div class="flex space-x-4 place-content-start">
                    <a href="{{ url('edit-assignment', $assignment->id) }}"><button class="bg-gray-900 text-white py-2 px-3 rounded-full font-bold hover:bg-gray-800">Edit</button>
                    <a href="#" class="" data-bs-toggle="modal" data-bs-target="#deleteAssignmentModal{{ $assignment->id }}">
    <button class="bg-gray-900 text-white py-2 px-3 rounded-full font-bold hover:bg-gray-800">Delete</button>
</a>
                    <!--delete confirmation-->
                    <div class="modal fade" id="deleteAssignmentModal{{ $assignment->id }}" tabindex="-1" aria-labelledby="deleteAssignmentModalLabel" aria-hidden="true">                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                 Are you sure you want to delete this assignment?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary  bg-black  hover:bg-black " data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('delete-assignment', ['id' => $assignment->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger bg-red-700 hover:bg-red-700">Delete</button>
                                 </form>
                            </div>
                        </div>
                    </div>

                    </div>
                    <!--delete confirmation over-->
                    <a href="{{ route('view-submissions', ['assignment_id' => $assignment->id]) }}"><button class="bg-gray-900 text-white py-2 px-3 rounded-full font-bold hover:bg-gray-800">View</button></a>
                </div>
            @endif
        </div>
        @if (Auth::user() && Auth::user()->role_id == 3)
                                    @php
                                        $hasSubmitted = Auth::user()->submissions->contains('assignment_id', $assignment->id);
                                    @endphp
                                    @if ($hasSubmitted)
                                        <div class="border border-green-500 text-green-700 bg-green-400">
                                            <p>You have  submitted for this assignment.</p>
                                        </div>
                                    @elseif (strtotime($assignment->due_date) > time())<!--checks if the due date is passed. if so the link is hidden-->
                                        <a href="{{ url('add-submission', ['assignment_id' => $assignment->id]) }}" class="bg-indigo-600 hover:bg-indigo-400 text-white text-center w-[300px] rounded my-3 py-3 mt-1">Add Submission for Assignment</a>
                                    @endif
    @endif
        @endforeach
    @else 
    <p>No assignments available for this subject.</p>
    @endif

    </div>
    

    </div>
    
   
</div>
<div class="bg-white dark:bg-black m-4  p-4 rounded-md shadow-md mb-4">
        @if (Auth::user() && Auth::user()->role_id == 4)
            @if ($subject->class && $subject->grade && $subject->class->students->count() > 0)
                <h4>Students in Grade: {{ $subject->grade->grade }} Class {{ $subject->class->class_name }}:</h4>
                <ul>
                    @foreach ($subject->class->students as $student)
                        @if ($student->is_archived == 0 && $student->class_id == $subject->class_id)
                            <li>{{ $student->name }} {{ $student->admission_number }}</li>
                        @endif
                    @endforeach
                </ul>
            @else
                <p>No students in this class.</p>
            @endif
        @endif
</div>

</div>



