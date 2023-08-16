<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Autores') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto pt-6 pb-1">
        <div class="bg-gray-800 rounded-lg">
            <div class="px-6 py-4 text-gray-100">
                Pesquisar
            </div>

            <form action="{{ route('authors.index') }}" method="post">
                @csrf
                <div class="flex px-6">
                    <div class="w-full max-auto">
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 sm:w-1/4">
                                <div class="mb-5">
                                    <x-input-label for="name" :value="__('Nome')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$filters['name'] ?? null" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-1/4">
                                <div class="mb-5">
                                    <x-input-label for="zip_code" :value="__('CEP')" />
                                    <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="$filters['zip_code'] ?? null" />
                                    <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-1/4">
                                <div class="mb-5">
                                    <x-input-label for="city" :value="__('Cidade')" />
                                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="$filters['city'] ?? null" />
                                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-1/4">
                                <div class="mb-5">
                                    <x-input-label for="district" :value="__('Bairro')" />
                                    <x-text-input id="district" class="block mt-1 w-full" type="text" name="district" :value="$filters['district'] ?? null" />
                                    <x-input-error :messages="$errors->get('district')" class="mt-2" />
                                </div>
                            </div>

                            <div class="px-1 mb-5">
                                <button
                                    type="submit"
                                    class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                                >Localizar
                                </button>
                            </div>

                            <div class="mb-5">
                                <a href="{{ route('authors.index') }}"
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
        <a href="{{ route('authors.create') }}"
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
                            <th scope="col" class="px-4 py-3.5 text-lg font-bold text-gray-500 dark:text-gray-400">Autor</th>
                            <th scope="col" class="px-4 py-3.5 text-lg font-bold text-gray-500 dark:text-gray-400">CEP</th>
                            <th scope="col" class="px-4 py-3.5 text-lg font-bold text-gray-500 dark:text-gray-400">UF</th>
                            <th scope="col" class="px-4 py-3.5 text-lg font-bold text-gray-500 dark:text-gray-400">Cidade</th>
                            <th scope="col" class="px-4 py-3.5 text-lg font-bold text-gray-500 dark:text-gray-400">Bairro</th>
                            <th scope="col" class="px-4 py-3.5 text-lg font-bold text-gray-500 dark:text-gray-400">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-700 bg-gray-900">
                        @foreach($authors as $keyAuthor => $author)
                            <tr>
                                <td class="px-4 text-sm font-normal text-gray-200 whitespace-nowrap">{{ $author->name }}</td>
                                <td class="px-4 text-sm font-normal text-center text-gray-200 whitespace-nowrap">{{ $author->zip_code }}</td>
                                <td class="px-4 text-sm font-normal text-center text-gray-200 whitespace-nowrap">{{ $author->federative_unity }}</td>
                                <td class="px-4 text-sm font-normal text-center text-gray-200 whitespace-nowrap">{{ $author->city }}</td>
                                <td class="px-4 text-sm font-normal text-center text-gray-200 whitespace-nowrap">{{ $author->district }}</td>
                                <td class="px-4 text-sm font-normal md:text-center text-gray-200 whitespace-nowrap">
                                    <form action="{{ route('authors.destroy', $author->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('authors.edit', $author->id) }}"
                                            type="button"
                                            class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
                                        >
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <a href="{{ route('authors.show', $author->id) }}"
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
                Página: <span class="font-medium text-gray-700 dark:text-gray-100">{{ $authors->currentPage() }}</span> de
                <span class="font-medium text-gray-700 dark:text-gray-100">{{ $authors->lastPage() }} </span>
            </div>

            <div class="flex items-center mt-4 gap-x-4 sm:mt-0 pb-6">
                @if($authors->previousPageUrl() > 1)
                    <a href="{{ $authors->url(1) }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                        <i class="fa-solid fa-angles-left"></i> <span class="hidden md:block">Primeira página</span>
                    </a>
                    <a href="{{ $authors->previousPageUrl() }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                        <i class="fa-solid fa-angle-left"></i> <span class="hidden md:block">Anterior</span>
                    </a>
                @endif

                @if($authors->currentPage() < $authors->lastPage())
                    <a href="{{ $authors->nextPageUrl() }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                        <span class="hidden md:block">Próxima</span><i class="fa-solid fa-angle-right"></i>
                    </a>
                    <a href="{{ $authors->url($authors->lastPage()) }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                        <span class="hidden md:block">Última página</span><i class="fa-solid fa-angles-right"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
