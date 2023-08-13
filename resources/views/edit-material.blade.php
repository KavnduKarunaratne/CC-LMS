<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Material</title>
</head>

<body class="bg-black">
    <div class="container mx-auto py-8 mt-12">
        <h2 class="text-2xl font-bold mb-6 text-center text-white">Edit Material</h2>

        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" method="post" action="{{ route('update-material', ['id' => $material->id]) }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="material_name">Material Name</label>
                <input type="text" name="material_name" value="{{ $material->material_name }}" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                <textarea name="description" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">{{ $material->description }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="file">File</label>
                <input type="file" name="file" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="link">Add any links</label>
                <input type="text" name="link" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>

</div>


            <div class="mb-4">
            <label lass="block text-gray-700 text-sm font-bold mb-2" for="">Select Subject</label>
            <select name="subject_id" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">
                @foreach($subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Select Students to Make Material Accessible To:</label>
    <select name="users[]" multiple class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">
        @foreach ($classStudents as $student)
            <option value="{{ $student->id }}">{{ $student->name }}</option>
        @endforeach
    </select>
</div>


            <br>
            <button type="submit" class="w-full bg-blue-500 text-white text-sm font-bold py-2 px-4 mb-4 rounded-md hover:bg-blue-600 transition duration-300">Update</button>
            <a href="{{ url('material-list') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 px-3 rounded my-3 mt-1">Back</a>
        </form>
    </div>
</body>
</html>
