<aside class=" w-64 bg-white text-black flex flex-col justify-between shadow">
    <!-- Middle: Menu -->
    <nav class="flex-1 p-4 space-y-2">

        @php
            $currentRoute = Route::currentRouteName();
        @endphp

        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
           class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition
           {{ $currentRoute === 'dashboard' ? 'bg-[#82921b] text-white' : ''}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            Dashboard
        </a>

        <!-- Recruiters -->
        <a href="{{ route('admin.recruiters.index') }}"
           class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition
           {{ $currentRoute === 'admin.recruiters.index' ? 'bg-[#82921b] text-white' : '' }}">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-user-plus"></i>
                <span>Recruiters</span>
            </div>
        </a>

        <!-- Roles -->
        <a href="{{ route('roles.index') }}"
           class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition
           {{ $currentRoute === 'roles.index' ? 'bg-[#82921b] text-white' : '' }}">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-user-shield"></i>
                <span>Roles</span>
            </div>
        </a>

        <!-- Candidates -->
        <a href="{{ route('admin.candidates.index') }}"
           class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition
           {{ $currentRoute === 'admin.candidates.index' ? 'bg-[#82921b] text-white' : '' }}">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-users"></i>
                <span>Candidates</span>
            </div>
        </a>

        <!-- Jobs -->
        <a href="{{ route('admin.jobs.index') }}"
           class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition
           {{ $currentRoute === 'admin.jobs.index' ? 'bg-[#82921b] text-white' : '' }}">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-briefcase"></i>
                <span>Jobs</span>
            </div>
        </a>

        <!-- Applications -->
        <a href="{{ route('admin.applications.index') }}"
           class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition
           {{ $currentRoute === 'admin.applications.index' ? 'bg-[#82921b] text-white' : '' }}">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-star"></i>
                <span>Applications</span>
            </div>
        </a>

        <!-- Reports -->
        <a href="{{ route('admin.reports.index') }}"
           class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition
           {{ $currentRoute === 'admin.reports.index' ? 'bg-[#82921b] text-white' : '' }}">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-chart-simple"></i>
                <span>Reports</span>
            </div>
        </a>

        <!-- Settings -->
        <a href="#"
           class="flex items-center px-3 py-2 rounded-lg hover:bg-gray-200 transition">
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-gear"></i>
                <span>Settings</span>
            </div>
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="flex items-center gap-2 px-3 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600 w-full mt-4">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </form>

    </nav>
</aside>
