<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Blog MSIB')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body class="bg-gray-100">
    <header>
        <nav class="bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between">
                    <ul class="flex space-x-4 text-white">
                        <li>
                            <a href="/" class="hover:text-gray-400">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('categories.index') }}" class="hover:text-gray-400">Category</a>
                        </li>
                        <li>
                            <a href="{{ route('posts.index') }}" class="hover:text-gray-400">Post</a>
                        </li>
                        <li>
                            <a href="{{ route('profile.show', ['id' => 1]) }}" class="hover:text-gray-400">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mx-auto mt-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <button type="button" onclick="this.parentElement.style.display='none';" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 14.849a1 1 0 001.415 0l.086-.086a1 1 0 000-1.415L10.414 10l4.435-4.435a1 1 0 00-1.415-1.415L9 8.586l-4.435-4.435a1 1 0 00-1.415 1.415L7.586 10l-4.435 4.435a1 1 0 001.415 1.415L9 11.414l4.435 4.435c.39.39 1.024.39 1.415 0z"/></svg>
                </button>
            </div>
        @elseif (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <button type="button" onclick="this.parentElement.style.display='none';" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 14.849a1 1 0 001.415 0l.086-.086a1 1 0 000-1.415L10.414 10l4.435-4.435a1 1 0 00-1.415-1.415L9 8.586l-4.435-4.435a1 1 0 00-1.415 1.415L7.586 10l-4.435 4.435a1 1 0 001.415 1.415L9 11.414l4.435 4.435c.39.39 1.024.39 1.415 0z"/></svg>
                </button>
            </div>
        @endif
        @yield('content')
    </div>

    <footer class="bg-gray-200 text-center py-4 mt-auto">
        <p>&copy; 2024</p>
    </footer>
</body>
</html>
