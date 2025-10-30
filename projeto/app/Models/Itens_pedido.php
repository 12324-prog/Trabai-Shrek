<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Pedidos extends Model {

        public $cod_pedido;

        public $cod_prato;

        public $quantidade;

        public $valor_unitario;

        public $cod_garcom;

        public $datahora;

        public function listarItens_Pedido(){

            $listaItem_PedidoDoBanco = DB::select('SELECT * FROM itens_pedido ORDER BY cod_item DESC');

            return $listaItem_PedidoDoBanco;

        }

public function atualizarItens_Pedido($id) {
    return DB::update('UPDATE itens_pedido SET
        cod_pedido = ?,
        cod_prato = ?,
        quantidade = ?,
        valor_unitario = ?,
        cod_garcom = ?,
        datahora = ?
        WHERE cod_item = ?',
        [
            $this->cod_pedido,
            $this->cod_prato,
            $this->quantidade,
            $this->valor_unitario,
            $this->cod_garcom,
            $this->datahora,
            $id
        ]
    );
}


        public function buscarItens_Pedido($cod_item){

            $Itens_PedidoDoBanco = DB::select('SELECT * FROM itens_pedido WHERE cod_item = ?',[$cod_item]);

            return $Itens_PedidoDoBanco;

        }

        public function gravar (){
            DB::insert('INSERT INTO itens_pedido 
                (cod_pedido,
                cod_prato,
                quantidade,
                valor_unitario,
                cod_garcom,
                datahora)
                VALUES (?,?,?,?,?,?)', 
                [ 
                    $this->cod_pedido,
                    $this->cod_prato,
                    $this->quantidade,
                    DB::select('SELECT valor_unitario FROM pratos AS p WHERE p.cod_prato = '.$this->cod_prato)[0]->valor_unitario,
                    $this->cod_garcom,
                    $this->datahora
                ]
            );
        }

        public function apagar ($cod_item)
        {
            DB::delete('DELETE FROM itens_pedido WHERE cod_item = ?', [$cod_item]);
        }

        public function trigger_gravar()
        {
            DB::unprepared('DROP TRIGGER IF EXISTS insert_itens_p');

            DB::unprepared(
                'CREATE TRIGGER insert_itens_p 
                AFTER INSERT ON itens_pedido
                FOR EACH ROW
                BEGIN
                    UPDATE pedidos 
                    SET (valor_pago = valor_pago + (NEW.valor_unitario * NEW.quantidade)) 
                    WHERE cod_pedido = NEW.cod_pedido;
                END'
            );
        }

        public function trigger_atualizar()
        {
            DB::unprepared('DROP TRIGGER IF EXISTS update_itens_p');

            DB::unprepared(
                'CREATE TRIGGER update_itens_p
                AFTER UPDATE ON itens_pedido
                FOR EACH ROW
                BEGIN
                    UPDATE pedidos 
                    SET valor_pago = valor_pago - (OLD.valor_unitario * OLD.quantidade)
                    WHERE cod_pedido = OLD.cod_pedido;

                    UPDATE pedidos 
                    SET valor_pago = valor_pago + (NEW.valor_unitario * NEW.quantidade)
                    WHERE cod_pedido = NEW.cod_pedido;
                END
            ');
        }

        public function trigger_apagar()
        {
            DB::unprepared('DROP TRIGGER IF EXISTS delete_itens_p');

            DB::unprepared(
                'CREATE TRIGGER delete_itens_p
                AFTER DELETE ON itens_pedido
                FOR EACH ROW
                BEGIN
                    UPDATE pedidos 
                    SET valor_pago = valor_pago - (OLD.valor_unitario * OLD.quantidade)
                    WHERE cod_pedido = OLD.cod_pedido;
                END
            ');
        }     
    }

?>