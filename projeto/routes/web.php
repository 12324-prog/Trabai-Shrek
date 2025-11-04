<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produtos;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// SELECT
Route::get('/', function () {
    $produtos = new Produtos();
    $produtos = $produtos->listarProdutos();
    return view('shrek', ["produtos"=>$produtos]);
});

// INSERT
Route::get('/adicionar', function () {
    $id = request('id') ?? NULL;
    if(isset($id))
    {
        $produtos = new Produtos();
        $produto = $produtos->buscarProduto($id);
        return view('adicionar', ["produto"=>$produto]);
    }
    else
    {
        return view('adicionar');
    }
});

Route::post('/adicionar/cadastrar', function (Request $request) {

    $produtos = new Produtos();

    $produtos->nomeProduto = $request->input('nome');
    $produtos->descricaoProduto = $request->input('descricao');
    $produtos->precoProduto = str_replace("R$","",str_replace(",",".",$request->input('preco')));
    
    $produtos->gravar($produtos->nomeProduto, $produtos->descricaoProduto, $produtos->precoProduto);
    
    $produtos = $produtos->listarProdutos();
    return view('shrek', ["produtos"=>$produtos]);
});

// UPDATE


// DELETE
Route::get('/excluir', function()
{
    $produtos = new Produtos();

    $produtos->apagar (request('id'));
    $produtos = $produtos->listarProdutos();
    return view('shrek', ["produtos"=>$produtos]);
});

//Mecado
Route::view('/', 'Mercado')->name('mercado');

// Páginas simples
Route::view('/contatos', 'Contatos')->name('contatos');
Route::view('/relatorios', 'DirecionadorDErelatorio')->name('relatorios');

// Cidades
Route::view('/cidades', 'index')->name('cidades.index');
Route::view('/cidades/cadastrar', 'CADcidades')->name('cidades.cadastrar');

// Clientes
Route::view('/clientes', 'index')->name('clientes.index');
Route::view('/clientes/cadastrar', 'CADclientes')->name('clientes.cadastrar');

// Compras
Route::view('/compras', 'index')->name('compras.index');
Route::view('/compras/cadastrar', 'CADcompras')->name('compras.cadastrar');

// Fornecedores
Route::view('/fornecedores', 'index')->name('fornecedores.index');
Route::view('/fornecedores/cadastrar', 'CADfornecedores')->name('fornecedores.cadastrar');

// Ingredientes 
Route::view('/ingredientes', 'index')->name('ingredientes.index');
Route::view('/ingredientes/cadastrar', 'CADingredientes')->name('ingredientes.cadastrar');

// Itens de Compra
Route::view('/itens_compra', 'index')->name('itens_compra.index');
Route::view('/itens_compra/cadastrar', 'CADitens_compra')->name('itens_compra.cadastrar');

// Itens de Pedido
Route::view('/itens_pedido', 'index')->name('itens_pedido.index');
Route::view('/itens_pedido/cadastrar', 'CADitens_pedido')->name('itens_pedido.cadastrar');

// Pedidos
Route::view('/pedidos', 'index')->name('pedidos.index');
Route::view('/pedidos/cadastrar', 'CADpedidos')->name('pedidos.cadastrar');

// Pratos
Route::view('/pratos', 'index')->name('pratos.index');
Route::view('/pratos/cadastrar', 'CADpratos')->name('pratos.cadastrar');