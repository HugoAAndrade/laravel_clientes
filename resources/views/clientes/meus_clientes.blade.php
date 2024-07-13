<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Meus clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-left">
                            <tr>
                                <th class="p-2">Nome</th>
                                <th class="p-2">Telefone</th>
                                <th class="p-2">Email</th>
                                <th class="text-center" class="p-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="p-2">{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->telefone }}</td>
                                    <td>{{ $cliente->email }}</td>
                                    <td class="text-center"><a href="{{ route('cliente.show', $cliente->id) }}"><i
                                                class="fa-solid fa-circle-info"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
