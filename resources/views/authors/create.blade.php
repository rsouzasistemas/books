<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Novo autor') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto pt-6 pb-1">
        <div class="bg-gray-800 rounded-lg">
            <form action="{{ route('authors.store') }}" method="post">
                @csrf
                <div class="flex px-6 py-4">
                    <div class="w-full max-auto">
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 sm:w-2/4">
                                <div class="mb-5">
                                    <x-input-label for="name" :value="__('Nome')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-2/4">
                                <div class="mb-5">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-1/6">
                                <div class="mb-5">
                                    <x-input-label for="zip_code" :value="__('CEP')" />
                                    <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="old('zip_code')" />
                                    <x-input-error :messages="$errors->get('zip_code')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-1/6">
                                <div class="mb-5">
                                    <x-input-label for="federative_unity" :value="__('UF')" />
                                    <x-text-input id="federative_unity" class="block mt-1 w-full" type="text" name="federative_unity" :value="old('federative_unity')" />
                                    <x-input-error :messages="$errors->get('federative_unity')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-2/6">
                                <div class="mb-5">
                                    <x-input-label for="city" :value="__('Cidade')" />
                                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" />
                                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-2/6">
                                <div class="mb-5">
                                    <x-input-label for="district" :value="__('Bairro')" />
                                    <x-text-input id="district" class="block mt-1 w-full" type="text" name="district" :value="old('district')" />
                                    <x-input-error :messages="$errors->get('district')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-5/6">
                                <div class="mb-5">
                                    <x-input-label for="address" :value="__('Endereço')" />
                                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-1/6">
                                <div class="mb-5">
                                    <x-input-label for="address_number" :value="__('Nº')" />
                                    <x-text-input id="address_number" class="block mt-1 w-full" type="text" name="address_number" :value="old('address_number')" />
                                    <x-input-error :messages="$errors->get('address_number')" class="mt-2" />
                                </div>
                            </div>

                            <div class="w-full px-3 sm:w-6/6">
                                <div class="mb-5">
                                    <x-input-label for="address_complement" :value="__('Complemento')" />
                                    <x-text-input id="address_complement" class="block mt-1 w-full" type="text" name="address_complement" :value="old('address_complement')" />
                                    <x-input-error :messages="$errors->get('address_complement')" class="mt-2" />
                                </div>
                            </div>

                            <div class="px-1 mb-5">
                                <button
                                    type="submit"
                                    class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                                >Gravar
                                </button>
                            </div>

                            <div class="mb-5">
                                <a href="{{ route('authors.index') }}"
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
