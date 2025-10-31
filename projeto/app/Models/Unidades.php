<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Unidades extends Model {

         public $cod_unidade;                

         public  $descricao;

         public  $sigla;        
        

        public function listarUnidades(){

            $listaUnidadesoDoBanco = DB::select('select * from unidades order by cod_unidade DESC');

            return $listaUnidadesDoBanco;

        }

        public function atualizarUnidades($id){
            
            return DB::update('update unidades set 
            cod_unidade = ?,
            descricao = ?,
             sigla= ?
             WHERE cod_unidades = ?',);
           

        } 

        public function buscarUnidades($cod_unidades){

            $UnidadesDoBanco = DB::select('select * from unidades where cod_unidades = ?',[$cod_unidades]);

            return $UnidadesDoBanco;

        }

        public function gravar ( $cod_unidade,$descricao, $sigla){

            DB::insert('insert into Unidades (cod_unidade=,descricao=, sigla=, ) 
            values (?,?,?)',
             [$cod_unidade,
             $descricao, 
             $sigla
            ]);
            
        }

        public function apagar ($cod_unidade)
        {
            DB::delete('delete from unidades where cod_unidade = ?', [$cod_unidade]);
        }

        public function trigger_apagar()
        {
            DB::unprepared('DROP TRIGGER IF EXISTS unidade_delete');

            DB::unprepared('
            CREATE TRIGGER unidade_delete
            BEFORE DELETE ON unidades
            FOR EACH ROW
            BEGIN
                DELETE FROM cunidades
                WHERE cod_unidade = OLD.cod_unidade;
            END'
        );
        }

    }

?>