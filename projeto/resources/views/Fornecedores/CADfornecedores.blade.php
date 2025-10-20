<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Fornecedor - Podrão do Shrek</title>
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
                <h1 class="title">Cadastrar Fornecedor</h1>
                <p class="highlight">Preencha as informações abaixo para adicionar um novo fornecedor ao pântano do sabor.</p>
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
                        <div class="answer"><input type="text" id="cidade" name="cidade" required></div>
                    </div>
                    <div class="question">
                        <div class="q-bubble">CEP</div>
                        <div class="answer"><input type="text" id="CEP" name="CEP" required></div>
                    </div>
                    <div class="question">
                        <div class="q-bubble">Celular</div>
                        <div class="answer"><input type="text" id="Celular" name="Celular" required></div>
                    </div>
                    <div class="question">
                        <div class="q-bubble">Email</div>
                        <div class="answer"><input type="text" id="Email" name="Email" required></div>
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