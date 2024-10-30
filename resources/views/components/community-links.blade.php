@props(['links'])

<div class="py-12 bg-gray-100 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg transition-transform duration-300 ease-in-out hover:scale-105">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-3xl font-bold mb-4">{{ __("Welcome to Your Dashboard!") }}</h1>
                <p class="mb-6 text-gray-700 dark:text-gray-300">{{ __("Here you will see the Community Links!") }}</p>
                
                @if ($links->isEmpty())
                    <div class="bg-yellow-200 border-l-4 border-yellow-600 text-yellow-800 p-4 mb-4 dark:bg-yellow-800 dark:border-yellow-500 dark:text-yellow-200" role="alert" aria-live="polite">
                        <p class="font-bold">{{ __('No Links Available') }}</p>
                        <p>{{ __('Currently, there are no community links available. Please check back later.') }}</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($links as $link)
                            <div class="bg-white dark:bg-gray-700 rounded-lg p-4 shadow-md transition-shadow duration-300 hover:shadow-xl">
                                <h3 class="font-semibold text-lg">{{ $link->title }}</h3>
                                <a href="/dashboard/{{ $link->channel->slug }}" class="inline-block px-2 py-1 text-white text-sm font-semibold rounded hover:underline"
                                    style="background-color: {{ $link->approved ? $link->channel->color : 'orange' }};">
                                    {{ $link->approved ? $link->channel->title : __('Not Approved') }}
                                </a>
                                <small class="block mt-2 text-gray-600 dark:text-gray-400">
                                    {{ __('Contributed by: ') }} {{ $link->creator->name }} - {{ $link->updated_at->diffForHumans() }}
                                </small>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-6">
                        {{ $links->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
