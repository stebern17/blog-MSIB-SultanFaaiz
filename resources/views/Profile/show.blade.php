<!-- resources/views/profile/show.blade.php -->
@extends('layouts.layout')

@section('title', 'Profile')

@section('content')
    <h1>Profile</h1>

    <div>
        <p><strong>First Name:</strong> {{ $profile->first_name }}</p>
        <p><strong>Last Name:</strong> {{ $profile->last_name }}</p>
        <p><strong>Email:</strong> {{ $profile->email }}</p>
        <p><strong>Phone:</strong> {{ $profile->phone }}</p>
        <p><strong>Address:</strong> {{ $profile->address }}</p>
    </div>
@endsection
