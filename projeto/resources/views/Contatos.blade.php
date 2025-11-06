<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pratos - Podrão do Shrek</title>
    <link rel="stylesheet" href="{{ asset('css/PodraoPadrao.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Freckle+Face&family=Luckiest+Guy&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Shrikhand&display=swap" rel="stylesheet">
    <style>
        .contact-card {
            background: linear-gradient(180deg, #fafff5, #e5f7db);
            border: 2px solid var(--mud-brown, #7c6a48);
            border-radius: 12px;
            padding: 30px 40px;
            max-width: 400px;
            box-shadow: 0 6px 14px rgba(47, 75, 34, 0.3);
            text-align: center;
        }
        h1 {
            font-family: 'Luckiest Guy', cursive;
            font-size: 3rem;
            margin-bottom: 24px;
            color: var(--shrek-green-2, #919652);
            text-shadow: 2px 2px 0 rgba(138, 193, 102, 0.6);
        }
        .info-item {
            margin: 16px 0;
            font-weight: 600;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 14px;
            justify-content: center;
        }
        .info-item span {
            background: var(--slime-yellow, #eaff8f);
            padding: 10px;
            border-radius: 50%;
            color: var(--shrek-green-3, #37372a);
            font-size: 1.5rem;
            box-shadow: 0 0 8px rgba(198, 214, 42, 0.4);
        }
    </style>   
</head>
<body>
    <div class="swamp-anim"></div>
    <header class="header">
        <div class="brand">
            <div class="logo wobble"><img src="{{ asset('css/SPODRAO.png') }}" alt="Logo Shrek"  width="auto" height="80"></div>
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
                    <a href="{{ route('itens_compra.cadastrar') }}">Itens de Compra</a>
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
            <div class="contact-card">
            <h1>Contato</h1>
            <div class="info-item"><span>📞</span> Telefone: (11) 91234-5678</div>
            <div class="info-item"><span>📍</span> Endereço: Rua do Pântano, 123, Floresta Encantada</div>
            <div class="info-item"><span>✉️</span> Email: pantanomanda@example.com</div>
        </div>
        </section>
    </main>


    <footer class="footer">
        <small>© 2025 Podrão do Shrek — Feito com amor e cebolas 🧅</small>
    </footer>
    
</body>
</html>