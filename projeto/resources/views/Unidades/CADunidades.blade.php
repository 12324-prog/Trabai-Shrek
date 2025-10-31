<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Unidades - Podrão do Shrek</title>
    <link rel="stylesheet" href="PodraoPadrao.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Freckle+Face&family=Luckiest+Guy&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Shrikhand&display=swap" rel="stylesheet">
</head>
<body>
    <div class="swamp-anim"></div>
    <header class="header">
        <div class="brand">
            <div class="logo wobble"><img src="SPODRAO.png" alt="Logo Shrek"  width="auto" height="80"></div>
            <span>Podrão do Shrek</span>
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
                <h1 class="title">Cadastrar Unidade</h1>
                <p class="highlight">Defina as unidades de medida usadas nos ingredientes e compras. Tudo no Podrão do Shrek precisa ser bem contado (até as gotas do molho)!</p>
            </div>

            <div class="card">
                <form action="{{ route('unidades.store') }}" method="POST" class="form-qa">
                    @csrf

                    <div class="question">
                        <div class="q-bubble">Descrição da Unidade</div>
                        <div class="answer">
                            <input type="text" id="descricaoUNIDADE" name="descricaoUNIDADE" required placeholder="Ex: Litro, Grama, Unidade...">
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Sigla</div>
                        <div class="answer">
                            <input type="text" id="sigla" name="sigla" maxlength="10" required placeholder="Ex: L, g, un">
                        </div>
                    </div>

                    <button type="submit" class="btn btn--shrek slime-drop">Cadastrar</button>
                </form>
            </div>
        </section>
    </main>


    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
        <div class="btn-group">
            <button class="btn btn--ghost">Ajuda</button>
            <button class="btn btn--slime">Ver Unidades</button>
        </div>
    </footer>
</body>
</html>