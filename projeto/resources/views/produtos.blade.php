<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produtos.css">
    <title>Produtos</title>
</head>
<body>
    <h1>Produtos Disponíveis</h1>
    <div class="container">
        @foreach($produtos as $produto)
                <div class="produto"><span>{{$produto->nome_produto}}</span></div>
        @endforeach
    </div>

</body>
</html>