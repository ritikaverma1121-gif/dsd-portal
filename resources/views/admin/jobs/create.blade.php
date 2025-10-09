@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-2">Create Job</h1>
    <p class="text-gray-500 mb-6">Fill in the details to post a new job</p>

    <form action="{{ route('admin.jobs.store') }}" method="POST" class="grid grid-cols-2 gap-4">
        @csrf
        <div>
            <label class="block text-gray-700">Job Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="border p-2 rounded w-full">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700">Recruiter</label>
            <select name="user_id" class="border p-2 rounded w-full">
                <option value="">Select Recruiter</option>
                @foreach($recruiters as $recruiter)
                <option value="{{ $recruiter->id }}">{{ $recruiter->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-gray-700">Location</label>
            <input type="text" name="location" class="border p-2 rounded w-full">
        </div>

        <div>
            <label class="block text-gray-700">Job Type</label>
            <select name="job_type" class="border p-2 rounded w-full">
                <option value="full-time">Full-time</option>
                <option value="part-time">Part-time</option>
                <option value="remote">Remote</option>
                <option value="contract">Contract</option>
            </select>
        </div>

        <div class="col-span-2">
            <label class="block text-gray-700">Description</label>
            <textarea name="description" rows="4" class="border p-2 rounded w-full"></textarea>
        </div>

        <div>
            <label class="block text-gray-700">Deadline</label>
            <input type="date" name="deadline" class="border p-2 rounded w-full">
        </div>

        <div>
            <label class="block text-gray-700">Openings</label>
            <input type="number" name="openings" value="1" class="border p-2 rounded w-full">
        </div>

        <div>
            <label class="block text-gray-700">Status</label>
            <select name="status" class="border p-2 rounded w-full">
                <option value="active">Active</option>
                <option value="closed">Closed</option>
            </select>
        </div>

        <div class="col-span-2 mt-4">
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Save Job</button>
            <a href="{{ route('admin.jobs.index') }}" class="ml-2 text-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
