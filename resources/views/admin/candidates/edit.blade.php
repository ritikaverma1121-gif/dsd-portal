@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit Candidate</h2>

    <form method="POST" action="{{ route('admin.candidates.update', $candidate->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $candidate->user->name) }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $candidate->user->email) }}">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $candidate->phone) }}">
            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Resume (PDF/DOC)</label>
            <input type="file" name="resume" class="form-control">
            @if($candidate->resume)
                <a href="{{ Storage::url($candidate->resume) }}" target="_blank">Current Resume</a>
            @endif
            @error('resume') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Skills (comma separated)</label>
            <input type="text" name="skills" class="form-control" value="{{ old('skills', $candidate->skills ? implode(',', $candidate->skills) : '') }}">
            @error('skills') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Experience (years)</label>
            <input type="number" name="experience" class="form-control" value="{{ old('experience', $candidate->experience) }}">
            @error('experience') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-success">Update Candidate</button>
    </form>
</div>
@endsection
