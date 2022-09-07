<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

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
