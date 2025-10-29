<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Itens Compra - Podrão do Shrek</title>
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
            <a href="#">Cardápio</a>
            <a href="#">Pedidos</a>
            <a href="#">Contato</a>
        </nav>
    </header>


    <main class="container">
        <section class="hero">
            <div>
                <h1 class="title">Cadastrar Itens de Compra</h1>
                <p class="highlight">Detalhe os produtos comprados e mantenha o controle do que entra no estoque. Cada cebola conta!</p>
            </div>

            <div class="card">
                <form action="{{ route('itenscompra.store') }}" method="POST" class="form-qa">
                    @csrf

                    <div class="question">
                        <div class="q-bubble">Compra</div>
                        <div class="answer">
                            <select id="compra_id" name="compra_id" required>
                                <option value="">Selecione a compra</option>
                                @foreach($compras as $compra)
                                    <option value="{{ $compra->id }}">
                                        {{ $compra->notafiscal }} — {{ \Carbon\Carbon::parse($compra->dataCOMPRA)->format('d/m/Y') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Ingrediente</div>
                        <div class="answer">
                            <select id="ingrediente_id" name="ingrediente_id" required>
                                <option value="">Selecione um ingrediente</option>
                                @foreach($ingredientes as $ingrediente)
                                    <option value="{{ $ingrediente->id }}">
                                        {{ $ingrediente->descricaoINGREDIENTE }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Quantidade</div>
                        <div class="answer">
                            <input type="number" step="0.01" id="quantidadeITEMCOMPRA" name="quantidadeITEMCOMPRA" required>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Valor Unitário</div>
                        <div class="answer">
                            <input type="number" step="0.01" id="valorUnitarioITEMCOMPRA" name="valorUnitarioITEMCOMPRA" required>
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