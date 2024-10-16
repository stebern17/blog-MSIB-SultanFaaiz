@extends('layouts.app')

@section('title', 'Profiles')

@section('content')
<div class="container mx-auto px-5">
    <h1 class="text-2xl font-bold mb-4">Profiles</h1>
    <a href="{{ route('profiles.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded mb-4 inline-block hover:bg-blue-600 transition">
        Create Profile
    </a>

    <div class="overflow-hidden shadow sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($profiles as $profile)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $profile->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $profile->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $profile->phone }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('profiles.show', $profile->id) }}" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600 transition">View</a>
                        <a href="{{ route('profiles.edit', $profile->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 transition">Edit</a>
                        <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 transition">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection