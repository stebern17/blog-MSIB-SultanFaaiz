@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<div class="container mx-auto px-5">
    <h1 class="text-3xl font-bold mb-6">Posts</h1>
    <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block hover:bg-blue-600 transition">Create Post</a>

    <div class="space-y-4">
        @if (count($posts) > 0)
        @foreach ($posts as $post)
        <div class="flex justify-between items-center bg-white p-4 rounded shadow-md border">
            <div class="flex items-center">
                @if ($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" alt="Post image" class="w-24 h-24 rounded mr-4 object-cover">
                @else
                <img src="https://via.placeholder.com/100" alt="Default Image" class="w-24 h-24 rounded mr-4 object-cover">
                @endif

                <div>
                    <h6 class="text-lg font-semibold">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">{{ $post->title }}</a>
                    </h6>
                    <p class="text-gray-600">
                        in category: {{ $post->category ? $post->category->name : 'Uncategorized' }}
                    </p>
                    <p class="text-gray-600">
                        by {{ $post->author ? $post->author->name : 'Unknown Author' }}
                    </p>
                    <p class="mt-2">
                        Status:
                        <span class="inline-block px-2 py-1 text-xs rounded {{ $post->is_published ? 'bg-green-500 text-white' : 'bg-gray-400 text-white' }}">
                            {{ $post->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </p>
                </div>
            </div>

            <div class="flex items-center space-x-2">
                <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-400 text-white py-1 px-3 rounded hover:bg-yellow-500 transition">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 transition" onclick="return confirm('Are you sure you want to delete this post?');">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
        @else
        <div class="bg-white p-4 rounded shadow-md border">
            <p class="text-gray-600">No data</p>
        </div>
        @endif
    </div>
</div>
@endsection