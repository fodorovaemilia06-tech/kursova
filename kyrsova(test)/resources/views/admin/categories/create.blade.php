@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-md">
    <h1 class="text-3xl font-bold mb-6">Create Category</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Name</label>
            <input type="text" name="name" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Description</label>
            <textarea name="description" class="w-full p-2 border rounded"></textarea>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Create</button>
    </form>
</div>
@endsection