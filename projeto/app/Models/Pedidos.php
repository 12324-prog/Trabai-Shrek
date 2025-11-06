<?php
    #corrigido
    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Pedidos extends Model {

        public $datahora;

        public $cod_cliente;

        public $tipo_pedido;

        public $encerrado;

        public function listarPedidos(){

            $listaPedidosDoBanco = DB::select(
                'SELECT * FROM pedidos as p JOIN (SELECT cod_cliente, nome FROM clientes) as c ON (p.cod_cliente = c.cod_cliente) 
                ORDER BY cod_pedido DESC');

            return $listaPedidosDoBanco;

        }

public function atualizarPedidos($id) {
    return DB::update('UPDATE pedidos SET
        cod_cliente = ?,
        tipo_pedido = ?,
        encerrado = ?
        WHERE cod_pedido = ?',
        [
            $this->cod_cliente,
            $this->tipo_pedido,
            $this->encerrado ?? 0,
            $id
        ]
    );
}


        public function buscarPedidos($cod_pedido){

            $PedidosDoBanco = DB::select('SELECT * FROM pedidos WHERE cod_pedido = ?',[$cod_pedido]);

            return $PedidosDoBanco[0];

        }

        public function gravar (){
            DB::insert('INSERT INTO pedidos 
                (datahora,
                cod_cliente,
                tipo_pedido,
                encerrado)
                VALUES (?,?,?,?)', 
                [ 
                    now(),
                    $this->cod_cliente,
                    $this->tipo_pedido,
                    $this->encerrado ?? 0
                ]
            );
        }

        public function apagar ($cod_pedido)
        {
            DB::delete('DELETE FROM pedidos WHERE cod_pedido = ?', [$cod_pedido]);
        }

        //public function buscarUltimoPedido(){

        //    $PedidoMax = DB::select('SELECT MAX(cod_pedido) as pedido_max FROM pedidos');

        //    return $PedidoMax[0];

        //}

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