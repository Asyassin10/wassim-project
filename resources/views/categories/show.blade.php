<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Catégorie</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @include('navbar')

    <div class="max-w-4xl mx-auto mt-10">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Détails de la Catégorie</h1>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Nom</label>
                <p class="mt-2 text-gray-900">{{ $category->name }}</p>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('categories.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg">
                    Retour
                </a>
            </div>
        </div>
    </div>
</body>
</html>