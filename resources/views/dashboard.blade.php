<x-app-layout>
    <x-slot name="header">
        <nav class="bg-gray-800 dark:bg-gray-900 p-4 flex items-center shadow-md">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Community Contributions') }}
            </h2>
        </nav>
    </x-slot>
    
    <div class="p-6">
        <x-community-add-link :channels="$channels" />
        <x-alert_user_status/>
        <x-community-links :links="$links" />
        
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 dark:bg-gray-900 p-4 mt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center text-gray-400">
            &copy; 2024 MyApp. All rights reserved.
        </div>
    </footer>
</x-app-layout>
