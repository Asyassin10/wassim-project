<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .table-hover tr:hover {
            background-color: #f8fafc;
        }
    </style>
</head>

<body class="bg-gray-100">
    @include('navbar')

    <div class="w-100">
        <!-- En-tête -->
        <div class="bg-white p-6 rounded-t-lg shadow-sm border-b border-gray-200 mt-10">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Catégories</h1>
                    <p class="text-sm text-gray-500 mt-1">Gérez vos enregistrements de catégories</p>
                </div>
                <a href="{{ route('categories.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Ajouter une nouvelle catégorie
                </a>
            </div>
        </div>

        <!-- Search Form -->
        <form action="{{ route('categories.index') }}" method="GET" class="bg-white p-6 border-b border-gray-200">
            <div class="flex">
                <input type="text" name="search" placeholder="Rechercher par nom" value="{{ request('search') }}"
                    class="w-full px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-r-lg transition-colors duration-200">
                    Rechercher
                </button>
            </div>
        </form>

        <!-- Tableau -->
        <div class="bg-white rounded-b-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white table-hover">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nom</th>    
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $category->name }}
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap text-sm text-center">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="inline-flex items-center px-3 py-1.5 bg-yellow-50 text-yellow-600 hover:bg-yellow-100 rounded-md transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12H9m3-3v6m-3 4h6a2 2 0 002-2v-4a2 2 0 00-2-2h-1a2 2 0 01-2-2V7a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2h1a2 2 0 012 2v4a2 2 0 01-2 2H9" />
                                        </svg>
                                        Modifier
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 rounded-md transition-colors duration-200">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 13h6m-3-3v6m9-11a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h6l2-2h6a2 2 0 012 2v6a2 2 0 01-2 2z" />
                                            </svg>
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination Links -->
        <div class="bg-white p-6 rounded-b-lg shadow-md">
            {{ $categories->links() }}
        </div>
    </div>
</body>

</html>
