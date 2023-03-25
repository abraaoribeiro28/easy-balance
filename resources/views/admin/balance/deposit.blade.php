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
            <aside
                class="p-4 my-3 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
                <h3 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">Fazer depósito</h3>

                <form action="{{ route('deposit.store') }}" class="seva-form formkit-form" method="post">
                    @csrf
                    <div class="inline-flex items-center mb-4">
                        <span class="text-sm font-medium text-gray-900 dark:text-gray-300">
                            Deseja receber e-mail confirmando seu depósito?
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
                                <label for="member_email"
                                    class="hidden block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Valor do depósito
                                </label>
                                <div
                                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none dark:text-white">
                                    R$
                                </div>
                                <input id="member_email"
                                    class="formkit-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="value" aria-label="Valor do depósito" placeholder="0,00" type="text">
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
                    OBS: os depósitos são fictícios.
                </div>
            </aside>
        </div>
    </div>
</x-app-layout>