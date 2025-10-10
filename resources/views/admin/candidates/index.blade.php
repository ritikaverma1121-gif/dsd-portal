@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">

    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
        <div>
            <h1 class="text-2xl font-bold">Candidates Management</h1>
            <p class="text-gray-500">Review and manage all candidates</p>
        </div>
        <a href="{{ route('admin.candidates.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Add Candidate
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="p-4 border rounded text-center bg-white shadow">
            <div class="text-gray-500">Total Candidates</div>
            <div class="text-xl font-bold">{{ \App\Models\Candidate::count() }}</div>
        </div>
        <div class="p-4 border rounded text-center bg-white shadow">
            <div class="text-gray-500">Pending</div>
            <div class="text-xl font-bold">{{ \App\Models\Candidate::where('status', 'Pending')->count() }}</div>
        </div>
        <div class="p-4 border rounded text-center bg-white shadow">
            <div class="text-gray-500">Shortlisted</div>
            <div class="text-xl font-bold">{{ \App\Models\Candidate::where('status', 'Shortlisted')->count() }}</div>
        </div>
        <div class="p-4 border rounded text-center bg-white shadow">
            <div class="text-gray-500">Rejected</div>
            <div class="text-xl font-bold">{{ \App\Models\Candidate::where('status', 'Rejected')->count() }}</div>
        </div>
    </div>

    <!-- Search -->
    <form method="GET" action="{{ route('admin.candidates.index') }}" class="flex mb-4 gap-3">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, email or skills"
               class="border p-2 rounded w-1/2">
        <select name="status" class="border p-2 rounded" onchange="this.form.submit()">
            <option value="">All Status</option>
            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Shortlisted" {{ request('status') == 'Shortlisted' ? 'selected' : '' }}>Shortlisted</option>
            <option value="Rejected" {{ request('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
        </select>
    </form>

    <!-- Candidates Table -->
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-700">#</th>
                    <th class="px-4 py-2 text-left text-gray-700">Name</th>
                    <th class="px-4 py-2 text-left text-gray-700">Email</th>
                    <th class="px-4 py-2 text-left text-gray-700">Skills</th>
                    <th class="px-4 py-2 text-left text-gray-700">Experience</th>
                    <th class="px-4 py-2 text-left text-gray-700">Resume</th>
                    <th class="px-4 py-2 text-right text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($candidates as $candidate)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $candidate->user->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $candidate->user->email ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $candidate->skills ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $candidate->experience ?? '-' }}</td>
                    <td class="px-4 py-2  gap-2">
                        @if($candidate->resume)
                            <a href="{{ route('admin.candidates.resume', $candidate->id) }}" target="_blank" class="bg-blue-100 text-blue-600 px-2 py-1 rounded hover:bg-blue-200 text-sm">
                                View
                            </a>
                            <a href="{{ route('admin.candidates.resume', $candidate->id) }}?download=true" class="bg-green-100 text-green-600 px-2 py-1 rounded hover:bg-green-200 text-sm">
                                Download
                            </a>
                        @else
                            <span class="text-gray-400 text-sm">N/A</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 text-right flex gap-2">
                        <button data-id="{{ $candidate->id }}" class="delete-candidate bg-red-100 text-red-600 px-3 py-1 rounded hover:bg-red-200 text-sm">
                            Delete
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-gray-500 py-4">No candidates found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $candidates->links() }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.delete-candidate').forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.dataset.id;
        Swal.fire({
            title: 'Are you sure you want to delete this candidate?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/candidates/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                })
                .then(res => {
                    if(res.ok){
                        document.querySelector(`#row-${id}`).remove();
                        Swal.fire({
                            icon: 'success',
                            title: 'Candidate deleted!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    });
});
</script>
@endsection
