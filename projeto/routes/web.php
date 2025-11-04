<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produtos;
use App\Models\Fornecedores;
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
    return view('DirecionadorDErelatorio');
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
Route::get('/', function () {
    $fornecedores = new Fornecedores;
    $fornecedores = $fornecedores->listarFornecedores();
    return view('Mercado', ["fornecedores"=>$fornecedores]);
})->name('mercado');

// Páginas simples
Route::get('/contatos', function () {
    return view('Contatos');
})->name('contatos');

Route::get('/relatorios', function () {
    return view('DirecionadorDErelatorio');
})->name('relatorios');


// Cidades
Route::get('/cidades', function () {
    return view('Cidades/index');
})->name('cidades.index');

Route::get('/cidades/cadastrar', function () {
    return view('Cidades/CADcidades');
})->name('cidades.cadastrar');


// Clientes
Route::get('/clientes', function () {
    return view('Clientes/index');
})->name('clientes.index');

Route::get('/clientes/cadastrar', function () {
    return view('Clientes/CADclientes');
})->name('clientes.cadastrar');


// Compras
Route::get('/compras', function () {
    return view('Compras/index');
})->name('compras.index');

Route::get('/compras/cadastrar', function () {
    return view('Compras/CADcompras');
})->name('compras.cadastrar');


// Fornecedores
Route::get('/fornecedores', function () {
    $fornecedores = new Fornecedores;
    $fornecedores = $fornecedores->listarFornecedores();
    return view('Fornecedores/index', ["fornecedores"=>$fornecedores]);
})->name('fornecedores.index');

Route::get('/fornecedores/cadastrar', function () {
    $fornecedor = null;
    return view('Fornecedores/CADfornecedores', ["fornecedor"=>$fornecedor]);
})->name('fornecedores.cadastrar');

Route::post('/fornecedores/cadastrar/add', function (Request $request) {

    $fornecedores = new Fornecedores;

    $fornecedores->nome_social = $request->input('nomeS');
    $fornecedores->celular = $request->input('Celular');
    
    $fornecedores->inserirFornecedores();
    
    $fornecedores = $fornecedores->listarFornecedores();
    return view('Fornecedores/index', ["fornecedores"=>$fornecedores]);
})->name('fornecedores.store');

Route::get('/fornecedores/editar', function (Request $request) {
    $id = request('id') ?? NULL;

    $fornecedores = new Fornecedores;
    $fornecedor = $fornecedores->buscarFornecedores($id);

    return view('Fornecedores/CADfornecedores', ["fornecedor"=>$fornecedor]);
})->name('fornecedores.edit');

Route::post('/fornecedores/editar/edit', function (Request $request) {
    $id = request('id') ?? NULL;

    $fornecedores = new Fornecedores;

    $fornecedores->nome_social = $request->input('nomeS');
    $fornecedores->celular = $request->input('Celular');

    $fornecedores->atualizarFornecedores($id);

    $fornecedores = $fornecedores->listarFornecedores();
    return view('Fornecedores/index', ["fornecedores"=>$fornecedores]);
})->name('fornecedores.update');

Route::delete('/fornecedores/deletar', function (Request $request) {

    $id = request('id') ?? NULL;

    $fornecedores = new Fornecedores;
    
    $fornecedores->apagarFornecedores($id);
    
    $fornecedores = $fornecedores->listarFornecedores();
    return view('Fornecedores/index', ["fornecedores"=>$fornecedores]);
})->name('fornecedores.destroy');


// Ingredientes
Route::get('/ingredientes', function () {
    return view('Ingredientes/index');
})->name('ingredientes.index');

Route::get('/ingredientes/cadastrar', function () {
    return view('Ingredientes/CADingredientes');
})->name('ingredientes.cadastrar');


// Itens de Compra
Route::get('/itens_compra', function () {
    return view('Itens Compra/index');
})->name('itens_compra.index');

Route::get('/itens_compra/cadastrar', function () {
    return view('Itens Compra/CADitens_compra');
})->name('itens_compra.cadastrar');


// Itens de Pedido
Route::get('/itens_pedido', function () {
    return view('Itens Pedido/index');
})->name('itens_pedido.index');

Route::get('/itens_pedido/cadastrar', function () {
    return view('Itens Pedido/CADitens_pedido');
})->name('itens_pedido.cadastrar');


// Pedidos
Route::get('/pedidos', function () {
    return view('Pedidos/index');
})->name('pedidos.index');

Route::get('/pedidos/cadastrar', function () {
    return view('Pedidos/CADpedidos');
})->name('pedidos.cadastrar');


// Pratos
Route::get('/pratos', function () {
    return view('Pratos/index');
})->name('pratos.index');

Route::get('/pratos/cadastrar', function () {
    return view('Pratos/CADpratos');
})->name('pratos.cadastrar');