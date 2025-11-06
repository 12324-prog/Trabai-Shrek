<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inicio - Podrão do Shrek</title>
    <link rel="stylesheet" href="{{ asset('css/mercado.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Freckle+Face&family=Luckiest+Guy&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Shrikhand&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="swamp-anim"></div>
    <header class="header">
        <div class="brand">
            <div class="logo wobble"><img src="{{ asset('css/SPODRAO.png') }}" alt="Logo Shrek" height="80" /></div>
            <span>Podrão do Shrek - Bem vindo</span>
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
        <h1 class="title">Bem-Vindo</h1>
        <p class="highlight">Melhores hamburgueres de todo o pântano!</p>
        </div>
    </section>
    <br>
    <section class="grid">
        
        <div class="menu-card">
        <div class="thumb">🍅</div>
        <div class="info">
            <h4>Tomate</h4>
            <p>Fresco e vermelho, a paixão do Burro.</p> 
        </div>
        </div>

        
        <div class="menu-card">
        <div class="thumb">🧀</div>
        <div class="info">
            <h4>Queijo</h4>
            <p>Cremoso e irresistível, direto do reino de Tão Tão Distante.</p>
        </div>
        </div>

        <div class="menu-card">
        <div class="thumb">🥬</div>
        <div class="info">
            <h4>Alface</h4>
            <p>Alfaces Verdinhos e Crocantes, de confiança da Fiona.</p>
        </div>
        </div>

        <div class="menu-card">
        <div class="thumb">🥓</div>
        <div class="info">
            <h4>Bacon</h4>
            <p>Bacon crocante digno de uma refeição no pântano. Shrek aprova!</p>
        </div>
        </div>

        <div class="menu-card">
        <div class="thumb">🥫</div>
        <div class="info">
            <h4>Ketchup</h4>
            <p>Ketchup vermelho do pântano, feito só com tomate topzera.</p>
        </div>
        </div>

        <div class="menu-card">
        <div class="thumb">🥚🫙</div>
        <div class="info">
            <h4>Maionese</h4>
            <p>Maionese cremosa feita na mão, receita secreta do Pinóquio.</p>       
        </div>
        </div>

        <div class="menu-card">
        <div class="thumb">🍞</div>
        <div class="info">
            <h4>Pão</h4>
            <p>Pão fofinho, recém saído do forno do ogro. Gato de Botas já comeu três!</p>
        </div>
        </div>

        <div class="menu-card">
        <div class="thumb">🥩</div>
        <div class="info">
            <h4>Carne</h4>
            <p>Carne suculenta, gigante, para burger que faz jus ao Shrek.</p>
        </div>
        </div>
        </section>

    </main>

    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
    </footer>
</body>
</html>