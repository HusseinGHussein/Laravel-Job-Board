<header class="text-gray-600 border-b border-gray-100 body-font">
    <div class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row">
        <a href="{{ route('listings.index') }}" class="flex items-center mb-4 font-medium text-gray-900 title-font md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" class="w-10 h-10 p-2 text-white bg-indigo-500 rounded-full"
                viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Laravel Job Board</span>
        </a>
        <nav class="flex flex-wrap items-center justify-center text-base md:ml-auto">
            <a class="mr-5 hover:text-gray-900">Employers</a>
        </nav>
        <a href="{{ route('listings.create') }}"
            class="inline-flex items-center px-3 py-1 mt-4 text-base text-gray-100 bg-indigo-600 border-0 rounded hover:text-white focus:outline-none hover:bg-indigo-500 md:mt-0">Post Job
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</header>