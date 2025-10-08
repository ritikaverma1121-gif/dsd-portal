@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white shadow p-6 rounded">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Role: {{ $role->name }}</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc ml-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium text-sm text-gray-700 mb-1">Role Name</label>
            <input type="text" name="name" id="name" value="{{ $role->name }}" required
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700 mb-2">Permissions</label>
            <div class="grid grid-cols-2 gap-2">
                @foreach($permissions as $permission)
                    <label class="flex items-center">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                            class="mr-2 text-indigo-600 focus:ring-indigo-500">
                        {{ ucfirst($permission->name) }}
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit"
            class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">Update Role</button>
    </form>
</div>
@endsection
