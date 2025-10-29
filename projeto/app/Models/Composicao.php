<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Composicao extends Model {

         public $cod_prato;                

         public  $cod_ingrediente;

         public  $quantidade;        
        

        public function listarComposicao(){

            $listaComposicaoDoBanco = DB::select('select * from ingredientes order by cod_ingrediente DESC');

            return $listaComposicaoDoBanco;

        }

        public function atualizarComposicao($id){
            
          return DB::update('update composicao set 
          cod_prato = ?, 
          cod_ingrediente = ?, 
          quantidade = ?
           where cod_ingrediente = ? ');

        } 

        public function buscarComposicao($cod_composicao){

            $ComposicaoDoBanco = DB::select('select * from composicao where cod_ingrediente = '.$cod_ingrediente);

            return $ComposicaoDoBanco;

        }

        public function gravar ($cod_prato,$cod_ingrediente,$quantidade){

            DB::insert('insert into Composicao (cod_prato, cod_ingrediente, quantidade)
             values (?,?,?)', [
                $cod_prato,
                $cod_ingrediente,
                $quantidade ?? 0
             ]);
            
        }

        public function apagar ($codComposicao)
        {
            DB::delete('delete from composicao where cod_composicao = '.$cod_prato);
        }

    }

?>