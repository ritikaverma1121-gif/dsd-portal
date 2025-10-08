@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10 p-6 bg-white shadow rounded-lg">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">All Roles</h2>
        <a href="{{ route('roles.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            + Create Role
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="py-3 px-4 border-b">#</th>
                    <th class="py-3 px-4 border-b">Role Name</th>
                    <th class="py-3 px-4 border-b">Permissions</th>
                    <th class="py-3 px-4 border-b text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $index => $role)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b">{{ $index + 1 }}</td>
                        <td class="py-3 px-4 border-b font-medium text-gray-800">{{ ucfirst($role->name) }}</td>
                        <td class="py-3 px-4 border-b">
                            @if ($role->permissions->isNotEmpty())
                                <div class="flex flex-wrap gap-2">
                                    @foreach($role->permissions as $permission)
                                        <span class="inline-block bg-indigo-100 text-indigo-700 text-xs px-2 py-1 rounded">
                                            {{ $permission->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-gray-500 text-sm">No permissions assigned</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 border-b text-right">
                            <a href="{{ route('roles.edit', $role->id) }}"
                               class="inline-block text-sm text-indigo-600 hover:text-indigo-800 mr-4">
                                Edit
                            </a>
                            {{-- Optionally add delete button here if needed --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-4 px-4 text-center text-gray-500">No roles found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
