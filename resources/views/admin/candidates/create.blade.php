@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add Candidate</h1>
        <p class="text-gray-500">Fill in candidate details and upload resume</p>
    </div>

    <form method="POST" action="{{ route('admin.candidates.store') }}" enctype="multipart/form-data" class="bg-white shadow rounded-lg p-6 space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Name -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Name</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('name') }}">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('email') }}">
                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Password (optional)</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none">
                @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Phone</label>
                <input type="text" name="phone" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('phone') }}">
                @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Resume -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Resume (PDF/DOC)</label>
                <input type="file" name="resume" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none">
                @error('resume') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Skills -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Skills (comma separated)</label>
                <input type="text" name="skills" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('skills') }}">
                @error('skills') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Experience -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Experience (years)</label>
                <input type="number" name="experience" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('experience') }}">
                @error('experience') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition font-medium">
                Create Candidate
            </button>
        </div>
    </form>
</div>
@endsection
