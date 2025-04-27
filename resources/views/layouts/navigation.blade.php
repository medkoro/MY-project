<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="text-xl font-bold text-indigo-600">Kids Learning</a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('animals.index') }}" 
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 hover:text-indigo-600">
                        Les Animaux
                    </a>
                    <a href="{{ route('colors.index') }}" 
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 hover:text-indigo-600">
                        Les Couleurs
                    </a>
                    <a href="{{ route('numbers.index') }}" 
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 hover:text-indigo-600">
                        Les Nombres
                    </a>
                    <a href="{{ route('transport.index') }}" 
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 hover:text-indigo-600">
                        Les Transports
                    </a>
                </div>
            </div>

            <!-- Right side -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                @auth
                    <a href="{{ url('/admin') }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Admin
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="ml-4">
                        @csrf
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Déconnexion
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Connexion
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" 
                           class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50">
                            Inscription
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</nav>