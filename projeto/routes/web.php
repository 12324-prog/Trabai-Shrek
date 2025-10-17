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