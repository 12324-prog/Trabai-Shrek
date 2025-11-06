<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Área Administrativa - Podrão do Shrek</title>
    <link rel="stylesheet" href="{{ asset('css/PodraoPadrao.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Freckle+Face&family=Luckiest+Guy&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Shrikhand&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="swamp-anim"></div>
    <header class="header">
        <div class="brand">
            <div class="logo wobble"><img src="{{ asset('css/SPODRAO.png') }}" alt="Logo Shrek" height="80" /></div>
            <span>Podrão do Shrek - Área de Registros</span>
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
                <h1 class="title">Painel de Registros</h1>
                <p class="highlight">Acesse rapidamente os relatórios de cadastros do Podrão do Shrek.</p>
            </div>

            <div class="btn-group" style="display: flex; flex-wrap: wrap; gap: 15px; margin-top: 20px;">
                <a href="{{ route('fornecedores.index') }}" class="btn btn--shrek slime-drop">Relatório Fornecedores</a>
                <a href="{{ route('compras.index') }}" class="btn btn--shrek slime-drop">Relatório Compras</a>
                <a href="{{ route('itens_compra.index') }}" class="btn btn--shrek slime-drop">Relatório Itens Compra</a>
                <a href="{{ route('itens_pedido.index') }}" class="btn btn--shrek slime-drop">Relatório Itens Pedido</a>
                <a href="{{ route('pedidos.index') }}" class="btn btn--shrek slime-drop">Relatório Pedidos</a>
                <a href="{{ route('clientes.index') }}" class="btn btn--shrek slime-drop">Relatório Clientes</a>
                <a href="{{ route('cidades.index') }}" class="btn btn--shrek slime-drop">Relatório Cidades</a>
                <a href="{{ route('pratos.index') }}" class="btn btn--shrek slime-drop">Relatório Pratos</a>
                <a href="{{ route('ingredientes.index') }}" class="btn btn--shrek slime-drop">Relatório Ingredientes</a>
            </div>

        </section>
    </main>

    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
    </footer>
</body>
</html>