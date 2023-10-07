<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Management</title>
</head>
<body class="bg-white dark:bg-black">
<div class="container mx-auto py-8 mt-12">
    <h2 class="text-2xl font-bold mb-6 text-center text-black dark:text-white">Add Management</h2>
        @if (session('error'))
            <div class="bg-red-200 text-red-700 p-2 rounded my-3 mt-1">
                {{ session('error') }}
            </div>
         @elseif(session('success'))
            <div class="bg-green-200 text-green-700 p-2 rounded my-3 mt-1">
                {{ session('success') }}
            </div>
        @endif
    <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" method="post" action="{{ url('save-management') }}">
        @csrf 
         
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
            <input type="text" name="name" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" required/>
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
            <input type="text" name="year_of_registration" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" required/>
        </div>

        <br>
        <button type="submit" class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300">Save</button>
        <a href="{{ url('user-management') }}">Back</a>
    </form>
</div>
</body>
</html>
