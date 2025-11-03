<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Ingredientes - Podrão do Shrek</title>
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
                <h1 class="title">Cadastrar Ingrediente</h1>
                <p class="highlight">
                    Liste todos os ingredientes necessários para as delícias do pântano! 
                    Sem eles, o podrão perde a graça (e o tempero).
                </p>
            </div>

            <div class="card">
                <form action="{{ route('ingredientes.store') }}" method="POST" class="form-qa">
                    @csrf

                    <div class="question">
                        <div class="q-bubble">Descrição</div>
                        <div class="answer">
                            <input type="text" id="descricao" name="descricao" required>
                        </div>
                    </div>           

                    <div class="question">
                        <div class="q-bubble">Tipo de Unidade</div>
                        <div class="answer">
                            <select id="cod_unidade" name="cod_unidade" required>
                                <option value="">Selecione uma unidade</option>
                                @foreach($unidades as $unidade)
                                    <option value="{{ $unidade->cod_unidade }}">
                                        {{ $unidade->descricao }} ({{ $unidade->sigla }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>    

                    <div class="question">
                        <div class="q-bubble">Controla Estoque?</div>
                        <div class="answer">
                            <label>
                                <input type="checkbox" id="controla_estoque" name="controla_estoque" value="1">
                                Sim
                            </label>
                        </div>
                    </div> 

                    <div class="question">
                        <div class="q-bubble">Quantidade em Estoque</div>
                        <div class="answer">
                            <input type="number" step="0.01" id="quantidade_estoque" name="quantidade_estoque" value="0" required>
                        </div>
                    </div>   

                    <div class="question">
                        <div class="q-bubble">Valor Unitário (R$)</div>
                        <div class="answer">
                            <input type="number" step="0.01" id="valor_unitario" name="valor_unitario" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn--shrek slime-drop">Cadastrar</button>
                </form>
            </div>
        </section>
    </main>



    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
        <div class="btn-group">
            <button class="btn btn--ghost">Ajuda</button>
            <button class="btn btn--slime">Ver Ingredientes</button>
        </div>
    </footer>
</body>
</html>