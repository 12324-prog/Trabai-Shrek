<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Área Administrativa - Podrão do Shrek</title>
    <link rel="stylesheet" href="PodraoPadrao.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Freckle+Face&family=Luckiest+Guy&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Shrikhand&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="swamp-anim"></div>
    <header class="header">
        <div class="brand">
            <div class="logo wobble"><img src="SPODRAO.png" alt="Logo Shrek" height="80" /></div>
            <span>Podrão do Shrek - Área Administrativa</span>
        </div>
        <nav>
            <a href="#">Início</a>

              <div class="dropdown">
                <button class="dropbtn">Cadastros</button>
                <div class="dropdown-content">
                <a href="#">Cidades</a>
                    <a href="#">Fornecedores</a>
                    <a href="#">Categorias</a>
                    <a href="#">Unidades</a>
                    <a href="#">Ingredientes</a>
                    <a href="#">Pratos</a>
                    <a href="#">Compras</a>
                    <a href="#">Itens das Compras</a>
                    <a href="#">Garçons</a>
                    <a href="#">Entregadores</a>
                    <a href="#">Mesas</a>
                    <a href="#">Pedidos</a>
                    <a href="#">Itens dos Pedidos</a>
                    <a href="#">Clientes</a>
                </div>
            </div>

            <a href="#">Área de Registro</a>
            <a href="#">Contato</a>
            
        </nav>
    </header>

    <main class="container">
        <section class="hero">
            <div>
                <h1 class="title">Painel Administrativo</h1>
                <p class="highlight">Acesse rapidamente os relatórios e cadastros do Podrão do Shrek.</p>
            </div>

            <div class="btn-group" style="display: flex; flex-wrap: wrap; gap: 15px; margin-top: 20px;">
                <a href="{{ route('fornecedores.index') }}" class="btn btn--shrek slime-drop">Relatório Fornecedores</a>
                <a href="{{ route('compras.index') }}" class="btn btn--shrek slime-drop">Relatório Compras</a>
                <a href="{{ route('itenscompra.index') }}" class="btn btn--shrek slime-drop">Relatório Itens Compra</a>
                <a href="{{ route('itens_pedido.index') }}" class="btn btn--shrek slime-drop">Relatório Itens Pedido</a>
                <a href="{{ route('mesas.index') }}" class="btn btn--shrek slime-drop">Relatório Mesas</a>
                <a href="{{ route('pedidos.index') }}" class="btn btn--shrek slime-drop">Relatório Pedidos</a>
                <a href="{{ route('pratos.index') }}" class="btn btn--shrek slime-drop">Relatório Pratos</a>
                <a href="{{ route('unidades.index') }}" class="btn btn--shrek slime-drop">Relatório Unidades</a>
            </div>
        </section>
    </main>

    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
    </footer>
</body>
</html>