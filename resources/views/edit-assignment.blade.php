<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Assignment</title>
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
        <h2 class="text-2xl font-bold mb-6 text-center text-black">Edit Assignment</h2>

        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" method="post" action="{{ route('update-assignment', $assignment->id) }}"  enctype="multipart/form-data">
            @csrf
         
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="assignment_name">Assignment Name</label>
                <input type="text" name="assignment_name" value="{{ $assignment->assignment_name }}" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                <textarea name="description" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">{{ $assignment->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="file">File</label>
                <input type="file" name="file" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
                @error('file')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="due_date">Due Date</label>
                <input type="datetime-local" value="{{$assignment->due_date}}" name="due_date"  class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none"/>
            </div>

            

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="subject_id">Select Subject</label>
                <select name="subject_id" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none">
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}" @if($subject->id === $assignment->subject_id) selected @endif>{{$subject->subject_name}}</option>
                    @endforeach
                </select>
            </div>

            <br>
            <button type="submit" class="w-full bg-green-500 text-white text-sm font-bold py-2 px-4 mb-4 rounded-md hover:bg-green-600 transition duration-300">Update</button>
            <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-700 text-white py-1 px-3 rounded my-3 mt-1">Back</a>

        </form>
    </div>
</body>
</html>
