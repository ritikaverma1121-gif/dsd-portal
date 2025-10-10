@extends('layouts.app') {{-- Admin layout --}}

@section('content')
<div class="container mx-auto p-4">

    <div class="flex justify-between items-center mb-4">
        <div>
            <h1 class="text-2xl font-bold">Applications Management</h1>
            <p class="text-gray-500">Review and manage candidate applications</p>
        </div>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="p-4 border rounded text-center bg-white shadow">
            <div class="text-gray-500">Total Applications</div>
            <div class="text-xl font-bold">{{ \App\Models\Application::count() }}</div>
        </div>
        <div class="p-4 border rounded text-center bg-white shadow">
            <div class="text-gray-500">Pending</div>
            <div class="text-xl font-bold">{{ \App\Models\Application::where('status', 'Pending')->count() }}</div>
        </div>
        <div class="p-4 border rounded text-center bg-white shadow">
            <div class="text-gray-500">Shortlisted</div>
            <div class="text-xl font-bold">{{ \App\Models\Application::where('status', 'Shortlisted')->count() }}</div>
        </div>
        <div class="p-4 border rounded text-center bg-white shadow">
            <div class="text-gray-500">Rejected</div>
            <div class="text-xl font-bold">{{ \App\Models\Application::where('status', 'Rejected')->count() }}</div>
        </div>
    </div>

    {{-- Search / Filter --}}
    <form method="GET" action="{{ route('admin.applications.index') }}" class="flex justify-between items-center mb-4 gap-3">
        <input type="text" name="search" placeholder="Search by candidate or job..." value="{{ request('search') }}"
            class="border p-2 rounded w-1/2">

        <div class="flex gap-2">
            <select name="status" class="border p-2 rounded" onchange="this.form.submit()">
                <option value="">All Status</option>
                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Shortlisted" {{ request('status') == 'Shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                <option value="Rejected" {{ request('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
    </form>

    {{-- Applications Table --}}
    <table class="min-w-full bg-white border rounded">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="py-2 px-4">Candidate</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Phone</th>
                <th class="py-2 px-4">Job Title</th>
                <th class="py-2 px-4">Company</th>
                <th class="py-2 px-4">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applications as $app)
            <tr class="border-b">
                <td class="py-2 px-4 font-semibold">{{ $app->candidate->name ?? 'N/A' }}</td>
                <td class="py-2 px-4">{{ $app->candidate->email ?? 'N/A' }}</td>
                <td class="py-2 px-4">{{ $app->candidate->phone_number ?? 'N/A' }}</td>
                <td class="py-2 px-4">{{ $app->job->title ?? 'N/A' }}</td>
                <td class="py-2 px-4">{{ $app->job->recruiter->name ?? 'N/A' }}</td>
                <td class="py-2 px-4">
                    <span class="px-2 py-1 rounded
                        {{ $app->status == 'Pending' ? 'bg-yellow-200 text-yellow-800' : '' }}
                        {{ $app->status == 'Shortlisted' ? 'bg-green-200 text-green-800' : '' }}
                        {{ $app->status == 'Rejected' ? 'bg-red-200 text-red-800' : '' }}">
                        {{ $app->status }}
                    </span>
                </td>
                <td class="py-2 px-4">
                    @if($app->status == 'Pending')
                        <form method="POST" action="{{ route('admin.applications.updateStatus', $app->id) }}" class="inline">
                            @csrf
                            <input type="hidden" name="status" value="Shortlisted">
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Shortlist</button>
                        </form>
                        <form method="POST" action="{{ route('admin.applications.updateStatus', $app->id) }}" class="inline">
                            @csrf
                            <input type="hidden" name="status" value="Rejected">
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Reject</button>
                        </form>
                    @else
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center text-gray-500 py-4">No applications found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
    </div>
</div>
@endsection
