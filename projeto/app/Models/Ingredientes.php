<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Ingredientes extends Model {

         public $cod_ingrediente;                

         public  $descricao;         

         public  $quantidade_estoque;

         public $valor_unitario;


        public function listarIngredientes(){

            $listaIngredientesDoBanco = DB::select('SELECT * FROM ingredientes ORDER BY cod_ingrediente DESC');

            return $listaIngredientesDoBanco;

        }

        public function atualizarIngredientes($id){
         return DB::update('UPDATE ingredientes SET
          descricao = ?,           
          quantidade_estoque = ?,
          valor_unitario = ? 
          where cod_ingrediente = ?',          

        
        [
            $this->descricao,          
            $this->quantidade_estoque ?? 0,
            $this->valor_unitario ?? 0,
            $id
        ]);
} 
        public function buscarIngredientes($cod_ingrediente){

            $IngredientesDoBanco = DB::select('SELECT * FROM ingredientes WHERE cod_ingrediente = ?', [$cod_ingrediente]);

            return $IngredientesDoBanco;

        }

        public function gravar ($descricao, $quantidade_estoque, $valor_unitario ){

            DB::insert('INSERT INTO ingredientes (descricao, quantidade_estoque, valor_unitario)
             values (?,?,?)', [
                $descricao,                
                $quantidade_estoque ?? 0, 
                $valor_unitario  ?? 0
           
          ]);        
           
        }

            public function apagar ($cod_ingrediente){
            DB::delete('DELETE FROM ingredientes WHERE cod_ingrediente = ?', [$cod_ingrediente]);
            DB::delete('DELETE FROM composicao WHERE cod_ingrediente = ?', [$cod_ingrediente]);
        }

        public function trigger_gravar()
{
    DB::unprepared('DROP TRIGGER IF EXISTS insert_ingredientes');

    DB::unprepared('
        CREATE TRIGGER insert_ingredientes
        AFTER INSERT ON ingredientes
        FOR EACH ROW
        BEGIN
            
            UPDATE pratos 
            SET valor_unitario = (
                SELECT IFNULL(SUM(c.quantidade * i.valor_unitario), 0)
                FROM composicao c
                JOIN ingredientes i ON c.cod_ingrediente = i.cod_ingrediente
                WHERE c.cod_prato = NEW.cod_prato
            )
            WHERE cod_prato = NEW.cod_prato;
        END
    '); 
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
                
                UPDATE pratos
                SET valor_unitario = ( 
                SELECT INFNULL(SUM(c.quantidade * i.valor_unitario), 0)
                FROM composicao c
                JOIN ingredientes i ON c.cod_ingrediente = i.cod_ingrediente
                WHERE c.cod_prato = (SELECT cod_prato FROM composicao WHERE cod_ingrediente = OLD.cod_ingrediente LIMIT 1)
                WHERE cod_prato = (SELECT cod_prato FROM composicao WHERE cod_ingrediente = OLD.cod_ingrediente LIMIT 1);
                END        
                ');
        }


    }

?>