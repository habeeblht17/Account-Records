<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="flex flex-col mt-10 mb-5 gap-4 cursor-pointer md:flex-row md:items-center md:justify-between">
    <!-- Loan for Today -->
    <div class="p-7 overflow-hidden h-[170px] bg-white rounded-md shadow-xl hover:shadow-none  dark:bg-gray-800 dark:text-gray-100 md:w-1/3">
        <div class="pl-4 flex space-x-12 items-center justify-center">
            <div class="">
                <h3 class="mb-2 text-2xl font-bold">Total Revenue</h3>
                <div class="flex">
                    <span class="mt-1 mr-1">
                        <x-icon.nairas aria-hidden="true"  />
                    </span>

                    <h1 class="mb-2 text-gray-500 dark:text-gray-100 text-center text-2xl font-bold"> {{ $inflow }} </h1>

                </div>
            </div>
            <div class="bg-blue-600 p-2 rounded-full font-sm w-10 h-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" class="">
                    <path d="M21 19V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2zM9 18H7v-6h2v6zm4 0h-2V7h2v11zm4 0h-2v-8h2v8z">
                    </path>
                </svg>
            </div>
        </div>
    </div>
    <!-- Total Revnue -->
    <div class="p-7 overflow-hidden h-[170px] bg-white rounded-md shadow-xl hover:shadow-none  dark:bg-gray-800 dark:text-gray-100 md:w-1/3">
        <div class="pl-4 flex space-x-12 items-center justify-center">
            <div class="">
                <h3 class="mb-2 text-2xl font-bold">Total Expenditure</h3>
                <div class="flex">
                    <span class="mt-1 mr-1">
                        <x-icon.nairas aria-hidden="true"  />
                    </span>
                    <h1 class="mb-2 text-gray-500 dark:text-gray-100 text-center text-2xl font-bold"> {{ $outflow }} </h1>
                </div>
                <!-- UnpaidLoan
                <div class="mb-2 flex">
                    <small class="text-muted"> Unpaid Loan: </small>
                    <small class="text-muted">
                        <div class="mt-1 ">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="14px" height="14px" viewBox="0 0 496.262 496.262" fill="#909090"
                                xml:space="preserve">
                            <g>
                                <path d="M477.832,274.28h-67.743v-65.106h67.743c10.179,0,18.43-8.243,18.43-18.424c0-10.182-8.251-18.43-18.43-18.43h-67.743
                                    V81.982c0-13.187-2.606-22.866-7.743-28.762c-4.882-5.609-11.301-8.219-20.19-8.219c-8.482,0-14.659,2.592-19.447,8.166
                                    c-5.077,5.902-7.654,15.599-7.654,28.821v90.343H227.627l-54.181-81.988c-4.637-7.317-8.997-14.171-13.231-20.75
                                    c-3.812-5.925-7.53-10.749-11.042-14.351c-3.109-3.189-6.652-5.657-10.796-7.554c-3.91-1.785-8.881-2.681-14.762-2.681
                                    c-7.501,0-14.31,2.055-20.83,6.277c-6.452,4.176-10.912,9.339-13.636,15.785c-2.391,6.126-3.656,15.513-3.656,27.63v77.626h-67.07
                                    C8.246,172.326,0,180.574,0,190.755c0,10.181,8.246,18.424,18.424,18.424h67.07v65.113h-67.07C8.246,274.292,0,282.538,0,292.722
                                    C0,302.9,8.246,311.14,18.424,311.14h67.07v103.143c0,12.797,2.689,22.378,8.015,28.466c5.065,5.805,11.487,8.5,20.208,8.5
                                    c8.414,0,14.786-2.707,20.07-8.523c5.411-5.958,8.148-15.533,8.148-28.442V311.14h115.308l62.399,95.683
                                    c4.339,6.325,8.819,12.709,13.287,18.969c4.031,5.621,8.429,10.574,13.069,14.711c4.179,3.742,8.659,6.484,13.316,8.157
                                    c4.794,1.726,10.397,2.601,16.615,2.601c16.875,0,34.158-5.166,34.158-43.479V311.14h67.743c10.179,0,18.43-8.252,18.43-18.43
                                    C496.262,282.532,488.011,274.28,477.832,274.28z M355.054,209.173v65.106h-60.041l-43.021-65.106H355.054z M141.936,134.364
                                    l24.76,37.956h-24.76V134.364z M141.936,274.28v-65.106h48.802l42.466,65.106H141.936z M355.054,365.153l-35.683-54.013h35.683
                                    V365.153z"/>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            </svg>
                        </div>
                    </small>
                    <span class=" text-xl -mt-1 ml-1 text-gray-500 dark:text-gray-100 text-center font-bold">  </span>
                </div>-->
            </div>

            <div class="bg-blue-600 p-2 rounded-full font-sm w-10 h-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff"><path d="M3 3v17a1 1 0 0 0 1 1h17v-2H5V3H3z">
                    </path><path d="M15.293 14.707a.999.999 0 0 0 1.414 0l5-5-1.414-1.414L16 12.586l-2.293-2.293a.999.999 0 0 0-1.414 0l-5 5 1.414 1.414L13 12.414l2.293 2.293z"></path>
                </svg>
            </div>
        </div>

    </div>
    <!-- Total Expense -->
    <div class="p-7 overflow-hidden h-[170px] bg-white rounded-md shadow-xl hover:shadow-none  dark:bg-gray-800 dark:text-gray-100 md:w-1/3">
        <div class="pl-4 flex space-x-12 items-center justify-center">
            <div class="">
                <h3 class="mb-2 text-2xl font-bold">Overall Total</h3>
                <div class="flex">
                    <span class="mt-1 mr-1">
                        <x-icon.nairas aria-hidden="true"  />
                    </span>
                    <h1 class="mb-2 text-gray-500 dark:text-gray-100 text-center text-2xl font-bold"> {{ $overAllTotal }} </h1>
                </div>
            </div>
            <div class="bg-blue-600 p-2 rounded-full font-sm w-10 h-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff">
                    <path d="M21 19V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2zM9 18H7v-6h2v6zm4 0h-2V7h2v11zm4 0h-2v-8h2v8z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="py-4">
    <div class="max-w-7xl">
        <div class="bg-white overflow-auto lg:rounded p-4 dark:bg-gray-800 dark:text-gray-100">
            <!--Monthly Record -->
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight my-5 dark:text-gray-100">
                    {{ __('Monthly Report') }}
                </h2>
                <table class="w-full rounded bg-violet-50 dark:bg-gray-900">
                    <thead class="w-full bg-blue-600 text-gray-100">
                        <th class="p-3 text-sm text-center font-semibold">Months</th>
                        @foreach ($types as $type)
                            <th class="p-3 text-sm text-center font-semibold">
                                <div class="flex justify-evenly">
                                    {{ $type }} Amount
                                    <div class="mt-1">
                                        <x-icon.naira  class=""/>
                                    </div>
                                </div>
                            </th>
                        @endforeach
                        @foreach ($types as $type)
                            <th class="p-3 text-sm text-center font-semibold"> {{ $type }} Occurrence </th>
                        @endforeach
                    </thead>
                    <tbody class="w-full divide-y divide-gray-300">
                        @foreach ($report as $month => $values)
                            <tr>
                                <td class="p-3 text-sm text-center font-semibold text-gray-400">{{ \Carbon\Carbon::parse($month)->format('F Y') }}</td>
                                @foreach ($types as $type)
                                    <td class="p-3 text-sm text-center font-semibold text-gray-400">{{ $report[$month][$type]['amount'] ?? '0' }}</td>
                                @endforeach
                                @foreach ($types as $type)
                                    <td class="p-3 text-sm text-center font-semibold text-gray-400">{{ $report[$month][$type]['occurrence'] ?? '0' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="py-4">
    <div class="max-w-7xl">
        <div class="bg-white overflow-auto lg:rounded p-4 dark:bg-gray-800 dark:text-gray-100">
            <!--Yearly Record -->
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight my-5 dark:text-gray-100">
                    {{ __('Yearly Report') }}
                </h2>
                <table class="w-full rounded bg-violet-50 dark:bg-gray-900">
                    <thead class="w-full bg-blue-600 text-gray-100">
                        <th class="p-3 text-sm text-center font-semibold">Years</th>
                        @foreach ($types2 as $type)
                            <th class="p-3 text-sm text-center font-semibold">
                                <div class="flex justify-evenly">
                                    {{ $type }} Amount
                                    <div class="mt-1">
                                        <x-icon.naira  class=""/>
                                    </div>
                                </div>
                            </th>
                        @endforeach
                        @foreach ($types2 as $type)
                            <th class="p-3 text-sm text-center font-semibold"> {{ $type }} Occurrence </th>
                        @endforeach
                    </thead>
                    <tbody class="w-full divide-y divide-gray-300">
                        @foreach ($report2 as $year => $values)
                            <tr>
                                <td class="p-3 text-sm text-center font-semibold text-gray-400">{{ ($year) }}</td>
                                @foreach ($types2 as $type)
                                    <td class="p-3 text-sm text-center font-semibold text-gray-400">{{ $report2[$year][$type]['amount'] ?? '0' }}</td>
                                @endforeach
                                @foreach ($types2 as $type)
                                    <td class="p-3 text-sm text-center font-semibold text-gray-400">{{ $report2[$year][$type]['occurrence'] ?? '0' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
