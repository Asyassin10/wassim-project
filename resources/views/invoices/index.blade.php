<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factures</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .price {
            unicode-bidi: bidi-override;
            text-align: right;
        }
        .price-cell {
            text-align: right;
            padding-left: 0 !important;
        }
        .table-hover tr:hover {
            background-color: #f8fafc;
        }
        .currency {
            margin-right: 4px;
        }
    </style>
</head>
<body class="bg-gray-100">
    @include('navbar')

    <div class=" w-100 mt-10">
        <!-- Header -->
       <!-- Search Form -->
<div class="bg-white p-6 rounded-t-lg shadow-sm border-b border-gray-200 mt-10  ">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Factures</h1>
            <p class="text-sm text-gray-500 mt-1">Gérez vos factures clients</p>
        </div>
        <div class="flex items-center space-x-4">
            <form action="{{ route('invoices.index') }}" method="GET" class="flex items-center">
                <input type="text" name="search" placeholder="Rechercher par référence" 
                       class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ request('search') }}">
                <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Rechercher
                </button>
            </form>
            <a href="{{ route('invoices.create') }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Créer une Facture
            </a>
        </div>
    </div>
</div>

<!-- Table -->
<div class="bg-white rounded-b-lg shadow-md overflow-hidden w-100">
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white table-hover">
            <!-- Table Headers -->
            <thead>
                <tr class="bg-gray-50">
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Référence</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Objet</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Responsable</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="py-3 px-6 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Montant Total</th>
                    <th class="py-3 px-6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody class="divide-y divide-gray-200">
                @foreach ($invoices as $invoice)
                    <tr>
                        <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $invoice->reference_number }}
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-700">
                            {{ $invoice->client->name }}
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-700">
                            {{ $invoice->object }}
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-700">
                            {{ $invoice->responsable }}
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-700">
                            {{ date('d/m/Y', strtotime($invoice->invoice_date)) }}
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-700 price-cell">
                            <div class="price">
                                {{ $invoice->total_amount  }}   <span class="currency">MAD</span>  
                            </div>
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-center">
                            <a href="{{ route('invoices.generate', $invoice->id) }}" 
                               class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-md transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Générer PDF
                            </a>
                            <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="inline ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 rounded-md transition-colors duration-200"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette facture ?')">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
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
<div class="mt-4">
    {{ $invoices->links() }}
</div>
    </div>
</body>
</html>