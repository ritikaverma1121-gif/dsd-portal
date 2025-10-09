@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Add Candidate</h2>

    <form method="POST" action="{{ route('admin.candidates.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Resume (PDF/DOC)</label>
            <input type="file" name="resume" class="form-control">
            @error('resume') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Skills (comma separated)</label>
            <input type="text" name="skills" class="form-control" value="{{ old('skills') }}">
            @error('skills') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Experience (years)</label>
            <input type="number" name="experience" class="form-control" value="{{ old('experience') }}">
            @error('experience') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-success">Create Candidate</button>
    </form>
</div>
@endsection
