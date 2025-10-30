<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Produtos extends Model {

        public $nomeProduto;

        public $codProduto;

        public $descricaoProduto;

        public $precoProduto;

        public function listarProdutos(){

            $listaProdutosDoBanco = DB::select('select * from produtos order by cod_produto DESC');

            return $listaProdutosDoBanco;

        }

        public function atualizarProduto(){
            //INCOMPLETO
            $listaProdutosDoBanco = DB::update('update produtos set nome_produto=,descricao_produto, preco');

            return $listaProdutosDoBanco;

        } 

        public function buscarProduto($cod_produto){

            $ProdutoDoBanco = DB::select('select * from produtos where cod_produto = '.$cod_produto);

            return $ProdutoDoBanco;

        }

        public function gravar ($nmProduto,$descProduto, $precoProduto){

            DB::insert('insert into produtos (nome_produto,descricao_produto, preco) values (?,?,?)', [$nmProduto, $descProduto, $precoProduto]);
            
        }

        public function apagar ($codProduto)
        {
            DB::delete('delete from produtos where cod_produto = '.$codProduto);
        }

    }

?>