<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Ingredientes extends Model {

         public $nomeIngrediente;

         public $codIngrediente;

         public  $descricaoIngrediente;

         public $precoIngredient;

        public function listarIngredientes(){

            $listaIngredienteDoBanco = DB::select('select * from ingrediente order by cod_ingrediente DESC');

            return $listaIngredienteDoBanco;

        }

        public function atualizarIngrediente(){
            //INCOMPLET
            $listaIngredientesDoBanco = DB::update('update ingredientes set nome_ingrediente=,descricao_ingrediente, preco');

            return $listaIngredientesDoBanco;

        } 

        public function buscarIngrediente($cod_ingrediente){

            $IngredienteDoBanco = DB::select('select * from ingrediente where cod_ingrediente = '.$cod_ingrediente);

            return $IngredienteDoBanco;

        }

        public function gravar ($nmIngrediente,$descIngrediente, $precoIngrediente){

            DB::insert('insert into Ingredientes (nome_ingrediente,descricao_ngrediente, preco) values (?,?,?)', [$nmIngrediente, $descIngrediente, $precoIngrediente]);
            
        }

        public function apagar ($codIngrediente)
        {
            DB::delete('delete from ingrediente where cod_ingrediente = '.$codIngrediente);
        }

    }

?>