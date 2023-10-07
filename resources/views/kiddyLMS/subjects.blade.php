@if (Auth::user()->grade && Auth::user()->class)
<div class="grid-cols-1 sm:grid md:grid-cols-3 ">
    @foreach($subject as $subject)

  <div
    class="mx-3 mt-6 flex flex-col rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
    <a href="#!">
      <img
        class="rounded-t-lg"
        src="#"
        alt="Hollywood Sign on The Hill" />
    </a>
    <div class="p-6">
      <h5
        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
        Subject Name.
      </h5>
      <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
         Subject Info.
      </p>
    </div>
  </div>
  @endforeach
</div>
@endif