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
            <a href="#">Início</a>
            <a href="#">Cardápio</a>
            <a href="#">Pedidos</a>
            <a href="#">Contato</a>
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
                        <div class="q-bubble">Entregador</div>
                        <div class="answer">
                            <select id="cod_entregador" name="cod_entregador">
                                <option value="">Selecione o entregador</option>
                                @foreach($entregadores as $entregador)
                                    <option value="{{ $entregador->cod_entregador }}">{{ $entregador->nomeENTREGADOR }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Valor da Entrega</div>
                        <div class="answer">
                            <input type="number" step="0.01" name="valor_entrega" id="valor_entrega">
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Mesa</div>
                        <div class="answer">
                            <select id="cod_mesa" name="cod_mesa">
                                <option value="">Selecione a mesa</option>
                                @foreach($mesas as $mesa)
                                    <option value="{{ $mesa->cod_mesa }}">{{ $mesa->descricaoMESA }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Desconto (R$)</div>
                        <div class="answer">
                            <input type="number" step="0.01" name="desconto" id="desconto">
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Taxa de Serviço (R$)</div>
                        <div class="answer">
                            <input type="number" step="0.01" name="taxa_servico" id="taxa_servico">
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
            <button class="btn btn--ghost">Ajuda</button>
            <button class="btn btn--slime">Ver Fornecedores</button>
        </div>
    </footer>
</body>
</html>