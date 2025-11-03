<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Fornecedores extends Model{
        public $cod_fornecedor;
        public $nome_social;
        public $celular;

        public function listarFornecedores(){
            $fornecedores = DB::select('SELECT * FROM fornecedores ORDER BY cod_fornecedor DESC');

            return $fornecedores;
        }
        public function inserirFornecedores(){
            DB::insert('INSERT INTO fornecedores(nome_social, celular)
            VALUES (?, ?)', [
                $this->nome_social,
                $this->celular,
            ]);
        }
        public function atualizarFornecedores($cod_fornecedor){
            DB::update('UPDATE fornecedores
            SET nome_social = ?, celular = ? WHERE cod_fornecedor = ?',
            [
                $this->nome_social,
                $this->celular,
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
    }
?>