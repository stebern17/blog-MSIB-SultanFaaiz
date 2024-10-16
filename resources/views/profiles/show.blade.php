@extends('layouts.app')

@section('title', 'Profile Details')

@section('content')
<div class="container mx-auto px-5">
    <h1 class="text-2xl font-bold mb-4">Profile Details</h1>
    <a href="{{ route('profiles.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 transition mb-4">Back to Profiles</a>

    <div class="bg-white p-6 rounded shadow-lg border">
        <h2 class="text-xl font-semibold mb-2">Name: {{ $profile->name }}</h2>
        <p class="text-gray-600 mb-4">Email: {{ $profile->email }}</p>
        <p class="text-gray-600 mb-4">Phone: {{ $profile->phone }}</p>
    </div>
</div>
@endsection