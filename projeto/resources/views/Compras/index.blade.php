<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Compras - Podrão do Shrek</title>
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
                <h1 class="title">Relatório de Compras</h1>
                <p class="highlight">Mantenha o controle das compras realizadas no pântano com detalhes como data, nota fiscal, valor e fornecedor.</p>
            </div>

            <div class="table-container">
                <table class="shrek-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data</th>
                            <th>Nota Fiscal</th>
                            <th>Valor Total (R$)</th>
                            <th>Fornecedor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($compras as $compra)
                        <tr>
                            <td>{{ $compra->cod_compra }}</td>
                            <td>{{ \Carbon\Carbon::parse($compra->dataCOMPRA)->format('d/m/Y') }}</td>
                            <td>{{ $compra->nota_fiscal }}</td>
                            <td>{{ number_format($compra->valorTotalCOMPRA ?? $compra->valor_total, 2, ',', '.') }}</td>
                            <td>{{ $compra->fornecedor->nomeF ?? 'N/A' }}</td>
                            <td class="acoes">
                                <a href="{{ route('compras.edit', $compra->cod_compra) }}" class="btn btn--ghost">Editar</a>
                                <form action="{{ route('compras.destroy', $compra->cod_compra) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn--slime" onclick="return confirm('Tem certeza que deseja excluir esta compra?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="empty">Nenhuma compra encontrada.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="btn-group" style="margin-top: 20px;">
                <a href="{{ route('compras.create') }}" class="btn btn--shrek slime-drop"> + Nova Compra</a>
            </div>
        </section>
    </main>


    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>      
    </footer>
</body>
</html>