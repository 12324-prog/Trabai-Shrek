<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Compras - Podrão do Shrek</title>
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
                <h1 class="title">Cadastrar Compras</h1>
                <p class="highlight">Mantenha o controle das compras do reino! Registre o que foi adquirido para garantir que o estoque do pântano esteja sempre cheio.</p>
            </div>
            <div class="card">
                <form action="{{ route('compras.store') }}" method="POST" class="form-qa">
                    @csrf

                    <div class="question">
                        <div class="q-bubble">Data</div>
                        <div class="answer"><input type="date" id="dataCOMPRA" name="dataCOMPRA" required></div>
                    </div>              

                    <div class="question">
                        <div class="q-bubble">Nota Fiscal</div>
                        <div class="answer"><input type="text" id="notafiscal" name="notafiscal" required></div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Valor Total</div>
                        <div class="answer"><input type="number" step="0.01" id="valorTotalCOMPRA" name="valorTotalCOMPRA" required></div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Fornecedor</div>
                        <div class="answer">
                            <select id="fornecedor_id" name="fornecedor_id" required>
                                <option value="">Selecione um Fornecedor</option>
                                @foreach($fornecedores as $fornecedor)
                                    <option value="{{ $fornecedor->id }}">
                                        {{ $fornecedor->nomeF }} {{-- ou nomeS, se preferir --}}
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