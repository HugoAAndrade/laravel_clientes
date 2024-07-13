<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edição de cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4">Olá <strong>{{ Auth::user()->name }}</strong></p>

                    @can('level')
                        <p class="mb-4 p-6">
                            <a href="{{ route('cliente.index') }}" class="bg-blue-500 text-white rounded p-2">Lista de
                                clientes</a>
                        </p>
                    @endcan

                    <p class="mb-4 p-6">
                        <a href="{{ route('meus.clientes', Auth::user()->id) }}"
                            class="bg-blue-500 text-white rounded p-2">Meus clientes</a>
                    </p>

                    @if (@session('msg'))
                        <p class="bg-green-500 p-2 rounded text-center text-white mb-4">{{ session('msg') }}</p>
                    @endif

                    <p class="mb-4">Editando dados do cliente {{ $cliente->nome }}</p>

                    <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <fieldset class="border-2 dark:border-gray-700 rounded p-6">
                            <legend class="px-2">Preencha todos os campos</legend>
                            <input class="text-black" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded overflow-hidden mb-4">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" value="{{ $cliente->nome }}"
                                    class="w-full rounded text-black" required autofocus>
                            </div>
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded overflow-hidden mb-4">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email" value="{{ $cliente->email }}"
                                    class="w-full rounded text-black" requiredd>
                            </div>
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded overflow-hidden mb-4">
                                <label for="telefone">Telefone</label>
                                <input type="tel" name="telefone" id="telefone" value="{{ $cliente->telefone }}"
                                    class="w-full rounded text-black" requiredd>
                            </div>
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded overflow-hidden mb-4">
                                <label for="empresa">Empresa</label>
                                <input type="text" name="empresa" id="empresa" value="{{ $cliente->empresa }}"
                                    class="w-full rounded text-black" requiredd>
                            </div>
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded overflow-hidden mb-4">
                                <label for="tel_comercial">Telefone Comercial</label>
                                <input type="tel" name="tel_comercial" id="tel_comercial"
                                    value="{{ $cliente->tel_comercial }}" class="w-full rounded text-black" requiredd>
                            </div>
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded overflow-hidden">
                                <input type="submit" value="Salvar alterações"
                                    class="bg-blue-500 text-white rounded p-2 cursor-pointer">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
