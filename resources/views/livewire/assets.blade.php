<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:bg-gray-900 dark:text-gray-100">
        {{ __('Finance') }}
    </h2>
</x-slot>


<div class="py-12">

    <!-- Flash Message -->
    @if(session()->has('success'))
        <div class="bg-green-500 text-gray-100 font-normal mx-8 mb-5 py-3 px-12 rounded-md">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 overflow-hidden shadow-xl sm:rounded-lg dark:bg-gray-800 dark:text-gray-100">
            <div class="flex justify-between">
                <x-jet-button wire:click="showAddAsset">
                    {{ __('Add Finance') }}
                </x-jet-button>
            </div>

            <!-- Filter section -->
            <div class="flex justify-between mt-5">
                <div class="flex space-x-2">
                    <!-- Search Box -->
                    <input wire:model="q" type="search" placeholder="search"
                    class="border-blue-400 focus:border-blue-400 focus:ring
                    focus:ring-blue-500 focus:ring-opacity-50 rounded-md shadow-md dark:bg-gray-800">
                    <!-- Bulk Action -->
                    @if ($selectedRows)
                        <div class="inline-flex items-center">
                            <div class="relative inline-flex items-center">
                                <x-dropdown2>
                                    <x-slot name="trigger">
                                        <div class="inline-flex items-center cursor-pointer ">
                                            <div class="block text-gray-500">
                                                {{ __('Bulk Action') }}
                                            </div>

                                            <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdownLink >
                                            <span wire:click="export">{{ __('Export to Excel') }}</span>
                                        </x-dropdownLink>

                                        <div class="border-t border-gray-200"></div>

                                        <x-dropdownLink >
                                            <span wire:click="downloadPdf">{{ __('Export to PDF') }}</span>
                                        </x-dropdownLink>

                                        <div class="border-t border-gray-200"></div>

                                        <x-dropdownLink >
                                            <span wire:click="deleteSelectedRows">{{ __('Delete') }}</span>
                                        </x-dropdownLink>
                                    </x-slot>
                                </x-dropdown2>
                            </div>
                            <span class="ml-2">
                                Selected {{ count($selectedRows) }} {{ Str::plural('asset', count($selectedRows)) }}
                            </span>
                        </div>
                    @endif
                </div>

                <!-- SortBy ModelData -->
                <div class="justify-evenly space-x-2">
                    <div class="relative inline-flex items-center space-x-2">
                        <x-dropdown2>
                            <x-slot name="trigger">
                                <div class="inline-flex items-center cursor-pointer">
                                    <div class="block text-gray-500">
                                        {{ __('SortBy Type') }}
                                    </div>

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdownLink>
                                    <div wire:click="sortBy('type')" class="">{{ __('Type') }}</div>
                                </x-dropdownLink>

                                <div class="border-t border-gray-200"></div>

                                <x-dropdownLink>
                                    <div wire:click="sortBy('amount')">{{ __('Amount') }}</div>
                                </x-dropdownLink>
                            </x-slot>
                        </x-dropdown2>

                        <div class="hidden md:flex flex-col space-y-0">
                            <div>
                                @if ($this->qqq != 'checked')
                                    <x-jet-input type="checkbox" wire:model="qq" /><small>Inflow</small>
                                @endif
                            </div>
                            <div>
                                @if ($this->qq != 'checked')
                                    <x-jet-input type="checkbox" wire:model="qqq" /><small>Outflow</small>
                                @endif
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- Asset Table List -->
            <div>
                <!-- Table -->
                <div class="overflow-auto ">
                    <table class="w-full rounded bg-violet-50 my-5 dark:bg-gray-900">
                        <thead class="w-full bg-blue-600 text-gray-100 px-3">
                            <tr>
                                <th class="hidden md:block p-4 text-sm font-semibold leading-4 text-center tracking-wider ">
                                    <x-jet-input wire:model="selectPageRows" type="checkbox" id=""  />
                                </th>
                                <th class="p-4 text-sm font-semibold leading-4 text-center tracking-wider ">SN</th>
                                <th class="p-4 text-sm font-semibold leading-4 text-center tracking-wider ">
                                    <div class="flex justify-evenly">
                                        <button >Amount</button>
                                        <span class="mt-1">
                                            <x-icon.naira />
                                        </span>
                                    </div>
                                </th>
                                <th class="p-4 text-sm font-semibold leading-4 text-center tracking-wider ">Type</th>
                                <th class="p-4 text-sm font-semibold leading-4 text-center tracking-wider ">Description</th>
                                <th class="hidden md:block p-4 text-sm font-semibold leading-4 text-center tracking-wider ">Action</th>
                            </tr>
                        </thead>
                        <tbody class="w-full divide-y divide-gray-300 text-gray-400">
                            @if ($assets->count())
                                @foreach ($assets as $asset)
                                    <tr>
                                        <td class="hidden md:block p-3 text-sm text-center font-semibold whitespace-no-wrap">
                                            <x-jet-input wire:model="selectedRows" type="checkbox" value="{{ $asset->id }}" id="{{ $asset->id }}" />
                                        </td>
                                        <td class="p-3 text-sm text-center font-semibold whitespace-no-wrap">{{ $asset->id }}</td>
                                        <td class="p-3 text-sm text-center font-semibold whitespace-no-wrap">{{ number_format($asset->amount, 2) }}</td>
                                        <td class="p-3 text-sm text-center font-semibold whitespace-no-wrap">{{ $asset->type }}</td>
                                        <td class="p-3 text-sm text-center font-semibold whitespace-no-wrap">{{ $asset->description }}</td>
                                        <td class="hidden md:block p-3 text-sm text-center font-semibold whitespace-no-wrap">
                                            <x-jet-button wire:click="showUpdateAsset({{ $asset->id }})">
                                                {{ __('Edit') }}
                                            </x-jet-button>
                                            <x-jet-danger-button wire:click="showDeleteAsset({{ $asset->id }})">
                                                {{ __('Delete') }}
                                            </x-jet-danger-button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="p-3 text-sm text-center font-semibold whitespace-no-wrap" colspan="5">
                                        No Record
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="mt-2 ">
                    {{ $assets->links() }}
                </div>
            </div>

            <!-- Modal Form -->
            <!--  Add Asset Form -->
            <x-jet-dialog-modal wire:model="modalFormVisible">
                <x-slot name="title">
                    {{ __('Add Finance') }}
                </x-slot>

                <x-slot name="content">
                    <!-- Amount -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="amount" value="{{ __('Amount') }}" />
                        <x-jet-input id="amount" type="text" class="mt-1 block w-full" wire:model.defer="amount" />
                        <x-jet-input-error for="amount" class="mt-2" />
                    </div>

                    <!-- Type -->
                    <div class="col-span-6 sm:col-span-4 mt-4">
                        <x-jet-label for="type" value="{{ __('Type') }}" />
                        <select id="type" type="text" class="mt-1 block w-full border-gray-300 focus:border-indigo-300
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:border-gray-900 dark:bg-gray-700 dark:text-gray-200"
                            wire:model.defer="type">
                            <option></option>
                            <option>Inflow</option>
                            <option>Outflow</option>
                        </select>
                        <x-jet-input-error for="type" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="col-span-6 sm:col-span-4 mt-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" />
                        <textarea id="description" type="text" cols="3" rows="3" class="mt-1 block w-full border-gray-300
                            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:border-gray-900 dark:bg-gray-700 dark:text-gray-200"
                            wire:model.defer="description" >
                        </textarea>
                        <x-jet-input-error for="description" class="mt-2" />
                    </div>

                    <!-- Status
                    <div class="col-span-6 sm:col-span-4 mt-4">
                        <x-jet-label for="status" value="{{ __('Status') }}" />
                        <x-jet-checkbox id="status" type="checkbox" wire:model="status"/>
                        <span class="ml-2 text-sm text-gray-500">Active</span>
                        <x-jet-input-error for="status" class="mt-2" />
                    </div> -->
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button>
                    @if ($modelId)
                        <x-jet-button class="ml-3" wire:click="update">
                            <span wire:loading.remove wire:target="update">Update</span>
                            <span wire:loading wire:target="update">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px"
                                    viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="animate-spin mr-2">
                                    <circle cx="50" cy="50" fill="none" stroke="#ffffff" stroke-width="10" r="35"
                                        stroke-dasharray="164.93361431346415 56.97787143782138" transform="matrix(1,0,0,1,0,0)">
                                    </circle>
                                </svg>
                            </span>
                        </x-jet-button>
                    @else
                        <x-jet-button class="ml-3" wire:click="save" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="save">Save</span>
                            <span wire:loading wire:target="save">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px"
                                    viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="animate-spin mr-2">
                                    <circle cx="50" cy="50" fill="none" stroke="#ffffff" stroke-width="10" r="35"
                                        stroke-dasharray="164.93361431346415 56.97787143782138" transform="matrix(1,0,0,1,0,0)">
                                    </circle>
                                </svg>
                            </span>
                        </x-jet-button>
                    @endif
                </x-slot>
            </x-jet-dialog-modal>

            <!-- Delete Asset Modal -->
            <x-jet-confirmation-modal wire:model="modalConfirmDeleteVisible">
                <x-slot name="title">
                    {{ __('Delete Confirmation') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you want to delete this Asset Record?
                    Once deleted all the details will be deleted permanently.') }}
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                        {{ __('Delete') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-confirmation-modal>
        </div>
    </div>
</div>
