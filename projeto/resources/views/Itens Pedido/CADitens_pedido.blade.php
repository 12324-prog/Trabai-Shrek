<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Itens Pedidos - Podrão do Shrek</title>
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
                <h1 class="title">Cadastrar Itens do Pedido</h1>
                <p class="highlight">
                    Adicione os pratos que compõem o pedido do cliente. Aqui é onde o podrão ganha forma (e a fome aumenta)!
                </p>
            </div>

            <div class="card">
                <form action="{{ route('itens_pedido.store') }}" method="POST" class="form-qa">
                    @csrf

                    <div class="question">
                        <div class="q-bubble">Pedido</div>
                        <div class="answer">
                            <select id="cod_pedido" name="cod_pedido" required>
                                <option value="">Selecione um pedido</option>
                                @foreach($pedidos as $pedido)
                                    <option value="{{ $pedido->cod_pedido }}">
                                        Pedido #{{ $pedido->cod_pedido }} - Cliente: {{ $pedido->cliente->nome ?? 'N/A' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Prato</div>
                        <div class="answer">
                            <select id="cod_prato" name="cod_prato" required>
                                <option value="">Selecione um prato</option>
                                @foreach($pratos as $prato)
                                    <option value="{{ $prato->cod_prato }}">{{ $prato->descricao }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Quantidade</div>
                        <div class="answer">
                            <input type="number" step="0.01" id="quantidade" name="quantidade" required>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Valor Unitário (R$)</div>
                        <div class="answer">
                            <input type="number" step="0.01" id="valor_unitario" name="valor_unitario" required>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Garçom</div>
                        <div class="answer">
                            <select id="cod_garcom" name="cod_garcom" required>
                                <option value="">Selecione um garçom</option>
                                @foreach($garcons as $garcom)
                                    <option value="{{ $garcom->cod_garcom }}">{{ $garcom->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Data e Hora</div>
                        <div class="answer">
                            <input type="datetime-local" id="data_hora" name="data_hora" required>
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