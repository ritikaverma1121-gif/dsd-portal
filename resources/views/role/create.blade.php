@extends('admin.layout')
@section('content')
<h1>Create Role</h1>
<form action="{{ route('roles.store') }}" method="POST">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" required>
    
    <label>Permissions:</label>
    @foreach($permissions as $permission)
        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"> {{ $permission->name }} <br>
    @endforeach

    <button type="submit">Save</button>
</form>
@endsection
