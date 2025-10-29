<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Fornecedores extends Model{
        public $cod_fornecedor;
        public $nome_social;
        public $nome_fantasia;
        public $cnpj;
        public $endereco;
        public $numero;
        public $bairro;
        public $cod_cidade;
        public $cep;
        public $celular;
        public $email;

        public function listarFornecedores(){
            $fornecedores = DB::select('SELECT * FROM fornecedores ORDER BY cod_fornecedores DESC');

            return $fornecedores;
        }
        public function inserirFornecedores($dados){
            DB::insert('INSERT INTO fornecedores(nome_social, nome_fantasia, cnpj, endereco, numero, bairro, cod_cidade, cep, celular, email)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
                $dados['nome_social'],
                $dados['nome_fantasia'],
                $dados['cnpj'],
                $dados['endereco'],
                $dados['numero'],
                $dados['bairro'],
                $dados['cod_cidade'],
                $dados['cep'],
                $dados['celular'],
                $dados['email']
            ]);
        }
        public function atualizarFornecedores($dados, $cod_fornecedor){
            DB::update('UPDATE fornecedores
            SET nome_social = ?, nome_fantasia = ?, cnpj = ?, endereco = ?, numero = ?, bairro = ?, cod_cidade = ?, cep = ?, celular = ?, email = ? WHERE cod_fornecedor = ?',
            [
                $dados['nome_social'],
                $dados['nome_fantasia'],
                $dados['cnpj'],
                $dados['endereco'],
                $dados['numero'],
                $dados['bairro'],
                $dados['cod_cidade'],
                $dados['cep'],
                $dados['celular'],
                $dados['email'],
                $cod_fornecedor
            ]);
        }
        public function buscarFornecedores($cod_fornecedor){
            $resultado = DB::select('SELECT * FROM forncedores WHERE cod_fornecedor = ?',[$cod_fornecedor]);

            return $resultado ? $resultado[0] : null;
        }
        public function apagarFornecedores($cod_fornecedor){
            DB::delete('DELETE FROM fornecedores WHERE cod_fornecedor = ?', [$cod_fornecedor]);
        }

        //triggers
        //cnpj não nulo
        public function trigger_gravarForn(){
            DB::unprepared('DROP TRIGGER IF EXISTS insert_fornecedores');

            DB::unprepared('
                CREAT TRIGGER insert_fornecedores
                BEFORE INSERT ON fornecedores
                FOR EACH ROW
                BEGIN
                    IF NEW.cnpj IS NULL OR NEW.cnpj = "" THEN
                        SET NEW.cnpj = "00000000000000"
                    END IF;
                END
            ');
        }

        //Atualiza o código de fornecedor em compras, se for alterado
        public function trigger_atualizarForn(){
            DB::unprepared('DROP TRIGGER IF EXISTS update_fornecedores');

            DB::unprepared('
                CREATE TRIGGER update_fornecedores
                AFTER UPDATE ON fornecedores
                FOR EACH ROW
                BEGIN
                    UPDATE compras
                    SET cod_fornecedor = NEW.cod_fornecedor
                    WHERE cod_fornecedor = OLD.cod_fornecedor;
                END
            ');
        }

        //impede exclusão se tiver compras associadas
        public function trigger_apagarForn(){
            DB::unprepared('DROP TRIGGER IF EXISTS delete_fornecedores');

            DB::unprepared('
                CREATE TRIGGER delete_fornecedores
                BEFORE DELETE ON fornecedores
                FOR EACH ROW
                BEGIN
                    DECLARE dependencias INT;

                    SELECT COUNT(*) INTO dependencias
                    FROM compras
                    WHERE cod_fornecedor = OLD.cod_fornecedor;

                    IF dependencias > 0 THEN
                        SIGNAL SQLSTATE "45000"
                        SET MESSAGE_TEXT = "Não é possível excluir: fornecedor possui compras registradas.";
                    END IF;
                END
            ');
        }
    }
?>