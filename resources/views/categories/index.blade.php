@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="container mx-auto px-5">
<h1 class="text-2xl font-bold mb-4">Categories</h1>
    <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block hover:bg-blue-600 transition">
        Create Category
    </a>

    <div class="space-y-4">
        {{-- @dd($categories); --}}
        @if (count($categories) > 0)
            @foreach ($categories as $category)
                <div class="flex justify-between items-center p-4 bg-white shadow rounded border">
                    <a href="{{ route('categories.show', $category->id) }}" class="text-blue-500 hover:underline">{{ $category->name }}</a>
                    <div class="flex space-x-2">
                        <a href="{{ route('categories.edit', $category->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this data?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="p-4 bg-white shadow rounded border text-gray-600">
                No data available
            </div>
        @endif
    </div>

</div>
    
@endsection
