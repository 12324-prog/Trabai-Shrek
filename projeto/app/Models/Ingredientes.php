<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Ingredientes extends Model {

         public $cod_Ingrediente;                

         public  $descricao;

         public  $cod_unidade;
         
         public $controla_estoque;

         public  $quantidade_estoque;

         public $valor_unitario;


        public function listarIngredientes(){

            $listaIngredientesDoBanco = DB::select('select * from ingrediente order by cod_ingrediente DESC');

            return $listaIngredientesDoBanco;

        }

        public function atualizarIngredientes($id){
         return DB::update('UPDATE ingredientes SET
          descricao = ?, 
          cod_unitade = ?, 
          controla_estoque = ?, 
          quantidade_estoque = ?,
          valor_unitario = ? 
          where cod_ingrediente = ?',          

        
        [
            $this->descricao,
            $this->cod_unidade,
            $this->controla_estoque ?? 0,
            $this->quantidade_estoque ?? 0,
            $this->valor_unitario ?? 0,
            $id
        ]);
} 
        public function buscarIngredientes($cod_ingrediente){

            $IngredientesDoBanco = DB::select('select * from ingredientes where cod_ingrediente = ?', [$cod_ingrediente]);

            return $IngredientesDoBanco;

        }

        public function gravar ($descricao, $cod_unidade, $controla_estoque,  $quantidade_estoque, $valor_unitario ){

            DB::insert('INSERT INTO Ingredientes (descricao, cod_unidade, controla_estoque, quantidade_estoque, valor_unitario)
             values (?,?,?,?,?)', [
                $descricao, 
                $cod_unidade,
                $controla_estoque ?? 0,  
                $quantidade_estoque ?? 0, 
                $valor_unitario  ?? 0
           
          ]);        
           
        }

        public function apagar ($codIngrediente)
        {
            DB::delete('delete from ingrediente where cod_ingrediente = ?', [$codIngrediente]);
        }

    }

?>