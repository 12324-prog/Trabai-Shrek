<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pedidos - Podrão do Shrek</title>
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
            <div class="dropdown">
                <button class="dropbtn">Cadastros</button>
                <div class="dropdown-content">
                    <a href="{{ route('cidades.cadastrar') }}">Cidades</a>
                    <a href="{{ route('fornecedores.cadastrar') }}">Fornecedores</a>                
                    <a href="{{ route('ingredientes.cadastrar') }}">Ingredientes</a>
                    <a href="{{ route('pratos.cadastrar') }}">Pratos</a>
                    <a href="{{ route('compras.cadastrar') }}">Compras</a>
                    <a href="{{ route('itens_compra.cadastrar') }}">Itens das Compras</a>
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
                <h1 class="title">Cadastrar Pedido</h1>
                <p class="highlight">
                    Registre um novo pedido para o Podrão do Shrek! Escolha o cliente, tipo e informações de entrega.
                </p>
            </div>

            <div class="card">
                <form action="{{ route('pedidos.store') }}" method="POST" class="form-qa">
                    @csrf

                    <div class="question">
                        <div class="q-bubble">Cliente</div>
                        <div class="answer">
                            <select id="cod_cliente" name="cod_cliente" required>
                                <option value="">Selecione o cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->cod_cliente }}">{{ $cliente->nomeCLIENTE }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Tipo de Pedido</div>
                        <div class="answer">
                            <select id="tipo_pedido" name="tipo_pedido" required>
                                <option value="1">Delivery (Presencial)</option>
                                <option value="2">Delivery (Domiciliar)</option>
                                <option value="3">Atendimento Presencial</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="question">
                        <div class="q-bubble">Data e Hora</div>
                        <div class="answer">
                            <input type="datetime-local" id="data_horaPEDIDO" name="data_horaPEDIDO" required>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Valor Total (R$)</div>
                        <div class="answer">
                            <input type="number" step="0.01" name="valor_total" id="valor_total" required>
                        </div>
                    </div>
                    
                    <div class="question">
                        <div class="q-bubble">Status</div>
                        <div class="answer">
                            <label>
                                <input type="checkbox" name="pago" value="1"> Pago
                            </label>
                            <label>
                                <input type="checkbox" name="encerrado" value="1"> Encerrado
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn--shrek slime-drop">Cadastrar Pedido</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
        <div class="btn-group">
            <btn id="btn-ajuda" class="btn btn--ghost">Ajuda</btn>
            <a href="{{ route('pedidos.index') }}" class="btn btn--slime">Ver Pedidos</a>
        </div>
    </footer>
    
    <script>
        const btnAjuda = document.getElementById('btn-ajuda');

        btnAjuda.addEventListener('click', () => {
            alert('ajuda? também quero');
        });
    </script>
    
</body>
</html>