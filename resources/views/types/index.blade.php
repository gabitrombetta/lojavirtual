<x-app-layout>
    <x-slot name="header">
        <h3 class="text-center font-semibold text-gray-800 dark:text-gray-200 ">
            {{ __('Manutenção de tipos') }}
        </h3>
    </x-slot>

    <div class="py-4 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Ações principais --}}
            <div class="flex justify-between items-center">
                {{-- Botão Voltar --}}
                <a href="{{ url('/') }}">
                    <x-secondary-button>Voltar</x-secondary-button>
                </a>

                {{-- Botão Adicionar --}}
                <a href="{{ url('/types/new') }}">
                    <x-primary-button>Adicionar</x-primary-button>
                </a>
            </div>

            {{-- Mensagem de sucesso --}}
            @if ($message = Session::get('success'))
            <div class="p-4 bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-100 rounded">
                {{ $message }}
            </div>
            @endif

            {{-- Formulário de busca --}}
            <form action="{{ url('/types') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="search" value="Pesquisar tipo" />
                    <x-text-input id="search" name="search" type="text" value="{{ $filter ?? '' }}" class="mt-1" />
                </div>
                <div class="flex gap-2 self-end">
                    <x-primary-button type="submit">Pesquisar</x-primary-button>
                    <a href="{{ url('/types') }}">
                        <x-secondary-button>Limpar</x-secondary-button>
                    </a>
                </div>
            </form>

            {{-- Tabela de tipos --}}
            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="border-b border-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nome</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tipo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($types as $type)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">{{ $type->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100 space-x-2">
                                <div class="flex gap-3">
                                    <a href="{{ url('/types/update', ['id' => $type->id]) }}">
                                        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700">Editar</x-primary-button>
                                    </a>
                                    <form action="{{ url('types/delete', ['id' => $type->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este tipo? ')">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button>Excluir</x-danger-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>