<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Ingredientes - Podrão do Shrek</title>
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
            <a href="#">Início</a>

              <div class="dropdown">
                <button class="dropbtn">Cadastros</button>
                <div class="dropdown-content">
                <a href="#">Cidades</a>
                    <a href="#">Fornecedores</a>
                    <a href="#">Categorias</a>
                    <a href="#">Unidades</a>
                    <a href="#">Ingredientes</a>
                    <a href="#">Pratos</a>
                    <a href="#">Compras</a>
                    <a href="#">Itens das Compras</a>
                    <a href="#">Garçons</a>
                    <a href="#">Entregadores</a>
                    <a href="#">Mesas</a>
                    <a href="#">Pedidos</a>
                    <a href="#">Itens dos Pedidos</a>
                    <a href="#">Clientes</a>
                </div>
            </div>

            <a href="#">Área de Registro</a>
            <a href="#">Contato</a>
            
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
                            <th>Unidade</th>
                            <th>Controla Estoque</th>
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
                            <td>{{ $ingrediente->unidade->descricao ?? 'N/A' }} ({{ $ingrediente->unidade->sigla ?? '' }})</td>
                            <td>{{ $ingrediente->controla_estoque ? 'Sim' : 'Não' }}</td>
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
        <div class="btn-group">
            <button class="btn btn--ghost">Ajuda</button>
            <button class="btn btn--slime">Ver Fornecedores</button>
        </div>
    </footer>
</body>
</html>