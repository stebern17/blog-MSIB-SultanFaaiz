@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="container mx-auto px-5">
    <h1 class="text-2xl font-bold mb-6">Edit Post</h1>
    <a href="{{ route('posts.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition inline-block mb-4">
        Back to Posts
    </a>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" id="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <select name="category_id" id="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                <option value="">Choose</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
            <select name="author_id" id="author" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                <option value="">Choose Author</option>
                @foreach ($profiles as $profile)
                <option value="{{ $profile->id }}" {{ $profile->id == $post->author_id ? 'selected' : '' }}>{{ $profile->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4 flex items-center">
            <input type="checkbox" name="is_published" id="isPublished" {{ $post->is_published ? 'checked' : '' }} class="mr-2 leading-tight">
            <label for="isPublished" class="text-sm text-gray-700">Publish</label>
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">Update</button>
    </form>
</div>
@endsection