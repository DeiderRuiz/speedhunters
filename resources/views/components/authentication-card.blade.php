<div class="sm:pt-0" style="height: calc(100vh - 64px);">
    <div class="flex flex-col sm:justify-center items-center bg-gray-100 py-6 dark:bg-gray-500">
        <div>
            {{ $logo }}
        </div>
        <div class="w-full sm:max-w-lg my-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg dark:bg-gray-800 dark:border-gray-400">
            {{ $slot }}
        </div>
    </div>
</div>