<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6 bg-gray">
    @include('navbar')

    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Check Invoice</h1>
        <form id="checkInvoiceForm" class="space-y-4">
            <div>
                <label for="invoice_id" class="block text-sm font-medium text-gray-700">Invoice ID</label>
                <input type="number" name="invoice_id" id="invoice_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Check Invoice</button>
        </form>
        <div id="result" class="mt-6 hidden">
            <h2 class="text-xl font-semibold">Invoice Details</h2>
            <p><strong>Client:</strong> <span id="invoiceClient"></span></p>
            <p><strong>Total Amount:</strong> <span id="invoiceTotal"></span></p>
        </div>
    </div>

    <script>
        document.getElementById('checkInvoiceForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const invoiceId = document.getElementById('invoice_id').value;

            fetch(`/check/invoice?invoice_id=${invoiceId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        document.getElementById('invoiceClient').textContent = data.invoice.client.name;
                        document.getElementById('invoiceTotal').textContent = `$${data.invoice.total_amount}`;
                        document.getElementById('result').classList.remove('hidden');
                    } else {
                        alert('Invoice not found!');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>