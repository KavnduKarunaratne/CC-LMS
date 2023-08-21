<!DOCTYPE html>
<!--heere-->
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Edit Student</title>
</head>

<body class="bg-black">

<div class="container mx-auto py-8 mt-12">
@if (session('success'))
    <div class="bg-green-200 text-green-700 p-2 rounded my-3 mt-1">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="bg-red-200 text-red-700 p-2 rounded my-3 mt-1">
        {{ session('error') }}
    </div>
@endif
<h2 class="text-2xl font-bold mb-6 text-center text-white">Edit Student</h2>
  <form method="post" action="{{route ('update-student' , ['id' => $student->id]) }}" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" >
  
  @csrf 
  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                    <input type="text" name="name" value="{{ $student->name }}"             class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input type="email" name="email"  value="{{ $student->email }}"   class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="admission_number">Admission </label>
                    <input type="text" name="admission_number" value="{{ $student->admission_number }}"   class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="year_of_registration">Year of registration</label>
                    <input type="text" name="year_of_registration" value="{{ $student->year_of_registration }}"   class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
                </div>

               <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="grade_id">select Grade</label>
                    <Select name="grade_id">
                        @foreach($grades as $grade)
                        <option value="{{$grade->id}}">{{$grade->id}}</option>
                        @endforeach

                    </Select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="class_id">select Class</label>
                    <Select name="class_id">
                        @foreach($classes as $classes)
                        <option value="{{$classes->id}}">{{$classes->class_name}}</option>
                        @endforeach

                    </Select>
                </div>

<br>
   
    <div class="flex items-center justify-around">
      <button class="bg-amber-500 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Update
      </button>
      
      <a href="{{ url('dashboard') }}" class="text-black no-underline hover:underline" >Back</a>
   
    </div>
  </form>
  
</div>

</body>
</html>

