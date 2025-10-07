   <script src="https://cdn.tailwindcss.com"></script>

   <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="flex w-full max-w-7xl bg-white rounded-2xl shadow-2xl overflow-hidden">

            <!-- Left Side : Login Form -->
            <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
                
                <!-- Heading -->
                <h2 id="login-heading" class="text-3xl font-bold text-gray-800 mb-6 text-center">
                    Login as Admin
                </h2>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Login Form -->
                <form id="login-form" method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" type="email" name="email"
                            class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#82921b] focus:outline-none"
                            placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" name="password"
                            class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#82921b] focus:outline-none"
                            placeholder="Enter your password" required>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <span class="text-gray-600">Remember me</span>
                        </label>
                        
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[#82921b] hover:underline">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                        class="w-full py-3 bg-[#82921b] text-white font-semibold rounded-lg shadow-md transition">
                        Log in
                    </button>
                </form>

                <!-- Sign up -->
                <div class="mt-6 text-center">
                    <span class="text-gray-600">Don't have an account?</span>
                    <a href="{{ route('register') }}" 
                       class="ml-2 text-[#82921b] hover:underline font-semibold">
                        Sign up
                    </a>
                </div>

                <!-- Role Toggle Buttons -->
                <div class="mt-8 flex justify-center space-x-4">
                    <button id="adminBtn"
                        class="px-4 py-2 bg-[#82921b] text-white rounded-lg shadow  transition">
                        🛠 Admin
                    </button>
                    <button id="recruiterBtn"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg shadow hover:bg-gray-300 transition">
                        👔 Recruiter
                    </button>
                    <button id="candidateBtn"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg shadow hover:bg-gray-300 transition">
                        👤 Candidate
                    </button>
                </div>
            </div>

            <!-- Right Side : Illustration / Info -->
            <div class="hidden md:flex w-1/2 bg-[#fee0b5] items-center justify-center p-10">
                <div class="text-center">
                    <img src="/images/login.png" alt="Illustration" class="mx-auto w-full h-auto">
                    <h3 class="mt-6 text-2xl font-semibold text-gray-800">
                        Make your work easier & organized
                    </h3>
                    <p class="mt-2 text-gray-600">
                        Manage tasks efficiently with our App.
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- Toggle Script -->
    <script>
        const loginHeading = document.getElementById('login-heading');
        const adminBtn = document.getElementById('adminBtn');
        const recruiterBtn = document.getElementById('recruiterBtn');
        const candidateBtn = document.getElementById('candidateBtn');

        function activateButton(activeBtn) {
            [adminBtn, recruiterBtn, candidateBtn].forEach(btn => {
                btn.classList.remove('bg-[#82921b]', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-800');
            });

            activeBtn.classList.add('bg-[#82921b]', 'text-white');
            activeBtn.classList.remove('bg-gray-200', 'text-gray-800');
        }

        adminBtn.addEventListener('click', () => {
            loginHeading.textContent = "Login as Admin";
            activateButton(adminBtn);
        });

        recruiterBtn.addEventListener('click', () => {
            loginHeading.textContent = "Login as Recruiter";
            activateButton(recruiterBtn);
        });

        candidateBtn.addEventListener('click', () => {
            loginHeading.textContent = "Login as Candidate";
            activateButton(candidateBtn);
        });

        // Default active
        activateButton(adminBtn);
    </script>
