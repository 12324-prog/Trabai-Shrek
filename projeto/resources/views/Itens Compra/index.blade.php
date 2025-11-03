<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Itens Compra - Podrão do Shrek</title>
    <link rel="stylesheet" href="RelatorioPodrao.css">
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
                <h1 class="title">Relatório de Itens de Compra</h1>
                <p class="highlight">Confira os detalhes dos produtos adquiridos e controlados no estoque do pântano.</p>
            </div>

            <div class="table-container">
                <table class="shrek-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Compra (Nota Fiscal - Data)</th>
                            <th>Ingrediente</th>
                            <th>Quantidade</th>
                            <th>Valor Unitário (R$)</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($itenscompra as $item)
                        <tr>
                            <td>{{ $item->cod_item }}</td>
                            <td>{{ $item->compra->nota_fiscal }} — {{ \Carbon\Carbon::parse($item->compra->dataCOMPRA)->format('d/m/Y') }}</td>
                            <td>{{ $item->ingrediente->descricaoINGREDIENTE }}</td>
                            <td>{{ $item->quantidadeITEMCOMPRA }}</td>
                            <td>{{ number_format($item->valorUnitarioITEMCOMPRA, 2, ',', '.') }}</td>
                            <td class="acoes">
                                <a href="{{ route('itenscompra.edit', $item->cod_item) }}" class="btn btn--ghost">Editar</a>
                                <form action="{{ route('itenscompra.destroy', $item->cod_item) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn--slime" onclick="return confirm('Tem certeza que deseja excluir este item?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="empty">Nenhum item de compra encontrado.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="btn-group" style="margin-top: 20px;">
                <a href="{{ route('itenscompra.create') }}" class="btn btn--shrek slime-drop"> + Novo Item de Compra</a>
            </div>
        </section>
    </main>    

    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
        <div class="btn-group">
        </div>
    </footer>
</body>
</html>