<header class="text-gray-200 shadow px-6 py-4 flex items-center justify-between bg-white">
    <!-- Left: Logo -->
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.png') }}" alt="Admin Portal Logo" class="h-10 w-10">
        <span class="text-xl font-bold text-[#82921b]">Admin Portal</span>
    </div>

    <!-- Center: Search -->
    <div class="flex mx-6 w-64">
        <input type="text" placeholder="Search anything..."
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#82921b] focus:outline-none">
    </div>

    <!-- Right: Notifications and User -->
    <div class="flex items-center space-x-4">
        <!-- Notification Bell -->
        <button class="relative focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <!-- Notification dot -->
            <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-[#82921b] rounded-full"></span>
        </button>

        <!-- Dynamic User Info -->
        <div class="flex items-center space-x-3">
            <div class="text-right">
                <p class="text-sm font-medium text-black">
                    {{ Auth::user()->name }}
                </p>
                <p class="text-xs text-[#82921b]">
                    {{ Auth::user()->email }}
                </p>
            </div>
            <div class="h-10 w-10 bg-[#82921b] rounded-full flex items-center justify-center font-bold text-white">
                {{ strtoupper(substr(Auth::user()->name,0,2)) }}
            </div>
        </div>
    </div>
</header>
