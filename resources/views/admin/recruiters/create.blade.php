@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-10">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-4xl">
        <div class="bg-blue-600 text-white rounded-t-2xl px-6 py-4">
            <h2 class="text-xl font-semibold">Add Recruiter</h2>
        </div>
        <div class="p-6">
            <form method="POST" action="{{ route('admin.recruiters.store') }}" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Full Name -->
                    <div class="relative">
                        <input type="text" name="name" id="name" placeholder=" " required
                               class="peer block w-full rounded-lg border border-gray-300 px-3 pt-5 pb-2 text-gray-900 placeholder-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none">
                        <label for="name"
                               class="absolute left-3 top-2.5 text-gray-500 text-sm transition-all peer-placeholder-shown:top-5 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-2.5 peer-focus:text-gray-700 peer-focus:text-sm">
                            Full Name
                        </label>
                    </div>

                    <!-- Email -->
                    <div class="relative">
                        <input type="email" name="email" id="email" placeholder=" " required
                               class="peer block w-full rounded-lg border border-gray-300 px-3 pt-5 pb-2 text-gray-900 placeholder-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none">
                        <label for="email"
                               class="absolute left-3 top-2.5 text-gray-500 text-sm transition-all peer-placeholder-shown:top-5 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-2.5 peer-focus:text-gray-700 peer-focus:text-sm">
                            Email
                        </label>
                    </div>

                    <!-- Phone Number -->
                    <div class="relative">
                        <input type="text" name="phone_number" id="phone_number" placeholder=" "
                               class="peer block w-full rounded-lg border border-gray-300 px-3 pt-5 pb-2 text-gray-900 placeholder-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none">
                        <label for="phone_number"
                               class="absolute left-3 top-2.5 text-gray-500 text-sm transition-all peer-placeholder-shown:top-5 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-2.5 peer-focus:text-gray-700 peer-focus:text-sm">
                            Phone Number
                        </label>
                    </div>

                    <!-- Company Name -->
                    <div class="relative">
                        <input type="text" name="company_name" id="company_name" placeholder=" " required
                               class="peer block w-full rounded-lg border border-gray-300 px-3 pt-5 pb-2 text-gray-900 placeholder-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none">
                        <label for="company_name"
                               class="absolute left-3 top-2.5 text-gray-500 text-sm transition-all peer-placeholder-shown:top-5 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-2.5 peer-focus:text-gray-700 peer-focus:text-sm">
                            Company Name
                        </label>
                    </div>

                    <!-- Designation -->
                    <div class="relative">
                        <input type="text" name="designation" id="designation" placeholder=" "
                               class="peer block w-full rounded-lg border border-gray-300 px-3 pt-5 pb-2 text-gray-900 placeholder-transparent focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none">
                        <label for="designation"
                               class="absolute left-3 top-2.5 text-gray-500 text-sm transition-all peer-placeholder-shown:top-5 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-2.5 peer-focus:text-gray-700 peer-focus:text-sm">
                            Designation
                        </label>
                    </div>

                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-4 mt-4">
                    <button type="submit"
                            class="bg-green-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-700 transition">
                        Save
                    </button>
                    <a href="{{ route('admin.recruiters.index') }}"
                       class="bg-gray-200 text-gray-800 px-6 py-2 rounded-lg shadow-md hover:bg-gray-300 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
