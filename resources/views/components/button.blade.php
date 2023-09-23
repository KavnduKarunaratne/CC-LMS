{{--<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>--}}

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'custom-button']) }}>
    {{ $slot }}
</button>

<style> /* created custom button */
    .custom-button {
        background-color: #5350F7;
        color: white;
        border: none;
        border-radius: 1rem; /* Increased border-radius for more rounded edges */
        padding: 0.5rem 1rem;
        transition: background-color 0.3s ease;
    }

    .custom-button:hover {
        background-color: grey; /* Grey color when hovered */
    }
</style>




