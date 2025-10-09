@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Candidate Details</h2>

    <div class="card p-3">
        <p><strong>Name:</strong> {{ $candidate->user->name }}</p>
        <p><strong>Email:</strong> {{ $candidate->user->email }}</p>
        <p><strong>Phone:</strong> {{ $candidate->phone ?? '-' }}</p>
        <p><strong>Experience:</strong> {{ $candidate->experience ?? '-' }} yrs</p>
        <p><strong>Skills:</strong> {{ $candidate->skills ? implode(', ', $candidate->skills) : '-' }}</p>
        <p><strong>Resume:</strong> 
            @if($candidate->resume)
                <a href="{{ Storage::url($candidate->resume) }}" target="_blank">Download</a>
            @else
                -
            @endif
        </p>
    </div>

    <a href="{{ route('admin.candidates.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
