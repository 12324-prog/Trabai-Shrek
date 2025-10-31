<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Fornecedor - Podrão do Shrek</title>
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
                <h1 class="title">Cadastrar Fornecedor</h1>
                <p class="highlight">Registre os parceiros que abastecem o pântano! Ingredientes frescos e confiáveis fazem toda a diferença no sabor do podrão.</p>
            </div>
            <div class="card">
                <form action="{{ route('fornecedores.store') }}" method="POST" class="form-qa">
                    @csrf
                    <div class="question">
                        <div class="q-bubble">Nome Social</div>
                        <div class="answer"><input type="text" id="nomeS" name="nomeS" required></div>
                    </div>
                    <div class="question">
                        <div class="q-bubble">Nome Fantasia</div>
                        <div class="answer"><input type="text" id="nomeF" name="nomeF" required></div>
                    </div>
                    <div class="question">
                        <div class="q-bubble">CNPJ</div>
                        <div class="answer"><input type="text" id="CNPJ" name="CNPJ" required></div>
                    </div>
                    <div class="question">
                        <div class="q-bubble">Endereço</div>
                        <div class="answer"><input type="text" id="endereco" name="endereco" required></div>
                    </div>
                    <div class="question">
                        <div class="q-bubble">Número</div>
                        <div class="answer"><input type="text" id="numero" name="numero" required></div>
                    </div>
                    <div class="question">
                        <div class="q-bubble">Bairro</div>
                        <div class="answer"><input type="text" id="bairro" name="bairro" required></div>
                    </div>
                    <div class="question">
                        <div class="q-bubble">Cidade</div>
                        <div class="answer"><input type="select" id="cidade" name="cidade" required></div>
                    </div>
                    <div class="question">
                        <div class="q-bubble">CEP</div>
                        <div class="answer"><input type="text" id="CEP" name="CEP" required></div>
                    </div>
                    <div class="question">
                        <div class="q-bubble">Celular</div>
                        <div class="answer"><input type="tel" id="Celular" name="Celular" required></div>
                    </div>
                    <div class="question">
                        <div class="q-bubble">Email</div>
                        <div class="answer"><input type="email" id="EmailFORNECEDOR" name="EmailFORNECEDOR" required></div>
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
            <button class="btn btn--slime">Ver Fornecedores</button>
        </div>
    </footer>
</body>
</html>,