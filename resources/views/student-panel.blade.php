<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Panel</title>
</head>
<body class="bg-white">
@if (Auth::check() && Auth::user()->is_archived==0 && Auth::user()->role_id == 3) <!--checks if user is archived and the roleid is 3-->

<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">

      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
       
        <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
            <a href="{{ url('profile/show') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Profile</a>

<a href="{{ route('logout') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Log Out</a>
<a href="{{ route('view-my-submissions')  }}"      class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">My Grades</a>


</div>
        </div>
      </div>

        </div>
      </div>
    </div>
  </div>


</nav>
    <div class="container mx-auto p-4">
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h2 class="text-lg font-semibold">Welcome to the Student Panel</h2>
            <p>Your role ID: {{ Auth::user()->role_id }}</p>
            <p>Logged-in User: {{ auth()->user()->name }}</p>
            

        </div>

        @if (Auth::user()->grade)
            <div class="bg-white p-4 rounded-md shadow-md mb-4">
                <h3 class="text-lg font-semibold">My Grade:</h3>
                <ul>
                    <li>{{ Auth::user()->grade->grade }}</li>
                </ul>
            </div>
        @else
            <p>No grades assigned.</p>
        @endif

        @if (Auth::user()->class)
            <div class="bg-white p-4 rounded-md shadow-md mb-4">
                <h3 class="text-lg font-semibold">My Class:</h3>
                <ul>
                    <li>{{ Auth::user()->class->class_name }}</li>
                </ul>
            </div>
        @else
            <p>No classes assigned.</p>
        @endif
        @if (Auth::user()->grade && Auth::user()->class)
    <div class="bg-white p-4 rounded-md shadow-md">
        <h3 class="text-lg font-semibold">Subjects for Your Class and Grade:</h3>
        <ul>
            @foreach (Auth::user()->class->subjects()->where('grade_id', Auth::user()->grade->id)->get() as $subject)
                <li>
                    <a href="{{ route('subject.detail', ['subject_id' => $subject->id]) }}">
                        {{ $subject->subject_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif

        
    </div>

<div class="bg-white p-4 rounded-md shadow-md">
    <h3 class="text-lg font-semibold">Notices for Your Grade:</h3>
    <ul>
        @foreach (Auth::user()->grade->notices as $notice)
            @if ($notice->grade_id == Auth::user()->grade->id || $notice->grade_id == null)
                <li>
                    Notice: {{ $notice->notice }}
                    | Date: {{ $notice->date_of_notice }}
                </li>
            @endif
        @endforeach
    </ul>
</div>

<div>
    @if ($notices->count() > 0)
        @foreach ($notices as $notice)
            @if ($notice->grade_id == null)
                <div class="text-white mt-4">
                    <div class="text-black w-full max-w-sm mx-auto bg-white p-4 mb-4 rounded-md shadow-md">
                        {{ $notice->notice }}<br>
                        <span class="text-black">{{ $notice->date_of_notice }}</span><br>
                        
                        @if ($notice->management)
                            <span>Management: {{ $notice->management->name }}</span>
                        @else
                            <span>Management: Not available</span>
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <p>No notices available.</p>
    @endif
</div>

            <div class="bg-white p-4 rounded-md shadow-md">
    <h3 class="text-lg font-semibold">Materials Accessible to You:</h3>
    <ul>
        @foreach (Auth::user()->materials as $material)
            <li>
                Material: {{ $material->material_name }}
                | Description: {{ $material->description }}
                | Upload Date: {{ $material->upload_date }}
                <br>
                @if ($material->file)
                    <a href="{{ asset('storage/' . $material->file) }}" download>Download File</a>
                    <br>
                @endif
                @if ($material->link)
                    <a href="{{ $material->link }}" target="_blank">Visit Link</a>
                    <br>
                @endif
            
            </li>
        @endforeach
    </ul>
</div>
@else
    <p>You do not have access to this.</p>
    <a href="{{ route('logout') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Log Out</a>
@endif
</body>
</html>
