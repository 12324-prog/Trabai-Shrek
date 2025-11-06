<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pratos - Podrão do Shrek</title>
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
                <h1 class="title">Cadastrar Pratos</h1>
                <p class="highlight">Crie novos pratos dignos do Shrek! Solte a imaginação e monte combinações épicas direto do pântano.</p>
            </div>

            <div class="card">
                <form action="{{$prato ? route('pratos.update', ['id'=>$prato->cod_prato]) : route('pratos.store') }}" method="POST" class="form-qa">
                    @csrf

                    <div class="question">
                        <div class="q-bubble">Descrição</div>
                        <div class="answer"><input type="text" id="descricaoPRATO" name="descricaoPRATO" value="{{$prato->descricao ?? ''}}" required></div>
                    </div> 

                    <div class="question">
                        <div class="q-bubble">Taxa</div>
                        <div class="answer"><input type="number" step="0.01" id="taxaPRATO" name="taxaPRATO" value="{{$prato->taxa_prato ?? ''}}" required>
                    </div>   

                    <button type="submit" class="btn btn--shrek slime-drop">{{$prato ? 'Atualizar' : 'Cadastrar'}}</button>
                </form>
            </div>
        </section>
    </main>


    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
        <div class="btn-group">
            <btn id="btn-ajuda" class="btn btn--ghost">Ajuda</btn>
            <a href="{{ route('pratos.index') }}" class="btn btn--slime">Ver Pratos</a>
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