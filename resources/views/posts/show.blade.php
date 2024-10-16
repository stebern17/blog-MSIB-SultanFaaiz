@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
<div class="container mx-auto px-5">
    <h1 class="text-2xl font-bold mb-4">Post Details</h1>
    <a href="{{ route('posts.index') }}" class="inline-block mb-4 bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">
        Back to Posts
    </a>

    <div class="bg-white p-6 rounded shadow-lg border">
        <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
        <p class="text-gray-600 mb-4">{{ $post->content }}</p>
        <p class="text-gray-500 mb-4">
            Category:
            <a href="{{ route('categories.show', $post->category->id) }}" class="text-blue-500 hover:underline">{{ $post->category->name }}</a>
        </p>
        @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="w-full h-auto rounded mb-4">
        @else
        <img src="https://via.placeholder.com/600" alt="Default Image" class="w-full h-auto rounded mb-4">
        @endif
        <p>Status:
            <span class="badge {{ $post->is_published ? 'bg-green-500' : 'bg-gray-500' }}">
                {{ $post->is_published ? 'Published' : 'Draft' }}
            </span>
        </p>
    </div>

    <div class="mt-4">
        <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600 transition">
            Edit
        </a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition ml-2" onclick="return confirm('Are you sure you want to delete this post?');">
                Delete
            </button>
        </form>
    </div>
</div>
@endsection