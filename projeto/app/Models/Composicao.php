<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Composicao extends Model {

         public $cod_prato;                

         public  $cod_ingrediente;

         public  $quantidade;        
        

        public function listarComposicao(){

            $listaComposicaoDoBanco = DB::select('SELECT * FROM composicao ORDER BY cod_ingrediente DESC');

            return $listaComposicaoDoBanco;

        }

        public function atualizarComposicao($id){
            
          return DB::update('update composicao set 
          cod_prato = ?, 
          cod_ingrediente = ?         
          where cod_ingrediente = ? ');

        } 
        
        public function gravar ($cod_prato,$cod_ingrediente){

            DB::insert('insert into Composicao (cod_prato, cod_ingrediente)
             values (?,?,?)', [
                $cod_prato,
                $cod_ingrediente                
             ]);
            
        }
       
    }

?>