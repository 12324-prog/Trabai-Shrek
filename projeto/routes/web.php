<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produtos;
use App\Models\Fornecedores;
use App\Models\Cidades;
use App\Models\Clientes;
use App\Models\Pedidos;
use App\Models\Itens_pedidos;
use App\Models\Pratos;
use App\Models\Ingredientes;
use App\Models\Compras;
use App\Models\Itens_compra;
use App\Models\Composicao;
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

//Mecado------------------------------------------------------------------------------------------------------
Route::get('/', function () {
    $fornecedores = new Fornecedores;
    $fornecedores = $fornecedores->listarFornecedores();
    return view('Mercado', ["fornecedores"=>$fornecedores]);
})->name('mercado');

// Páginas simples------------------------------------------------------------------------------------------------------
Route::get('/contatos', function () {
    return view('Contatos');
})->name('contatos');

Route::get('/relatorios', function () {
    return view('DirecionadorDErelatorio');
})->name('relatorios');


// Cidades------------------------------------------------------------------------------------------------------
Route::get('/cidades', function () {
    $cidades = new Cidades;
    $cidades = $cidades->listarCidades();
    return view('Cidades/index', ['cidades'=>$cidades]);
})->name('cidades.index');

//CREATE
Route::get('/cidades/cadastrar', function () {
    $cidade = null;
    return view('Cidades/CADcidades', ['cidade'=>$cidade]);
})->name('cidades.cadastrar');


Route::post('/cidades/cadastrar/add', function (Request $request) {
    $cidades = new Cidades;

    $cidades->nome = $request->input('nomeCIDADE');
    $cidades->uf = $request->input('uf');
    
    if (strlen($cidades->uf) <=2)
    {
        $cidades->inserirCidades();
        $erro = null;
    }
    else
    {
        $erro = 'uf invalida';
        $cidade = null;
        return view('Cidades/CADcidades', ['cidade'=>$cidade, 'erro'=>$erro]);

    }
    $cidades = $cidades->listarCidades();
    return view('Cidades/index', ['cidades'=>$cidades]);
})->name('cidades.store');

//UPDATE
Route::get('/cidades/editar', function (Request $request) {
    $id = request('id') ?? NULL;

    $cidades = new Cidades;
    $cidade = $cidades->buscarCidades($id);
    return view('Cidades/CADcidades', ['cidade'=>$cidade]);
})->name('cidades.edit');

Route::post('/cidades/editar/edit', function (Request $request) {
    $id = request('id') ?? NULL;

    $cidades = new Cidades;

    $cidades->nome = $request->input('nomeCIDADE');
    $cidades->uf = $request->input('uf');

    if (strlen($cidades->uf) <=2)
    {
        $cidades->atualizarCidades($id);
        $erro = null;
    }
    else
    {
        $erro = 'uf invalida';
    }

    $cidades = $cidades->listarCidades();
    return view('Cidades/index', ['cidades'=>$cidades, 'erro'=>$erro]);
})->name('cidades.update');

//DELETE
Route::delete('/cidades/deletar', function (Request $request) {

    $id = request('id') ?? NULL;

    $cidades = new Cidades;
    
    $cidades->apagarCidades($id);
    
    $cidades = $cidades->listarCidades();
    return view('Cidades/index', ['cidades'=>$cidades]);
})->name('cidades.destroy');

// Clientes------------------------------------------------------------------------------------------------------
Route::get('/clientes', function () {
    $clientes = new Clientes;
    $clientes = $clientes->listarClientes();
    return view('Clientes/index', ['clientes'=>$clientes]);
})->name('clientes.index');

//CREATE
Route::get('/clientes/cadastrar', function () {
    $cidades = new Cidades;

    $cliente = null;

    $cidades = $cidades->listarCidades();
    return view('Clientes/CADclientes', ['cliente'=>$cliente, "cidades"=>$cidades]);
})->name('clientes.cadastrar');

Route::post('/clientes/cadastrar/add', function (Request $request) {

    $clientes = new Clientes;

    $clientes->nome = $request->input('nomeCLIENTE');
    $clientes->endereco = $request->input('endereco');
    $clientes->numero = $request->input('numeroCLIENTE');
    $clientes->bairro = $request->input('bairro');
    $clientes->cod_cidade = $request->input('cidadeCLIENTE');
    $clientes->celular = $request->input('celularCLIENTE');
    
    $clientes->gravar();
    
    $clientes = $clientes->listarClientes();
    return view('Clientes/index', ["clientes"=>$clientes]);
})->name('clientes.store');

//UPDATE
Route::get('/clientes/editar', function (Request $request) {
    $id = request('id') ?? NULL;
    
    $cidades = new Cidades;
    $clientes = new Clientes;
    
    $cliente = $clientes->buscarCliente($id);
    $cidades = $cidades->listarCidades();
    return view('Clientes/CADclientes', ["cliente"=>$cliente, "cidades"=>$cidades]);
})->name('clientes.edit');


Route::post('/clientes/editar/edit', function (Request $request) {
    $id = request('id') ?? NULL;

    $clientes = new Clientes;

    $clientes->nome = $request->input('nomeCLIENTE');
    $clientes->endereco = $request->input('endereco');
    $clientes->numero = $request->input('numeroCLIENTE');
    $clientes->bairro = $request->input('bairro');
    $clientes->cod_cidade = $request->input('cidadeCLIENTE');
    $clientes->celular = $request->input('celularCLIENTE');

    $clientes->atualizar($id);

    $clientes = $clientes->listarClientes();
    return view('Clientes/index', ["clientes"=>$clientes]);
})->name('clientes.update');

//DELETE
Route::delete('/clientes/deletar', function (Request $request) {

    $id = request('id') ?? NULL;

    $clientes = new Clientes;
    
    $clientes->apagar($id);
    
    $clientes = $clientes->listarClientes();
    return view('Clientes/index', ["clientes"=>$clientes]);
})->name('clientes.destroy');

// Compras
Route::get('/compras', function () {

    $compras = new Compras;

    $compras = $compras->listarCompra();
    return view('Compras/index', ['compras'=>$compras]);
})->name('compras.index');

//CREATE
Route::get('/compras/cadastrar', function () {

    $fornecedores = new Fornecedores;

    $compra = null;

    $fornecedores = $fornecedores->listarFornecedores();
    return view('Compras/CADcompras', ['compra'=>$compra, 'fornecedores'=>$fornecedores]);
})->name('compras.cadastrar');

Route::post('/compras/cadastrar/add', function (Request $request) {

    $compras = new Compras;

    $compras->cod_fornecedor = $request->input('fornecedor_id');
    
    $compras->inserirCompra();
    $compras = $compras->listarCompra();
    return redirect()->route('itens_compra.cadastrar');
})->name('compras.store');

//UPDATE
Route::get('/compras/editar', function () {
    $id = request('id') ?? NULL;

    $fornecedores = new Fornecedores;
    $compras = new Compras;

    $compra = $compras->buscarCompra($id);
    $fornecedores = $fornecedores->listarFornecedores();
    return view('Compras/CADcompras', ['compra'=>$compra, 'fornecedores'=>$fornecedores]);
})->name('compras.edit');

Route::post('/compras/editar/edit', function (Request $request) {
    $id = request('id') ?? NULL;

    $compras = new Compras;

    $compras->cod_fornecedor = $request->input('fornecedor_id');
    
    $compras->atualizarCompra($id);
    
    $compras = $compras->listarCompra();
    return view('Compras/index', ["compras"=>$compras]);
})->name('compras.update');

//DELETE
Route::delete('/compras/deletar', function (Request $request) {

    $id = request('id') ?? NULL;

    $compras = new Compras;
    
    $compras->apagarCompra($id);
    
    $compras = $compras->listarCompra();
    return view('Compras/index', ["compras"=>$compras]);
})->name('compras.destroy');

// Fornecedores------------------------------------------------------------------------------------------------------
Route::get('/fornecedores', function () {
    $fornecedores = new Fornecedores;
    $fornecedores = $fornecedores->listarFornecedores();
    return view('Fornecedores/index', ["fornecedores"=>$fornecedores]);
})->name('fornecedores.index');

//CREATE
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

//UPDATE
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

//DELETE
Route::delete('/fornecedores/deletar', function (Request $request) {

    $id = request('id') ?? NULL;

    $fornecedores = new Fornecedores;
    
    $fornecedores->apagarFornecedores($id);
    
    $fornecedores = $fornecedores->listarFornecedores();
    return view('Fornecedores/index', ["fornecedores"=>$fornecedores]);
})->name('fornecedores.destroy');

// Composição------------------------------------------------------------------------------------------------------
Route::get('/composicao', function () {
    $id = request('id') ?? NULL;

    $ingredientes = new Ingredientes;
    $pratos = new Pratos;

    $prato = $pratos->buscarPrato($id);
    $ingredientes = $ingredientes->buscarIngredientes_cod_pedido($id);
    return view('Composicao/index', ['ingredientes'=>$ingredientes, 'prato'=>$prato]);
})->name('composicao.index');

//CREATE
Route::get('/composicao/cadastrar', function () {
    $id = request('id') ?? NULL;
    $erro = request('erro');

    $ingredientes = new Ingredientes;

    $ingredientes = $ingredientes->listarIngredientes();
    return view('Ingredientes/CADingrediente_existente',['ingredientes'=>$ingredientes, 'id'=>$id, 'erro'=>$erro]);
})->name('composicao.cadastrar');

Route::post('/composicao/cadastrar/add', function (Request $request) {
    $id = request('id') ?? NULL;

    $composicao = new Composicao;
    if(isset($id))
    {
        $composicao->cod_prato = $id;
    }

    $composicao->cod_ingrediente = $request->input('cod_ingrediente');
    
    if (!$composicao->existeComposicao())
    {
        $erro = null;
        $composicao->inserirComposicao();
    }
    else
    {
        $erro = "O ingrediente já está na composição";
    }
    
    return redirect()->route('composicao.cadastrar', ['erro'=>$erro]);
})->name('composicao.store');

//DELETE
Route::delete('/composicao/deletar', function (Request $request) {

    $composicao = new Composicao;
    $ingredientes = new Ingredientes;
    
    $composicao->cod_ingrediente = request('id_ingrediente');
    $composicao->cod_prato = request('id_prato');

    $composicao->apagarComposicao();
    
    $ingredientes = $ingredientes->buscarIngredientes_cod_pedido($composicao->cod_prato);
    return redirect()->route('composicao.index', ['ingredientes'=>$ingredientes, 'id'=>$composicao->cod_prato]);
})->name('composicao.destroy');

// Ingredientes------------------------------------------------------------------------------------------------------
Route::get('/ingredientes', function () {

    $ingredientes = new Ingredientes;

    $ingredientes = $ingredientes->listarIngredientes();
    return view('Ingredientes/index', ['ingredientes'=>$ingredientes]);
})->name('ingredientes.index');

//CREATE
Route::get('/ingredientes/cadastrar', function () {

    $ingrediente = null;
    
    return view('Ingredientes/CADingredientes', ['ingrediente'=>$ingrediente]);
})->name('ingredientes.cadastrar');

Route::post('/ingredientes/cadastrar/add', function (Request $request) {

    $ingredientes = new Ingredientes;

    $ingredientes->descricao = $request->input('descricao');
    $ingredientes->valor_unitario = $request->input('valor_unitario');
    
    $ingredientes->gravar();
    
    $ingredientes = $ingredientes->listarIngredientes();
    return view('Ingredientes/index', ['ingredientes'=>$ingredientes]);
})->name('ingredientes.store');

//UPDATE
Route::get('/ingredientes/editar', function (Request $request) {
    $id = request('id') ?? NULL;
    
    $ingredientes = new Ingredientes;
    
    $ingrediente = $ingredientes->buscarIngredientes($id);
    return view('Ingredientes/CADingredientes', ["ingrediente"=>$ingrediente]);
})->name('ingredientes.edit');


Route::post('/ingredientes/editar/edit', function (Request $request) {
    $id = request('id') ?? NULL;

    $ingredientes = new Ingredientes;

    $ingredientes->descricao = $request->input('descricao');
    $ingredientes->valor_unitario = $request->input('valor_unitario');

    $ingredientes->atualizarIngredientes($id);

    $ingredientes = $ingredientes->listarIngredientes();
    return view('Ingredientes/index', ["ingredientes"=>$ingredientes]);
})->name('ingredientes.update');

//DELETE
Route::delete('/ingredientes/deletar', function (Request $request) {

    $id = request('id') ?? NULL;

    $ingredientes = new Ingredientes;
    
    $ingredientes->apagar($id);
    
    $ingredientes = $ingredientes->listarIngredientes();
    return view('Ingredientes/index', ['ingredientes'=>$ingredientes]);
})->name('ingredientes.destroy');

// Itens de Compra------------------------------------------------------------------------------------------------------
Route::get('/itens_compra', function () {

    $itens_compra = new Itens_compra;

    $itens_compra = $itens_compra->listarItensCompra();
    return view('Itens Compra/index', ['itens_compra'=>$itens_compra]);
})->name('itens_compra.index');

//CREATE
Route::get('/itens_compra/cadastrar', function () {

    $ingredientes = new Ingredientes;
    $compras = new Compras;

    $item_compra = null;

    $ingredientes = $ingredientes->listarIngredientes();
    $compras = $compras->listarCompra();
    return view('Itens Compra/CADitens_compra',
    ['ingredientes'=>$ingredientes, 'item_compra'=>$item_compra, 'compras'=>$compras]);
})->name('itens_compra.cadastrar');

Route::post('/itens_compra/cadastrar/add', function (Request $request) {

    $itens_compra = new Itens_compra;

    $itens_compra->cod_compra = $request->input('cod_compra');
    $itens_compra->cod_ingrediente = $request->input('ingrediente_id');
    $itens_compra->quantidade = $request->input('quantidadeITEMCOMPRA');
    
    $itens_compra->inserirItemCompra();
    return redirect()->route('itens_compra.cadastrar');
})->name('itens_compra.store');

//UPDATE
Route::get('/itens_compra/editar', function () {
    $id = request('id') ?? NULL;

    $ingredientes = new Ingredientes;
    $itens_compra = new Itens_compra;

    $item_compra = $item_compra->buscarItemCompra($id);
    $ingredientes = $ingredientes->listarIngredientes();
    return view('Itens Compra/CADitens_compra',['ingredientes'=>$ingredientes, 'item_compra'=>$item_compra]);
})->name('itens_compra.edit');

Route::post('/itens_compra/editar/edit', function (Request $request) {
    $id = request('id') ?? NULL;

    $itens_compra = new Itens_compra;

    $itens_compra->cod_ingrediente = $request->input('ingrediente_id');
    $itens_compra->quantidade = $request->input('quantidadeITEMCOMPRA');
    
    $itens_compra->atualizarItemCompra($id);
    
    $itens_compra = $itens_compra->listarItensCompra();
    return view('Itens compra/index', ["itens_compra"=>$itens_compra]);
})->name('itens_compra.update');

//DELETE
Route::delete('/itens_compra/deletar', function (Request $request) {

    $id = request('id') ?? NULL;

    $itens_compra = new Itens_compra;
    
    $itens_compra->apagarItemCompra($id);
    
    $itens_compra = $itens_compra->listarItensCompra();
    return view('Itens compra/index', ['itens_compra'=>$itens_compra]);
})->name('itens_compra.destroy');

// Itens de Pedido------------------------------------------------------------------------------------------------------
Route::get('/itens_pedido', function () {

    $itens_pedido = new Itens_pedidos;

    $itens_pedido = $itens_pedido->listarItens_Pedido();
    return view('Itens Pedido/index', ['itens_pedido'=>$itens_pedido]);
})->name('itens_pedido.index');

//CREATE
Route::get('/itens_pedido/cadastrar', function (Request $request) {

    $pedidos = new Pedidos;
    $pratos = new Pratos;

    $erro = $request->input('erro', null);
    $item_pedido = null;

    $pedidos = $pedidos->listarPedidos();
    $pratos = $pratos->listarPratos();
    return view('Itens Pedido/CADitens_pedido',
    ['item_pedido'=>$item_pedido, 'pedidos'=>$pedidos, 'pratos'=>$pratos, 'erro'=>$erro]);
})->name('itens_pedido.cadastrar');

Route::post('/itens_pedido/cadastrar/add', function (Request $request) {

    $itens_pedido = new Itens_pedidos;
    $ingredientes = new Ingredientes;

    $itens_pedido->cod_pedido = $request->input('cod_pedido');
    $itens_pedido->cod_prato = $request->input('cod_prato');
    $itens_pedido->quantidade = $request->input('quantidade');
    $itens_pedido->datahora = $request->input('data_horaITEMPEDIDO');
    
    $erro = null;
    $ingredientes = $ingredientes->buscarIngredientes_cod_pedido($itens_pedido->cod_prato);
    foreach ($ingredientes as $ingrediente)
    {
        $nova_quantidade = ($ingrediente->quantidade_estoque - $itens_pedido->quantidade);
        if ($nova_quantidade < 0 || $ingrediente->quantidade_estoque == 0)
        {
            $erro = "Quantidade de ingredientes insuficiente";
        }
    }
    if(!isset($erro))
    {
        $itens_pedido->gravar();
    }
    
    return redirect()->route('itens_pedido.cadastrar',['erro'=>$erro]);
})->name('itens_pedido.store');

//UPDATE
Route::get('/itens_pedido/editar', function (Request $request) {
    $id = request('id') ?? NULL;

    $pedidos = new Pedidos;
    $pratos = new Pratos;
    $itens_pedido = new Itens_pedidos;
    
    $item_pedido = $itens_pedido->buscarItens_Pedido($id);
    $pedidos = $pedidos->listarPedidos();
    $pratos = $pratos->listarPratos();
    return view('Itens Pedido/CADitens_pedido',
    ['item_pedido'=>$item_pedido, 'pedidos'=>$pedidos, 'pratos'=>$pratos]);
})->name('itens_pedido.edit');


Route::post('/itens_pedido/editar/edit', function (Request $request) {
    $id = request('id') ?? NULL;

    $itens_pedido = new Itens_pedidos;
    $ingredientes = new Ingredientes;

    $itens_pedido->cod_pedido = $request->input('cod_pedido');
    $itens_pedido->cod_prato = $request->input('cod_prato');
    $itens_pedido->quantidade = $request->input('quantidade');
    $itens_pedido->datahora = $request->input('data_horaITEMPEDIDO');

    $erro = null;
    $ingredientes = $ingredientes->buscarIngredientes_cod_pedido($itens_pedido->cod_prato);
    foreach ($ingredientes as $ingrediente)
    {
        $nova_quantidade = ($ingrediente->quantidade_estoque - $itens_pedido->quantidade);
        if ($nova_quantidade < 0 || $ingrediente->quantidade_estoque == 0)
        {
            $erro = "Quantidade de ingredientes insuficiente";
            break;
        }
    }
    if(!isset($erro))
    {
        $itens_pedido->atualizarItens_Pedido($id);
    }

    $itens_pedido = $itens_pedido->listarItens_Pedido();
    return view('Itens Pedido/index', ['itens_pedido'=>$itens_pedido, 'erro'=>$erro]);
})->name('itens_pedido.update');

//DELETE
Route::delete('/itens_pedido/deletar', function (Request $request) {

    $id = request('id') ?? NULL;

    $itens_pedido = new Itens_pedidos;
    
    $itens_pedido->apagar($id);
    
    $itens_pedido = $itens_pedido->listarItens_Pedido();
    return view('Itens Pedido/index', ['itens_pedido'=>$itens_pedido]);
})->name('itens_pedido.destroy');

// Pedidos------------------------------------------------------------------------------------------------------
Route::get('/pedidos', function () {
    $pedidos = new Pedidos;

    $pedidos = $pedidos->listarPedidos();

    //$pedidos_u = [];
    //foreach ($pedidos as $pedido)
    //{
    //    $pedidos_u[] = ['p'=>$pedido, 'c'=>$clientes->buscarCliente($pedido->cod_cliente)];
    //}
    return view('Pedidos/index', ['pedidos'=>$pedidos]);
})->name('pedidos.index');

//CREATE
Route::get('/pedidos/cadastrar', function () {
    $clientes = new Clientes;

    $pedido = null;

    $clientes = $clientes->listarClientes();
    return view('Pedidos/CADpedidos', ['pedido'=>$pedido, 'clientes'=>$clientes]);
})->name('pedidos.cadastrar');

Route::post('/pedidos/cadastrar/add', function (Request $request) {

    $pedidos = new Pedidos;

    $pedidos->cod_cliente = $request->input('cod_cliente');
    $pedidos->tipo_pedido = $request->input('tipo_pedido');
    
    $pedidos->gravar();
    
    return redirect()->route('itens_pedido.cadastrar');
})->name('pedidos.store');

//UPDATE
Route::get('/pedidos/editar', function (Request $request) {
    $id = request('id') ?? NULL;
    
    $pedidos = new Pedidos;
    $clientes = new Clientes;
    
    $pedido = $pedidos->buscarPedidos($id);
    $clientes = $clientes->listarClientes();
    return view('pedidos/CADpedidos', ["pedido"=>$pedido, 'clientes'=>$clientes]);
})->name('pedidos.edit');


Route::post('/pedidos/editar/edit', function (Request $request) {
    $id = request('id') ?? NULL;

    $pedidos = new Pedidos;

    $pedidos->cod_cliente = $request->input('cod_cliente');
    $pedidos->tipo_pedido = $request->input('tipo_pedido');
    $pedidos->encerrado = $request->input('encerrado');

    $pedidos->atualizarPedidos($id);

    $pedidos = $pedidos->listarPedidos();
    return view('Pedidos/index', ["pedidos"=>$pedidos]);
})->name('pedidos.update');

//DELETE
Route::delete('/pedidos/deletar', function (Request $request) {

    $id = request('id') ?? NULL;

    $pedidos = new Pedidos;
    
    $pedidos->apagar($id);
    
    $pedidos = $pedidos->listarPedidos();
    return view('Pedidos/index', ["pedidos"=>$pedidos]);
})->name('pedidos.destroy');

// Pratos------------------------------------------------------------------------------------------------------
Route::get('/pratos', function () {

    $pratos = new Pratos;

    $pratos = $pratos->listarPratos();
    return view('Pratos/index', ['pratos'=>$pratos]);
})->name('pratos.index');

//CREATE
Route::get('/pratos/cadastrar', function () {

    $prato = null;

    return view('Pratos/CADpratos', ['prato'=>$prato]);
})->name('pratos.cadastrar');

Route::post('/pratos/cadastrar/add', function (Request $request) {

    $pratos = new Pratos;

    $pratos->descricao = $request->input('descricaoPRATO');
    $pratos->taxa_prato = $request->input('taxaPRATO');
    
    $pratos->gravar();
    
    return redirect()->route('composicao.cadastrar');
})->name('pratos.store');

//UPDATE
Route::get('/pratos/editar', function (Request $request) {
    $id = request('id') ?? NULL;
    
    $pratos = new Pratos;
    
    $prato = $pratos->buscarPrato($id);
    return view('Pratos/CADpratos', ["prato"=>$prato]);
})->name('pratos.edit');


Route::post('/pratos/editar/edit', function (Request $request) {
    $id = request('id') ?? NULL;

    $pratos = new Pratos;

    $pratos->descricao = $request->input('descricaoPRATO');
    $pratos->taxa_prato = $request->input('taxaPRATO');

    $pratos->atualizarPrato($id);

    $pratos = $pratos->listarPratos();
    return view('Pratos/index', ["pratos"=>$pratos]);
})->name('pratos.update');

//DELETE
Route::delete('/pratos/deletar', function (Request $request) {

    $id = request('id') ?? NULL;

    $pratos = new Pratos;
    
    $pratos->apagar($id);
    
    $pratos = $pratos->listarPratos();
    return view('Pratos/index', ["pratos"=>$pratos]);
})->name('pratos.destroy');