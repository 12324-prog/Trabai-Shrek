<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mercado - Podrão do Shrek</title>
    <link rel="stylesheet" href="mercado.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Freckle+Face&family=Luckiest+Guy&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Shrikhand&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="swamp-anim"></div>
    <header class="header">
        <div class="brand">
            <div class="logo wobble"><img src="SPODRAO.png" alt="Logo Shrek" height="80" /></div>
            <span>Podrão do Shrek - Mercado</span>
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
        <h1 class="title">Mercado do Pântano</h1>
        <p class="highlight">Escolha os ingredientes para o seu podrão e finalize a compra!</p>
        </div>
    </section>
    <br>
    <section class="grid">
        
        <div class="menu-card">
        <div class="thumb">🍅</div>
        <div class="info">
            <h4>Tomate</h4>
            <p>Fresco e vermelho, a paixão do Burro.</p>

            <div class="dropdown">
            <button class="dropbtnM">Selecionar Fornecedor</button>
            <div class="dropdown-content">
                @foreach($fornecedores as $fornecedor)
                <a href="#" data-fornecedor-id="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</a>
                @endforeach
            </div>
            </div>

            <div class="qtd">
            <label for="tomate-qtd">Quantidade:</label>
            <input type="number" id="tomate-qtd" min="1" value="1">
            </div>

        </div>
        </div>

        
        <div class="menu-card">
        <div class="thumb">🧀</div>
        <div class="info">
            <h4>Queijo</h4>
            <p>Cremoso e irresistível, direto do reino de Tão Tão Distante.</p>

            <div class="dropdown">
            <button class="dropbtnM">Selecionar Fornecedor</button>
            <div class="dropdown-content">
                @foreach($fornecedores as $fornecedor)
                <a href="#" data-fornecedor-id="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</a>
                @endforeach
            </div>
            </div>

            <div class="qtd">
            <label for="queijo-qtd">Quantidade:</label>
            <input type="number" id="queijo-qtd" min="1" value="1">
            </div>
        </div>
        </div>

        <div class="menu-card">
        <div class="thumb">🥬</div>
        <div class="info">
            <h4>Alface</h4>
            <p>Alfaces Verdinhos e Crocantes, de confiança da Fiona.</p>

            <div class="dropdown">
            <button class="dropbtnM">Selecionar Fornecedor</button>
            <div class="dropdown-content">
                @foreach($fornecedores as $fornecedor)
                <a href="#" data-fornecedor-id="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</a>
                @endforeach
            </div>
            </div>

            <div class="qtd">
            <label for="alface-qtd">Quantidade:</label>
            <input type="number" id="alface-qtd" min="1" value="1">
            </div>
        </div>
        </div>

        <div class="menu-card">
        <div class="thumb">🥓</div>
        <div class="info">
            <h4>Bacon</h4>
            <p>Bacon crocante digno de uma refeição no pântano. Shrek aprova!</p>
            <div class="dropdown">
            <button class="dropbtnM">Selecionar Fornecedor</button>
            <div class="dropdown-content">
                @foreach($fornecedores as $fornecedor)
                <a href="#" data-fornecedor-id="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</a>
                @endforeach
            </div>
            </div>
            <div class="qtd">
            <label for="bacon-qtd">Quantidade:</label>
            <input type="number" id="bacon-qtd" min="1" value="1">
            </div>
        </div>
        </div>

        <div class="menu-card">
        <div class="thumb">🥫</div>
        <div class="info">
            <h4>Ketchup</h4>
            <p>Ketchup vermelho do pântano, feito só com tomate topzera.</p>
            <div class="dropdown">
            <button class="dropbtnM">Selecionar Fornecedor</button>
            <div class="dropdown-content">
                @foreach($fornecedores as $fornecedor)
                <a href="#" data-fornecedor-id="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</a>
                @endforeach
            </div>
            </div>
            <div class="qtd">
            <label for="ketchup-qtd">Quantidade:</label>
            <input type="number" id="ketchup-qtd" min="1" value="1">
            </div>
        </div>
        </div>

        <div class="menu-card">
        <div class="thumb">🥚🫙</div>
        <div class="info">
            <h4>Maionese</h4>
            <p>Maionese cremosa feita na mão, receita secreta do Pinóquio.</p>
            <div class="dropdown">
            <button class="dropbtnM">Selecionar Fornecedor</button>
            <div class="dropdown-content">
                @foreach($fornecedores as $fornecedor)
                <a href="#" data-fornecedor-id="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</a>
                @endforeach
            </div>
            </div>
            <div class="qtd">
            <label for="maionese-qtd">Quantidade:</label>
            <input type="number" id="maionese-qtd" min="1" value="1">
            </div>         
        </div>
        </div>

        <div class="menu-card">
        <div class="thumb">🍞</div>
        <div class="info">
            <h4>Pão</h4>
            <p>Pão fofinho, recém saído do forno do ogro. Gato de Botas já comeu três!</p>
            <div class="dropdown">
            <button class="dropbtnM">Selecionar Fornecedor</button>
            <div class="dropdown-content">
                @foreach($fornecedores as $fornecedor)
                <a href="#" data-fornecedor-id="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</a>
                @endforeach
            </div>
            </div>
            <div class="qtd">
            <label for="pao-qtd">Quantidade:</label>
            <input type="number" id="pao-qtd" min="1" value="1">
            </div>
        </div>
        </div>

        <div class="menu-card">
        <div class="thumb">🥩</div>
        <div class="info">
            <h4>Carne</h4>
            <p>Carne suculenta, gigante, para burger que faz jus ao Shrek.</p>
            <div class="dropdown">
            <button class="dropbtnM">Selecionar Fornecedor</button>
            <div class="dropdown-content">
                @foreach($fornecedores as $fornecedor)
                <a href="#" data-fornecedor-id="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</a>
                @endforeach
            </div>
            </div>
            <div class="qtd">
            <label for="carne-qtd">Quantidade:</label>
            <input type="number" id="carne-qtd" min="1" value="1">
            </div>
        </div>
        </div>
        </section>

        <br>

        <div class="actions">
            <button id="cancelar-compra" class="btn btn--ghost" >Cancelar</button>
            <button id="finalizar-compra" class="btn btn--shrek">Finalizar</button>
        </div>

    </main>

    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
    </footer>


    <script>

    const btnFinalizar = document.getElementById("finalizar-compra");
    const btnCancelar = document.getElementById("cancelar-compra");
    const itensCarrinho = document.querySelectorAll(".menu-card");

    btnFinalizar.addEventListener("click", () => {
        let lista = [];
        let total = 0;

        itensCarrinho.forEach((item) => {
        const nome = item.querySelector(".menu-title").textContent;
        const preco = parseFloat(
            item.querySelector(".menu-price").textContent.replace("R$", "").replace(",", ".")
        );
        const quantidadeInput = item.querySelector(".menu-quantity input");
        const quantidade = parseInt(quantidadeInput.value) || 0;

        if (quantidade > 0) {
            lista.push(`${quantidade}x ${nome} — R$ ${(preco * quantidade).toFixed(2)}`);
            total += preco * quantidade;
        }
        });

        if (lista.length === 0) {
        alert("Nenhum item selecionado!");
        } else {
        alert(`🛒 Compra finalizada!\n\n${lista.join("\n")}\n\nTotal: R$ ${total.toFixed(2)}`);
        }
    });

    btnCancelar.addEventListener("click", () => {
        itensCarrinho.forEach((item) => {
        const quantidadeInput = item.querySelector(".menu-quantity input");
        quantidadeInput.value = 0;
        });
        alert("❌ Compra cancelada!");
    });
    </script>


</body>
</html>