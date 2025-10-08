@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Create Job</h1>
        <p class="text-gray-500">Fill in the details to post a new job</p>
    </div>

    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <!-- Job Title -->
            <div>
                <label class="block text-gray-700">Job Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="border p-2 rounded w-full">
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Company / Recruiter -->
            <div>
                <label class="block text-gray-700">Recruiter</label>
                <select name="user_id" class="border p-2 rounded w-full">
                    <option value="">Select Recruiter</option>
                    @foreach($recruiters as $recruiter)
                        <option value="{{ $recruiter->id }}" {{ old('user_id') == $recruiter->id ? 'selected' : '' }}>
                            {{ $recruiter->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Location -->
            <div>
                <label class="block text-gray-700">Location</label>
                <input type="text" name="location" value="{{ old('location') }}" class="border p-2 rounded w-full">
                @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Job Type -->
            <div>
                <label class="block text-gray-700">Job Type</label>
                <select name="job_type" class="border p-2 rounded w-full">
                    <option value="">Select Type</option>
                    <option value="full-time" {{ old('job_type') == 'full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="part-time" {{ old('job_type') == 'part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="remote" {{ old('job_type') == 'remote' ? 'selected' : '' }}>Remote</option>
                    <option value="contract" {{ old('job_type') == 'contract' ? 'selected' : '' }}>Contract</option>
                </select>
                @error('job_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Status -->
            <div>
                <label class="block text-gray-700">Status</label>
                <select name="status" class="border p-2 rounded w-full">
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
                @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create Job</button>
            <a href="{{ route('jobs.index') }}" class="ml-2 text-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
