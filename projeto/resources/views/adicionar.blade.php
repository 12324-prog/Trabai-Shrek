<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <header>

    </header>
    <div class="container">
        <div class="formulario">
        @if(@isset($produto))
            <form action="/adicionar/cadastrar" method="post">
        @else
            <form action="/adicionar/atualizar" method="post">
        @endif
            @csrf
            <div class="campo">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" data-field="nome" value="{{$produto[0]->nome_produto ?? ''}}" required>
            </div>
            <div class="campo">
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" data-field="descricao" value="{{$produto[0]->descricao_produto ?? ''}}" required>
            </div>
            <div class="campo">
                <label for="preco">Preço:</label>
                <input type="text" name="preco" data-field="preco" value="{{$produto[0]->preco ?? ''}}" required>
            </div>
            <input type="submit">Enviar</input>
        </form>
        </div>
    </div>
</body>
</html>