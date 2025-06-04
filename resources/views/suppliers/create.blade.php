<x-app-layout>
    <x-slot name="header">
        <h3 class="text-center font-semibold text-gray-800 dark:text-gray-200 ">
            {{ __('Manutenção de fornecedores') }}
        </h3>
    </x-slot>
    <br>
    <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-md shadow">

        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <x-input-error :messages="$error" class="mt-2" />
            @endforeach
        </ul>
        @endif
        <br>

        <form action="{{ url('suppliers/new') }}" method="POST">
            @csrf
            <div>
                <x-input-label for="type" :value="__('Tipo Pessoa')" />
                <div class="flex items-center gap-4">
                    <label class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                        <input
                            type="radio"
                            name="type"
                            value="F"
                            class="border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            {{ old('type') === 'F' ? 'checked' : '' }}>
                        <span class="ml-2">Pessoa Física</span>
                    </label>

                    <label class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                        <input
                            type="radio"
                            name="type"
                            value="J"
                            class="border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            {{ old('type') === 'J' ? 'checked' : '' }}>
                        <span class="ml-2">Pessoa Jurídica</span>
                    </label>
                </div>
            </div>

            <div>
                <x-input-label for="name" :value="__('Nome Razão')" />
                <x-text-input class="w-full" type="text" name="name" />
            </div>

            <div>
                <x-input-label for="name" :value="__('CPF/CNPJ')" />
                <x-text-input class="w-full" type="text" name="cpf_cnpj" />
            </div>

            <div>
                <x-input-label for="name" :value="__('Telefone')" />
                <x-text-input class="w-full" type="text" name="phone" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ url('/suppliers') }}">
                    <x-secondary-button>Voltar</x-secondary-button>
                </a>

                <x-primary-button class="ms-4" type="submit">
                    {{ __('Salvar') }}
                </x-primary-button>
            </div>


        </form>
    </div>
</x-app-layout>