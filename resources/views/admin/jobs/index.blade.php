@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">

    <div class="flex justify-between items-center mb-4">
        <div>
            <h1 class="text-2xl font-bold">Job Management</h1>
            <p class="text-gray-500">Review and approve job postings</p>
        </div>
        <a href="{{ route('admin.jobs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Create Job</a>
    </div>

    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="p-4 border rounded text-center">
            <div class="text-gray-500">Total Jobs</div>
            <div class="text-xl font-bold">{{ \App\Models\Job::count() }}</div>
        </div>
        <div class="p-4 border rounded text-center">
            <div class="text-gray-500">Active Jobs</div>
            <div class="text-xl font-bold">{{ \App\Models\Job::where('status', 'active')->count() }}</div>
        </div>
        <div class="p-4 border rounded text-center">
            <div class="text-gray-500">Closed Jobs</div>
            <div class="text-xl font-bold">{{ \App\Models\Job::where('status', 'closed')->count() }}</div>
        </div>
    </div>

    <form method="GET" action="{{ route('admin.jobs.index') }}" class="flex justify-between items-center mb-4 gap-3">
        <input type="text" name="search" placeholder="Search jobs by title or company..." value="{{ request('search') }}"
            class="border p-2 rounded w-1/2">

        <div class="flex gap-2">
            <select name="status" class="border p-2 rounded" onchange="this.form.submit()">
                <option value="">All Status</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
            <select name="type" class="border p-2 rounded" onchange="this.form.submit()">
                <option value="">All Types</option>
                <option value="full-time" {{ request('type') == 'full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="part-time" {{ request('type') == 'part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="remote" {{ request('type') == 'remote' ? 'selected' : '' }}>Remote</option>
                <option value="contract" {{ request('type') == 'contract' ? 'selected' : '' }}>Contract</option>
            </select>
        </div>
    </form>

    <table class="min-w-full bg-white border rounded">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="py-2 px-4">Job Title</th>
                <th class="py-2 px-4">Recruiter</th>
                <th class="py-2 px-4">Location</th>
                <th class="py-2 px-4">Type</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Deadline</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jobs as $job)
            <tr class="border-b">
                <td class="py-2 px-4 font-semibold">{{ $job->title }}</td>
                <td class="py-2 px-4">{{ $job->recruiter->name ?? 'N/A' }}</td>
                <td class="py-2 px-4">{{ $job->location }}</td>
                <td class="py-2 px-4 capitalize">{{ $job->job_type }}</td>
                <td class="py-2 px-4">
                    <span class="px-2 py-1 rounded {{ $job->status == 'active' ? 'bg-green-500 text-white' : 'bg-gray-400 text-white' }}">
                        {{ ucfirst($job->status) }}
                    </span>
                </td>
                <td class="py-2 px-4">{{ $job->deadline }}</td>
                <td class="py-2 px-4">
                    <a href="{{ route('admin.jobs.edit', $job) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST" class="inline-block">
                        @csrf @method('DELETE')
                        <button class="text-red-500 ml-2" onclick="return confirm('Delete this job?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center text-gray-500 py-4">No jobs found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $jobs->links() }}
    </div>
</div>
@endsection
