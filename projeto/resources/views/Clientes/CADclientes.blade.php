<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Clientes - Podrão do Shrek</title>
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
                <h1 class="title">Cadastrar Cliente</h1>
                <p class="highlight">Cadastre novos clientes famintos! Porque todo mundo merece experimentar o sabor lendário do Podrão do Shrek.</p>
            </div>
            <div class="card">
                <form action="{{ route('clientes.store') }}" method="POST" class="form-qa">
                    @csrf
                    <div class="question">
                        <div class="q-bubble">Nome</div>
                        <div class="answer"><input type="text" id="nomeCLIENTE" name="nomeCLIENTE" required></div>
                    </div>     

                    <div class="question">
                        <div class="q-bubble">Endereço</div>
                        <div class="answer"><input type="text" id="enderecoCLIENTE" name="endereco" required></div>
                    </div> 

                    <div class="question">
                        <div class="q-bubble">Número</div>
                        <div class="answer"><input type="text" id="numeroCLIENTE" name="numeroCLIENTE" required></div>
                    </div>   

                    <div class="question">
                        <div class="q-bubble">Bairro</div>
                        <div class="answer"><input type="text" id="bairro" name="bairro" required></div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Cidade</div>
                        <div class="answer"><input type="text" id="cidadeCLIENTE" name="cidadeCLIENTE" required></div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Celular</div>
                        <div class="answer"><input type="tel" id="celularCLIENTE" name="celularCLIENTE" required></div>
                    </div> 
                    
                    <button type="submit" class="btn btn--shrek slime-drop">Cadastrar</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
        <div class="btn-group">
            <btn id="btn-ajuda" class="btn btn--ghost">Ajuda</btn>
             <a href="{{ route('clientes.index') }}" class="btn btn--slime">Ver Clientes</a>
        </div>
    </footer>

    <script>
        const btnAjuda = document.getElementById('btn-ajuda');

        btnAjuda.addEventListener('click', () => {
            alert('ajuda? também quero');
        });
    </script>
    
</body>
</html>