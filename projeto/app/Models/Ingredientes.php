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

            $listaIngredientesDoBanco = DB::select('select * from ingredientes order by cod_ingrediente DESC');

            return $listaIngredientesDoBanco;

        }

        public function atualizarIngredientes($id){
         return DB::update('UPDATE ingredientes SET
          descricao = ?, 
          cod_unidade = ?, 
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

            DB::insert('INSERT INTO ingredientes (descricao, cod_unidade, controla_estoque, quantidade_estoque, valor_unitario)
             values (?,?,?,?,?)', [
                $descricao, 
                $cod_unidade,
                $controla_estoque ?? 0,  
                $quantidade_estoque ?? 0, 
                $valor_unitario  ?? 0
           
          ]);        
           
        }

            public function apagar ($cod_ingrediente){
            DB::delete('DELETE FROM ingredientes WHERE cod_ingrediente = ?', [$cod_ingrediente]);
           }

        public function trigger_apagar(){
            DB::unprepared ('DROP TRIGGER IF EXISTS ingrediente_delete');
            DB::unprepared( '
            CREATE TRIGGER ingrediente_delete
            BEFORE DELETE ON ingredientes
            FOR EACH ROW 
            BEGIN
                DELETE FROM composicao WHERE cod_ingrediente = OLD.cod_ingrediente;
                DELETE FROM itens_compra WHERE cod_ingrediente = OLD.cod_ingrediente;
                END
                ');
        }
    }

?>