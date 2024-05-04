<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 focus:bg-red-800 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-offset-2 transition ease-in-out duration-150 dark:bg-gray-500 dark:hover:bg-gray-700 dark:focus:bg-gray-700 dark:active:bg-gray-700 focus:ring-gray-500']) }}>
    {{ $slot }}
</button>
