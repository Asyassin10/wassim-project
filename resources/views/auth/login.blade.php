<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('image.png') }}" alt="Logo" class="w-48"> <!-- Centered logo with a fixed width -->
        </div>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-400 text-red-700 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Display Custom Error Messages -->
        @if (session('error'))
            <div class="mb-4 p-4 bg-red-50 border border-red-400 text-red-700 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" 
                       name="email" 
                       id="email" 
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" 
                       required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input type="password" 
                       name="password" 
                       id="password" 
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" 
                       required>
            </div>
            <div>
                <button type="submit" 
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Se connecter
                </button>
            </div>
        </form>

        <!-- Additional Links (Optional) -->
        <div class="mt-6 text-center">
        </div>
    </div>
</body>
</html>