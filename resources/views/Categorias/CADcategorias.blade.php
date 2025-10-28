<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Categoria - Podrão do Shrek</title>
    <link rel="stylesheet" href="PodraoPadrao.css">
</head>
<body>
    <div class="swamp-anim"></div>
    <header class="header">
        <div class="brand">
            <div class="logo wobble">🍔</div>
            <span>Podrão do Shrek</span>
        </div>
        <nav>
            <a href="#">Início</a>
            <a href="#">Cardápio</a>
            <a href="#">Pedidos</a>
            <a href="#">Contato</a>
        </nav>
    </header>

    <main class="container">
        <section class="hero">
            <div>
                <h1 class="title">Cadastrar Categoria</h1>
                <p class="highlight">Organize o cardápio do Podrão do Shrek com novas categorias! Dê nomes criativos e deixe tudo verdemente separado do jeito que o pântano gosta.</p>
            </div>
            <div class="card">
                <form action="{{ route('categorias.store') }}" method="POST" class="form-qa">
                    @csrf
                    
                    <div class="question">
                        <div class="q-bubble">Descrição</div>
                        <div class="answer"><input type="text" id="descricaoCATEGORIA" name="descricaoCATEGORIA" required></div>
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
</html>