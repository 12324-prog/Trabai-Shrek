<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pratos - Podrão do Shrek</title>
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
                <h1 class="title">Cadastrar Pratos</h1>
                <p class="highlight">Crie novos pratos dignos do Shrek! Solte a imaginação e monte combinações épicas direto do pântano.</p>
            </div>

            <div class="card">
                <form action="{{ route('pratos.store') }}" method="POST" class="form-qa">
                    @csrf

                    <div class="question">
                        <div class="q-bubble">Descrição</div>
                        <div class="answer"><input type="text" id="descricaoPRATO" name="descricaoPRATO" required></div>
                    </div> 

                    <div class="question">
                        <div class="q-bubble">Valor Unitário</div>
                        <div class="answer"><input type="number" step="0.01" id="valorUnitarioPRATO" name="valorUnitarioPRATO" required>
                    </div>   

                    <div class="question">
                        <div class="q-bubble">Categoria</div>
                        <div class="answer">
                            <select id="categoria_id" name="categoria_id" required>
                                <option value="">Selecione uma categoria</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">
                                        {{ $categoria->descricaoCATEGORIA }}
                                    </option>
                                @endforeach
                            </select>
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
            <button class="btn btn--slime">Ver Fornecedores</button>
        </div>
    </footer>
</body>
</html>