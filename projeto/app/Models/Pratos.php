<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Pedidos extends Model {

        public $descricao;

        public $cod_cat;

        public $valor_unitario;

        public function listarPratos(){

            $listaPratosDoBanco = DB::select('SELECT * FROM pratos ORDER BY cod_prato DESC');

            return $listaPratosDoBanco;

        }

public function atualizarPrato($id) {
    return DB::update('UPDATE pratos SET
        descricao = ?,
        cod_cat = ?,
        valor_unitario = ?
        WHERE cod_prato = ?',
        [
            $this->descricao,
            $this->cod_cat,
            $this->valor_unitario,
            $id
        ]
    );
}


        public function buscarPrato($cod_prato){

            $PratoDoBanco = DB::select('SELECT * FROM pratos WHERE cod_prato = ?',[$cod_prato]);

            return $PratoDoBanco;

        }

        public function gravar (){
            DB::insert('INSERT INTO pratos 
                (descricao,
                cod_cat,
                valor_unitario)
                VALUES (?,?,?)', 
                [ 
                    $this->descricao,
                    $this->cod_cat,
                    $this->valor_unitario
                ]
            );
        }

        public function apagar ($cod_prato)
        {
            DB::delete('DELETE FROM pratos WHERE cod_prato = ?', [$cod_prato]);
        }

        public function trigger_atualizar()
        {
            DB::unprepared('DROP TRIGGER IF EXISTS update_pratos');

            DB::unprepared(
                'CREATE TRIGGER update_pratos
                AFTER UPDATE ON pratos
                FOR EACH ROW
                BEGIN
                    UPDATE itens_pedido 
                    SET valor_unitario = NEW.valor_unitario
                    WHERE cod_prato = OLD.cod_prato;
                END
            ');
        }

        public function trigger_apagar()
        {
            DB::unprepared('DROP TRIGGER IF EXISTS delete_pratos');

            DB::unprepared(
                'CREATE TRIGGER delete_pratos
                AFTER DELETE ON pratos
                FOR EACH ROW
                BEGIN
                    UPDATE pedidos AS p INNER JOIN itens_pedido AS ip ON (p.cod_pedido = ip.cod_pedido)
                    SET p.valor_pago = p.valor_pago - (ip.valor_unitario * ip.quantidade)
                    WHERE ip.cod_prato = OLD.cod_prato;

                    DELETE FROM itens_pedido WHERE cod_pedido = OLD.cod_pedido;
                END
            ');
        }     
    }

?>