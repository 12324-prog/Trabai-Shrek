<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Cidades extends Model{
        public $cod_cidade;
        public $nome;
        public $uf;

        public function inserirCidades(){
            DB::insert('INSERT INTO cidades(nome, uf) VALUES(?, ?)', [
                $this->nome,
                $this->uf
            ]);
        }

        public function listarCidades(){
            $listarCidadesDoBanco = DB::select('SELECT * FROM cidades ORDER BY cod_cidade DESC');

            return $listarCidadesDoBanco;
        }

        public function atualizarCidades($cod_cidade){
            DB::update('UPDATE cidades SET nome = ?, uf = ? WHERE cod_cidade = ?', [
                $this->nome,
                $this->uf,
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
    }
?>