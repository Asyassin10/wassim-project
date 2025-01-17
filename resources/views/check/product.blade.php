<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6 bg-gray">
    @include('navbar')

    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Check Product</h1>
        <form id="checkProductForm" class="space-y-4">
            <div>
                <label for="product_id" class="block text-sm font-medium text-gray-700">Product ID</label>
                <input type="number" name="product_id" id="product_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Check Product</button>
        </form>
        <div id="result" class="mt-6 hidden">
            <h2 class="text-xl font-semibold">Product Details</h2>
            <p><strong>Name:</strong> <span id="productName"></span></p>
            <p><strong>Price:</strong> <span id="productPrice"></span></p>
        </div>
    </div>

    <script>
        document.getElementById('checkProductForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const productId = document.getElementById('product_id').value;

            fetch(`/check/product?product_id=${productId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        document.getElementById('productName').textContent = data.product.name;
                        document.getElementById('productPrice').textContent = `$${data.product.price}`;
                        document.getElementById('result').classList.remove('hidden');
                    } else {
                        alert('Product not found!');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>