<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Notice</title>
</head>
<body class="bg-gray-400">
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
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit Notice</h2>

        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" method="post" action="{{ url('update-notice/'.$notice->id) }}">
            @csrf 

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="notice">Notice</label>
                <textarea name="notice" rows="5" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">{{ $notice->notice }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grade_id">Select Grade</label>
                <select name="grade_id" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" >
                <option value="">Select a Grade</option>
                    @foreach($grades as $grade)
                        <option value="{{$grade->id}}">{{$grade->grade}}</option>
                    @endforeach
                </select>
            </div>

            <br>
            <a href= "{{ url('add-notice') }}">
                 <button type="submit" class="bg-custom-color w-full text-white font-bold py-2 px-4 mb-4 rounded-full">Update</button>
            </a>
            
            <a href="{{ url('management') }}" class="bg-gray-900 text-white py-1 px-4 rounded-xl  hover:bg-gray-800">Back</a>
        </form>
    </div>
</body>

<style>
    .bg-custom-color {
  background-color: #5350F7;
  transition: background-color 0.2s ease, opacity 0.2s ease; /* Add transitions for both background-color and opacity */
}

/* Add a hover class to override the background-color and reduce opacity on hover */
.bg-custom-color:hover {
  background-color: #5350F7;
  opacity: 0.8; /* You can adjust the opacity value as needed */
}
</style>
</html>
