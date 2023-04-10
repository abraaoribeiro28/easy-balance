<x-app-layout>
    <x-slot name="header">
        <x-alerts />
        <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
            <div class="absolute inset-0 bg-grid-slate-100" style="background-position: 10px 10px;"></div>
            <div class="relative rounded-xl overflow-auto">
                <div class="grid grid-cols-3 gap-4 text-white font-bold leading-6">
                    <x-card title="Entradas" money="{{ $inputs }}"
                        icon="M12,24A12,12,0,1,0,0,12,12.013,12.013,0,0,0,12,24ZM6.293,9.465,9.879,5.879h0a3,3,0,0,1,4.243,0l3.585,3.586.024.025a1,1,0,1,1-1.438,1.389L13,7.586,13.007,18a1,1,0,0,1-2,0L11,7.587,7.707,10.879A1,1,0,1,1,6.293,9.465Z" />
                    <x-card title="Saídas" money="{{ $exits }}"
                        icon="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm5.707,14.535-3.586,3.586h0a3,3,0,0,1-4.243,0L6.293,14.535l-.024-.025a1,1,0,1,1,1.438-1.389L11,16.414,10.993,6a1,1,0,0,1,2,0L13,16.413l3.293-3.292a1,1,0,1,1,1.414,1.414Z" />
                    <x-card title="Saldo Atual" money="{{$amount}}"
                        icon="M18.5,9.5A1.5,1.5,0,0,0,20,8V7.313A5.32,5.32,0,0,0,14.687,2H13.5V1.5a1.5,1.5,0,0,0-3,0V2H9.313A5.313,5.313,0,0,0,7.772,12.4l2.728.746V19H9.313A2.316,2.316,0,0,1,7,16.687V16a1.5,1.5,0,0,0-3,0v.687A5.32,5.32,0,0,0,9.313,22H10.5v.5a1.5,1.5,0,0,0,3,0V22h1.187a5.313,5.313,0,0,0,1.541-10.4L13.5,10.856V5h1.187A2.316,2.316,0,0,1,17,7.313V8A1.5,1.5,0,0,0,18.5,9.5Zm-3.118,4.979a2.314,2.314,0,0,1-.7,4.521H13.5V13.965ZM10.5,10.035,8.618,9.521A2.314,2.314,0,0,1,9.313,5H10.5Z" />
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-12 py-6 px-4 sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <form class="mb-6">
                <label for="search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                            </path>
                        </svg>
                    </div>
                    <input type="search" id="search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Pesquisar transação" required>
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Enviar
                    </button>
                </div>
            </form>

            <div style="max-height: 500px; overflow: auto;">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID - Transação
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Valor
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Destinatário
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <style>
                            .type-I{
                                color: rgb(74 222 128) !important;
                            }
                            .type-O, .type-T{
                                color: rgb(248 113 113) !important;
                            }
                        </style>
                        @forelse ($historics as $historic)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Transação #{{ $historic->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $historic->date }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $historic->type($historic->type) }}
                                </td>
                                <td class="px-6 py-4 type-{{ $historic->type}}">
                                    R$ {{ number_format($historic->amount, 2, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $historic->user_id_transaction ? $historic->userReceiver->name : '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" colspan="5" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                    você ainda não realizou nenhuma transação
                                </th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>