<x-app-layout>
    <section class="overflow-hidden text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="mb-12">
                <h2 class="text-2xl font-medium text-gray-900 title-font">
                    {{ $listing->title }}
                </h2>
                <div class="flex items-center justify-start mt-2 mr-8 md:flex-grow">
                    @foreach($listing->tags as $tag)
                    <span
                        class="inline-block mr-2 tracking-wide text-indigo-500 text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500 uppercase">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="-my-6">
                <div class="flex flex-wrap md:flex-nowrap">
                    <div class="w-full pr-4 text-base leading-relaxed content md:w-3/4">
                        {!! $listing->content !!}
                    </div>
                    <div class="w-full pl-4 md:w-1/4">
                        <img src="{{ asset('storage/' . $listing->logo) }}" alt="{{ $listing->company }} logo"
                            class="max-w-full mb-4">
                        <p class="text-base leading-relaxed">
                            <strong>Location: </strong>{{ $listing->location }}<br>
                            <strong>Company: </strong>{{ $listing->company }}
                        </p>
                        <a href="{{ route('listings.apply', $listing) }}"
                            class="block py-2 my-4 text-sm font-medium tracking-wide text-center text-indigo-500 uppercase bg-white border border-indigo-500 title-font hover:bg-indigo-500 hover:text-white">Apply
                            Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>