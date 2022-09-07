<aside class="">
    <!--Sidenav -->
    <div class="absolute py-4 h-[1024px] border-r-2 border-gray-100 inset-y-0
        lg:flex flex-col transition ease-in-out delay-50ms
        lg:opacity-100 lg:relative z-20 w-64 bg-white text-gray-700
        p-3 dark:bg-gray-900 dark:border-gray-800 dark:text-gray-100"
        id="sideBar">

        <!--Sidenav header-->
        <div class="flex justify-between items-center border-b-2 border-blue-500 pb-1">
            <span class="font-bold text-xl sm:text-2xl p-2">Logo</span>
            <!-- Close sidenav -->
            <button class="p-2 focus:outline-3 focus:bg-blue-600 hover:bg-blue-600
                hover:text-white rounded-md lg:hidden"
                onclick="toggleSideBar()">
                <x-icon.cancle />
            </button>
        </div>

        <!-- Sidenav Body -->
        <div class="mt-6">
            <!-- Sidenav link -->
            <div>
                <x-navLink href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-navLink>
                <x-navLink href="{{ route('assets') }}" :active="request()->routeIs('assets')">
                    {{ __('Assets') }}
                </x-navLink>
            </div>

            <!-- Authentication -->
            <div class="my-12 sm:items-center sm:ml-6 lg:hidden w-full">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="relative">
                    <x-dropdown>
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <div class="flex justify-between px-4">
                                    <button type="button" class="">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <div>
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>

                                </div >
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdownLink href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdownLink>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdownLink href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdownLink>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdownLink href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdownLink>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </div>
</aside>

