<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="flex w-full max-w-7xl bg-white rounded-2xl shadow-2xl overflow-hidden">

        <!-- Left Side : Registration Form -->
        <div class="w-full md:w-1/2 p-10 flex flex-col justify-center">
            
            <!-- Heading -->
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">
                Create an Account
            </h2>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#82921b] focus:outline-none">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#82921b] focus:outline-none">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#82921b] focus:outline-none">
                        <option value="">-- Select Role --</option>
                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Recruiter" {{ old('role') == 'Recruiter' ? 'selected' : '' }}>Recruiter</option>
                        <option value="Candidate" {{ old('role') == 'Candidate' ? 'selected' : '' }}>Candidate</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="relative">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#82921b] focus:outline-none pr-10">
                    
                    <!-- Eye toggle button -->
                    <button type="button" id="togglePassword"
                        class="absolute right-2 top-9 text-gray-400 hover:text-gray-600 focus:outline-none">
                        👁️
                    </button>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#82921b] focus:outline-none">
                        <!-- Eye toggle button -->
                    <button type="button" id="confirmtogglePassword"
                        class="absolute right-2 top-9 text-gray-400 hover:text-gray-600 focus:outline-none">
                        👁️
                    </button>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Register Button -->
                <button type="submit"
                    class="w-full py-3 bg-[#82921b] text-white font-semibold rounded-lg shadow-md transition">
                    Register
                </button>
            </form>

            <!-- Already Registered -->
            <div class="mt-6 text-center">
                <span class="text-gray-600">Already have an account?</span>
                <a href="{{ route('login') }}" class="ml-2 text-[#82921b] hover:underline font-semibold">
                    Log in
                </a>
            </div>
        </div>

        <!-- Right Side : Illustration / Info -->
        <div class="hidden md:flex w-1/2 bg-[#fee0b5] items-center justify-center p-10">
            <div class="text-center">
                <img src="/images/register.png" alt="Illustration" class="mx-auto w-full h-auto">
                <h3 class="mt-6 text-2xl font-semibold text-gray-800">
                    Join us and get started!
                </h3>
                <p class="mt-2 text-gray-600">
                    Register now to explore all the features of our platform.
                </p>
            </div>
        </div>
    </div>
</div>
<script>
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');

    togglePassword.addEventListener('click', () => {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Optionally change the icon
        togglePassword.textContent = type === 'password' ? '👁️' : '🙈';
    });
</script>
<script>
    const passwordInput = document.getElementById('password_confirmation');
    const togglePassword = document.getElementById('confirmtogglePassword');

    togglePassword.addEventListener('click', () => {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Optionally change the icon
        togglePassword.textContent = type === 'password' ? '👁️' : '🙈';
    });
</script>