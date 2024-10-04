<x-app-layout>
    <x-slot name="header">
        <nav class="bg-gray-800 dark:bg-gray-900 p-4 flex items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Community Contributions') }}
            </h2>
        </nav>
    </x-slot>

    <!-- Main Content -->
    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-community-add-link />
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold mb-4">{{ __("Welcome to Your Dashboard!") }}</h1>
                    <p class="mb-6 text-gray-700 dark:text-gray-300">{{ __("Here you will see the Community Links!") }}</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-blue-500 rounded-lg p-6 text-white shadow-md hover:shadow-xl transition duration-300">
                            <h3 class="font-semibold text-lg">Feature 1</h3>
                            <p class="mt-2">Discover the amazing capabilities of feature 1 and how it can help you.</p>
                        </div>
                        <div class="bg-green-500 rounded-lg p-6 text-white shadow-md hover:shadow-xl transition duration-300">
                            <h3 class="font-semibold text-lg">Feature 2</h3>
                            <p class="mt-2">Explore feature 2, designed to enhance your productivity.</p>
                        </div>
                        <div class="bg-yellow-500 rounded-lg p-6 text-white shadow-md hover:shadow-xl transition duration-300">
                            <h3 class="font-semibold text-lg">Feature 3</h3>
                            <p class="mt-2">Learn about feature 3 and how it can transform your workflow.</p>
                        </div>
                        @foreach ($links as $link)
                        <li>{{$link->title}}</li>
                        @endforeach
                        {{$links->links()}}
                        <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 dark:bg-gray-900 p-4 mt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center text-gray-400">
            &copy; 2024 MyApp. All rights reserved.
        </div>
    </footer>
</x-app-layout>
