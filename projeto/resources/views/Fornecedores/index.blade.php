<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Fornecedores - Podrão do Shrek</title>
    <link rel="stylesheet" href="PodraoPadrao.css">
</head>
<body>
    <div class="swamp-anim"></div>
    <header class="header">
        <div class="brand">
            <div class="logo wobble">🍔</div>
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
                <h1 class="title">📋 Relatório de Fornecedores</h1>
                <p class="highlight">Aqui estão todos os fornecedores cadastrados no pântano do sabor.</p>
            </div>

            <div class="card">
                @if(session('success'))
                    <div class="alert success">{{ session('success') }}</div>
                @endif

                <table class="tabela-shrek">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome Social</th>
                            <th>Nome Fantasia</th>
                            <th>CNPJ</th>
                            <th>Cidade</th>
                            <th>Celular</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->id }}</td>
                                <td>{{ $fornecedor->nomeS }}</td>
                                <td>{{ $fornecedor->nomeF }}</td>
                                <td>{{ $fornecedor->CNPJ }}</td>
                                <td>{{ $fornecedor->cidade }}</td>
                                <td>{{ $fornecedor->Celular }}</td>
                                <td>{{ $fornecedor->Email }}</td>
                                <td>
                                    <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="btn btn--ghost">Editar</a>
                                    <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn--slime" onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="empty">Nenhum fornecedor encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="btn-group" style="margin-top: 20px;">
                    <a href="{{ route('fornecedores.create') }}" class="btn btn--shrek slime-drop">➕ Novo Fornecedor</a>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
    </footer>
</body>
</html>