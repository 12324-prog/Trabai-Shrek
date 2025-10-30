<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Itens Pedidos - Podrão do Shrek</title>
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
                <h1 class="title">Relatório de Itens do Pedido</h1>
                <p class="highlight">Detalhes dos pratos que compõem cada pedido do pântano.</p>
            </div>

            <div class="table-container">
                <table class="shrek-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pedido</th>
                            <th>Prato</th>
                            <th>Quantidade</th>
                            <th>Valor Unitário (R$)</th>
                            <th>Garçom</th>
                            <th>Data e Hora</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($itenspedido as $item)
                        <tr>
                            <td>{{ $item->cod_item }}</td>
                            <td>#{{ $item->cod_pedido }}</td>
                            <td>{{ $item->cod_prato }}</td>
                            <td>{{ $item->quantidade }}</td>
                            <td>{{ number_format($item->valor_unitario, 2, ',', '.') }}</td>
                            <td>{{ $item->cod_garcom }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->data_hora)->format('d/m/Y H:i') }}</td>
                            <td class="acoes">
                                <a href="{{ route('itens_pedido.edit', $item->cod_item) }}" class="btn btn--ghost">Editar</a>
                                <form action="{{ route('itens_pedido.destroy', $item->cod_item) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn--slime" onclick="return confirm('Tem certeza que deseja excluir este item?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="empty">Nenhum item de pedido encontrado.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="btn-group" style="margin-top: 20px;">
                <a href="{{ route('itens_pedido.create') }}" class="btn btn--shrek slime-drop"> + Novo Item do Pedido</a>
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