<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratory Quotation</title>
    <style>
        /* Added category and product styling */
        .category-header {
            font-size: 14px !important;
            font-weight: bold;
            background-color: #f8f9fa !important;
            padding: 8px !important;
        }

        .product-row td {
            font-size: 12px !important;
            padding-left: 25px !important;
        }

        /* Rest of existing styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }

        .container {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .header {
            margin-top: -5%;
            border-bottom: 1px solid #000;
            padding-bottom: 1px;
            margin-bottom: 1px;
            text-align: center;
        }

        .header .header-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header .logo {
            height: 40px;
            width: 120px;
            margin-bottom: 10px;
        }

        .header .lab-info {
            font-size: 12px;
            color: #000;
            margin-top: -5%;
            text-align: center;
        }

        .header .reference {
            text-align: right;
            font-size: 12px;
            color: #000;
            margin-top: 10px;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .client-info {
            border: 1px solid #000;
            padding: 5px;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .client-info p {
            margin: 0;
        }

        .client-info .client-name {
            font-weight: bold;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        .table th {
            background-color: #f3f4f6;
            font-weight: bold;
        }

        .table tfoot td {
            font-weight: bold;
        }

        .footer {
            margin-top: 15px;
            text-align: center;
            font-size: 12px;
        }

        .footer .director {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .footer .payment-terms {
            margin-top: 10px;
            border-top: 1px solid #000;
            padding-top: 5px;
        }

        .footer .notes {
            font-size: 10px;
            color: #6b7280;
            margin-top: 5px;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="header-content">
                <div class="logo">
                    <img width="120" height="90" src="{{ asset('image.png') }}" alt="Laboratory Logo">
                </div>
                <div class="lab-info">
                    <p>Laboratoire Public d'Essais et d'Etudes</p>
                    <p>L.P. E. E - C. E. R. E. P</p>
                </div>
            </div>
            <div class="reference">
                <p>Casablanca, {{ $invoice->buyer->date }}</p>
            </div>
        </div>

        <!-- Title -->
        <div class="title">
            <h1>OFFRE DE PRIX</h1>
        </div>

        <!-- Client Info -->
        <div class="client-info">
            <p class="client-name">Client : {{ $invoice->buyer->name }}</p>
            @if ($invoice->buyer->email == null || $invoice->buyer->email  == "")
            @else
            <p class="client-name">E-mails : {{ $invoice->buyer->email }}</p>
            @endif
            <p class="client-name">Objet : {{ $invoice->buyer->object }}</p>
            <p class="client-name">N°Réf. : {{ $invoice->buyer->numref }}</p>
            <p class="client-name">Responsable de dossier : {{ $invoice->buyer->responsable }}</p>
        </div>

        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th class="text-center">Quantité</th>
                    <th class="text-right">Prix Unitaire (DH/HT)</th>
                    <th class="text-right">Prix Total (DH)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->items as $item)
                    @if ($item->quantity == 0)
                        <!-- Category Header -->
                        <tr>
                            <td colspan="4" class="category-header">
                                {{ $item->title }}
                            </td>
                        </tr>
                    @else
                        <!-- Product Row -->
                        <tr class="product-row">
                            <td>{{ $item->title }}</td>
                            <td class="text-center">{{ number_format($item->quantity, 0) }}</td>
                            <td class="text-right">{{ number_format($item->price_per_unit, 2) }} MAD</td>
                            <td class="text-right">{{ number_format($item->sub_total_price, 2) }} MAD</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-left font-bold">TOTAL (HT)</td>
                    <td class="text-left">{{ number_format($invoice->total_amount, 2) }} MAD</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-left font-bold">TVA (20%)</td>
                    <td class="text-left">{{ number_format($invoice->total_amount * 0.2, 2) }} MAD</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-left font-bold">TOTAL (TTC)</td>
                    <td class="text-left font-bold">{{ number_format($invoice->total_amount * 1.2, 2) }} MAD</td>
                </tr>
            </tfoot>
        </table>

        <!-- Footer -->
        <div class="footer">
            <div class="director">
                <p>LE DIRECTEUR DU CEREP</p>
                <p>M. A. KARIOUN</p>
            </div>
            <div class="payment-terms" style="text-align: left;">
                <p>
                    Modalité de paiement : 100 % à la commande <br>
                    La date d'intervention sera fixée en commun accord avec le client <br>
                    Le délai de remise des analyses des paramètres réalisées en interne est de 4 semaines.<br>
                    * Paramètres sous-traités, le délai de remise de leurs résultats est de 07 semaines<br>
                    Le rapport d'essai sera sous forme de bulletins d'analyses avec commentaire<br>
                    Pièces jointes : - Références des méthodes d'analyses -conditions générales
                </p>
            </div>
            <div class="notes"></div>
        </div>
    </div>
</body>

</html>
