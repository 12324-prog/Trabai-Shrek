<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Itens_Compra{
        public $cod_item;
        public $cod_ingrediente;
        public $cod_compra;
        public $quantidade;
        public $valor_unitario;

        public function listarItensCompra(){
            return DB::select('SELECT * FROM itens_compra ORDER BY cod_item DESC');
        }
        public function inserirItemCompra($dados){
            DB::insert('INSERT INTO itens_compra
            (cod_ingrediente, cod_compra, quantidade, valor_unitario)
            VALUES (?, ?, ?, ?)', [
                $dados['cod_ingrediente'],
                $dados['cod_compra'],
                $dados['quantidade'],
                $dados['valor_unitario']
            ]);
        }
        public function buscarItemCompra($cod_item)
        {
            $resultado = DB::select('SELECT * FROM itens_compra WHERE cod_item = ?', [$cod_item]);
            return $resultado ? $resultado[0] : null;
        }
        public function atualizarItemCompra($cod_item, $dados){
            DB::update('UPDATE itens_compra
            SET cod_ingrediente = ?, cod_compra = ?, quantidade = ?, valor_unitario = ?
            WHERE cod_item = ?', [
                $dados['cod_ingrediente'],
                $dados['cod_compra'],
                $dados['quantidade'],
                $dados['valor_unitario'],
                $cod_item
            ]);
        }
        public function apagarItemCompra($cod_item){
            DB::delete('DELETE FROM itens_compra WHERE cod_item = ?', [$cod_item]);
        }


        /*
        //triggers
        //soma valor ao total da compra
        public function trigger_gravarIten_com(){
            DB::unprepared('DROP TRIGGER IF EXISTS insert_itens_compra');

            DB::unprepared('
                CREATE TRIGGER insert_itens_compra
                AFTER INSERT ON itens_compra
                FOR EACH ROW
                BEGIN
                    UPDATE compras
                    SET valor_total = IFNULL(valor_total, 0) + (NEW.quantidade * NEW.valor_unitario)
                    WHERE cod_compra = NEW.cod_compra;
                END
            ');
        }

        //calcula total da compra novamente
        public function trigger_atualizarIten_com(){
            DB::unprepared('DROP TRIGGER IF EXISTS update_itens_compra');

            DB::unprepared('
                CREATE TRIGGER update_itens_compra
                AFTER UPDATE ON itens_compra
                FOR EACH ROW
                BEGIN
                    UPDATE compras
                    SET valor_total = IFNULL(valor_total, 0) - (OLD.quantidade * OLD.valor_unitario)
                    WHERE cod_compra = OLD.cod_compra;

                    UPDATE compras
                    SET valor_total = IFNULL(valor_total, 0) + (NEW.quantidade * NEW.valor_unitario)
                    WHERE cod_compra = NEW.cod_compra;
                END
            ');
        }

        //subtrai valor do total da compra
        public function trigger_apagarIten_com(){
            DB::unprepared('DROP TRIGGER IF EXISTS delete_itens_compra');

            DB::unprepared('
                CREATE TRIGGER delete_itens_compra
                AFTER DELETE ON itens_compra
                FOR EACH ROW
                BEGIN
                    UPDATE compras
                    SET valor_total = IFNULL(valor_total, 0) - (OLD.quantidade * OLD.valor_unitario)
                    WHERE cod_compra = OLD.cod_compra;
                END
            ');
        }
        */
    }   
?>
