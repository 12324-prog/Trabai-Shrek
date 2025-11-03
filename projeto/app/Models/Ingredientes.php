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

            return $IngredientesDoBanco[0];

        }

        public function gravar (){

            DB::insert('INSERT INTO ingredientes (descricao, quantidade_estoque, valor_unitario)
             values (?,?,?)', [
                $this->descricao,          
                0,
                $this->valor_unitario ?? 0
           
          ]);        
           
        }

            public function apagar ($cod_ingrediente){
            DB::delete('DELETE FROM ingredientes WHERE cod_ingrediente = ?', [$cod_ingrediente]);
        }

        public function trigger_gravar()
{
    DB::unprepared('DROP TRIGGER IF EXISTS insert_ingredientes');

    DB::unprepared('
        CREATE TRIGGER insert_ingredientes
        AFTER INSERT ON ingredientes
        FOR EACH ROW
        BEGIN
            INSERT INTO composicao (cod_prato, cod_ingrediente)
            VALUES (SELECT MAX(cod_prato) FROM pratos, SELECT MAX(cod_ingrediente) FROM ingredientes)

            UPDATE pratos p
            JOIN composicao c ON p.cod_prato = c.cod_prato
            JOIN ingredientes i ON c.cod_ingrediente = i.cod_ingrediente
            SET p.valor_unitario = (
                SELECT IFNULL(SUM(i2.valor_unitario), 0) + p.taxa_prato
                FROM composicao c2
                JOIN ingredientes i2 ON c2.cod_ingrediente = i2.cod_ingrediente
                WHERE c2.cod_prato = p.cod_prato
                GROUP BY c2.cod_prato
            )
            WHERE p.cod_prato IN (
                SELECT cod_prato FROM composicao WHERE cod_ingrediente = NEW.cod_ingrediente
            );
        END
    '); 
}

        public function trigger_atualizar(){
            DB::unprepared ('DROP TRIGGER IF EXISTS ingrediente_atualizar');
            DB::unprepared('
            CREATE TRIGGER ingrediente_atualizar
            AFTER UPDATE ON ingredientes
            FOR EACH ROW
            BEGIN
                IF (NEW.valor_unitario <> OLD.valor_unitario)
                THEN
                    UPDATE pratos p
                    JOIN composicao c ON p.cod_prato = c.cod_prato
                    JOIN ingredientes i ON c.cod_ingrediente = i.cod_ingrediente
                    SET p.valor_unitario = (
                        SELECT IFNULL(SUM(i2.valor_unitario), 0) + p.taxa_prato
                        FROM composicao c2
                        JOIN ingredientes i2 ON c2.cod_ingrediente = i2.cod_ingrediente
                        WHERE c2.cod_prato = p.cod_prato
                        GROUP BY c2.cod_prato
                    )
                    WHERE p.cod_prato IN (
                        SELECT cod_prato FROM composicao WHERE cod_ingrediente = NEW.cod_ingrediente
                    ); 
                END IF
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
                
                UPDATE pratos p
                JOIN composicao c ON p.cod_prato = c.cod_prato
                JOIN ingredientes i ON c.cod_ingrediente = i.cod_ingrediente
                SET p.valor_unitario = (
                    SELECT IFNULL(SUM(i2.valor_unitario), 0) + p.taxa_prato
                    FROM composicao c2
                    JOIN ingredientes i2 ON c2.cod_ingrediente = i2.cod_ingrediente
                    WHERE c2.cod_prato = p.cod_prato
                    GROUP BY c2.cod_prato
                )
                WHERE p.cod_prato IN (
                    SELECT cod_prato FROM composicao WHERE cod_ingrediente = NEW.cod_ingrediente
                );

                DELETE FROM composicao WHERE cod_ingrediente = OLD.cod_ingrediente;
                DELETE FROM itens_compra WHERE cod_ingrediente = OLD.cod_ingrediente;
            END        
                ');
        }


    }

?>