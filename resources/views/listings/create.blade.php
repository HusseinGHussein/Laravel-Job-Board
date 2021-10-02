<x-app-layout>
    <section class="overflow-hidden text-gray-600 body-font">
        <div class="w-full py-24 mx-auto md:w-1/2">
            <div class="mb-4">
                <h2 class="text-2xl font-medium text-gray-900 title-font">
                    Create a new listing
                </h2>
            </div>
            @if($errors->any())
                <div class="p-4 mb-4 text-red-800 bg-red-200">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form
                action="{{ route('listings.store') }}"
                id="payment_form"
                method="post"
                enctype="multipart/form-data"
                class="p-4 bg-gray-100"
            >
                @csrf
                @guest
                    <div class="flex mb-4">
                        <div class="flex-1 mx-2">
                            <x-label for="email" value="Email Address" />
                            <x-input
                                class="block w-full mt-1"
                                id="email"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autofocus />
                        </div>
                        <div class="flex-1 mx-2">
                            <x-label for="name" value="Full Name" />
                            <x-input
                                class="block w-full mt-1"
                                id="name"
                                type="text"
                                name="name"
                                :value="old('name')"
                                required />
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <div class="flex-1 mx-2">
                            <x-label for="password" value="Password" />
                            <x-input
                                class="block w-full mt-1"
                                id="password"
                                type="password"
                                name="password"
                                required />
                        </div>
                        <div class="flex-1 mx-2">
                            <x-label for="password_confirmation" value="Confirm Password" />
                            <x-input
                                class="block w-full mt-1"
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required />
                        </div>
                    </div>
                @endguest
                <div class="mx-2 mb-4">
                    <x-label for="title" value="Job Title" />
                    <x-input
                        id="title"
                        class="block w-full mt-1"
                        type="text"
                        name="title"
                        required />
                </div>
                <div class="mx-2 mb-4">
                    <x-label for="company" value="Company Name" />
                    <x-input
                        id="company"
                        class="block w-full mt-1"
                        type="text"
                        name="company"
                        required />
                </div>
                <div class="mx-2 mb-4">
                    <x-label for="logo" value="Company Logo" />
                    <x-input
                        id="logo"
                        class="block w-full mt-1"
                        type="file"
                        name="logo" />
                </div>
                <div class="mx-2 mb-4">
                    <x-label for="location" value="Location (e.g. Remote, United States)" />
                    <x-input
                        id="location"
                        class="block w-full mt-1"
                        type="text"
                        name="location"
                        required />
                </div>
                <div class="mx-2 mb-4">
                    <x-label for="apply_link" value="Link To Apply" />
                    <x-input
                        id="apply_link"
                        class="block w-full mt-1"
                        type="text"
                        name="apply_link"
                        required />
                </div>
                <div class="mx-2 mb-4">
                    <x-label for="tags" value="Tags (separate by comma)" />
                    <x-input
                        id="tags"
                        class="block w-full mt-1"
                        type="text"
                        name="tags" />
                </div>
                <div class="mx-2 mb-4">
                    <x-label for="content" value="Listing Content (Markdown is okay)" />
                    <textarea
                        id="content"
                        rows="8"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="content"
                    ></textarea>
                </div>
                <div class="mx-2 mb-4">
                    <label for="is_highlighted" class="inline-flex items-center text-sm font-medium text-gray-700">
                        <input
                            type="checkbox"
                            id="is_highlighted"
                            name="is_highlighted"
                            value="Yes"
                            class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2">Highlight this post</span>
                    </label>
                </div>
                <div class="mx-2 mb-2">
                    <button type="submit" id="form_submit" class="items-center block w-full py-2 mt-4 text-base text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600 md:mt-0">Continue</button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
