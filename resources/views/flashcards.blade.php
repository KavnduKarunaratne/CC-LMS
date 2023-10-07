<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    @include('components.teacheravatardisplay')
    <title>Flashcards</title>

    <style>
        .flip-card {
            font-family: roboto;
            text-align: center;
            font-size: 18px;
            background-color: transparent;
            width: 300px;
            height: 200px;
            border: 1px solid #f1f1f1;
            perspective: 1000px;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        } 

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden; 
            backface-visibility: hidden;
        }

        /* Style the front side */
        .flip-card-front {
            background-color: #bbb;
            color: black;
        }

        /* Style the back side */
        .flip-card-back {
            background-color: dodgerblue;
            color: black;
            transform: rotateY(180deg);
        }
    </style>
</head>
<body class="bg-white dark:bg-black">
    <div class="container mx-auto p-4">
        <div class="bg-white dark:bg-black p-4 rounded-md shadow-md mb-4">
            <h2 class="mt-0 text-xl font-semibold dark:text-white">Flashcards for {{ $subject->subject_name }}</h2>
        </div>
        @if (Auth::user() && Auth::user()->role_id == 4)
            <div> 
                <a href="{{ url('add-card',['subject_id'=>$subject->id])  }}">
                <button class="bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 mt-3">Add Flash Card</button>
    </a>
            </div>
        @endif
        <div class="bg-white dark:bg-black p-4 rounded-md shadow-md mb-4 border-solid border-white border-2 mt-4">
            <h3 class="text-lg font-semibold mb-4 mt-5 dark:text-white">Flashcards:</h3>
            @if ($flashcards->count() > 0)
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($flashcards as $flashcard)
                        <div class="flip-card" onclick="flipCard(this)">
                            <div class="flip-card-inner">
                                <div class="flip-card-front p-4 border border-1 rounded-md shadow-md bg-gray-100">
                                    <strong>Content:</strong> {{ $flashcard->content }}
                                    @if (Auth::user() && Auth::user()->role_id == 4)
                                        <div class="flex justify-between">
                                            <a href="{{ url('edit-card', $flashcard->id) }}" class="text-green py-1 px-3 rounded my-3 mt-1">Edit</a>
                                            <a href="{{ url('delete-flashcard', $flashcard->id) }}" class="text-red py-1 px-3 rounded my-3 mt-1">Delete</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="flip-card-back p-4 border rounded-md shadow-md bg-gray-100">
                                    <strong>Answer:</strong> {{ $flashcard->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No flashcards available for this subject.</p>
            @endif
        </div>
    </div>

    <script>
        function flipCard(card) {
            const flipCardInner = card.querySelector('.flip-card-inner');
            flipCardInner.style.transform = flipCardInner.style.transform === 'rotateY(180deg)' ? 'rotateY(0)' : 'rotateY(180deg)';
        }
    </script>
</body>
</html>

