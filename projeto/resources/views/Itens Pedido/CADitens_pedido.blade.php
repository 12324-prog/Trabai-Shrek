<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Itens Pedidos - Podrão do Shrek</title>
    <link rel="stylesheet" href="{{ asset('css/PodraoPadrao.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Freckle+Face&family=Luckiest+Guy&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Shrikhand&display=swap" rel="stylesheet">
</head>
<body>
    <div class="swamp-anim"></div>
    <header class="header">
        @if(isset($erro))
            <script>
                alert('{{ $erro }}');
            </script>
        @endif
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
                <h1 class="title">Cadastrar Itens do Pedido</h1>
                <p class="highlight">
                    Adicione os pratos que compõem o pedido do cliente. Aqui é onde o podrão ganha forma (e a fome aumenta)!
                </p>
            </div>

            <div class="card">
                <form action="{{ $item_pedido ? route('itens_pedido.update',['id'=>$item_pedido->cod_item]) : route('itens_pedido.store') }}" method="POST" class="form-qa">
                    @csrf

                    <div class="question">
                        <div class="q-bubble">Pedido</div>
                        <div class="answer">
                            <select id="cod_pedido" name="cod_pedido" required>
                                <option value="">Selecione um Pedido</option>
                                @foreach($pedidos as $pedido)
                                    <option value="{{ $pedido->cod_pedido }}" 
                                    {{$item_pedido && $item_pedido->cod_pedido == $pedido->cod_pedido ? 'selected' : '' }}>
                                    Pedido #{{ $pedido->cod_pedido }} - Cliente: {{ $pedido->nome ?? 'N/A' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Prato</div>
                        <div class="answer">
                            <select id="cod_prato" name="cod_prato" required>
                                <option value="">Selecione um Pedido</option>
                                @foreach($pratos as $prato)
                                    <option value="{{ $prato->cod_prato }}" {{$item_pedido && $item_pedido->cod_prato == $prato->cod_prato ? 'selected' : '' }}>{{ $prato->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Quantidade</div>
                        <div class="answer">
                            <input type="number" step="0.01" id="quantidade" name="quantidade" value="{{$item_pedido->quantidade ?? ''}}" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn--shrek slime-drop">{{$item_pedido ? 'Atualizar' : 'Cadastrar'}}</button>
                </form>
                <div class="btn-group">
                    <a href="{{ route('itens_pedido.index') }}" class="btn btn--slime">Finalizar Pedido</a>
                </div>
            </div>
        </section>
    </main>


    
    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
        <div class="btn-group">
            <btn id="btn-ajuda" class="btn btn--ghost">Ajuda</btn>
            <a href="{{ route('itens_pedido.index') }}" class="btn btn--slime">Ver Itens dos Pedidos</a>
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