<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
    .text-blue{
        color: #276BB2 !important;
    }
</style>
<body class="bg-white">

    @include('navbar')

    <!-- Contenu Principal -->
    <div class="p-6 bg-gray bg-white h-100">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold mb-8 text-blue">Tableau de bord</h1>

            <!-- Section des Cartes -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6" style="">
                <!-- Carte Clients -->
                <div class="bg-white p-6 rounded-lg shadow-md" style="background-color: #F1AC0A;">
                    <h2 class="text-xl font-semibold mb-2 text-blue ">Clients</h2>
                    <p class="text-4xl font-bold text-blue">{{ $clientCount }}</p>
                    <p class="text-sm text-blue mt-2">Nombre total de clients</p>
                    <a href="{{ route('clients.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Voir les Clients</a>
                </div>

                <!-- Carte Produits -->
                <div class="bg-white p-6 rounded-lg shadow-md" style="background-color: #F1AC0A;">
                    <h2 class="text-xl font-semibold mb-2 text-blue">Produits</h2>
                    <p class="text-4xl font-bold text-blue">{{ $productCount }}</p>
                    <p class="text-sm text-blue mt-2">Nombre total de produits</p>
                    <a href="{{ route('products.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Voir les Produits</a>
                </div>

                <!-- Carte Factures -->
                <div class="bg-white p-6 rounded-lg shadow-md" style="background-color: #F1AC0A;">
                    <h2 class="text-xl font-semibold text-blue mb-2">Factures</h2>
                    <p class="text-4xl font-bold text-blue">{{ $invoiceCount }}</p>
                    <p class="text-sm text-blue mt-2">Nombre total de factures</p>
                    <a href="{{ route('invoices.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Voir les Factures</a>
                </div>
            </div>

        </div>
    </div>

    <!-- Script Menu Mobile -->
    <script>
        // Basculer le menu mobile
        document.getElementById('mobile-menu-button').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
