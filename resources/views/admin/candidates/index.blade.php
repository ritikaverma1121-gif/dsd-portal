@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Candidates</h2>

    <a href="{{ route('admin.candidates.create') }}" class="btn btn-primary mb-3">Add Candidate</a>

    <form method="GET" action="{{ route('admin.candidates.index') }}" class="mb-3">
        <input type="text" name="search" placeholder="Search by name/email" value="{{ $search }}" class="form-control" />
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Experience</th>
                <th>Skills</th>
                <th>Resume</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($candidates as $candidate)
                <tr>
                    <td>{{ $job->recruiter->name ?? 'N/A' }}</td>
                    <td>{{ $candidate->user->email }}</td>
                    <td>{{ $candidate->phone }}</td>
                    <td>{{ $candidate->experience ?? '-' }} yrs</td>
                    <td>{{ $candidate->skills ? implode(', ', $candidate->skills) : '-' }}</td>
                    <td>
                        @if($candidate->resume)
                            <a href="{{ Storage::url($candidate->resume) }}" target="_blank">Download</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.candidates.show', $candidate->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.candidates.edit', $candidate->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.candidates.destroy', $candidate->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">No candidates found</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $candidates->links() }}
</div>
@endsection
