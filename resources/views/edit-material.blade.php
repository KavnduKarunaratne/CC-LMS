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
        <h2 class="text-2xl font-bold mb-6 text-center text-white">Edit Material</h2>

        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" method="post" action="{{ route('update-material', ['id' => $material->id]) }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="material_name">Material Name</label>
                <input type="text" name="material_name" value="{{ $material->material_name }}" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                <textarea name="description" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">{{ $material->description }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="file">File</label>
                <input type="file" name="file"              class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
                @error('file')
    <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="link">Add any links</label>
                <input type="text" name="link"  value="{{ $material->link }}" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>

</div>


<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Select Students to Make Material Accessible To:</label>
    @foreach ($classStudents as $student)
        <div class="flex items-center mt-2">
            <input type="checkbox" name="users[]" value="{{ $student->id }}" class="mr-2">
            <label>{{ $student->name }}</label>
        </div>
    @endforeach
</div>
         

            <br>
            <button type="submit" class="w-full bg-blue-500 text-white text-sm font-bold py-2 px-4 mb-4 rounded-md hover:bg-blue-600 transition duration-300">Update</button>
            <a href="{{ url('material-list') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 px-3 rounded my-3 mt-1">Back</a>
        </form>
    </div>
</body>
</html>
