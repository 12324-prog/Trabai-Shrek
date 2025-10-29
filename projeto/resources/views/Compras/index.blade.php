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
                <h1 class="title">📋 Relatório de Compras</h1>
                <p class="highlight">Aqui estão todas as compras cadastradas.</p>
            </div>

            <div class="card">
                @if(session('success'))
                    <div class="alert success">{{ session('success') }}</div>
                @endif

                <table class="tabela-shrek">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data da Compra</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>Data de Nascimento</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($compras as $compra)
                            <tr>
                                <td>{{ $compra->id }}</td>
                                <td>{{ $compra->dataCOMPRA }}</td>
                                <td>{{ $compra->notafiscal }}</td>
                                <td>{{ $compra->valorTotalCOMPRA }}</td>
                                <td>{{ $compra->fornecedor_id }}</td>
                                
                                <td>
                                    <a href="{{ route('compras.edit', $compra->id) }}" class="btn btn--ghost">Editar</a>
                                    <form action="{{ route('compras.destroy', $compra->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn--slime" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="empty">Nenhuma compra encontrada.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="btn-group" style="margin-top: 20px;">
                    <a href="{{ route('compras.create') }}" class="btn btn--shrek slime-drop">➕ Nova Compra</a>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>      
    </footer>
</body>
</html>