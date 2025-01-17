<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Client</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6 bg-gray">
    @include('navbar')

    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Check Client</h1>
        <form id="checkClientForm" class="space-y-4">
            <div>
                <label for="client_id" class="block text-sm font-medium text-gray-700">Client ID</label>
                <input type="number" name="client_id" id="client_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Check Client</button>
        </form>
        <div id="result" class="mt-6 hidden">
            <h2 class="text-xl font-semibold">Client Details</h2>
            <p><strong>Name:</strong> <span id="clientName"></span></p>
            <p><strong>Email:</strong> <span id="clientEmail"></span></p>
        </div>
    </div>

    <script>
        document.getElementById('checkClientForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const clientId = document.getElementById('client_id').value;

            fetch(`/check/client?client_id=${clientId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        document.getElementById('clientName').textContent = data.client.name;
                        document.getElementById('clientEmail').textContent = data.client.email;
                        document.getElementById('result').classList.remove('hidden');
                    } else {
                        alert('Client not found!');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>