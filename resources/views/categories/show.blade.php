@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
    <div class="container mx-auto px-5">
        <h1 class="text-2xl font-bold mb-4">Category Details</h1>
        <a href="{{ route('categories.index') }}" class="inline-block mb-4 bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition">
            Back to Categories
        </a>

        <div class="bg-white p-6 rounded shadow-lg border">
            <h2 class="text-xl font-semibold mb-2">Name: {{ $category->name }}</h2>
            <p class="text-gray-600 mb-4">Description: {{ $category->description }}</p>
        </div>
    </div>
@endsection
