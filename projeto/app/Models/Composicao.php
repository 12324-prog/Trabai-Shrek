<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Composicao extends Model{
        public $cod_prato;
        public $cod_ingrediente;

        public function inserirComposicao(){
            DB::insert('INSERT INTO composicao(cod_prato, cod_ingrediente) VALUES(?, ?)', [
                $this->cod_prato = DB::select('SELECT MAX(cod_prato) as codmax FROM pratos')[0]->codmax,
                $this->cod_ingrediente
            ]);
        }

        public function apagarComposicaoPrato($cod_prato){
            DB::delete('DELETE FROM composicao WHERE cod_prato = ?', [$cod_prato]);
        }

        public function apagarComposicaoIngrediente($cod_ingrediente){
            DB::delete('DELETE FROM composicao WHERE cod_ingrediente = ?', [$cod_ingrediente]);
        }
    }
?>