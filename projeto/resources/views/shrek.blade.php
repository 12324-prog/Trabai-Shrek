<!DOCTYPE html>
<html lang="Portuguese">
<head>
    <meta charset="UTF-8">
    <title>Podrão do Shrek</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Shrek CSS.css') }}">
</head>
<body>
    <header class="site-header">
        <div>
            <div class="marcaShrek">Podrão do Shrek</div>
            <div class="tag">Pântano. Suculento. Sem cerimônia.</div>
        </div>

        <nav>
            <a href="#cardapio">Cardápio</a>
            <a href="#promocoes">Promoções</a>
            <a href="#sobre">Sobre o Ogro</a>
            <a href="\adicionar">Adicionar</a>
            <button class="cta">Peça Agora</button>
        </nav>
    </header>


    <main>
        <section class="hero">
            <div class="hero-left">
                <h1>O lanche é monstruosamente grande</h1>
                <p>Direto do pântano para a sua boca. Lanches generosos, molhos escorrendo e muita ousadia — recomendado para quem tem fome de verdade.</p>
                <div style="display:flex;gap:12px">
                    <button class="btn-primary">Ver o Cardápio</button>
                    <button class="btn-ghost">Combo do Dia</button>
                </div>
            </div>
            <div class="hero-right">
                <div class="burger-card" aria-hidden>
                    <div class="grime"></div>
                    <div class="burger" style="text-align:center">
                        <div class="pao" style="border-radius:40px 40px 30px 30px;padding:12px 36px; color: #d89b4a">SHREK</div>
                        <div class="alface"></div>
                        <div class="burguinho"></div>
                        <div class="queijo"></div>
                        <div class="burguinho" style="height:16px"></div>
                        <div class="pao" style="border-radius:30px 30px 40px 40px;padding:10px 36px;margin-top:8px"></div>
                    </div>
                </div>
            </div>
        </section>


        <section id="cardapio" class="section">
            <h2 style="font-family:'Baloo 2';color:var(--bege)">Cardápio do Pântano</h2>
            <div class="grid">
                @if(!@empty($produtos))
                    @foreach ($produtos as $produto)
                    <article class="card">
                        <h3>{{$produto->nome_produto}}</h3>
                        <p>{{$produto->descricao_produto}}</p>
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:10px">
                            <div class="preco">R$ {{@number_format( $produto->preco , 2, ',', '.')}} </div>
                            <a href="\excluir?id={{$produto->cod_produto}}">Apagar</a>
                            <a href="\adicionar?id={{$produto->cod_produto}}">Editar</a>
                            <button class="cta">Pedir</button>
                        </div>
                    </article>
                    @endforeach
                @else
                    <span>Nenhum produto registrado</span>
                @endif
            </div>
        </section>
        
<!-- Aqui são algumas sugestões de outros lanches, caso queira adicionar mais itens ao cardápio no db.
De certa forma, o ideal é que esses itens sejam puxados do banco de dados, mas para fins de demonstração, 
seguem alguns exemplos estáticos.

Qualquer coisa é só montar a base de dados com esses itens e fazer o fetch no PHP.

Vou deixar comentado para não poluir a página, mas é só descomentar e ajustar os preços/descrições conforme necessário.

ok Cauan?

                <article class="card">
                    <h3>Podrão Ogre Gigante</h3>
                    <p>Três hamburgueres, bacon, ovo frito, cheddar duplo, cebola crocante e molho secreto do pântano.</p>
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:10px">
                        <div class="preco">R$ 34,90</div>
                        <button class="cta">Pedir</button>
                    </div>
                 </article>

        <article class="card">
        <h3>Cebola Pantanosa</h3>
        <p>Anéis de cebola empanados com toque de ervas do pântano. Acompanhamento perfeito.</p>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:10px">
        <div class="preco">R$ 12,90</div>
        <button class="cta">Pedir</button>
        </div>
        </article>


        <article class="card">
        <h3>Milkshake de Lama</h3>
        <p>Milkshake cremoso de chocolate com calda verde (sabor menta/pistache). Cobertura exagerada.</p>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:10px">
        <div class="preco">R$ 14,50</div>
        <button class="cta">Pedir</button>
        </div>
        </article> -->

        <footer>

            <div>
                &copy; 2025 Podrão do Shrek. Todos os direitos reservados.
            </div>
            
        </footer>


</body>
</html>