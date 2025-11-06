<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Pedidos - Podrão do Shrek</title>
    <link rel="stylesheet" href="{{ asset('css/RelatorioPodrao.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Freckle+Face&family=Luckiest+Guy&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Shrikhand&display=swap" rel="stylesheet">
</head>
<body>
    <div class="swamp-anim"></div>
    <header class="header">
        <div class="brand">
            <div class="logo wobble"><img src="{{ asset('css/SPODRAO.png') }}" alt="Logo Shrek"  width="auto" height="80"></div>
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
                    <a href="{{ route('itens_compra.cadastrar') }}">Itens de Compra</a>
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
                <h1 class="title">Relatório de Pedidos</h1>
                <p class="highlight">Confira todos os pedidos realizados no podrão, com status, cliente e detalhes.</p>
            </div>

            <!-- Barra de pesquisa adicionada -->
            <div class="search-container">
                <input type="text" id="searchInput" class="search-box" placeholder="Pesquisar por cliente...">
            </div>

            <div class="table-container">
                <table class="shrek-table" id="pedidosTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Tipo Pedido</th>
                            <th>Valor Total (R$)</th>
                            <th>Criado em</th>
                            <th>Encerrado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @forelse($pedidos as $pedido)
                        <tr class="pedido-row">
                            <td>{{ $pedido->cod_pedido }}</td>
                            <td class="cliente-nome">{{ $pedido->nome }}</td>
                            <td>
                                @if($pedido->tipo_pedido == 1) Delivery (Presencial)
                                @elseif($pedido->tipo_pedido == 2) Delivery (Domiciliar)
                                @else Atendimento Presencial
                                @endif
                            </td>
                            <td>{{ number_format($pedido->valor_pago, 2, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($pedido->datahora)->format('d/m/Y H:i') }}</td>
                            <td>{{ $pedido->encerrado ? 'Sim' : 'Não' }}</td>
                            <td class="acoes">
                                <a href="{{ route('pedidos.edit', ['id'=>$pedido->cod_pedido]) }}" class="btn btn--ghost">Editar</a>
                                <form action="{{ route('pedidos.destroy', ['id'=>$pedido->cod_pedido]) }}" method="POST" style="display:inline;">
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
                        <tr id="noResults" class="no-results">
                            <td colspan="12">Nenhum pedido encontrado.</td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <div class="btn-group" style="margin-top: 20px;">
                <a href="{{ route('pedidos.cadastrar') }}" class="btn btn--shrek slime-drop"> + Novo Pedido</a>
            </div>
        </section>
    </main>

    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableRows = document.querySelectorAll('.pedido-row');
            const noResultsMessage = document.getElementById('noResults');
            const emptyRow = document.querySelector('.empty');
            
            // Se houver uma linha vazia, vamos removê-la da filtragem
            if (emptyRow) {
                emptyRow.style.display = 'none';
            }
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                let hasResults = false;
                
                // Percorre todas as linhas da tabela
                tableRows.forEach(row => {
                    const clienteNome = row.querySelector('.cliente-nome').textContent.toLowerCase();
                    
                    // Verifica se o nome do cliente contém o termo pesquisado
                    if (clienteNome.includes(searchTerm)) {
                        row.style.display = '';
                        hasResults = true;
                    } else {
                        row.style.display = 'none';
                    }
                });
                
                // Mostra ou esconde a mensagem de "nenhum resultado"
                if (!hasResults && searchTerm !== '') {
                    noResultsMessage.style.display = 'block';
                } else {
                    noResultsMessage.style.display = 'none';
                }
                
                // Se não houver pedidos no sistema
                if (tableRows.length === 0) {
                    noResultsMessage.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>