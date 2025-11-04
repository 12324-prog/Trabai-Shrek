<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Ingredientes - Podrão do Shrek</title>
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
                <h1 class="title">Relatório de Ingredientes</h1>
                <p class="highlight">Veja todos os ingredientes que temperam o pântano do sabor.</p>
            </div>

            <div class="table-container">
                <table class="shrek-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Quantidade em Estoque</th>
                            <th>Valor Unitário (R$)</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ingredientes as $ingrediente)
                        <tr>
                            <td>{{ $ingrediente->cod_ingrediente }}</td>
                            <td>{{ $ingrediente->descricao }}</td>                        
                            <td>{{ $ingrediente->quantidade_estoque }}</td>
                            <td>R$ {{ number_format($ingrediente->valor_unitario, 2, ',', '.') }}</td>
                            <td class="acoes">
                                <a href="{{ route('ingredientes.edit', $ingrediente->cod_ingrediente) }}" class="btn btn--ghost">Editar</a>
                                <form action="{{ route('ingredientes.destroy', $ingrediente->cod_ingrediente) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn--slime" onclick="return confirm('Tem certeza que deseja excluir este ingrediente?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="empty">Nenhum ingrediente encontrado.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="btn-group" style="margin-top: 20px;">
                <a href="{{ route('ingredientes.create') }}" class="btn btn--shrek slime-drop">+ Novo Ingrediente</a>
            </div>
        </section>
    </main>

    
    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
    </footer>
</body>
</html>