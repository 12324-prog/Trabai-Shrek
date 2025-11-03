<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Pratos - Podrão do Shrek</title>
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
                <h1 class="title">Relatório de Pratos</h1>
                <p class="highlight">Veja os pratos incríveis preparados direto do pântano do Podrão do Shrek.</p>
            </div>
            <div class="table-container">
                <table class="shrek-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>                       
                            <th>Valor Unitário (R$)</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pratos as $prato)
                        <tr>
                            <td>{{ $prato->cod_prato }}</td>
                            <td>{{ $prato->descricaoPRATO }}</td>
                            <td>{{ number_format($prato->valorUnitarioPRATO, 2, ',', '.') }}</td>
                            <td class="acoes">
                                <a href="{{ route('pratos.edit', $prato->cod_prato) }}" class="btn btn--ghost">Editar</a>
                                <form action="{{ route('pratos.destroy', $prato->cod_prato) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn--slime" onclick="return confirm('Tem certeza que deseja excluir este prato?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="empty">Nenhum prato encontrado.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="btn-group" style="margin-top: 20px;">
                <a href="{{ route('pratos.create') }}" class="btn btn--shrek slime-drop"> + Novo Prato</a>
            </div>
        </section>
    </main>

    

    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
    </footer>
</body>
</html>