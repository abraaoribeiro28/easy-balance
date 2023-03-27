<x-app-layout>
    <style>
        #search-user:disabled {
            cursor: not-allowed !important;
        }

        #search-user.loading span,
        #search-user svg {
            display: none;
        }

        #search-user.loading svg {
            display: inline;
        }

        main {
            height: 100%;
        }
    </style>
    <x-slot name="header">
        <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
            <div class="absolute inset-0 bg-grid-slate-100" style="background-position: 10px 10px;"></div>
            <div class="relative rounded-xl overflow-auto">

            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-12 py-6 px-4 sm:px-6 lg:px-8 box-">
        <div class="relative sm:rounded-lg">
            <div class="box-alerts">
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
            </div>
            <aside class="p-4 my-3 h-full bg-white border border-gray-200 rounded-lg shadow-md 
                sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form action="{{ route('transfer.store') }}"
                    class="seva-form formkit-form flex flex-col md:flex-row gap-x-8" method="post">
                    @csrf
                    {{-- Destinatário --}}
                    <div class="w-3/6 relative">
                        <h3 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">Destinatário</h3>
                        <div class="inline-flex items-center mb-4">
                            <span class="text-sm font-medium text-gray-900 dark:text-gray-300">
                                Informe qual usuário vai receber a transferência
                            </span>
                        </div>
                        <div data-style="clean" class="flex items-end">
                            <ul class="formkit-alert formkit-alert-error" data-element="errors" data-group="alert">
                            </ul>
                            <div class="flex items-center w-full seva-fields formkit-fields">
                                <div class="relative w-full mr-3 formkit-field">
                                    <label for="value"
                                        class="hidden block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        E-mail do destinatário
                                    </label>
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none 
                                        dark:text-white">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                            </path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                    </div>
                                    <input id="email" class="formkit-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                        focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 
                                        dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                        dark:focus:border-blue-500" name="email" aria-label="E-mail do destinatário"
                                        placeholder="E-mail" type="email">
                                </div>
                                <button type="button" id="search-user"
                                    class="inline-flex items-center px-5 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <span class="inline w-11">Buscar</span>
                                    <svg aria-hidden="true" role="status"
                                        class="inline w-11 h-5 text-white animate-spin" viewBox="0 0 100 101"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="#E5E7EB" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentColor" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div id="dropdown-list-users" class="bg-white rounded-lg shadow w-60 dark:bg-gray-700 absolute z-10 hidden">
                            <span class="text-white block text-center py-2 border-b">Selecione o usuário</span>
                            <ul id="user-list" class="max-h-48 py-2 overflow-y-auto text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownUsersButton">
                                {{-- <li>
                                    <button type="button"
                                        class="flex items-center w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <img class="w-6 h-6 mr-2 rounded-full"
                                            src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                                        Jese Leos
                                    </button>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    {{-- Valor --}}
                    <div class="w-3/6">
                        <h3 class="mb-2 text-xl font-medium text-gray-900 dark:text-white">Valor</h3>
                        <div class="inline-flex items-center mb-4">
                            <span class="text-sm font-medium text-gray-900 dark:text-gray-300">
                                Deseja receber e-mail confirmando sua tranferência?
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
                            <ul class="formkit-alert formkit-alert-error" data-element="errors" data-group="alert">
                            </ul>
                            <div data-element="fields" data-stacked="false"
                                class="flex items-center w-full mb-3 seva-fields formkit-fields">
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
                                        Transferir
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </aside>
        </div>
    </div>
    @section('scripts') <script src="{{asset('assets/js/search-user.js')}}"></script> @endsection
</x-app-layout>