@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add Recruiter</h1>
        <p class="text-gray-500">Fill in recruiter details</p>
    </div>

    <form method="POST" action="{{ route('admin.recruiters.store') }}" class="bg-white shadow rounded-lg p-6 space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Full Name -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Full Name</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('name') }}">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('email') }}">
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Phone Number -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Phone Number</label>
                <input type="text" name="phone_number" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('phone_number') }}">
                @error('phone_number') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Company Name -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Company Name</label>
                <input type="text" name="company_name" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('company_name') }}">
                @error('company_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Designation -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Designation</label>
                <input type="text" name="designation" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('designation') }}">
                @error('designation') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-4 flex justify-center gap-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition font-medium">
                Create Recruiter
            </button>
            <a href="{{ route('admin.recruiters.index') }}" class="bg-gray-200 text-gray-800 px-6 py-2 rounded hover:bg-gray-300 transition font-medium">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
