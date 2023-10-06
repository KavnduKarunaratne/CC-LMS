<!--SUBJECT DETAILS-->
<div class="bg-white mb-11 dark:bg-black">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-3 dark:text-white">Subject Details</h2>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
            <div class="bg-white rounded-lg border-solid border-2 border-gray-900 p-8">
                <div class="relative overflow-hidden">
                    {{--<img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">--}}
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                    </div>
                </div>
                <h3 class="text-lg font-semi-bold text-gray-900 mt-2 mb-1">Subject: {{ $subject->subject_name }} </h3>
                <h3 class="text-lg font-semi-bold text-gray-900 mt-1 mb-2">Teacher in Charge: {{ $subject ->teacher->name}} </h3>


                @if (Auth::user() && Auth::user()->role_id == 4)

                <a href="{{ route('student-progress', ['subject_id' => $subject->id]) }}"><h3 class="text-lg font-bold text-indigo-700 mt-3 hover:text-indigo-400">View Student Progress</h3></a>
                <a href="{{ route('subject.flashcards', ['subject_id' => $subject->id]) }}"><h3 class="text-lg font-bold text-indigo-700 hover:text-indigo-400 mt-2 mb-3">View Flashcards</h3></a>
                

                {{--<p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                    ante justo. Integer euismod libero id mauris malesuada tincidunt.</p>--}}
                <div class="flex space-x-4 place-content-start">
                    <a href="{{ url('add-material', ['subject_id' => $subject->id]) }}"><button class="bg-green-400 text-white py-2.5 px-4 rounded-full font-bold hover:bg-gray-800">Materials</button></a>
                    <a href="{{ url('add-assignment',['subject_id' => $subject->id]) }}"><button class="bg-green-400 text-white py-2.5 px-4 rounded-full font-bold hover:bg-gray-800">Assigments</button></a>
                    
                </div>
                @endif
            </div>

        </div>

    </div>
</div>


<!--MATERIALS-->

<!DOCTYPE html>
<html>
    <body>
    @if ($materials->count() > 0)
    <div class="bg-white py-1 mb-4 dark:bg-black">
    <h2 class="text-2xl font-bold text-black mb-3 ml-5 dark:text-white">Materials</h2>

    @foreach ($materials as $material)
    @php
    $isAccessible = in_array(Auth::user()->id, $material->users->pluck('id')->toArray());
    @endphp
    @if ($isAccessible || $material->users->isEmpty() || Auth::user()->role_id == 4)

    <div class="container mx-auto px-4">
        {{--<h2 class="text-2xl font-semi-bold text-white mb-8">Materials</h2>--}}
        <div class="grid grid-cols-1 md:grid-cols-1 gap-2">
            <div class="bg-white rounded-lg border-solid border-2 border-gray-900 p-8">
                <div class="relative overflow-hidden">
                    {{--<img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">--}}
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                    </div>
                </div>
                <h3 class="text-lg font-semi-bold text-gray-900 mt-3">Material name: {{ $material->material_name }} </h3>
                <h3 class="text-lg font-semi-bold text-gray-900 mt-2">Description: {{ $material->description }} </h3>
                @if ($material->file)
                <a href="{{ asset('storage/' . $material->file) }}" download><h3 class="text-lg font-semi-bold text-gray-900 mt-2">File: DOWNLOAD HERE </h3></a>
                @endif 


                <a href="{{ $material->link }}" target="_blank"><h3 class="text-lg font-semi-bold text-gray-900 mt-2 overflow-hidden">Link: {{ $material->link }} </h3></a>


                <h3 class="text-lg font-semi-bold text-gray-900 mt-2 mb-4">Upload Date: {{ $material->upload_date }} </h3>

                @if (Auth::user() && Auth::user()->role_id == 4)

                <div class="flex space-x-4 place-content-start">
                    <a href="{{ route('edit-material', ['subject_id' => $material->subject->id, 'id' => $material->id]) }}"><button class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Edit</button></a>
                    <a href="#" class= "" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $material->id }}"><button class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Delete</button>
                    
                </div>


            </div>

        </div>

    </div>

    <!--delete confirmation-->
    <div class="modal fade" id="deleteModal{{ $material->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
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
    @endif
    @endforeach
    @else
    <p>No Materials avaiable for this subject</p>
    @endif
</div>


        </body>
                
</html>


<!--ASSIGNMENTS-->
<!doctype html>
<html lang="en">
  <head>
    <!-- … -->
  </head>
  <body>
    @if ($assignments->count() > 0)
    <div class="bg-white py-1 mb-1">
        <h2 class="text-2xl font-bold text-black mb-3 ml-5">Assignments</h2>
        @foreach ($assignments as $assignment)
        <div class="container mx-auto px-4 ">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-2">
            <div class="bg-white rounded-lg border-solid border-2 border-gray-900 p-8">
                <div class="relative overflow-hidden">
                {{--<img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">--}}
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                    </div>
                </div>
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
                    <a a href="#" class="" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $assignment->id }}"><button class="bg-gray-900 text-white py-2 px-3 rounded-full font-bold hover:bg-gray-800">Delete</button></a>
                    <!--delete confirmation-->
                    <div class="modal fade" id="deleteModal{{ $assignment->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
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
            </div>
        </div>    
        </div>
    </div>
    @endif

    @if (Auth::user() && Auth::user()->role_id == 3)
                                    @php
                                        $hasSubmitted = Auth::user()->submissions->contains('assignment_id', $assignment->id);
                                    @endphp
                                    @if ($hasSubmitted)
                                        <div class="border border-green-500 text-green-700 bg-green-400">
                                            <p>You have  submitted for this assignment.</p>
                                        </div>
                                    @elseif (strtotime($assignment->due_date) > time())<!--checks if the due date is passed. if so the link is hidden-->
                                        <a href="{{ url('add-submission', ['assignment_id' => $assignment->id]) }}" class="bg-indigo-600 hover:bg-indigo-400 text-white py-1 px-3 rounded my-3 mt-1">Add Submission for Assignment</a>
                                    @endif
    @endif
        @endforeach
    @else 
    <p>No assignments available for this subject.</p>
    @endif


  </body>


</html>
    
<!--ASSIGNMENTS-->
<!--<div class="bg-black py-16 mb-10">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-white mb-8">Assignments</h2>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="relative overflow-hidden">
                    {{--<img class="object-cover w-full h-full" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" alt="Product">--}}
                    <div class="absolute inset-0 bg-black opacity-40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="bg-white text-gray-900 py-2 px-6 rounded-full font-bold hover:bg-gray-300">View Product</button>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mt-3">Assignment name: </h3>
                <h3 class="text-xl font-bold text-gray-900 mt-2">Description: </h3>
                <h3 class="text-xl font-bold text-gray-900 mt-2">File: </h3>
                <h3 class="text-xl font-bold text-gray-900 mt-2">Due Date: </h3>
                <h3 class="text-xl font-bold text-gray-900 mt-2 mb-4">Upload Date: </h3>

                {{--<p class="text-gray-500 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                    ante justo. Integer euismod libero id mauris malesuada tincidunt.</p>--}}
                <div class="flex space-x-4 place-content-start">
                    <button class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Edit</button>
                    <button class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Delete</button>
                    <button class="bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">View</button>
                </div>
            </div>

        </div>

    </div>
</div>-->