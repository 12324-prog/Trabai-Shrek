<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Categorias extends Model {

         public $cod_cat;                

         public  $descricao;            
        

        public function listarComposicao(){

            $listaCategoriasDoBanco = DB::select('select * from categorias order by cod_cat DESC');

            return $listaCategoriasoDoBanco;

        }

        public function atualizarCategorias($id){
            
          return DB::update('update categorias set 
          cod_cat = ?, 
          descricao = ?  
          where cod_cat = ? ');

        } 

        public function buscarCategorias($cod_Categoria){

            $ComposicaoDoBanco = DB::select('select * from Categoria where cod_cat = ? ', [$cod_categoria]);

            return $CategoriasDoBanco;

        }

        public function gravar ($cod_cato, $descricao ){

            DB::insert('INSERT INTO Categorias (cod_cat, descricao)
             values (?,?)', [

               $cod_cat,
               $descricao
               
             ]);
            
        }

        public function apagar ($categorias)
        {
            DB::delete('DELETE FROM categorias where cod_cat = ? ', [$cod_cat]);
        }

    }

?>