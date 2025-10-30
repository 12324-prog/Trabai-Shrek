<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Pedidos - Podrão do Shrek</title>
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
                <h1 class="title">Relatório de Pedidos</h1>
                <p class="highlight">Confira todos os pedidos realizados no podrão, com status, cliente e detalhes.</p>
            </div>

            <div class="table-container">
                <table class="shrek-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Tipo Pedido</th>
                            <th>Entregador</th>
                            <th>Valor Entrega (R$)</th>
                            <th>Mesa</th>
                            <th>Desconto (R$)</th>
                            <th>Taxa de Serviço (R$)</th>
                            <th>Valor Total (R$)</th>
                            <th>Pago</th>
                            <th>Encerrado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->cod_pedido }}</td>
                            <td>{{ $pedido->nomeCLIENTE }}</td>
                            <td>
                                @if($pedido->tipo_pedido == 1) Delivery (Presencial)
                                @elseif($pedido->tipo_pedido == 2) Delivery (Domiciliar)
                                @else Atendimento Presencial
                                @endif
                            </td>
                            <td>{{ $pedido->nomeENTREGADOR }}</td>
                            <td>{{ number_format($pedido->valor_entrega, 2, ',', '.') }}</td>
                            <td>{{ $pedido->descricaoMESA }}</td>
                            <td>{{ number_format($pedido->desconto, 2, ',', '.') }}</td>
                            <td>{{ number_format($pedido->taxa_servico, 2, ',', '.') }}</td>
                            <td>{{ number_format($pedido->valor_total, 2, ',', '.') }}</td>
                            <td>{{ $pedido->pago ? 'Sim' : 'Não' }}</td>
                            <td>{{ $pedido->encerrado ? 'Sim' : 'Não' }}</td>
                            <td class="acoes">
                                <a href="{{ route('pedidos.edit', $pedido->cod_pedido) }}" class="btn btn--ghost">Editar</a>
                                <form action="{{ route('pedidos.destroy', $pedido->cod_pedido) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn--slime" onclick="return confirm('Tem certeza que deseja excluir este pedido?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12" class="empty">Nenhum pedido encontrado.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="btn-group" style="margin-top: 20px;">
                <a href="{{ route('pedidos.create') }}" class="btn btn--shrek slime-drop"> + Novo Pedido</a>
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