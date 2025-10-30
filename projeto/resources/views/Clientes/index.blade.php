<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Clientes - Podrão do Shrek</title>
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
                            <th>Nome</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>Data de Nascimento</th>
                            <th>Endereço</th>
                            <th>Cidade</th>
                            <th>CEP</th>
                            <th>Celular</th>
                            <th>Email</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nomeCLIENTE }}</td>
                                <td>{{ $cliente->rg }}</td>
                                <td>{{ $cliente->cpf }}</td>
                                <td>{{ $cliente->dataNASC }}</td>
                                <td>{{ $cliente->endereco }}</td>
                                <td>{{ $cliente->numeroCLIENTE }}</td>
                                <td>{{ $cliente->Bairro }}</td>
                                <td>{{ $cliente->cidade_id }}</td>
                                <td>{{ $cliente->cepCLIENTE }}</td>
                                <td>{{ $cliente->celularCLIENTE }}</td>
                                <td>{{ $cliente->EmailCLIENTE }}</td>
                                                                
                                <td>
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn--ghost">Editar</a>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn--slime" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="empty">Nenhum cliente encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="btn-group" style="margin-top: 20px;">
                    <a href="{{ route('clientes.create') }}" class="btn btn--shrek slime-drop">➕ Novo Cliente</a>
                </div>
            </div>
        </section>
    </main>


    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
    </footer>
</body>
</html>