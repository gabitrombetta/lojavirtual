<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Loja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
</head>

<body class="bg-white text-gray-800">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <header class="flex items-center justify-between mb-6 mt-4">
            <div class="flex items-center space-x-2">
                <a href="{{ route('home') }}">
                    <img src="https://laravel.com/img/logomark.min.svg" alt="Logo Laravel" class="w-10 h-10">
                </a>
                <h1 class="text-xl font-semibold">Empresa X</h1>
            </div>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Login</a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Registrar</a>
            </div>
        </header>

        <div class="flex flex-row flex-wrap justify-center gap-3 mb-6">
            @foreach ($types as $type)
            <a href="{{ route('products.byType', $type->id) }}">
                <button class="px-4 py-2 border rounded hover:bg-gray-100">{{ $type->name }}</button>
            </a>
            @endforeach
        </div>

        <div class="text-center mb-4">
            <a href="{{ route('home') }}">

                <h2 class="text-lg border rounded px-4 py-2 inline-block hover:bg-gray-100">Lista de produtos</h2>
            </a>
        </div>

        <div class="flex flex-wrap justify-center gap-6 max-w-7xl mx-auto px-4">
            @foreach ($products as $product)
            <div class="border rounded-lg p-4 shadow bg-white">
                <img src="https://cdn.pixabay.com/photo/2025/05/28/17/14/t-shirt-9627864_1280.jpg
" alt="Imagem do Produto" class="mb-4 w-48 h-48 object-cover rounded">

                <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                <p class="text-gray-600">Preço: R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                <p class="text-sm text-gray-500">Quantidade: {{ $product->quantity }}</p>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>