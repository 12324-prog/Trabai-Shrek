<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Categorias extends Model {

         public $cod_cat;                

         public  $descricao;            
        

        public function listarComposicao(){

            $listaCategoriasDoBanco = DB::select('SELECT * FROM categorias ORDER BY cod_cat DESC');

            return $listaCategoriasoDoBanco;

        }

        public function atualizarCategorias($id){
            
          return DB::update('UPDATE categorias SET
          cod_cat = ?, 
          descricao = ?  
          where cod_cat = ? ',
          [
            $this->cod_cat,
            $this->descricao,
            $id
          ]
            );
        } 

        public function buscarCategorias($cod_Categoria){

            $CategoriasDoBanco = DB::select('SELECT * FROM categorias WHERE cod_cat = ? ', [$cod_cat]);

            return $CategoriasDoBanco;

        }

        public function gravar ($cod_cato, $descricao ){

            DB::insert('INSERT INTO categorias (cod_cat, descricao)
             values (?,?)', [

               $cod_cat,
               $descricao
               
             ]);
            
        }

        public function apagar ($cod_cat)
        {
            DB::delete('DELETE FROM categorias WHERE cod_cat = ? ', [$cod_cat]);
        }

        public function trigger_apagar()
        {
            DB::unprepared('DROP TRIGGER IF EXISTS categoria_delete');

            DB::unprepared('
            CREATE TRIGGER categoria_delete
            BEFORE DELETE ON categorias
            FOR EACH ROW
            BEGIN
                DELETE FROM categorias
                WHERE cod_cat = OLD.cod_cat;
            END'
        );
        }


    }

?>