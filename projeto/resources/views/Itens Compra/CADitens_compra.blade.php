<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Itens Compra - Podrão do Shrek</title>
    <link rel="stylesheet" href="{{ asset('css/PodraoPadrao.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Freckle+Face&family=Luckiest+Guy&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Shrikhand&display=swap" rel="stylesheet">
</head>
<body>
    <div class="swamp-anim"></div>
    <header class="header">
        <div class="brand">
            <div class="logo wobble"><img src="{{ asset('css/SPODRAO.png') }}" alt="Logo Shrek"  width="auto" height="80"></div>
            <span>Podrão do Shrek</span>
        </div>
        <nav>
            <div class="dropdown">
                <button class="dropbtn">Cadastros</button>
                <div class="dropdown-content">
                    <a href="{{ route('cidades.cadastrar') }}">Cidades</a>
                    <a href="{{ route('fornecedores.cadastrar') }}">Fornecedores</a>                
                    <a href="{{ route('ingredientes.cadastrar') }}">Ingredientes</a>
                    <a href="{{ route('pratos.cadastrar') }}">Pratos</a>
                    <a href="{{ route('compras.cadastrar') }}">Compras</a>
                    <a href="{{ route('itens_compra.cadastrar') }}">Itens de Compra</a>
                    <a href="{{ route('pedidos.cadastrar') }}">Pedidos</a>
                    <a href="{{ route('itens_pedido.cadastrar') }}">Itens dos Pedidos</a>
                    <a href="{{ route('clientes.cadastrar') }}">Clientes</a>
                </div>
            </div>

            <a href="{{ route('relatorios') }}">Área de Registros</a>
            <a href="{{ route('mercado') }}">Mercado</a>
            <a href="{{ route('contatos') }}">Contato</a>
            
        </nav>
    </header>


    <main class="container">
        <section class="hero">
            <div>
                <h1 class="title">Cadastrar Itens de Compra</h1>
                <p class="highlight">Detalhe os produtos comprados e mantenha o controle do que entra no estoque. Cada cebola conta!</p>
            </div>

            <div class="card">
                <form action="{{ $item_compra ? route('itens_compra.update', ['id'=>$item_compra->cod_item]) : route('itens_compra.store') }}" method="POST" class="form-qa">
                    @csrf

                    <div class="question">
                        <div class="q-bubble">Compra</div>
                        <div class="answer">
                            <select id="cod_compra" name="cod_compra" required>
                                <option value="">Selecione uma compra</option>
                                @foreach($compras as $compra)
                                    <option value="{{ $compra->cod_compra }}" 
                                    {{$item_compra && $item_compra->cod_compra == $compra->cod_compra ? 'selected' : '' }} >
                                        {{ $compra->cod_compra }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Ingrediente</div>
                        <div class="answer">
                            <select id="ingrediente_id" name="ingrediente_id" required>
                                <option value="">Selecione um Ingrediente</option>
                                @foreach($ingredientes as $ingrediente)
                                    <option value="{{ $ingrediente->cod_ingrediente }}" 
                                    {{$item_compra && $item_compra->cod_ingrediente == $ingrediente->cod_ingrediente ? 'selected' : '' }} >
                                        {{ $ingrediente->descricao }} - Valor: R${{ $ingrediente->valor_unitario }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Quantidade</div>
                        <div class="answer">
                            <input type="number" step="0.01" id="quantidadeITEMCOMPRA" name="quantidadeITEMCOMPRA" value="{{$item_compra ?? ''}}" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn--shrek slime-drop">{{ $item_compra ? 'Atualizar' : 'Cadastrar'}}</button>
                </form>
                <div class="btn-group">
                    <a href="{{ route('itens_compra.index') }}" class="btn btn--slime">Finalizar Compra</a>
                </div>
            </div>
        </section>
    </main>


    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
        <div class="btn-group">
            <btn id="btn-ajuda" class="btn btn--ghost">Ajuda</btn>
            <a href="{{ route('itens_compra.index') }}" class="btn btn--slime">Ver Itens das Compras</a>
        </div>
    </footer>
    
    <script>
        const btnAjuda = document.getElementById('btn-ajuda');

        btnAjuda.addEventListener('click', () => {
            alert('ajuda? também quero');
        });
    </script>
    
</body>
</html>