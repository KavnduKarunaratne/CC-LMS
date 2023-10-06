<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Grade</title>
</head>
<body class="bg-white">
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
        <h2 class="text-2xl font-bold mb-6 text-center text-black">Add Grade</h2>

        <form  class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" method="post" action="{{ url('save-Grade') }} ">
            @csrf 
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="grade">Grade</label>
                    <input type="text" name="grade" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>         
                </div> 
            <br>
            <button type="submit"  class="w-20 bg-gray-900 text-white py-1 px-4 rounded-xl  hover:bg-gray-800">Save</button>
            <a href="{{ url('dashboard') }}" class="w-20 bg-red-700 text-white py-1 px-4 rounded-xl  hover:bg-gray-800">Back</a>
        </form>
    </div>
</body>
</html>
