<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Client</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Urbanist', sans-serif;
        }
        label {
            color: #1E3A8A;
        }
        input, button {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-blue-50">
    @include('navbar')

    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg mt-10">
        <h1 class="text-3xl font-bold text-dark-800 mb-6">Créer un Client</h1>
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-lg font-medium">Nom</label>
                <input type="text" name="name" id="name" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="email" class="block text-lg font-medium">Email</label>
                <input type="email" name="email" id="email" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"  >
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">Créer le Client</button>
        </form>
    </div>
</body>
</html>
