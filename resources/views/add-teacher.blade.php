<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Teacher</title>
</head>
<body class="bg-white dark:bg-black">
    <div class="container mx-auto py-8 mt-12">
        @if (session('error'))
            <div class="bg-red-200 text-red-700 p-2 rounded my-3 mt-1">
                {{ session('error') }}
            </div>
         @elseif(session('success'))
            <div class="bg-green-200 text-green-700 p-2 rounded my-3 mt-1">
                {{ session('success') }}
            </div>
        @endif
        <h2 class="text-2xl font-bold mb-6 text-center text-black dark:text-white">Add Teacher</h2>

        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" method="post" action="{{ url('save-teacher') }}">
            @csrf 
         
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input type="text" name="name" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"  required/>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input type="email" name="email" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" required/>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="admission_number">Admission</label>
                <input type="text" name="admission_number" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" required/>
                @error('admission_number')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="year_of_registration">Year of registration</label>
                <input type="text" name="year_of_registration" value="{{ date('Y') }}" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" required/>
            </div>
            
            

            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="grade_id">Select Grade</label>
            <select id="gradeSelect" name="grade_id" required>
                @foreach($grades as $grade)
                <option value="{{$grade->id}}">{{$grade->grade}}</option>
                @endforeach
            </select>
        </div>
    <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="class_id">Select Class</label>
    <select id="classSelect" name="class_id" required>
       
    </select>
</div>
        
            <br>
            <button type="submit" class="w-20 bg-gray-900 text-white py-1 px-4 rounded-xl  hover:bg-gray-800">Save</button>
            <a href="{{ url('subject-list') }}" class="w-20 bg-red-700 text-white py-1 px-4 rounded-xl  hover:bg-gray-800">Back</a>
        </form>
    </div>


    <script>
  document.addEventListener('DOMContentLoaded', function () {
    const gradeSelect = document.getElementById('gradeSelect');
    const classSelect = document.getElementById('classSelect');

    // Event listener for grade selection change
    gradeSelect.addEventListener('change', function () {
        console.log('Grade selected:', gradeSelect.value);

        const selectedGradeId = gradeSelect.value;

        // Fetch classes based on the selected grade
        fetch(`/get-classes-teacher/${selectedGradeId}`)
            .then(response => response.json())
            .then(classes => {
                console.log('Fetched classes:', classes);

                // Clear existing options
                classSelect.innerHTML = '';

                // Add new options
                classes.forEach(classItem => {
                    const option = document.createElement('option');
                    option.value = classItem.id;
                    option.textContent = classItem.class_name;
                    classSelect.appendChild(option);
                });
            });
    });
});

</script>
</body>
</html>
