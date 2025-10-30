<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Clientes - Podrão do Shrek</title>
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
                        <div class="q-bubble">RG</div>
                        <div class="answer"><input type="text" id="rg" name="rg" required></div>
                    </div>    

                    <div class="question">
                        <div class="q-bubble">CPF</div>
                        <div class="answer"><input type="text" id="cpf" name="cpf" required></div>
                    </div>  

                    <div class="question">
                        <div class="q-bubble">Data de Nascimento</div>
                        <div class="answer"><input type="date" id="dataNASC" name="dataNASC" required></div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Endereço</div>
                        <div class="answer"><input type="text" id="endereco" name="endereco" required></div>
                    </div> 

                    <div class="question">
                        <div class="q-bubble">Número</div>
                        <div class="answer"><input type="text" id="numeroCLIENTE" name="numeroCLIENTE" required></div>
                    </div>   

                    <div class="question">
                        <div class="q-bubble">Bairro</div>
                        <div class="answer"><input type="text" id="Bairro" name="Bairro" required></div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">Cidade</div>
                        <div class="answer">
                            <select id="cidade_id" name="cidade_id" required>
                                <option value="">Selecione uma cidade</option>
                                @foreach($cidades as $cidade)
                                    <option value="{{ $cidade->nome }}">{{ $cidade->uf }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="question">
                        <div class="q-bubble">CEP</div>
                        <div class="answer"><input type="text" id="cepCLIENTE" name="cepCLIENTE" required></div>
                    </div> 

                    <div class="question">
                        <div class="q-bubble">Celular</div>
                        <div class="answer"><input type="tel" id="celularCLIENTE" name="celularCLIENTE" required></div>
                    </div> 

                    <div class="question">
                        <div class="q-bubble">Email</div>
                        <div class="answer"><input type="email" id="EmailCLIENTE" name="EmailCLIENTE" required></div>
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
            <button class="btn btn--slime">Ver Clientes</button>
        </div>
    </footer>
</body>
</html>