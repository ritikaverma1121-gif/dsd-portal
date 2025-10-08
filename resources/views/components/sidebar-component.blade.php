
   <aside class="h-100vh w-64 bg-white text-black flex flex-col justify-between">
    <!-- Middle: Menu -->
    <nav class=" flex-1 p-4 space-y-2">
        <a href="#"
           class="flex items-center text-white px-3 py-2 rounded-lg bg-[#82921b]  transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            Dashboard
        </a>
        <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition justify-between">
            <div class="flex items-center gap-4">
               <i class="fa-solid fa-user-plus"></i>
                <span class=""></span>Recruiters
            </div>
            <span class="bg-white/30 px-2 py-0.5 rounded-full text-xs font-semibold">2</span>
        </a>
        <a href="{{ route('roles.index') }}" class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition justify-between">
            <div class="flex items-center gap-4">
               <i class="fa-solid fa-user-plus"></i>
                <span class=""></span>Roles
            </div>
        </a>
        <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition">
                        <div class="flex items-center gap-8">
                            <i class="fa-solid fa-users"></i>
                            Candidates
                        </div>
        </a>
        <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition">
                    <div class="flex items-center gap-8">
                        <i class="fa-solid fa-briefcase"></i>
                            Jobs
                    </div>
        </a>
        <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition">
                                <div class="flex items-center gap-8">
                                    <i class="fa-solid fa-star"></i>
                                    Applications
                                </div>
        </a>
        <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition">
                                <div class="flex items-center gap-8">
                                    <i class="fa-solid fa-money-bills"></i>
                                    Subscriptions
                                </div>
        </a>
        <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition">
            <div class="flex items-center gap-8">
                <i class="fa-solid fa-chart-simple"></i>
                Reports
            </div>
        </a>
        <a href="#" class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition">
                        <div class="flex items-center gap-8">
                            <i class="fa-solid fa-gear"></i>
                            Settings
                        </div>
        </a>
    </nav>

   <!-- Logout Button (fixed at bottom) -->
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit"
        class="flex items-center gap-2 px-4 py-2 rounded-lg bg-red-500 text-white font-medium 
               hover:bg-red-600 focus:ring-2 focus:ring-red-400 transition-all shadow-sm">
        <!-- Logout Icon -->
        <svg xmlns="http://www.w3.org/2000/svg"class="h-5 w-5"fill="none"viewBox="0 0 24 24"stroke="currentColor"stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
        </svg>
        <span>Logout</span>
    </button>
</form>

</aside>

