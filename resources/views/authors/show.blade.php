<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Informações do autor') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto pt-6 pb-1">
        <div class="bg-gray-800 rounded-lg">
            <div class="flex px-6 py-4">
                <div class="w-full max-auto">
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-2/4">
                            <div class="mb-5">
                                <x-input-label for="name" :value="__('Nome')" />
                                <x-text-input disabled id="name" class="block mt-1 w-full" type="text" name="name" :value="$author->name" />
                            </div>
                        </div>

                        <div class="w-full px-3 sm:w-2/4">
                            <div class="mb-5">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input disabled id="email" class="block mt-1 w-full" type="text" name="email" :value="$author->email" />
                            </div>
                        </div>

                        <div class="w-full px-3 sm:w-1/6">
                            <div class="mb-5">
                                <x-input-label for="zip_code" :value="__('CEP')" />
                                <x-text-input disabled id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="$author->zip_code" />
                            </div>
                        </div>

                        <div class="w-full px-3 sm:w-1/6">
                            <div class="mb-5">
                                <x-input-label for="federative_unity" :value="__('UF')" />
                                <x-text-input disabled id="federative_unity" class="block mt-1 w-full" type="text" name="federative_unity" :value="$author->federative_unity" />
                            </div>
                        </div>

                        <div class="w-full px-3 sm:w-2/6">
                            <div class="mb-5">
                                <x-input-label for="city" :value="__('Cidade')" />
                                <x-text-input disabled id="city" class="block mt-1 w-full" type="text" name="city" :value="$author->city" />
                            </div>
                        </div>

                        <div class="w-full px-3 sm:w-2/6">
                            <div class="mb-5">
                                <x-input-label for="district" :value="__('Bairro')" />
                                <x-text-input disabled id="district" class="block mt-1 w-full" type="text" name="district" :value="$author->district" />
                            </div>
                        </div>

                        <div class="w-full px-3 sm:w-5/6">
                            <div class="mb-5">
                                <x-input-label for="address" :value="__('Endereço')" />
                                <x-text-input disabled id="address" class="block mt-1 w-full" type="text" name="address" :value="$author->address" />
                            </div>
                        </div>

                        <div class="w-full px-3 sm:w-1/6">
                            <div class="mb-5">
                                <x-input-label for="address_number" :value="__('Nº')" />
                                <x-text-input disabled id="address_number" class="block mt-1 w-full" type="text" name="address_number" :value="$author->address_number" />
                            </div>
                        </div>

                        <div class="w-full px-3 sm:w-6/6">
                            <div class="mb-5">
                                <x-input-label for="address_complement" :value="__('Complemento')" />
                                <x-text-input disabled id="address_complement" class="block mt-1 w-full" type="text" name="address_complement" :value="$author->address_complement" />
                            </div>
                        </div>

                        <div class="mb-5">
                            <a href="{{ route('authors.index') }}"
                               type="button"
                               class="border border-grey-500 bg-grey-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline"
                            >Voltar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
