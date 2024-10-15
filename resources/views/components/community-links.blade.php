@props(['links'])

<div class="py-12 bg-gray-100 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-3xl font-bold mb-4">{{ __("Welcome to Your Dashboard!") }}</h1>
                <p class="mb-6 text-gray-700 dark:text-gray-300">{{ __("Here you will see the Community Links!") }}</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($links as $link)
                        <div class="bg-white dark:bg-gray-700 rounded-lg p-4 shadow-md transition duration-300 hover:shadow-xl">
                            <h3 class="font-semibold text-lg">{{ $link->title }}</h3>
                            <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded" style="background-color: {{ $link->channel->color }}">
                                {{ $link->channel->title }}
                            </span>
                            <small class="block mt-2 text-gray-600 dark:text-gray-400">Contributed by: {{ $link->creator->name }} - {{ $link->updated_at->diffForHumans() }}</small>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6">
                    {{$links->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
