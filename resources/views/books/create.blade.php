<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Novo livro') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto pt-6 pb-1">
        <div class="bg-gray-800 rounded-lg">
            <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex px-6 py-4">
                    <div class="w-full max-auto">
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 sm:w-1/4">
                                <div class="mb-5">
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1" for="author_id">Autor</label>
                                    <select name="author_id" id="author_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                        <option value=""></option>
                                        @foreach($authors as $keyAuthor => $author)
                                            <option value="{{ $keyAuthor }}" {{ old('author_id') == $keyAuthor ? 'selected' : null}}>{{ $author }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-2/4">
                                <div class="mb-5">
                                    <x-input-label for="name" :value="__('Title')" />
                                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-1/4">
                                <div class="mb-5">
                                    <x-input-label for="publication_year" :value="__('Ano de publicação')" />
                                    <x-text-input id="publication_year" class="block mt-1 w-full" type="text" name="publication_year" :value="old('publication_year') ?? date('Y')" />
                                    <x-input-error :messages="$errors->get('publication_year')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full max-auto px-3 sm:w-4/4 mb-5">
                                <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Descrição / Sinopse</label>
                                <textarea class="no-resize appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm h-48 resize-none" id="description" name="description">{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="w-full max-auto px-3 sm:w-4/4 mb-5">
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1" for="img_path">Anexar capa</label>
                                <input class="appearance-none block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id="img_path" name="img_path" type="file">
                                <x-input-error :messages="$errors->get('img_path')" class="mt-2" />
                            </div>

                            <div class="px-1 mb-5">
                                <button
                                    type="submit"
                                    class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                                >Gravar
                                </button>
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
            </form>
        </div>
    </div>
</x-app-layout>
