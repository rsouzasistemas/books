<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Livros') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto pt-6 pb-1">
        <div class="bg-gray-800 rounded-lg">
            <div class="px-6 py-4 text-gray-100">
                Pesquisar
            </div>

            <form action="{{ route('books.index') }}" method="post">
                @csrf
                <div class="flex px-6">
                    <div class="w-full max-auto">
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 sm:w-1/4">
                                <div class="mb-5">
                                    <x-input-label for="title" :value="__('Título')" />
                                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$filters['title'] ?? null" />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-1/4">
                                <div class="mb-5">
                                    <x-input-label for="publication_year" :value="__('Ano de publicação')" />
                                    <x-text-input id="publication_year" class="block mt-1 w-full" type="text" name="publication_year" :value="$filters['publication_year'] ?? null" />
                                    <x-input-error :messages="$errors->get('publication_year')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-1/4">
                                <div class="mb-5">
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1" for="author_id">Autor</label>
                                    <select name="author_id" id="author_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                        <option value=""></option>
                                        @foreach($authors as $keyAuthor => $author)
                                            <option value="{{ $keyAuthor }}" {{ isset($filters['author_id']) && $filters['author_id'] == $keyAuthor ? 'selected' : null }}>{{ $author }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
                                </div>
                            </div>

                            <div class="px-1 mb-5 mt-4 sm:w-4/4">
                                <button
                                    type="submit"
                                    class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                                >Localizar
                                </button>

                                <a href="{{ route('books.index') }}"
                                   type="button"
                                   class="border border-grey-500 bg-grey-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline"
                                >Limpar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-custom.alert />

    <div class="max-w-7xl mx-auto">
        <a href="{{ route('books.create') }}"
           type="button"
           class="border border-blue-500 bg-blue-500 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
        >
            Novo <i class="fa-solid fa-plus"></i>
        </a>
    </div>

    <div class="max-w-7xl mx-auto overflow-x-auto">
        <div class="inline-block min-w-full py-2 align-middle">
            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-white">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-4 py-3.5 text-lg font-bold text-gray-500 dark:text-gray-400">Título</th>
                            <th scope="col" class="px-4 py-3.5 text-lg font-bold text-gray-500 dark:text-gray-400">Autor</th>
                            <th scope="col" class="px-4 py-3.5 text-lg font-bold text-gray-500 dark:text-gray-400">Publicação</th>
                            <th scope="col" class="px-4 py-3.5 text-lg font-bold text-gray-500 dark:text-gray-400">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-700 bg-gray-900">
                        @foreach($books as $keyBook => $book)
                            <tr>
                                <td class="px-4 text-sm font-normal text-gray-200 whitespace-nowrap">{{ $book->title }}</td>
                                <td class="px-4 text-sm font-normal text-center text-gray-200 whitespace-nowrap">{{ $book->bookAuthor->name }}</td>
                                <td class="px-4 text-sm font-normal text-center text-gray-200 whitespace-nowrap">{{ $book->publication_year }}</td>
                                <td class="px-4 text-sm font-normal md:text-center text-gray-200 whitespace-nowrap">
                                    <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('books.edit', $book->id) }}"
                                            type="button"
                                            class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
                                        >
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <a href="{{ route('books.show', $book->id) }}"
                                            type="button"
                                            class="border border-teal-500 bg-teal-500 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-teal-600 focus:outline-none focus:shadow-outline"
                                        >
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        <button
                                            type="submit"
                                            class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto">
        <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
            <div class="text-sm text-gray-500 dark:text-gray-400">
                Página: <span class="font-medium text-gray-700 dark:text-gray-100">{{ $books->currentPage() }}</span> de
                <span class="font-medium text-gray-700 dark:text-gray-100">{{ $books->lastPage() }} </span>
            </div>

            <div class="flex items-center mt-4 gap-x-4 sm:mt-0 pb-6">
                @if($books->previousPageUrl() > 1)
                    <a href="{{ $books->url(1) }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                        <i class="fa-solid fa-angles-left"></i> <span class="hidden md:block">Primeira página</span>
                    </a>
                    <a href="{{ $books->previousPageUrl() }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                        <i class="fa-solid fa-angle-left"></i> <span class="hidden md:block">Anterior</span>
                    </a>
                @endif

                @if($books->currentPage() < $books->lastPage())
                    <a href="{{ $books->nextPageUrl() }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                        <span class="hidden md:block">Próxima</span><i class="fa-solid fa-angle-right"></i>
                    </a>
                    <a href="{{ $books->url($books->lastPage()) }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                        <span class="hidden md:block">Última página</span><i class="fa-solid fa-angles-right"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
