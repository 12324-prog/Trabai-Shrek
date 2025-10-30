<?php
    #corrigido
    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Pedidos extends Model {

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

            $listaPedidosDoBanco = DB::select('SELECT * FROM pedidos ORDER BY cod_pedido DESC');

            return $listaPedidosDoBanco;

        }

public function atualizarPedidos($id) {
    return DB::update('UPDATE pedidos SET
        datahora = ?,
        cod_cliente = ?,
        tipo_pedido = ?,
        cod_entregador = ?,
        valor_entrega = ?,
        cod_mesa = ?,
        encerrado = ?,
        datahora_encerramento = ?,
        desconto = ?,
        pago = ?,
        data_pago = ?,
        taxa_servico = ?
        WHERE cod_pedido = ?',
        [
            $this->datahora,
            $this->cod_cliente,
            $this->tipo_pedido,
            $this->cod_entregador,
            $this->valor_entrega,
            $this->cod_mesa,
            $this->encerrado ?? 0,
            $this->datahora_encerramento,
            $this->desconto ?? 0,
            $this->pago ?? 0,
            $this->data_pago,
            $this->taxa_servico ?? 0,
            $id
        ]
    );
}


        public function buscarPedidos($cod_pedido){

            $PedidosDoBanco = DB::select('SELECT * FROM pedidos WHERE cod_pedido = ?',[$cod_pedido]);

            return $PedidosDoBanco;

        }

        public function gravar (){
            DB::insert('INSERT INTO pedidos 
                (datahora,
                cod_cliente,
                tipo_pedido,
                cod_entregador,
                valor_entrega,
                cod_mesa,
                encerrado,
                datahora_encerramento,
                desconto,
                pago,
                data_pago,
                taxa_servico)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?)', 
                [ 
                    $this->datahora = now(),
                    $this->cod_cliente,
                    $this->tipo_pedido,
                    $this->cod_entregador,
                    $this->valor_entrega,
                    $this->cod_mesa,
                    $this->encerrado ?? 0,
                    $this->datahora_encerramento,
                    $this->desconto ?? 0,
                    $this->pago,
                    $this->data_pago,
                    $this->taxa_servico ?? 0
                ]
            );
        }

        public function apagar ($cod_pedido)
        {
            DB::delete('DELETE FROM pedidos WHERE cod_pedido = ?', [$cod_pedido]);
        }

        public function trigger_apagar()
        {
            DB::unprepared('DROP TRIGGER IF EXISTS pedido_delete');

            DB::unprepared('
            CREATE TRIGGER pedido_delete
            BEFORE DELETE ON pedidos
            FOR EACH ROW
            BEGIN
                DELETE FROM itens_pedido 
                WHERE cod_pedido = OLD.cod_pedido;
            END');
        }

    }

?>