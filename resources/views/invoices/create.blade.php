<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Créer une Facture</title>
    <style>
        :root {
            --primary-color: #2563eb;
            --success-color: #059669;
            --danger-color: #dc2626;
            --border-color: #e5e7eb;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --background-primary: #ffffff;
            --background-secondary: #f9fafb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--background-secondary);
            color: var(--text-primary);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.5;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: var(--background-primary);
            border-radius: 1rem;
            margin-top: 3%;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .header {
            padding: 2rem 2.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        h1 {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .form-content {
            padding: 2.5rem;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        select,
        input[type="date"],
        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 1rem;
            color: var(--text-primary);
            background-color: var(--background-primary);
            transition: all 0.2s ease;
        }

        select:focus,
        input[type="date"]:focus,
        input[type="number"]:focus,
        input[type="text"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .items-section {
            background-color: var(--background-secondary);
            border-radius: 0.75rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .item {
            display: grid;
            grid-template-columns: 1fr 150px 100px;
            gap: 1rem;
            align-items: start;
            padding: 1rem;
            background-color: var(--background-primary);
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            transition: all 0.2s ease;
        }

        .price {
            direction: rtl;
            unicode-bidi: bidi-override;
        }

        .item:hover {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-remove {
            background-color: var(--background-primary);
            color: var(--danger-color);
            border: 1px solid var(--danger-color);
        }

        .btn-remove:hover {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-add {
            background-color: var(--background-primary);
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            width: 100%;
        }

        .btn-add:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-submit {
            background-color: var(--success-color);
            color: white;
            width: 100%;
            padding: 1rem;
        }

        .btn-submit:hover {
            background-color: #047857;
        }

        .form-footer {
            padding: 2.5rem;
            background-color: var(--background-secondary);
            border-top: 1px solid var(--border-color);
            border-radius: 0 0 1rem 1rem;
        }
    </style>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery (required for Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    @include('navbar')
    <div class="container">

        <div class="header">
            <h1>Créer une Facture</h1>
        </div>
        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf

            <div class="form-content">
                <div class="form-group">
                    <label for="reference_number">Numéro de Référence</label>
                    <input type="text" name="reference_number" id="reference_number"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                <!-- Object Field -->
                <div class="form-group">
                    <label for="object">Objet</label>
                    <input type="text" name="object" id="object" placeholder="Objet de la facture" required>
                </div>

                <!-- Responsable Field -->
                <div class="form-group">
                    <label for="responsable">Responsable</label>
                    <input type="text" name="responsable" id="responsable" placeholder="Nom du responsable" required>
                </div>

                <!-- Client Field -->
                <div class="form-group">
                    <label for="client_id">Client</label>
                    <select name="client_id" id="client_id" required>
                        <option value="">Sélectionner un client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Invoice Date Field -->
                <div class="form-group">
                    <label for="invoice_date">Date de Facture</label>
                    <input type="date" name="invoice_date" id="invoice_date" required>
                </div>

                <!-- Items Section -->
                <div class="form-group">
                    <label>Paramètres</label>
                    <div class="items-section">
                        <div id="items-container">
                            <div class="item">
                                <select name="items[0][product_id]" required>
                                    <option value="">Sélectionner un produit</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }} - <span class="price">{{ $product->price }} MAD</span></option>
                                    @endforeach
                                </select>
                                <input type="number" name="items[0][quantity]" placeholder="Quantité" min="1" required>
                                <button type="button" class="btn btn-remove" onclick="removeItem(this)">Supprimer</button>
                            </div>
                        </div>
                        <button type="button" id="add-item-button" class="btn btn-add">+ Ajouter un paramètre</button>
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" id="submit-button" class="btn btn-submit">Créer la Facture</button>
            </div>
        </form>
    </div>

    <script>
        let itemCount = 1;

        function addItem() {
            const container = document.getElementById('items-container');
            const newItem = document.createElement('div');
            newItem.classList.add('item');
            newItem.innerHTML = `
                <select name="items[${itemCount}][product_id]" required>
                    <option value="">Sélectionner un produit</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} - <span class="price">{{ $product->price }} MAD</span></option>
                    @endforeach
                </select>
                <input type="number" name="items[${itemCount}][quantity]" placeholder="Quantité" min="1" required>
                <button type="button" class="btn btn-remove" onclick="removeItem(this)">Supprimer</button>
            `;
            container.appendChild(newItem);
            itemCount++;
        }

        function removeItem(button) {
            const item = button.closest('.item');
            item.remove();
        }
        $(document).ready(function() {
            // Initialize Select2 for all product dropdowns
            $('select[name^="items"]').select2({
                placeholder: "Sélectionner un produit",
                allowClear: true,
                width: '100%'
            });

            // Reinitialize Select2 when a new item is added
            function addItem() {
                const container = document.getElementById('items-container');
                const itemCount = container.children.length;
                const newItem = document.createElement('div');
                newItem.classList.add('item');
                newItem.innerHTML = `
                    <select name="items[${itemCount}][product_id]" required>
                        <option value="">Sélectionner un produit</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }} - <span class="price">{{ $product->price }} MAD</span></option>
                        @endforeach
                    </select>
                    <input type="number" name="items[${itemCount}][quantity]" placeholder="Quantité" min="1" required>
                    <button type="button" class="btn btn-remove" onclick="removeItem(this)">Supprimer</button>
                `;
                container.appendChild(newItem);

                // Initialize Select2 for the new dropdown
                $(newItem).find('select').select2({
                    placeholder: "Sélectionner un produit",
                    allowClear: true,
                    width: '100%'
                });
            }

            // Remove item function
            function removeItem(button) {
                button.closest('.item').remove();
            }

            // Attach addItem function to the button
            document.getElementById('add-item-button').addEventListener('click', addItem);
        });
    </script>

</body>

</html>
