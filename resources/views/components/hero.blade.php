<section class="text-gray-600 border-b border-gray-100 body-font">
    <div class="container flex flex-col items-center justify-center px-5 py-24 mx-auto">
        <div class="w-full text-center lg:w-2/3">
            <h1 class="mb-4 text-3xl font-medium text-gray-900 title-font sm:text-4xl">
                Top jobs in the industry
            </h1>
            <p class="mb-8 leading-relaxed">Whether you're looking to move to a new role or just seeing what's available, we've gathered this comprehensive list of
            open positions from a variety of companies and locations for you to choose from.</p>
            <form action="{{ route('listings.index') }}" method="GET"
             class="flex items-end justify-center w-full">
                <div class="relative w-full mr-4 text-left lg:w:1/2">
                    <input type="search" id="search" name="search" value="{{ request()->get('search') }}"
                     class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:ring-2 focus:ring-indigo-200 focus:bg-transparent focus:border-indigo-500">
                </div>
                <button class="inline-flex px-6 py-2 text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">Search</button>
            </form>
            <p class="w-full mt-2 mb-8 text-sm text-gray-500">fullstack php, vue and node, react native</p>
        </div>
    </div>
</section>