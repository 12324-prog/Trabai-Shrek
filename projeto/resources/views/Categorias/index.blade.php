<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Categorias - Podrão do Shrek</title>
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
                <h1 class="title">📋 Relatório de Categorias</h1>
                <p class="highlight">Aqui estão todas as categorias cadastradas.</p>
            </div>

            <div class="card">
                @if(session('success'))
                    <div class="alert success">{{ session('success') }}</div>
                @endif

                <table class="tabela-shrek">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrição</th>  
                            <th>Ações</th>         
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->descricaoCATEGORIA }}</td>
                                <td>
                                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn--ghost">Editar</a>
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn--slime" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="empty">Nenhuma categoria encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="btn-group" style="margin-top: 20px;">
                    <a href="{{ route('categorias.create') }}" class="btn btn--shrek slime-drop">➕ Nova Categoria</a>
                </div>
            </div>
        </section>
    </main>    

    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
    </footer>
</body>
</html>