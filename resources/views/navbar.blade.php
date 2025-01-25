<!-- Barre de navigation -->
<nav style="background-color: #266BB2" class="shadow-md mt-0 h-24"> <!-- Changed background color to #266BB2 -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full"> <!-- Added h-full to ensure content fills the height -->
        <div class="flex justify-between h-full items-center"> <!-- Added items-center to vertically center content -->
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard.index') }}">
                    <img src="{{ asset('image.png') }}" alt="Logo" class="h-20 w-auto"> <!-- Increased height to h-20 -->
                </a>
            </div>

            <!-- Menu Bureau -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('dashboard.index') }}" class="text-white hover:text-blue-200">Tableau de bord</a> <!-- Changed text color to white -->
                <a href="{{ route('clients.index') }}" class="text-white hover:text-blue-200">Clients</a> <!-- Changed text color to white -->
                <a href="{{ route('products.index') }}" class="text-white hover:text-blue-200">Produits</a> <!-- Changed text color to white -->
                <a href="{{ route('categories.index') }}" class="text-white hover:text-blue-200">Catégories</a> <!-- Added Categories link -->
                <a href="{{ route('invoices.index') }}" class="text-white hover:text-blue-200">Factures</a> <!-- Changed text color to white -->

                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:text-blue-200 focus:outline-none"> <!-- Changed text color to white -->
                        Déconnexion
                    </button>
                </form>
            </div>

            <!-- Bouton Menu Mobile -->
            <div class="flex items-center md:hidden">
                <button id="mobile-menu-button" class="text-white hover:text-blue-200 focus:outline-none"> <!-- Changed text color to white -->
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div id="mobile-menu" class="hidden md:hidden bg-[#266BB2]"> <!-- Changed background color to #266BB2 -->
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('dashboard.index') }}" class="block text-white hover:text-blue-200">Tableau de bord</a> <!-- Changed text color to white -->
            <a href="{{ route('clients.index') }}" class="block text-white hover:text-blue-200">Clients</a> <!-- Changed text color to white -->
            <a href="{{ route('products.index') }}" class="block text-white hover:text-blue-200">Produits</a> <!-- Changed text color to white -->
            <a href="{{ route('categories.index') }}" class="block text-white hover:text-blue-200">Catégories</a> <!-- Added Categories link -->
            <a href="{{ route('invoices.index') }}" class="block text-white hover:text-blue-200">Factures</a> <!-- Changed text color to white -->

            <!-- Logout Button for Mobile -->
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="block text-white hover:text-blue-200 focus:outline-none"> <!-- Changed text color to white -->
                    Déconnexion
                </button>
            </form>
        </div>
    </div>
</nav>