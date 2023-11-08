<nav x-data="{ open: false }">
    <header class="header">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}">
                <img src="image/logo.png" alt="logo">
            </a>
        </div>


        <!-- Navigation Links 
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
        </div>-->

        <!-- Authentication -->
        <div class="lien">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link class="Btn-small" :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Deconnexion') }}
                </x-dropdown-link>
            </form>
            <x-responsive-nav-link class="Btn-small" :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>
        </div>
    </header>
</nav>