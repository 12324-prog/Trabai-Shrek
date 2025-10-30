<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Entregadores - Podrão do Shrek</title>
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
                    <h1 class="title">Cadastrar Entregadores</h1>
                    <p class="highlight">Cadastre os heróis que levam o podrão até o povo! Sem eles, o pântano não chega a Tão Tão Distante.</p>
                </div>
                <div class="card">
                    <form action="{{ route('entregadores.store') }}" method="POST" class="form-qa">
                        @csrf
                        <div class="question">
                            <div class="q-bubble">Nome</div>
                            <div class="answer"><input type="text" id="nomeENTREGADOR" name="nomeENTREGADOR" required></div>
                        </div>              
                        <div class="question">
                            <div class="q-bubble">Celular</div>
                            <div class="answer"><input type="tel" id="celularENTREGADOR" name="celularENTREGADOR" required></div>
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