@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h1 class="text-2xl font-bold">Job Management</h1>
            <p class="text-gray-500">Review and approve job postings</p>
        </div>
        <a href="{{ route('jobs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Create Job</a>
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
            <div class="text-gray-500">Pending Approval</div>
            <div class="text-xl font-bold">{{ \App\Models\Job::where('status', 'closed')->count() }}</div>
        </div>
        <div class="p-4 border rounded text-center">
            <div class="text-gray-500">Avg Applications</div>
            <div class="text-xl font-bold">42</div> <!-- example -->
        </div>
    </div>

    <div class="flex justify-between items-center mb-4">
        <input type="text" placeholder="Search jobs by title or company..." class="border p-2 rounded w-1/2">
        <div class="flex gap-2">
            <select class="border p-2 rounded">
                <option value="">All Status</option>
                <option value="active">Active</option>
                <option value="closed">Closed</option>
            </select>
            <select class="border p-2 rounded">
                <option value="">All Types</option>
                <option value="full-time">Full-time</option>
                <option value="part-time">Part-time</option>
                <option value="remote">Remote</option>
                <option value="contract">Contract</option>
            </select>
        </div>
    </div>

    <table class="min-w-full bg-white border rounded">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="py-2 px-4">Job Title</th>
                <th class="py-2 px-4">Company</th>
                <th class="py-2 px-4">Location</th>
                <th class="py-2 px-4">Type</th>
                <th class="py-2 px-4">Applications</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Posted Date</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $job->title }}<br><span class="text-gray-500 text-sm">${{ rand(100,150) }}k - ${{ rand(150,200) }}k</span></td>
                <td class="py-2 px-4">{{ $job->recruiter->name }}</td>
                <td class="py-2 px-4">{{ $job->location }}</td>
                <td class="py-2 px-4 capitalize">{{ $job->job_type }}</td>
                <td class="py-2 px-4">{{ rand(10,100) }}</td>
                <td class="py-2 px-4">
                    <span class="px-2 py-1 rounded {{ $job->status == 'active' ? 'bg-blue-500 text-white' : 'bg-gray-400 text-white' }}">
                        {{ ucfirst($job->status) }}
                    </span>
                </td>
                <td class="py-2 px-4">{{ $job->created_at->format('M d, Y') }}</td>
                <td class="py-2 px-4">
                    <a href="{{ route('jobs.edit', $job) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 ml-2" onclick="return confirm('Delete this job?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $jobs->links() }}
    </div>
</div>
@endsection
