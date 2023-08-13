<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Notice</title>
</head>

<body class="bg-black">
    <div class="container mx-auto py-8 mt-12">
        <h2 class="text-2xl font-bold mb-6 text-center text-white">Add Notice</h2>

        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" method="post" action="{{ url('save-notice') }}">
            @csrf 
         
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="notice">Notice</label>
                <textarea name="notice" rows="5" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"></textarea>
            </div>
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="grade_id">Select Grade</label>
                    <Select name="grade_id">
                        @foreach($grades as $grade)
                        <option value="{{$grade->id}}">{{$grade->grade}}</option>
                        @endforeach

                    </Select>
            

</div>
            
            <br>
            <button type="submit" class="w-full bg-green-500 text-white text-sm font-bold py-2 px-4 mb-4 rounded-md hover:bg-green-600 transition duration-300">Save</button>
            <a href="{{ url('dashboard') }}" class="bg-amber-500 hover:bg-amber-700 text-white py-1 px-3 rounded my-3 mt-1">Back</a>
        </form>
    </div>
</body>
</html>
