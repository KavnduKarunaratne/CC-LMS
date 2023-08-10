<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Teacher</title>
</head>
<body class="bg-black">
    <div class="container mx-auto py-8 mt-12">
        <h2 class="text-2xl font-bold mb-6 text-center text-white">Add Teacher</h2>

        <form  class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" method="post" action="{{ url('save-teacher') }}">
            @csrf 
         
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input type="text" name="name" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input type="email" name="email" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="admission_number">Admission</label>
                <input type="text" name="admission_number" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="year_of_registration">Year of registration</label>
                <input type="text" name="year_of_registration" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
            </div>

           

            <br>
            <button type="submit" class="w-full bg-amber-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-amber-600 transition duration-300">Save</button>
            <a href="{{ url('dashboard') }}">Back</a>
        </form>
    </div>
</body>
</html>
