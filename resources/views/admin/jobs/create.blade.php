@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Create Job</h1>
        <p class="text-gray-500">Fill in the details to post a new job</p>
    </div>

    <form action="{{ route('admin.jobs.store') }}" method="POST" class="bg-white shadow rounded-lg p-6 space-y-4 grid grid-cols-1 md:grid-cols-2 gap-4">
        @csrf

        <!-- Job Title -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Job Title</label>
            <input type="text" name="title" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('title') }}">
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Recruiter -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Recruiter</label>
            <select name="user_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none">
                <option value="">Select Recruiter</option>
                @foreach($recruiters as $recruiter)
                    <option value="{{ $recruiter->id }}" {{ old('user_id') == $recruiter->id ? 'selected' : '' }}>
                        {{ $recruiter->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Location -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Location</label>
            <input type="text" name="location" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('location') }}">
            @error('location') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Job Type -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Job Type</label>
            <select name="job_type" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none">
                <option value="full-time" {{ old('job_type') == 'full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="part-time" {{ old('job_type') == 'part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="remote" {{ old('job_type') == 'remote' ? 'selected' : '' }}>Remote</option>
                <option value="contract" {{ old('job_type') == 'contract' ? 'selected' : '' }}>Contract</option>
            </select>
            @error('job_type') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Deadline -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Deadline</label>
            <input type="date" name="deadline" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('deadline') }}">
            @error('deadline') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Openings -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Openings</label>
            <input type="number" name="openings" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none" value="{{ old('openings', 1) }}">
            @error('openings') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Status -->
        <div>
            <label class="block text-gray-700 font-medium mb-1">Status</label>
            <select name="status" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none">
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
            @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Description (full width) -->
        <div class="md:col-span-1">
            <label class="block text-gray-700 font-medium mb-1">Description</label>
            <textarea name="description"  class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-300 focus:outline-none">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Submit -->
        <div class="md:col-span-2 pt-4 flex justify-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition font-medium">
                Submit
            </button>
            <a href="{{ route('admin.jobs.index') }}" class="ml-4 bg-gray-200 text-gray-800 px-6 py-2 rounded hover:bg-gray-100 transition font-medium">Cancel</a>
        </div>
    </form>
</div>
@endsection
