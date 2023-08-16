<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto">
        <div class="w-full max-auto px-3 sm:w-6/6 mb-5">
            <div class="w-full max-auto px-3 sm:w-2/6 mb-5">
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="pl-6 py-6 text-gray-900 dark:text-gray-100 text-left">
                        Existem atualmente {{ $books }} livros cadastrados
                    </div>
                </div>
            </div>

            <div class="w-full max-auto px-3 sm:w-2/6 mb-5">
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="pl-6 py-6 text-gray-900 dark:text-gray-100 text-left">
                        Existem atualmente {{ $authors }} autores cadastrados
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
