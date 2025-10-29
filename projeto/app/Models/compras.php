<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Compras extends Model{
        public $cod_compra;
        public $data;
        public $nota_fiscal;
        public $valor_total;
        public $cod_fornecedor;

        public function listarCompra(){
            $listarComprasDoBanco = DB::select('SELECT * FROM compras ORDER BY cod_compra DESC');
            return $listarComprasDoBanco;
        }
        public function inserirCompra($dados){
            DB::insert('INSERT INTO compras(data, nota_fiscal, valor_total, cod_fornecedor) VALUES (?, ?, ?, ?)', [
                $dados['data'],
                $dados['nota_fiscal'],
                $dados['valor_total'],
                $dados['cod_fornecedor']
            ]);
        }
        public function atualizarCompra($cod_compra, $dados){
            DB::update('UPDATE compras
            SET data = ?, nota_fiscal = ?, valor_total = ?, cod_fornecedor = ?
            WHERE cod_compra = ?', [
                $dados['data'],
                $dados['nota_fiscal'],
                $dados['valor_total'],
                $dados['cod_fornecedor'],
                $cod_compra
            ]);
        }
        public function buscarCompra($cod_compra){
            $resultado = DB::select('SELECT * FROM compras WHERE cod_compra = ?', [$cod_compra]);

            return $resultado ? $resultado[0] : null;
        }
        public function apagarCompra($cod_compra){
            DB::delete('DELETE FROM compras WHERE cod_compra = ?', [$cod_compra]);
        }

        //triggers
        // valor_total atualizado com base nos itens_compra
        public function trigger_gravarCom(){
            DB::unprepared('DROP TRIGGER IF EXISTS insert_compras');

            DB::unprepared('
                CREATE TRIGGER insert_compras
                AFTER INSERT ON compras
                FOR EACH ROW
                BEGIN
                    UPDATE compras
                    SET valor_total = 0
                    WHERE cod_compra = NEW.cod_compra;
                END
            ');
        }

        //recalcula o valor_total se os itens forem alterados
        public function trigger_atualizarCom(){
            DB::unprepared('DROP TRIGGER IF EXISTS update_compras');

            DB::unprepared('
                CREATE TRIGGER update_compras
                AFTER UPDATE ON compras
                FOR EACH ROW
                BEGIN
                    DECLARE novo_total DECIMAL(10,2);

                    SELECT IFNULL(SUM(quantidade * valor_unitario), 0)
                    INTO novo_total
                    FROM itens_compra
                    WHERE cod_compra = NEW.cod_compra;

                    UPDATE compras
                    SET valor_total = novo_total
                    WHERE cod_compra = NEW.cod_compra;
                END
        ');
        }

        //Impede a exclusão caso tenha itens_compra viculado com compra
        public function trigger_apagarCom(){
            DB::unprepared('DROP TRIGGER IF EXISTS delete_compras');

            DB::unprepared('
                CREATE TRIGGER delete_compras
                BEFORE DELETE ON compras
                FOR EACH ROW
                BEGIN
                    DECLARE itens INT;

                    SELECT COUNT(*) INTO itens
                    FROM itens_compra
                    WHERE cod_compra = OLD.cod_compra;

                    IF itens > 0 THEN
                        SIGNAL SQLSTATE "45000"
                        SET MESSAGE_TEXT = "Não é possível excluir: existem itens associados a esta compra.";
                    END IF;
                END
            ');
        }
    }
?>