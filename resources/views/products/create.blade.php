<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Urbanist', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    @include('navbar')

    <div class="max-w-4xl mx-auto">
        <!-- En-tête -->
        <div class="bg-white p-6 rounded-t-lg shadow-sm border-b border-gray-200 mt-10">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Créer un Produit</h1>
                    <p class="text-sm text-gray-500 mt-1">Ajoutez un nouveau produit à votre catalogue</p>
                </div>
            </div>
        </div>

        <!-- Formulaire -->
        <div class="bg-white rounded-b-lg shadow-md p-6">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" 
                           required>
                </div>
                <div class="mb-6">
                    <label for="price" class="block text-sm font-medium text-gray-700">Prix</label>
                    <input type="number" 
                           name="price" 
                           id="price" 
                           step="0.01" 
                           class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" 
                           required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Créer le Produit
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>