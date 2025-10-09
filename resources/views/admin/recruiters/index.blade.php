@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Recruiter Management</h1>
            <p class="text-gray-500">Manage all recruiters and update their status</p>
        </div>
        <div class="flex gap-2 mt-3 md:mt-0">
            <a href="{{ route('admin.recruiters.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                <i class="bi bi-plus-circle mr-1"></i> Add Recruiter
            </a>
            <a href="#" class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                <i class="bi bi-download mr-1"></i> Export Data
            </a>
        </div>
    </div>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="p-4 border rounded text-center">
            <div class="text-gray-500">Total Recruiters</div>
            <div class="text-xl font-bold">{{ \App\Models\Recruiter::count() }}</div>
        </div>
        <div class="p-4 border rounded text-center">
            <div class="text-gray-500">Active Recruiters</div>
            <div class="text-xl font-bold">{{ \App\Models\Recruiter::whereHas('user', fn($q)=>$q->where('status','active'))->count() }}</div>
        </div>
        <div class="p-4 border rounded text-center">
            <div class="text-gray-500">Pending Approval</div>
            <div class="text-xl font-bold">{{ \App\Models\Recruiter::whereHas('user', fn($q)=>$q->where('status','inactive'))->count() }}</div>
        </div>
        <!-- <div class="p-4 border rounded text-center">
            <div class="text-gray-500">Rejected</div>
            <div class="text-xl font-bold">42</div>
        </div> -->
    </div>

    <!-- Search & Filter -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-3">

        <!-- Search Bar -->
        <form method="GET" action="{{ route('admin.recruiters.index') }}" id="filterForm"
            class="flex w-full md:w-2/3 items-center border border-gray-300 rounded-lg overflow-hidden shadow-sm focus-within:ring-2 focus-within:ring-blue-300 bg-white">
            <span class="px-3 text-gray-500">
            <i class="fa fa-search" aria-hidden="true"></i>
            </span>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search recruiter, email, or company..."
                class="flex-1 px-3 py-2 text-sm outline-none" />
        </form>

        <!-- Filter Dropdown -->
        <div class="flex items-center gap-2 w-full md:w-auto">
            <select name="status" form="filterForm"
                class="border border-gray-300 bg-white text-gray-700 text-sm px-3 py-2 rounded-lg shadow-sm hover:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200"
                onchange="document.getElementById('filterForm').submit()">
                <option value="" {{ request('status') == '' ? 'selected' : '' }}>All Status</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>

            <!-- Clear Filters Button -->
            @if(request('search') || request('status'))
            <a href="{{ route('admin.recruiters.index') }}"
                class="bg-gray-200 text-gray-700 text-sm px-3 py-2 rounded-lg hover:bg-gray-300 transition-all duration-200 flex items-center gap-1">
                <i class="bi bi-x-circle"></i> Clear
            </a>
            @endif
        </div>
    </div>


    <!-- Recruiter Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg shadow" id="recruiterTable">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 text-left text-gray-700">#</th>
                    <th class="py-2 px-4 text-left text-gray-700">Recruiter</th>
                    <th class="py-2 px-4 text-left text-gray-700">Email</th>
                    <th class="py-2 px-4 text-left text-gray-700">Company</th>
                    <th class="py-2 px-4 text-left text-gray-700">Designation</th>
                    <th class="py-2 px-4 text-left text-gray-700">Status</th>
                    <th class="py-2 px-4 text-left text-gray-700">Joined</th>
                    <th class="py-2 px-4 text-right text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recruiters as $recruiter)
                <tr id="row-{{ $recruiter->id }}" class="border-b hover:bg-gray-50 transition">
                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4">{{ $recruiter->user->name ?? 'N/A' }}</td>
                    <td class="py-2 px-4">{{ $recruiter->user->email ?? 'N/A' }}</td>
                    <td class="py-2 px-4">{{ $recruiter->company_name }}</td>
                    <td class="py-2 px-4">{{ $recruiter->designation }}</td>
                    <td class="py-2 px-4">
                        <span class="status-badge px-2 py-1 rounded-full text-white text-sm {{ $recruiter->user->status == 'inactive' ? 'bg-red-500' : 'bg-gray-400' }}">
                            {{ ucfirst($recruiter->user->status) }}
                        </span>
                    </td>
                    <td class="py-2 px-4">{{ $recruiter->created_at->format('d M Y') }}</td>
                    <td class="py-2 px-4 text-right flex justify-end gap-2">
                        <button data-id="{{ $recruiter->id }}" data-status="active"
                            class="update-status bg-green-100 text-green-600 px-3 py-1 rounded hover:bg-green-200 transition text-sm">
                            Approve
                        </button>
                        <button data-id="{{ $recruiter->id }}" data-status="inactive"
                            class="update-status bg-yellow-100 text-yellow-600 px-3 py-1 rounded hover:bg-yellow-200 transition text-sm">
                            Reject
                        </button>
                        <button data-id="{{ $recruiter->id }}"
                            class="delete-recruiter bg-red-100 text-red-600 px-3 py-1 rounded hover:bg-red-200 transition text-sm">
                            Delete
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-gray-500 py-4">No recruiters found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $recruiters->links() }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.update-status').forEach(btn => {
    btn.addEventListener('click', function () {
        const id = this.dataset.id;
        const status = this.dataset.status;
        const actionText = status === 'active' ? 'approve' : 'reject';
        const color = status === 'active' ? 'green' : 'orange';

        Swal.fire({
            title: `Are you sure you want to ${actionText} this recruiter?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: `#${color === 'green' ? '22c55e' : 'f97316'}`,
            cancelButtonColor: '#6b7280',
            confirmButtonText: `Yes, ${actionText}!`
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/recruiters/${id}/status`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ status })
                })
                .then(res => res.json())
                .then(data => {
                    // Update status badge dynamically
                    const row = document.querySelector(`#row-${id}`);
                    const badge = row.querySelector('.status-badge');
                    badge.textContent = status === 'active' ? 'Active' : 'Inactive';
                    badge.className = 'status-badge px-2 py-1 rounded-full text-white text-sm ' + (status === 'active' ? 'bg-gray-400' : 'bg-red-500');

                    Swal.fire({
                        icon: 'success',
                        title: `Recruiter ${actionText}d successfully!`,
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
            }
        });
    });
});

// Delete confirmation + remove row dynamically
document.querySelectorAll('.delete-recruiter').forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.dataset.id;
        Swal.fire({
            title: 'Are you sure you want to delete this recruiter?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/admin/recruiters/${id}`, {
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
                            title: 'Recruiter deleted!',
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
