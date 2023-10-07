<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Material</title>
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

    <h2 class="text-2xl font-bold mb-6 text-center text-black dark:text-white">Add Material</h2>

    <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" method="post" action="{{ url('save-material') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="material_name">Material Name</label>
            <input type="text" name="material_name" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" required/>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
            <textarea name="description" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="file">File</label>
            <input type="file" name="file" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
            @error('file')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="link">Add any links</label>
            <input type="text" name="link" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
        </div>

        <input type="hidden" name="subject_id" value="{{ $subject->id }}">
        <!--the subject id is passed through the route-->
      
        <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Select Related Subjects</label>
    @foreach ($relatedSubjects as $relatedSubject)
        <div class="flex items-center mt-2">
            <input type="checkbox" name="subject_ids[]" value="{{ $relatedSubject->id }}" class="mr-2">
            <label>{{ $relatedSubject->subject_name }} {{ $relatedSubject->class->class_name }} {{ $relatedSubject->grade->grade }}</label>
        </div>
    @endforeach
</div>


        <div class="mb-4"><!--display the students in the class-->
            <label class="block text-gray-700 text-sm font-bold mb-2">Select Students to Make Material Accessible To:</label>
            @foreach ($classStudents as $student)
                <div class="flex items-center mt-2">
                    <input type="checkbox" name="users[]" value="{{ $student->id }}" class="mr-2">
                    <label>{{ $student->name }} {{$student->admission_number}}</label>
                </div>
            @endforeach
        </div>

        <br>
        <button type="submit" class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 mb-4 rounded-md hover:bg-indigo-600 transition duration-300">Save</button>
    </form>
</div>

<script>
    // Fetch related subjects based on the selected subject's name and grade
    function fetchRelatedSubjects() {
        const selectedSubjectName = "{{ $subject->subject_name }}"; // Get the selected subject name from PHP
        const selectedGradeId = "{{ $subject->grade_id }}"; // Get the selected grade ID from PHP

        // Make an AJAX request to get related subjects
        axios.get(`/get-related-subjects/${selectedSubjectName}/${selectedGradeId}`)
            .then(function (response) {
                const relatedSubjects = response.data;
                const selectElement = document.getElementById('subject_id');
                selectElement.innerHTML = '<option value="">Select Subject</option>'; // Clear previous options

                // Populate the dropdown with related subjects
                relatedSubjects.forEach(function (relatedSubject) {
                    const option = document.createElement('option');
                    option.value = relatedSubject.id;
                    option.textContent = `${relatedSubject.subject_name} ${relatedSubject.class.class_name} ${relatedSubject.grade.grade}`;
                    selectElement.appendChild(option);
                });
            })
            .catch(function (error) {
                console.error(error);
            });
    }

    // Listen for changes on the subject_id dropdown
    document.getElementById('subject_id').addEventListener('change', fetchRelatedSubjects);

    // Fetch related subjects when the page loads
    fetchRelatedSubjects();
</script>

</body>
</html>

