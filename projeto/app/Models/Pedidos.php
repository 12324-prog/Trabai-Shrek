<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Pedidos extends Model {

        public $cod_pedido;

        public $datahora;

        public $cod_cliente;

        public $tipo_pedido;

        public $cod_entregador;

        public $valor_entrega;

        public $cod_mesa;

        public $encerrado;

        public $datahora_encerramento;

        public $desconto;

        public $pago;

        public $data_pago;

        public $valor_pago;

        public $taxa_servico;

        public function listarPedidos(){

            $listaPedidosDoBanco = DB::select('select * from pedidos order by cod_pedido DESC');

            return $listaPedidosDoBanco;

        }

        public function atualizarPedidos(){
            //INCOMPLETO
            $listaPedidosDoBanco = DB::update('update pedidos set nome_produto=,descricao_produto, preco');

            return $listaPedidosDoBanco;

        } 

        public function buscarPedidos($cod_pedido){

            $PedidosDoBanco = DB::select('select * from pedidos where cod_pedido = '.$cod_pedido);

            return $PedidosDoBanco;

        }

        public function gravar ($nmProduto,$descProduto, $precoProduto){

            DB::insert('insert into produtos (nome_produto,descricao_produto, preco) values (?,?,?)', 
        [ 
            $cod_pedido, 
            $datahora,
            $cod_cliente,
            $tipo_pedido,
            $cod_entregador,
            $valor_entrega,
            $cod_mesa,
            $encerrado ?? 0,
            $datahora_encerramento,
            $desconto ?? 0,
            $pago,
            $data_pago,
            $valor_pago ?? 0,
            $taxa_servico ?? 0]);
            
        }

        public function apagar ($codProduto)
        {
            DB::delete('delete from produtos where cod_produto = '.$codProduto);
        }

    }

?>