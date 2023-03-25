<x-app-layout>
    <x-slot name="header">
        <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
            <div class="absolute inset-0 bg-grid-slate-100" style="background-position: 10px 10px;"></div>
            <div class="relative rounded-xl overflow-auto">

            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-12 py-6 px-4 sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto sm:rounded-lg">
            @if($errors->any())
            @foreach ($errors->all() as $error)
            <div id="alert-border-2"
                class="flex p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
                role="alert">
                <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div class="ml-3 text-sm font-medium">
                    {{ $error }}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-border-2" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            @endforeach
            @endisset
            <aside
                class="p-4 my-3 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
                <h3 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">Sacar dinheiro</h3>

                <form action="{{ route('withdraw.store') }}" class="seva-form formkit-form" method="post">
                    @csrf
                    <div class="inline-flex items-center mb-4">
                        <span class="text-sm font-medium text-gray-900 dark:text-gray-300">
                            Deseja receber e-mail confirmando seu saque?
                        </span>
                        <label class="relative cursor-pointer ml-3">
                            <input type="checkbox" value="true" name="sendEmail" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800
                                dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute
                                after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 
                                after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                        </label>
                    </div>

                    <div data-style="clean" class="flex items-end mb-3">
                        <ul class="formkit-alert formkit-alert-error" data-element="errors" data-group="alert"></ul>
                        <div data-element="fields" data-stacked="false"
                            class="flex items-center w-full max-w-md mb-3 seva-fields formkit-fields">
                            <div class="relative w-full mr-3 formkit-field">
                                <label for="value"
                                    class="hidden block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Valor do saque
                                </label>
                                <div
                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none dark:text-white">
                                    R$
                                </div>
                                <input id="value"
                                    class="formkit-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="value" aria-label="Valor do saque" placeholder="0,00" type="text">
                            </div>
                            <button data-element="submit" class="formkit-submit">
                                <span
                                    class="px-5 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg cursor-pointer hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Confirmar
                                </span>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    OBS: os saques são fictícios.
                </div>
            </aside>
        </div>
    </div>
</x-app-layout>