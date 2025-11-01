<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Cidades extends Model{
        public $cod_cidade;
        public $nome;
        public $uf;

        public function inserirCidades($dados){
            DB::insert('INSERT INTO cidades(nome, uf) VALUES(?, ?)', [
                $dados['nome'],
                $dados['uf']
            ]);
        }

        public function listarCidades(){
            $listarCidadesDoBanco = DB::select('SELECT * FROM cidades ORDER BY cod_cidade DESC');

            return $listarCidadesDoBanco;
        }

        public function atualizarCidades($cod_cidade, $dados){
            DB::update('UPDATE cidades SET nome = ?, uf = ? WHERE cod_cidade = ?', [
                $dados['nome'],
                $dados['uf'],
                $cod_cidade
            ]);
        }

        public function buscarCidades($cod_cidade){
            $resultado = DB::select('SELECT * FROM cidades WHERE cod_cidade = ?', [$cod_cidade]);

            return $resultado ? $resultado[0] : null;
        }

        public function apagarCidades($cod_cidade){
            DB::delete('DELETE FROM cidades WHERE cod_cidade = ?', [$cod_cidade]);
        }

        /*
        //triggers
        //não vai recalcular nada, apenas criar a cidade normalmente sem erros
        public function trigger_gravarCi(){
            DB::unprepared('DROP TRIGGER IF EXISTS insert_cidades');

            DB::unprepared('
                CREATE TRIGGER insert_cidades
                BEFORE INSERT ON cidades
                FOR EACH ROW
                BEGIN

                END
            ');
        }

        //garantia de que o nome e o uf foram atualizados corretamente
        public function trigger_atualizarCi(){
            DB::unprepared('DROP TRIGGER IF EXISTS update_cidades');

            DB::unprepared('
                CREATE TRIGGER update_cidades
                AFTER UPDATE ON cidades
                FOR EACH ROW
                BEGIN
                    UPDATE clientes
                    SET cod_cidade = NEW.cod_cidade
                    WHERE cod_cidade = OLD.cod_cidade;

                    UPDATE fornecedores
                    SET cod_cidade = NEW.cod_cidade
                    WHERE cod_cidade = OLD.cod_cidade;
                END
            ');
        }

        //impedir que cidades cadastradas em clientes e fornecedores sejam apagadas
        public function trigger_apagarCi(){
            DB::unprepared('DROP TRIGGER IF EXISTS delete_cidades');

            DB::unprepared('
                CREATE TRIGGER delete_cidades
                BEFORE DELETE ON cidades
                FOR EACH ROW
                BEGIN
                    DECLARE pDep INT;

                    SELECT COUNT(*) INTO pDep
                    FROM clientes
                    WHERE cod_cidade = OLD.cod_cidade;

                    IF pDep > 0 THEN
                        SIGNAL SQLSTATE "45000"
                        SET MESSAGE_TEXT = "Não é possível excluir: cidade vinculada a clientes.";
                    END IF;

                    SELECT COUNT(*) INTO pDep
                    FROM fornecedores
                    WHERE cod_cidade = OLD.cod_cidade;

                    IF pDep > 0 THEN
                        SIGNAL SQLSTATE "45000"
                        SET MESSAGE_TEXT = "Não é possível excluir: cidade vinculada a fornecedores.";
                    END IF;
                END
            ');
        }
        */
    }
?>