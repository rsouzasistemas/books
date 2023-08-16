<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Consultar livro') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto pt-6 pb-1">
        <div class="bg-gray-800 rounded-lg">
            <div class="flex px-6 py-4">
                <div class="w-full max-auto">
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-2/4">
                            <div class="mb-5">
                                <x-input-label for="name" :value="__('Autor')" />
                                <x-text-input disabled id="name" class="block mt-1 w-full" type="text" name="name" :value="$book->bookAuthor->name" />
                            </div>
                        </div>

                        <div class="w-full px-3 sm:w-2/4">
                            <div class="mb-5">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input disabled id="email" class="block mt-1 w-full" type="text" name="email" :value="$book->bookAuthor->email" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto pt-6 pb-1">
        <div class="bg-gray-800 rounded-lg">
            <div class="flex px-6 py-4">
                <div class="w-full max-auto">
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-2/4">
                            <div class="mb-5">
                                <x-input-label for="name" :value="__('Title')" />
                                <x-text-input disabled id="title" class="block mt-1 w-full" type="text" name="title" :value="$book->title" />
                            </div>
                        </div>

                        <div class="w-full px-3 sm:w-1/4">
                            <div class="mb-5">
                                <x-input-label for="publication_year" :value="__('Ano de publicação')" />
                                <x-text-input disabled id="publication_year" class="block mt-1 w-full" type="text" name="publication_year" :value="$book->publication_year ?? date('Y')" />
                            </div>
                        </div>

                        <div class="w-full max-auto px-3 sm:w-4/6 mb-5">
                            <div class="w-full max-auto sm:w-4/4 mb-5">
                                <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Descrição / Sinopse</label>
                                <textarea disabled class="no-resize appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-48 resize-none" id="description" name="description">{{ $book->description }}</textarea>
                            </div>
                        </div>

                        <div class="w-full max-auto px-3 sm:w-2/6 mb-5 mt-5">
                            <a href="{{ url("storage/$book->img_path") }}" target="_blank">
                                <img src="{{ url("storage/$book->img_path") }}" alt="{{ $book->title }}">
                            </a>
                        </div>

                        <div class="mb-5">
                            <a href="{{ route('books.index') }}"
                               type="button"
                               class="border border-grey-500 bg-grey-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline"
                            >Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
