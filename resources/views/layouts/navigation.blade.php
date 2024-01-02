 <nav x-data="{ open: false }" class=" bg-c">
      @php
                        $currentUrl = $_SERVER['REQUEST_URI'];
                        $urlParts = parse_url($currentUrl);
                        $path = $urlParts['path'];
                    @endphp
             @php
                    $loggined_user = auth()->user();
                    $loggined_user_email = $loggined_user->email;
                    $profileData = App\Models\Profile::where('email', $loggined_user_email)->first();
                    if(isset($profileData))
                    {
                     $firstLetter = substr($profileData->firstName, 0, 1);
                     $firstLetter = ucfirst($firstLetter);
                    }
                   
                    @endphp
                     @if(isset($profileData))
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
            </div>
           
            <!-- Settings Dropdown -->
            <div class="sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <!-- <div>{{ Auth::user()->name }}</div> -->
                            <!--<img src="" alt="Person" id="profileLogo" class="card__image2">-->
                           
                            <label style="display: inline-block; border-radius: 50%; font-family:Inter; 
                            background-color:white ; color:#717171; padding-top: 6px; padding-bottom: 6px; 
                            font-weight:700; padding-left: 10px; padding-right: 10px; text-align:center; margin: 0px; border:none;" id="profileLogo">{{$firstLetter}}</label>
                            
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                   
                   
                    

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('welcome')" style="text-decoration:none; font-size: 0.875rem; line-height: 1.25rem; padding-top: 0.5rem; padding-bottom: 0.5rem; color: rgb(55 65 81 / var(--tw-text-opacity));">
                                {{ __('Home') }}
                            </x-dropdown-link>
                            @if ($path != "/home")
                            <x-dropdown-link :href="route('home')" >
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                            @endif
                            
                            @if ($path != "/profile")
                            <x-dropdown-link :href="route('show-Profile')" style="text-decoration:none; font-size: 0.875rem; line-height: 1.25rem; padding-top: 0.5rem; padding-bottom: 0.5rem; color: rgb(55 65 81 / var(--tw-text-opacity));">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            @endif
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" style="text-decoration:none; font-size: 0.875rem; line-height: 1.25rem; padding-top: 0.5rem; padding-bottom: 0.5rem; color: rgb(55 65 81 / var(--tw-text-opacity));">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                 
            </div>
        </div>
    </div>
@endif
</nav>